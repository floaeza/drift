// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){

}

function Green(){
    
    player.setViewport({x: 0, y: 0, width: 3840, height: 2160});
}

function Yellow(){
// @ts-nocheck
dojo.provide("entoneTV.tests.video.pltv");

(function(){
    var video;
    var url = doh._testParameters.pltv.videoUrl;
    var original_settings = {};
    
doh.register("entonejs.tests.video.PLTV",
    [
        {
            name: "test_videoPLTVStart",
            setUp: function(){
                var ret = ENTONE.resource.init();
                video = new ENTONE.video();
                doh.setCentralizedVideoCallback("main", video);
            },
            runTest: function(){
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
            },
            tearDown: function(){
                doh.setVideoCallback("main", null, null);
            },
            timeout: 20000
        },
        
        {
            name: "test_videoPLTVPlayPositionInfo1",
            runTest: function(){
                var deferred = new doh.Deferred();
                var pos1 = video.getPlayPositionInfo();
                
                setTimeout(function(){
                    var pos2 = video.getPlayPositionInfo();
                    
                    // Still in pause state from previous test
                    doh.assertNotEqual(pos1.duration, pos2.duration);
                    doh.assertEqual(pos1.playPosition, pos2.playPosition);
                    doh.assertNotEqual(pos1.end_position, pos2.end_position);
                    doh.assertEqual(pos1.start_position, pos2.start_position);
                    
                    deferred.callback(true);
                }, 3000);
                
                return deferred;
            },
            timeout: 4000
        },
        
        {
            name: "test_videoPLTVPlay",
            runTest: function(){
                var ret = video.play();
                doh.assertEqual(ENTONE.status.SUCCESS, ret);
                ret = video.getSpeed();
                doh.assertEqual(1, ret);
            },
            timeout: 3000
        },
        
        {
            name: "test_videoPLTVPlayPositionInfo2",
            runTest: function(){
                var deferred = new doh.Deferred();
                var pos1 = video.getPlayPositionInfo();
                
                setTimeout(function(){
                    var pos2 = video.getPlayPositionInfo();
                    
                    doh.assertNotEqual(pos1.duration, pos2.duration);
                    doh.assertNotEqual(pos1.playPosition, pos2.playPosition);
                    doh.assertNotEqual(pos1.end_position, pos2.end_position);
                    doh.assertEqual(pos1.start_position, pos2.start_position);
                    
                    deferred.callback(true);
                }, 15000);
                
                return deferred;
            },
            timeout: 17000
        },
        
        {
            name: "test_videoPLTVRewind",
            runTest: function(){
                var deferred = new doh.Deferred();
                
                doh.setVideoCallback("main", function(e, vp, h){
                    if (e === ENTONE.video.VIDEOEVENT_START_OF_STREAM){
                        deferred.callback(true);
                    }
                }, this);
                
                var ret = video.play(-8);
                doh.assertEqual(ENTONE.status.SUCCESS, ret);
                ret = video.getSpeed();
                doh.assertEqual(-8, ret);
                
                return deferred;
            },
            tearDown: function(){
                doh.setVideoCallback("main", null, null);
                video.play();
            },
            timeout: 40000
        },
        
        {
            name: "test_videoPLTVFF",
            runTest: function(){
                var deferred = new doh.Deferred();
                
                doh.setVideoCallback("main", function(e, vp, h){
                    if (e === ENTONE.video.VIDEOEVENT_END_OF_STREAM){
                        deferred.callback(true);
                    }
                }, this);
                
                var ret = video.play(8);
                doh.assertEqual(ENTONE.status.SUCCESS, ret);
                ret = video.getSpeed();
                doh.assertEqual(8, ret);
                
                return deferred;
            },
            tearDown: function(){
                doh.setVideoCallback("main", null, null);
                video.play();
            },
            timeout: 40000
        },
        
        function test_videoPLTVGetPlayingMode(){
            var ret = video.getPlayingMode();
            doh.assertEqual(1, ret);
        },
        
        {
            name: "test_videoPLTVToLive",
            setUp: function(){
                video.play(-8);
                video.play();
            },
            runTest: function(){
                var deferred = new doh.Deferred();
                
                doh.setVideoCallback("main", function(e, vp, h){
                    if (e === ENTONE.video.VIDEOEVENT_PLAYBACK_STOP)
                        deferred.callback(true);
                }, this);
                
                var ret = video.seek(ENTONE.video.SEEK_LIVE);
                doh.assertEqual(ENTONE.status.SUCCESS, ret);
                
                return deferred;
            },
            tearDown: function(){
                doh.setVideoCallback("main", null, null);
            },
            timeout: 2000
        },

        {
            name: "test_getPltvBuffer_setPltvBuffer",
            setUp: function(){
                var ret = video.getPltvBuffer();
                console.log(this.name + ": setup: getPltvBuffer ret: " + JSON.stringify(ret));
                doh.assertTrue(ret >= 0);
                original_settings.bufferSize = ret;
            },
            runTest: function(){
                var fn = this.name;

                function _getSetPltvBuffer(setSize, setReturn, getSize){
                    console.log(fn + ": _getSetPltvBuffer" +
                                ": setSize="   + JSON.stringify(setSize) +
                                ", setReturn=" + JSON.stringify(setReturn) +
                                ", getSize="   + JSON.stringify(getSize) );

                    var tmp;
                    tmp = video.setPltvBuffer(setSize);
                    console.log(fn + ": setPltvBuffer ret: " + JSON.stringify(tmp));
                    doh.assertEqual(setReturn, tmp);

                    tmp = video.getPltvBuffer();
                    console.log(fn + ": getPltvBuffer ret: " + JSON.stringify(tmp));
                    doh.assertEqual(getSize, tmp);
                }

                //valid input
                _getSetPltvBuffer(0   , ENTONE.status.SUCCESS, 0);
                _getSetPltvBuffer(2000, ENTONE.status.SUCCESS, 2000);

                //invalid input - change buffer size on the fly
                _getSetPltvBuffer(3000, ENTONE.status.ERROR, 2000);

                //invalid input - negative size
                _getSetPltvBuffer(-1  , ENTONE.status.ERROR, 2000);
            },
            tearDown: function(){
                var ret;
                if(original_settings.bufferSize){
                    ret = video.setPltvBuffer(0);
                    if(ret !== ENTONE.status.SUCCESS){
                        console.error(this.name + ": tearDown: fail to turn off the PLTV buffer.");
                    }

                    ret = video.setPltvBuffer(original_settings.bufferSize);
                    if(ret !== ENTONE.status.SUCCESS){
                        console.error(this.name + ": tearDown: fail to restore the PLTV buffer.");
                    }

                    delete original_settings.bufferSize;
                }
                console.log(this.name + ": tearDown: getPltvBuffer: " + video.getPltvBuffer());
            }
        },

        {
            name: "test_videoPLTVEnd",
            runTest: function(){
                var ret = video.stop();
                doh.assertEqual(ENTONE.status.SUCCESS, ret);

                ret = video.close();
                doh.assertEqual(ENTONE.status.SUCCESS, ret);
            },
            tearDown: function(){
                video.cleanup();
                video = undefined;
            }
        }
    ]
);
})();
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
