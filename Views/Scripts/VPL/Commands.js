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
    //stbPlayerManager.setRTSP({type: 0, useUDP: true, nonSmoothPause: true});
    player.play({
        uri: "rtsp://10.0.3.21:554/0000000207",
        solution: 'auto'
    });
    Debug('q_p');
    player.onTracksInfo = function () {
        Debug('Information on audio and video tracks of the media content is received.');
        Debug(JSON.stringify(player.metadataInfo));
    };
    
    
}

function Yellow(){
    // @ts-nocheck
    //var f = gSTB.GetEnv('{ "varList":["timezone_conf"] }');
    //Debug(f);
    //var g = gSTB.SetEnv('{ "timezone_conf":"America/Mexico_City" }');
    //Debug(g);

    player.speed = 4;
    Debug(player.speeds);
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
