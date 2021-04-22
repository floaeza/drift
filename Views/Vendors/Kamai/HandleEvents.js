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
                End         = '';

            for(Indexps = 0;  Indexps < ProgramsToSchedule.length; Indexps++){

                ProgramId = ProgramsToSchedule[Indexps]['id_programa'];
                Title = ProgramsToSchedule[Indexps]['titulo_programa'];
                Source = ProgramsToSchedule[Indexps]['url_canal'];
                Start = ProgramsToSchedule[Indexps]['utc_inicio'];
                End = ProgramsToSchedule[Indexps]['utc_final'];

                Debug('>> '+Source +', '+ Title +', '+ Start +', '+ End);

                Debug('ProgramsToSchedule.length: '+ProgramsToSchedule.length);

                //Source = Source.replace('igmp','udp');

                // try {
                //     var recorder = new ENTONE.recorder(Source, ProgramId, null, {recnow: 0});
                // } catch (e) {
                //     // Failed to create recorder or start recording. Error handling
                //     Debug('> Failed to create recorder or start recording. Error handling');
                // }

               // NewSchedule = PVR.AddSchedule(Source, ProgramId, Start, End);
               //
               //  if (typeof(NewSchedule) === 'undefined'){
               //      //CurrentTime = Date.UTC(moment().format('Y'), moment().format('MM'), moment().format('DD'), moment().format('HH'), moment().format('mm'));
               //      Debug('> Fail new schedule');
               //      DeleteProgram(ProgramId);
               //  } else {
               //      NewSchedule.WriteMeta('This is Metadata for scheduled asset '+ Title);
               //      Debug('New schedule added, streamid = '+NewSchedule.streamId);
               //      Debug('> '+ProgramId + ', '+OperationsList.recording+', '+NewSchedule.streamId);
               //      UpdateProgramStreamId(ProgramId, OperationsList.recording, NewSchedule.streamId);
               //  }
            }
        }
    });
    Debug('--------<< GetProgramsToScheduleNow');
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

    //GetProgramsToSchedule();

    //GetSchedulesToDelete();

    Debug('-------> HandlerPvr');
}
