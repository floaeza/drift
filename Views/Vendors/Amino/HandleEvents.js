/* Creado por: Tania Maldonado
 * Fecha: Abril 2020
 * Tipo: Manejador de eventos
 * Vendor: Amino
 */
    
    /* Eventos PVR */

    var PVR_REC_RECORDING_STARTED   = 58,
        PVR_REC_END_OF_STREAM       = 57,
        PVR_PLAY_END_OF_FILE        = 67;

    var RTSP_STATUS_END_OF_STREAM   = 8,
        RTSP_STATUS_NOT_FOUND       = 9,
        RTSP_SETUP_SUCCESS          = 51,
        RTSP_CONNECTION_STOPPED     = 12,
        RTSP_CONNECTION_DIED        = 4,
        RTSP_CONNECT_FAILED         = 1;

    var CONNECTION_STOPPED          = 95,
        IGMP_STATUS_END_OF_STREAM   = 11,
        STATUS_END_OF_STREAM        = 90,
        STATUS_PLAYING              = 92,
        VIDEO_STARTED               = 84,
        IGMP_STATUS_PLAYING         = 15;

    var ProgramsToSchedule          = '',
        ProgramsToDelete            = '',
        AssetsIdList                = [],
        AssetsCount                 = 0;
    
    var NUMBER_EVENT                = 0;

Debug('########################### HandleEvent() ');

        AVMedia.onEvent='HandleEvent()';

        NetMan.onEvent = 'processNetManEvent()';

        function processNetManEvent() {
            EventNetman = NetMan.Event;

            Debug('########################### NetMan.Event: '+EventNetman);

            if(Executing === false){
                UpdateQuickInfoDevice();
            }
        } 
/*******************************************************************************
 * Manejador de eventos
 *******************************************************************************/

    function HandleEvent() {
        
        Debug('*************AVMedia.Event: '+AVMedia.Event);
        NUMBER_EVENT = AVMedia.Event;
        if(System.HdmiConnected === true){
            EventHdmi = 1;
        } else {
            EventHdmi = 0;
        }

        if(NUMBER_EVENT === PVR_REC_RECORDING_STARTED || NUMBER_EVENT === PVR_REC_END_OF_STREAM){
            // Actualiza el estado del disco en el grabador y actualiza
            UpdateDiskInfo();
            
            UpdateAssetsId();
        } else if(NUMBER_EVENT === RTSP_STATUS_END_OF_STREAM || NUMBER_EVENT === PVR_PLAY_END_OF_FILE){
            // Termino reproduccion grabacion
            OpenRecordPlayOptions();
        } else if(NUMBER_EVENT === RTSP_CONNECTION_STOPPED || NUMBER_EVENT === RTSP_CONNECTION_DIED || NUMBER_EVENT === RTSP_CONNECT_FAILED){ 
            // No encuentra la grabacion (Reinicio del PVR o no encuentra la grabacion)
            OpenRecordPlayOptions();
        } else if(NUMBER_EVENT === CONNECTION_STOPPED){ 
            //
            EventString = 'CONNECTION_STOPPED';

            if(Executing === false){
                UpdateQuickInfoDevice();
            }
        } else if(NUMBER_EVENT === IGMP_STATUS_END_OF_STREAM){ 
            //
            EventString = 'IGMP_STATUS_END_OF_STREAM';

            if(Executing === false){
                UpdateQuickInfoDevice();
            }
        }  else if(NUMBER_EVENT === VIDEO_STARTED){
            //
            EventString = 'VIDEO_STARTED';

            if(CurrentModule === 'Tv'){
                Debug('----> HANDLE EVENTS ActiveDigitalChannel: '+ActiveDigitalChannel);
                if (ActiveDigitalChannel === true) {
                    ImageDigital.src = '';
                    ImageDigital.style.display = 'none';
                }
            }
        } else if(NUMBER_EVENT === IGMP_STATUS_PLAYING || NUMBER_EVENT === STATUS_PLAYING){
            //
            Debug('----> HANDLE EVENTS STATUS_PLAYING');
            EventString = 'STATUS_PLAYING';



            Debug('----> HANDLE EVENTS Executing: '+Executing);
            if(Executing === false){
                UpdateQuickInfoDevice();
            }

            Debug('----> HANDLE EVENTS STATUS_PLAYING <');
        } else if(NUMBER_EVENT === STATUS_END_OF_STREAM){ 
            if(CurrentModule === 'Tv'){
                SetDigitalChannel();
            } else if(CurrentModule === 'Movies'){
                //EndOfMovie();
                Debug('STATUS_END_OF_STREAM');
                PlayVideo(Libraries['MoviesSource'] + MoviesList[MovieBox.id].FLDR + MoviesList[MovieBox.id].FILE);
                AVMedia.SetPos(PositionAsset);
                Debug('Se detuvo y se reprodujo de nuevo');
            }

            EventString = 'STATUS_END_OF_STREAM';

            if(Executing === false){
                UpdateQuickInfoDevice();
            }
        } else if(NUMBER_EVENT === HDMI_STATUS_UPDATED) {
            if(System.HdmiConnected === true){
                EventHdmi = 1;
            } else {
                EventHdmi = 0;
            }

            if(Executing === false){
                UpdateQuickInfoDevice();
            }
        }
    }



/*******************************************************************************
 * Actualiza informacion del disco duro
 *******************************************************************************/

function UpdateDiskInfo(){

    var StorageInfo = [];
    StorageInfo = PVR.GetStorageInfo();

    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'SetPvrInfo',
            LocationId : Device['LocationId'],
            MacAddress : MacAddress,
            TotalSize : StorageInfo.totalSize,
            AvailableSize : StorageInfo.availableSize
        },
        success: function (response){
            //Debug(response);
        }
    });
}

/*******************************************************************************
 * Obtien lista de programas para grabar
 *******************************************************************************/

function GetProgramsToSchedule(){
    Debug('-------->> GetProgramsToSchedule');
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'CheckProgramsToSchedule',
            MacAddress : MacAddress
        },
        success: function (response){
            ProgramsToSchedule = $.parseJSON(response);

            var Indexps     = 0,
                NewSchedule = [],
                ProgramId   = '',
                Title       = '',
                Source      = '',
                Start       = '',
                End         = '';

            for(Indexps = 0;  Indexps < ProgramsToSchedule.length; Indexps++){

                ProgramId = ProgramsToSchedule[Indexps]['id_programa'];
                Title = ProgramsToSchedule[Indexps]['titulo_programa'];
                Source = ProgramsToSchedule[Indexps]['url_canal'];
                Start = ProgramsToSchedule[Indexps]['utc_inicio'];
                End = ProgramsToSchedule[Indexps]['utc_final'];

                Debug('>> '+Source +', '+ Title +', '+ Start +', '+ End);

                NewSchedule = PVR.AddSchedule(Source, ProgramId, Start, End);

                if (typeof(NewSchedule) === 'undefined'){
                    //CurrentTime = Date.UTC(moment().format('Y'), moment().format('MM'), moment().format('DD'), moment().format('HH'), moment().format('mm'));
                    Debug('> Fail new schedule');
                    DeleteProgram(ProgramId);
                } else {
                    NewSchedule.WriteMeta('This is Metadata for scheduled asset '+ Title);
                    Debug('New schedule added, streamid = '+NewSchedule.streamId);
                    UpdateProgramStreamId(ProgramId, OperationsList.recording, NewSchedule.streamId);
                }
            }
        }
    });
    Debug('--------<< GetProgramsToSchedule');
}

/*******************************************************************************
 * Obtien lista de programas a eliminar
 *******************************************************************************/

function GetSchedulesToDelete(){

    Debug('-------->> GetSchedulesToDelete');
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'CheckSchedulesToDelete',
            MacAddress : MacAddress
        },
        success: function (response){
            ProgramsToDelete = $.parseJSON(response);

            var Indexps     = 0;


            var ResultDelete = -1,
                StreamId     = -1,
                AssetId      = -1,
                Active       = -1;

            for(Indexps = 0;  Indexps < ProgramsToDelete.length; Indexps++){

                StreamId = parseInt(ProgramsToDelete[Indexps].id_stream,10);
                AssetId  = parseInt(ProgramsToDelete[Indexps].id_asset,10);
                Active   = parseInt(ProgramsToDelete[Indexps].grabacion_activa,10);

                if(StreamId === 0){
                    DeleteProgram(ProgramsToDelete[Indexps].id_programa);
                } if(AssetId > 0 && Active === 0){
                    ResultDelete = PVR.DeleteAsset(AssetId);

                    if(ResultDelete === 0){
                        DeleteProgram(ProgramsToDelete[Indexps].id_programa);
                    }
                } else {
                    ResultDelete = PVR.DeleteSchedule(StreamId);

                    if(Active === 1){
                        UpdateProgramDelete(ProgramsToDelete[Indexps].id_programa, OperationsList.delete, AssetId);
                    } else {
                        DeleteProgram(ProgramsToDelete[Indexps].id_programa);
                    }
                }
            }
        }
    });

    Debug('--------<< GetSchedulesToDelete');
}

/*******************************************************************************
 * Actualiza el estatus de la grabacion y su stream id
 *******************************************************************************/

function DeleteProgram(ProgramId){
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'DeleteProgram',
            ProgramId : ProgramId
        },
        success: function (response){
            //Debug(response);
        }
    });
}

/*******************************************************************************
 * Actualiza el estatus de la grabacion y su stream id
 *******************************************************************************/

function UpdateProgramAsset(ProgramId, OperationId, AssetId, ActiveRecording){

    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'UpdateProgramAsset',
            ProgramId : ProgramId,
            OperationId : OperationId,
            AssetId : AssetId,
            ActiveRecording : ActiveRecording
        },
        success: function (response){
            Debug('----------UpdateProgramAsset----------');
            Debug(response);
        }
    });
}

function UpdateProgramStreamId(ProgramId, OperationId, StreamId){
    Debug('--------->> UpdateProgramStreamid '+ ProgramId + ', ' + OperationId + ', '+StreamId);
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'UpdateProgramStreamId',
            ProgramId : ProgramId,
            OperationId : OperationId,
            StreamId : StreamId
        },
        success: function (response){
            Debug('----------UpdateProgramStreamid----------');
            Debug(response);
        }
    });
}

function UpdateProgramDelete(ProgramId, OperationId, AssetId){

    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'UpdateProgramStatusDelete',
            ProgramId : ProgramId,
            OperationId : OperationId,
            AssetId : AssetId
        },
        success: function (response){
            Debug('----------UpdateProgramDelete----------');
            Debug(response);
        }
    });
}

/*******************************************************************************
 * Actualiza el asset id
 *******************************************************************************/

    function UpdateAssetsId(){

        Debug('-------->> UpdateAssetsId');
        
        AssetsIdList = PVR.GetAssetIdList();
        
        if (typeof AssetsIdList !== 'object'){ AssetsCount = 0; } else { AssetsCount = AssetsIdList.count; }
               
        var YesterdayUtcDate = Date.UTC(moment().format('Y'), (moment().format('MM') -2), moment().format('DD'), moment().format('HH'), moment().format('mm'));
                    YesterdayUtcDate = YesterdayUtcDate / 1000;
                    
        Debug('>>>>>>>>>>> YesterdayUtcDate '+YesterdayUtcDate);

        if (AssetsCount > 0){
            
            var Indexal = 1,
                AssetInfo = [],
                ActRec    = false,
                Option = '';
        
            for(Indexal = 1;  Indexal <= AssetsIdList.count; Indexal++){
                
                //Debug('::::::::= '+AssetsIdList.count);
                
                AssetInfo = PVR.GetAssetById(AssetsIdList[Indexal]);
                
                if(AssetInfo.startTime < YesterdayUtcDate){
                    Debug('<<<<<<<<<< startTime <<<<'+AssetInfo.startTime);
                } else {
                    Debug('>>>>>>>>>>> startTime >>>>'+AssetInfo.startTime);

                    Debug(JSON.stringify(AssetInfo));

                    ActRec = (AssetInfo.activeRecording === 0) ? false : true;

                    Option = (AssetInfo.activeRecording === 0) ? OperationsList.recorded : OperationsList.recording;

                    Debug(AssetInfo.title +', '+ OperationsList.recorded +', '+  Option +', '+ AssetsIdList[Indexal] +', '+  ActRec);

                    UpdateProgramAsset(AssetInfo.title, Option, AssetsIdList[Indexal], ActRec);
                }
            }
        }
    Debug('--------<< UpdateAssetsId');
    }


function DeleteOldestAssets(){
    /* Elimina los 6 assets mas viejos cuando llega al 95% el disco duro*/
    AssetsIdList = PVR.GetAssetIdList();

    if (typeof AssetsIdList !== 'object'){ AssetsCount = 0; } else { AssetsCount = AssetsIdList.count; }

    if (AssetsCount > 0){
        var Indexal = 1,
            AssetInfo = [],
            ActRec    = false;

        for(Indexal = 1;  Indexal <= 6; Indexal++){

            AssetInfo = PVR.GetAssetById(AssetsIdList[Indexal]);

            ActRec = (AssetInfo.activeRecording === 0) ? false : true;

            //Debug(Indexal+'= ######### ProgramId: '+AssetInfo.title +', AssetId: '+ AssetsIdList[Indexal] +', Active:'+  ActRec);

            UpdateProgramAsset(AssetInfo.title, OperationsList.recorded, AssetsIdList[Indexal], ActRec);
        }
    }
}


/*******************************************************************************
 * Carga inicial con funciones para el DVR
 *******************************************************************************/

if(Device['Type'] === 'WHP_HDDY' || Device['Type'] === 'PVR_ONLY'){
    UpdateDiskInfo();

    HandlerPvr();

    GetProgramsSerie();

    setInterval(HandlerPvr,60000);
}

function HandlerPvr(){

    UpdateAssetsId();

    GetProgramsToSchedule();

    GetSchedulesToDelete();

    Debug('-------> HandlerPvr');
}

function DeleteOldestAssets(){
    /* Elimina los 6 assets mas viejos cuando llega al 95% el disco duro*/
    AssetsIdList = PVR.GetAssetIdList();

    if (typeof AssetsIdList !== 'object'){ AssetsCount = 0; } else { AssetsCount = AssetsIdList.count; }

    if (AssetsCount > 0){
        var Indexal = 1,
            Res = 0,
            AssetInfo = [],
            ActRec    = false;

        for(Indexal = 1;  Indexal <= 500; Indexal++){

            //AssetInfo = PVR.GetAssetById(AssetsIdList[Indexal]);
            Debug('AssetId= '+AssetsIdList[Indexal]);
            Res = PVR.DeleteAsset(AssetsIdList[Indexal]);
            Debug('Return: '+Res);
        }
    }
}

