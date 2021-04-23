

window.stbEvent = {
    onEvent: function ( event ) {

        Debug(event);

        switch ( Number (event) ) {

            case 1:
                //The player reached the end of the media content or detected a discontinuity of the stream
                EventString = 'STATUS_END_OF_STREAM';
            break;

            case 2:
                //Information on audio and video tracks of the media content is received
                EventString = 'IGMP_STATUS_PLAYING';
            break;

            case 4:
                //Video and/or audio playback has begun
                EventString = 'IGMP_STATUS_PLAYING';
            break;

            case 5:
                //Error when opening the content: content not found on the server or connection with the server was rejected
                EventString = 'STATUS_ERROR_STREAM';
            break;

            case 32:
                //HDMI device has been connected.
                EventHdmi = 1;

                Debug('....................HDMI 1........................');
                gSTB.StandBy(false);
                Debug('..................STANDBY EXIT..........................');
                var SWS = gSTB.GetStandByStatus();
                Debug('----------------------- SWS'+SWS);

            break;

            case 33:
                //HDMI device has been disconnected.
                EventHdmi = 0;
            break;
        }

        EventNetman = gSTB.GetLanLinkStatus();

        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    }
};