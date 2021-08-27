// @ts-nocheck

function Red(){
     location.reload(true);
}

function Blue(){
    var onSuccess = function() {
        Debug("[rebootDevice] succeeded!");
    };

    var onError = function(error) {
        Debug("[rebootDevice] failed! error code: " + error.code + " error name: " + error.name + "  message " + error.message);
    };

    b2bcontrol.rebootDevice(onSuccess, onError);


}

function Green(){

    import { exec } from 'child_process';
    async function sh(cmd) {
        return new Promise(function (resolve, reject) {
          exec(cmd, (err, stdout, stderr) => {
            if (err) {
              reject(err);
            } else {
              resolve({ stdout, stderr });
            }
          });
        });
      }
      
      async function main() {
        let { stdout } = await sh('ls');
        //for (let line of stdout.split('\n')) {
        //  console.log(`ls: ${line}`);
        //}
        alert(stdout);
      }
      
      main();
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
        //alert("Menu");
        GoPage('menu.php', Device['MenuId'], 'Menu');
    } else if(CurrentModule === 'Tv' && Device['Services']['ActiveMenu'] === false){
        TvRecorder();
    }
}
