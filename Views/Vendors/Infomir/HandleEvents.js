
window.stbEvent = {
    onEvent: function ( event ) {

        Debug(event);
        EventNetman = gSTB.GetLanLinkStatus();

        switch ( Number (event) ) {

            case 1:
                //The player reached the end of the media content or detected a discontinuity of the stream
                EventString = 'STATUS_END_OF_STREAM';

                if(Executing === false){
                    UpdateQuickInfoDevice();
                }
            break;

            case 2:
                //Information on audio and video tracks of the media content is received
                EventString = 'STATUS_PLAYING';
            break;

            case 4:
                //Video and/or audio playback has begun
                EventString = 'STATUS_PLAYING';

                if(Executing === false){
                    UpdateQuickInfoDevice();
                }
            break;

            case 5:
                //Error when opening the content: content not found on the server or connection with the server was rejected
                EventString = 'STATUS_ERROR_STREAM';

                if(Executing === false){
                    UpdateQuickInfoDevice();
                }
            break;

            case 32:
                //HDMI device has been connected.
                EventHdmi = 1;

                Debug('....................HDMI 1........................');
                gSTB.StandBy(false);
                Debug('..................STANDBY EXIT..........................');
                var SWS = gSTB.GetStandByStatus();
                Debug('----------------------- SWS'+SWS);

                if(Executing === false){
                    UpdateQuickInfoDevice();
                }

            break;

            case 33:
                //HDMI device has been disconnected.
                EventHdmi = 0;
            break;
        }
    },
    onBroadcastMessage: function( from, message, data ) {
        if ( message === 'storage.mount' ) {
            InfomirUSB = 1;
        } else if ( message === 'storage.unmount' ) {
            InfomirUSB = 0;
        }
    }
};


/*******************************************************************************
 * Actualiza informacion del disco duro
 *******************************************************************************/

 function UpdateDiskInfo(){
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'SetPvrInfo',
            LocationId : Device['LocationId'],
            MacAddress : MacAddress,
            TotalSize : SizeTotal,
            AvailableSize : SizeAvailable,
            SizeRecords : SizePerSecond
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

                Debug('ProgramsToSchedule.length: '+ProgramsToSchedule.length);

                NewSchedule = PVR.AddSchedule(Source, ProgramId, Start, End);

                if (typeof(NewSchedule) === 'undefined'){
                    //CurrentTime = Date.UTC(moment().format('Y'), moment().format('MM'), moment().format('DD'), moment().format('HH'), moment().format('mm'));
                    Debug('> Fail new schedule');
                    DeleteProgram(ProgramId);
                } else {
                    NewSchedule.WriteMeta('This is Metadata for scheduled asset '+ Title);
                    Debug('New schedule added, streamid = '+NewSchedule.streamId);
                    Debug('> '+ProgramId + ', '+OperationsList.recording+', '+NewSchedule.streamId);
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
    Debug('--------->> UpdateProgramStreamid= '+ ProgramId + ', ' + OperationId + ', '+StreamId);
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
 * Carga inicial con funciones para el DVR
 *******************************************************************************/

 if(Device['Type'] === 'WHP_HDDY' || Device['Type'] === 'PVR_ONLY'){

    HandlerPvr();

    UpdateDiskInfo();

    GetProgramsSerie();

    setInterval(HandlerPvr,60000);
}

function HandlerPvr(){

    UpdateAssetsId();

    GetProgramsToScheduleInformir();

    GetSchedulesToDeleteInformir();

    Debug('-------> HandlerPvrInformir');
}
