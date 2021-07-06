// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){

}

function Green(){
    
    //StopVideo();
    //stbPlayerManager.setRTSP({type:0, useUDP: true, nonSmoothPause:true});
    //player.play({
    //    uri: 'udp://@239.113.215.2:6002',
    //    solution: 'auto'
    //});
   //
    //Debug('q_p');
    //player.onPlayEnd = function () {   
    //    Debug('Play end');
    //};
    //player.onPlayError = function () {   
    //    Debug('Play Error');
    //};
    //player.onRTPBreak = function () {   
    //    Debug('RTP Break');
    //};
    //player.onPlayStart = function () {   
    //    Debug('Play start');
    //};
}

function Yellow(){

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
