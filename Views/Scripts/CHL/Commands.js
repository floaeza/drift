
function Red(){
    location.reload(true);
}

function Blue(){
    // var Up = 0;
    // Up = ASTB.Upgrade('http://10.0.3.10/bbinco_28_x4x_611.mcfs');
    // alert(Up);
}

function Green(){
    var storageInfo = JSON.parse(gSTB.GetStorageInfo('{}'));
    var USB = storageInfo.result || [];
    if((gSTB.GetDeviceModel() == 'MAG424') && (USB.length === 0)){
        alert('No Hay Usb');
    }else{
        alert('Hay Usb');
    }
}

function Yellow(){
    if(typeof(ASTB) !== 'undefined') {
        Browser.Action(16);
    }
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
    }
}

function Menu(){
    if(CurrentModule !== 'Menu' && Device['Services']['ActiveMenu'] === true){
        GoPage('menu.php', Device['MenuId'], 'Menu');
    } else if(CurrentModule === 'Tv' && Device['Services']['ActiveMenu'] === false){
        TvRecorder();
    }
}
