// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){
    // var onSuccess = function() {
    //     Debug("[rebootDevice] succeeded!");
    // };
    //
    // var onError = function(error) {
    //     Debug("[rebootDevice] failed! error code: " + error.code + " error name: " + error.name + "  message " + error.message);
    // };
    //
    // b2bcontrol.rebootDevice(onSuccess, onError);

    var now = new tizen.TZDate();

    Debug('************* > '+now);

    $.ajax({
        type: 'POST',
        url: 'http://'+ServerIp+'/BBINCO/TV/Core/Models/Time.php',
        async : false,
        success: function (response) {
            var Today = $.parseJSON(response),
                Hours   = parseInt(Today.Hours, 10);

            Debug('************* HOURS: '+Hours);

            // now.setDate(1); // Changes the day of month to 1.
            // now.setMonth(2); // Changes the month to March
            // now.setFullYear(2099); // Changes the year to 2099.
            now.setHours(Hours); // Sets the hour to 3 PM.

            Debug('************* < '+now);
        }
    });
}

function Green(){
    
    StopVideo();
    stbPlayerManager.setRTSP({type: 0, useUDP: true, nonSmoothPause: true});
    player.play({
        uri: 'rtsp://10.0.3.21:554/0000000207',
        solution: ''
    });
   
    Debug('q_p');
    player.onTracksInfo = function () {   
        Debug('Play end');
    };
    player.onPlayError = function () {   
        Debug('Play Error');
    };
    player.onRTPBreak = function () {   
        Debug('RTP Break');
    };
    player.onPlayStart = function () {   
        Debug('Play start');
    };
}

function Yellow(){
// @ts-nocheck
var f = gSTB.GetEnv('{ "varList":["timezone_conf"] }');
Debug(f);
var g = gSTB.SetEnv('{ "timezone_conf":"America/Mexico_City" }');
Debug(g);
}

function Close(){
    if(CurrentModule === 'Tv'){
        TvClose();
    } else if(CurrentModule === 'Menu'){
        //
    } else if(CurrentModule === 'Movies'){
        VodClose();
    } else if(CurrentModule === 'Moods'){
        MoodsClose();
    }
}

function Back(){
    if(CurrentModule === 'Tv'){
        TvClose();
    } else if(CurrentModule === 'Menu'){
        //
    } else if(CurrentModule === 'Movies'){
        VodClose();
    } else if(CurrentModule === 'Moods'){
        MoodsClose();
    }else{
        GoPage('menu.php', Device['MenuId'], 'Menu');
    }
}

function Menu(){
    if(CurrentModule !== 'Menu' && Device['Services']['ActiveMenu'] === true){
        GoPage('menu.php', Device['MenuId'], 'Menu');
    } else if(CurrentModule === 'Tv' && Device['Services']['ActiveMenu'] === false){
        TvRecorder();
    }
}
