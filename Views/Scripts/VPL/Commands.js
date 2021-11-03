// @ts-nocheck

var n = 0;
function Red(){
    var relo = location.href;
    location.href = relo;
}

function Blue(){
    if (window.tizen !== undefined){
        var onSuccess = function() {
            Debug("[rebootDevice] succeeded!");
        };
        var onError = function(error) {
            Debug("[rebootDevice] failed! error code: " + error.code + " error name: " + error.name + "  message " + error.message);
        };
        b2bcontrol.rebootDevice(onSuccess, onError);
    }else if(typeof(ASTB) !== 'undefined'){
        ASTB.Reboot();
    }
}
function Green(){
    //GoPage('tv.php', 1, 'Tv');
    n++;

    var listChannels = ['https://www.tdtchannels.com/lists/tvradio.m3u8',
    'https://cdnlive.shooowit.net/rtvalive/smil:83CRxkDnV6DVR.smil/playlist.m3u8',
    'https://live1-eltorotv.flumotion.com/playlist.m3u8',
    'https://slvcs87g3x.singularcdn.net.br/live/ctn_latam/playlist.m3u8',
    'https://content.uplynk.com/channel/3324f2467c414329b3b0cc5cd987b6be.m3u8',
    'https://cbsnewshd-lh.akamaihd.net/i/CBSNHD_7@199302/master.m3u8',
    'https://cheddar.samsung.wurl.com/manifest/playlist.m3u8',
    'https://www.bloomberg.com/media-manifest/streams/us.m3u8',
    'https://content.uplynk.com/channel/6c0bd0f94b1d4526a98676e9699a10ef.m3u8',
    'https://weathernationtv.samsung.wurl.com/manifest/playlist.m3u8',
    'https://etlive-mediapackage-fastly.cbsaavideo.com/dvr/manifest.m3u8',
    'https://content.uplynk.com/channel/26bd482ffe364a1282bc3df28bd3c21f.m3u8',
    'https://buzzr-samsungus.amagi.tv/playlist.m3u8',
    'https://nmxlive.akamaized.net/hls/live/529965/Live_1/master.m3u8',
    'https://channel02-notusa.akamaized.net/hls/live/2023914-b/event01/index.m3u8',
    'https://59ec5453559f0.streamlock.net/miamitv/smil:miamitvWEB/chunklist_w214662580_b2592000.m3u8',
    'https://video.blivenyc.com/broadcast/prod/2061/22/desktop-playlist.m3u8',
    'https://rbmn-live.akamaized.net/hls/live/590964/BoRB-AT/master.m3u8',
    'https://hdtv.prod2.ioio.tv/broker/play/cb4086ca-daba-42f5-8acf-27ee93fee0e8.m3u8',
    'https://hdtv.prod2.ioio.tv/broker/play/de245a96-516c-413d-81e9-419c05bbc6a7.m3u8',
    'https://sbshdlu5-lh.akamaihd.net/i/sbshdl_1@810993/master.m3u8',
    'https://cloudvideo.servers10.com:8081/8004/index.m3u8',
    'https://ibgrtv.streaming-pro.com/hls/ibgrlive.m3u8']
    
    var player = stbPlayerManager.list[0];
    player.play({
        uri: listChannels[n],
        solution: 'auto'
    })
    //alert(gSTB.GetDeviceVendor());
    //alert(window.location);
    // //alert(JSON.stringify(Browser.GetStats()));
    // var sBrowser, sUsrAg = navigator.userAgent;

    // if(sUsrAg.indexOf("Chrome") > -1) {
    //     sBrowser = "Google Chrome \n\n --- " + navigator.appName + "\n\n --- "+ navigator.appVersion + " \n\n---" +navigator.userAgent;
    // } else if (sUsrAg.indexOf("Safari") > -1) {
    //     sBrowser = "Apple Safari  \n\n --- " + navigator.appName + "\n\n --- "+ navigator.appVersion + " \n\n---" +navigator.userAgent;
    // } else if (sUsrAg.indexOf("Opera") > -1) {
    //     sBrowser = "Opera \n\n --- " + navigator.appName + "\n\n --- "+ navigator.appVersion + " \n\n---" +navigator.userAgent;
    // } else if (sUsrAg.indexOf("Firefox") > -1) {
    //     sBrowser = "Mozilla Firefox \n\n --- " + navigator.appName + "\n\n --- "+ navigator.appVersion + " \n\n---" +navigator.userAgent;
    // } else if (sUsrAg.indexOf("MSIE") > -1) {
    //     sBrowser = "Microsoft Internet Explorer \n\n --- " + navigator.appName + "\n\n --- "+ navigator.appVersion + " \n\n---" +navigator.userAgent;
    // }

    // alert("Usted está utilizando: " + sBrowser);
    
}

function Yellow(){
    // @ts-nocheck
    //var f = gSTB.GetEnv('{ "varList":["timezone_conf"] }');
    //Debug(f);
    //var g = gSTB.SetEnv('{ "timezone_conf":"America/Mexico_City" }');
    //Debug(g);

    //player.speed = 4;
    //Debug(player.speeds);
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
    Debug('--------------------------MENU() CurrentModule:: ' +CurrentModule + ' DEVICE[SERVICES][ACTIVEMENU] '+ Device['Services']['ActiveMenu']);
    if(CurrentModule !== 'Menu' && Device['Services']['ActiveMenu'] === true){
        //alert("Menu");
        Debug('----------- GOPAGE');
        //if(CurrentModule == 'Tv'){
           //document.getElementById('loadingTV').style.display = "block"; 
        //}
        
        //GoPage('menu.php', Device['MenuId'], 'Menu');
        GoPage('menu.php', Device['MenuId'], 'Menu');
        
    } else if(CurrentModule === 'Tv' && Device['Services']['ActiveMenu'] === false){
        Debug('----------- TV RECORDER');
        TvRecorder();
    }
}
