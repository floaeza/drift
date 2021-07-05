// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){
    
}

function Green(){
    //storageInfo = JSON.parse(gSTB.GetStorageInfo('{}'));
    //USB = storageInfo.result || [];
    //Debug(gSTB.ListDir(USB[0].mountPath));
    //var NewTasks;
    //NewTasks = pvrManager.CreateTask('http://10.0.3.207:8080/', USB[0].mountPath+"/Cruela", '1624980120', '1624980300');
    pvrManager.ChangeEndTime(2, '1625074200');
    Debug("EndTime Cambiado");
}

function Yellow(){
    alert('pltbuf');
var video;
var url = doh._testParameters.pltv.videoUrl;
var original_settings = {};
var ret = ENTONE.resource.init();
video = new ENTONE.video();
doh.setCentralizedVideoCallback("main", video);


var deferred = new doh.Deferred();
var ret;

ret = ENTONE.resource.restoreVideoPlayer();
doh.assertNotEqual(0, ret);
var players = ENTONE.resource.getVideoPlayers();
video = players[0].player;
doh.assertTrue(video);

doh.setVideoCallback("main", function(e, vp, h){
    if (e === ENTONE.video.VIDEOEVENT_PLTV_BUFFER_START){
        // Wait for 5 seconds to get enough PLTV buffer
        setTimeout(function(){
            ret = video.play(0);
            doh.assertEqual(ENTONE.status.SUCCESS, ret);
        }, 5000);
        
        // Pause 10 seconds
        setTimeout(function(){
            deferred.callback(true);
        }, 15000);
    }
}, this);

ret = video.open(url, null, {pltbuf: 3600});
doh.assertEqual(ENTONE.status.SUCCESS, ret);

ret = video.setVideoPosition(100, 100, 720, 480, 1);

ret = video.play();
doh.assertEqual(ENTONE.status.SUCCESS, ret);

return deferred;

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
