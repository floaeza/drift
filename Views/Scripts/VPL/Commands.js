// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){
    Debug("[rebootDevice] function call");
    Debug("[rebootDevice] b2bcontrol object == " + b2bcontrol);

    var onSuccess = function() {
        Debug("[rebootDevice] succeeded!");

        setTimeout(function(){ setPowerOn(); }, 3000);
    };

    var onError = function(error) {
        Debug("[rebootDevice] failed! error code: " + error.code + " error name: " + error.name + "  message " + error.message);
    };

    b2bcontrol.rebootDevice(onSuccess, onError);
}

function setPowerOn(){

    Debug("[setPowerOn] function call");
    var onSuccess = function() {

        Debug("[setPowerOn]success ");
    };
    var onError = function(error) {

        Debug("[setPowerOn]code :" + error.code + " error name: " + error.name + "  message " + error.message);
    };

    Debug("[setPowerOn] b2bpower object == " + b2bpower);
    b2bpower.setPowerOn(onSuccess, onError);
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
