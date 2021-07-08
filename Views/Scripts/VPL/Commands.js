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


}

function Green(){
    //player.speed = 4;
    //Debug(player.speed);
    StopVideo();
    stbPlayerManager.setRTSP({type: 0, useUDP: true, nonSmoothPause: true});
    player.play({
        uri: '/media/USB-E0D55EA574F1F4718944A9E1-1/329_Botched_undefined.mp4',
        solution: 'auto'
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
    //var f = gSTB.GetEnv('{ "varList":["timezone_conf"] }');
    //Debug(f);
    //var g = gSTB.SetEnv('{ "timezone_conf":"America/Mexico_City" }');
    //Debug(g);

    gSTB.SetSpeed(4);
    Debug(player.speed);
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
