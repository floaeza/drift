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

ENTONE.stb.setHdmiEvtCallback(function(e){
    EventHdmiObj = e;

    EventHdmiRes = EventHdmiObj['event_name'];

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


// Video.setVideoCallback(function(e){
//     EventString = e;
//
//     Debug('EventString: '+EventString);
//     if(EventString === 'EN_VIDEOEVENT_FIRST_PTS'){
//         if(Executing === false){
//             UpdateQuickInfoDevice();
//         }
//     } else if(EventString === 'EN_VIDEOEVENT_MPEG_TIMEOUT'){
//
//         if(Executing === false){
//             UpdateQuickInfoDevice();
//         }
//     } else if(EventString === 'EN_VIDEOEVENT_EOS'){
//         if(CurrentModule === 'Tv'){
//             SetDigitalChannel();
//         }
//     }
// }, this);

    function HandleVideo(event_type){

        Debug('---> EventType: '+event_type);

        if(event_type === 'EN_VIDEOEVENT_EOS'){
            if(CurrentModule === 'Tv'){
                SetDigitalChannel();
            }
        }
    }


ENTONE.network.setNetworkEvtCallback(function(e){

    EventValue = e.status;


    if(EventValue === '28675'){
        EventNetman = 'LINK STATUS DOWN/UP';
        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    }
}, this);
