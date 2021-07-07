// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){
    Debug("Info del video " + JSON.parse(player.positionPercent)); 
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
