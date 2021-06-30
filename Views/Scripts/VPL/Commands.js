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
    pvrManager.ChangeEndTime(0, '1625065500');
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
