// Video.setVideoCallback(HandleVideo);
// function HandleVideo(event_type){
//     if(event_type === 'EN_VIDEOEVENT_EOS'){
//         if(CurrentModule === 'Tv'){
//             SetDigitalChannel();
//         }
//     }
// }

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// EVENTOS VIDEO
//EN_VIDEOEVENT_PMT
//EN_VIDEOEVENT_FIRST_PTS
//EN_VIDEOEVENT_MPEG_TIMEOUT
//EN_VIDEOEVENT_MPEG_PCR

// EVENTOS NETWORK
// DOWN
// {"status":28676}
// {"status":28678}
// UP
// {"status":28675}
// {"status":28677}

EventHdmi = 1;

function HandleVideo(event_type){

    Debug('---> EventType: '+event_type);

    if(EventString === 'EN_VIDEOEVENT_FIRST_PTS'){
        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    } else if(EventString === 'EN_VIDEOEVENT_MPEG_TIMEOUT'){

        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    } else if(EventString === 'EN_VIDEOEVENT_EOS'){
        if(CurrentModule === 'Tv'){
            SetDigitalChannel();
        }
    }
}


ENTONE.stb.setHdmiEvtCallback(function(e){
    EventHdmiObj = e;

    EventHdmiRes = EventHdmiObj['event_name'];

    Debug('EventHdmiRes--->'+EventHdmiRes);

    if(EventHdmiRes === 'hdmi_disconnected'){
        EventHdmi = 0;
    } else if(EventHdmiRes === 'hdmi_connected'){
        EventHdmi = 1;
    }

    if(Executing === false){
        Debug('UpdateQuickInfoDevice >> HDMICALLBACK '+Executing);
        UpdateQuickInfoDevice();
    }
}, this);

ENTONE.network.setNetworkEvtCallback(function(e){

    EventValue = e.status;


    if(EventValue === '28675'){
        EventNetman = 'LINK STATUS DOWN/UP';
        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    }
}, this);


function GetProgramsToSchedule(){
    Debug('-------->> GetProgramsToScheduleNow');
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'CheckProgramsToScheduleNow',
            MacAddress : MacAddress
        },
        success: function (response){
            ProgramsToSchedule = $.parseJSON(response);

            var Indexps     = 0,
                ProgramId   = '',
                Title       = '',
                Source      = '',
                Start       = '',
                End         = '',
                TimeOut     = 0;

            for(Indexps = 0;  Indexps < ProgramsToSchedule.length; Indexps++){

                ProgramId = ProgramsToSchedule[Indexps]['id_programa'];
                Title = ProgramsToSchedule[Indexps]['titulo_programa'];
                Source = ProgramsToSchedule[Indexps]['url_canal'];
                Source = Source.replace('igmp','udp');
                Start = ProgramsToSchedule[Indexps]['utc_inicio'];
                End = ProgramsToSchedule[Indexps]['utc_final'];
                TimeOut = (parseInt(End) - parseInt(Start))*1000;

                Debug('>> '+Source +', '+ Title +', '+ Start +', '+ End + ', '+TimeOut);

                // try {
                    var recorder = new ENTONE.recorder(Source, pad(parseInt(ProgramId), 10), null, {recnow:1});
                        recorder.start();

                        recorder.setRecorderCallback(function(e, h){
                            Debug(e);
                        }, this);

                        setTimeout(function(){
                            recorder.stop();
                            recorder.cleanup();
                            UpdateProgramActive(ProgramId, OperationsList.recorded, '0');
                        }, TimeOut);

                    UpdateProgramActive(ProgramId, OperationsList.recording, '1');
                // } catch (e) {
                //     Debug('> Failed to create recorder or start recording. Error handling');
                // }
            }
        }
    });
    Debug('--------<< GetProgramsToScheduleNow');
}

/*******************************************************************************
 * Actualiza el estatus de la grabacion y su stream id
 *******************************************************************************/

function UpdateProgramActive(ProgramId, OperationId, ActiveRecording){

    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/Recorder.php',
        data: {
            Option     : 'UpdateProgramActive',
            ProgramId : ProgramId,
            OperationId : OperationId,
            ActiveRecording : ActiveRecording,
        },
        success: function (response){
            Debug('----------UpdateProgramActive----------');
            Debug(response);
        }
    });
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

            var AssetId      = 0;

            for(Indexps = 0;  Indexps < ProgramsToDelete.length; Indexps++){
                AssetId  = parseInt(ProgramsToDelete[Indexps].id_programa,10);
Debug('ID: '+ProgramsToDelete[Indexps].id_programa+'AssetId '+AssetId);
                if(AssetId > 0){
                    //ENTONE.recorder.deleteAsset(pad(AssetId, 10));
                    ENTONE.recorder.deleteAsset('asset_'+ProgramsToDelete[Indexps].id_programa);
                }

                DeleteProgram(ProgramsToDelete[Indexps].id_programa);
            }
        }
    });

    Debug('--------<< GetSchedulesToDelete');
}

/*******************************************************************************
 * Carga inicial con funciones para el DVR
 *******************************************************************************/

if(Device['Type'] === 'WHP_HDDY' || Device['Type'] === 'PVR_ONLY'){
    //UpdateDiskInfo();

    HandlerPvr();

    //GetProgramsSerie();

    setInterval(HandlerPvr,60000);
}

function HandlerPvr(){

    //UpdateAssetsId();

    GetProgramsToSchedule();

    GetSchedulesToDelete();

    var AL = ENTONE.recorder.getAssetList();
    Debug(JSON.stringify(AL));

    Debug('-------> HandlerPvr');
}

function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}