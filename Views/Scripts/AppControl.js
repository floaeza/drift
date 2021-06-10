
var Comando = [];

function InitialDataControl(){    
    // @ts-ignore
    if (typeof(ASTB) !== 'undefined') {
        AminoDeviceControl();
    // @ts-ignore
    } else if (typeof(ENTONE) !== 'undefined') {
        KamaiDeviceControl();
    // @ts-ignore
    } else if (typeof(gSTB) !== 'undefined'){
        InfomirDeviceControl();
    }           
}

function AminoDeviceControl(){
    // @ts-ignore
    MacAddressControl  = ASTB.GetMacAddress();
}

function KamaiDeviceControl(){
    // @ts-ignore
    MacAddressControl  = ENTONE.stb.getMacAddress();
}

function InfomirDeviceControl(){
    // @ts-ignore
    MacAddressControl  = gSTB.GetDeviceMacAddress();
}


function DBControl(){
    // @ts-ignore
    
    $.ajax({
        type: "POST",
        url: '/BBINCO/TV/Core/Controllers/Firebase.php',
        data: { 
            Option    : 'GetControllByMac',
            MacAddress: '00:02:02:69:93:83'
        }, 
        async: false,
        success: function (response) {
            // @ts-ignore
            Comando  = $.parseJSON(response);
        }
    });
    //alert(Comando[0]);
    ChangeControl()
}

function ChangeControl(){
    // @ts-ignore
    if (Comando[0].STATE === 'Pendiente'){
        // @ts-ignore
        switch(Comando[0].ORDER){
            // @ts-ignore
            case REMOTE_RED:
                // @ts-ignore
                Red();
                break;

            // @ts-ignore
            case REMOTE_BLUE:
                // @ts-ignore
                Blue();
                break;

            // @ts-ignore
            case REMOTE_GREEN:
                // @ts-ignore
                Green();
                break;

            // @ts-ignore
            case REMOTE_YELLOW:
                // @ts-ignore
                Yellow();
                break;
            
            // @ts-ignore
            case ARROW_KEY_UP:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvUp();
                // @ts-ignore
                } else if(CurrentModule === 'Menu'){
                    // @ts-ignore
                    MenuUp();
                // @ts-ignore
                } else if(CurrentModule === 'Movies'){
                    // @ts-ignore
                    VodUp();
                }
                break;
            
            // @ts-ignore
            case ARROW_KEY_DOWN:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvDown();
                // @ts-ignore
                } else if(CurrentModule === 'Menu'){
                    // @ts-ignore
                    MenuDown();
                // @ts-ignore
                } else if(CurrentModule === 'Movies'){
                    // @ts-ignore
                    VodDown();
                }
                break;

            // @ts-ignore
            case ARROW_KEY_RIGHT:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvRight();
                // @ts-ignore
                } else if(CurrentModule === 'Menu'){
                    // @ts-ignore
                    MenuRight();
                // @ts-ignore
                } else if(CurrentModule === 'Movies'){
                    // @ts-ignore
                    VodRight();
                // @ts-ignore
                } else if(CurrentModule === 'Moods'){
                    // @ts-ignore
                    MoodsRight();
                } 
                break;

            // @ts-ignore
            case ARROW_KEY_LEFT:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvLeft();
                // @ts-ignore
                } else if(CurrentModule === 'Menu'){
                    // @ts-ignore
                    MenuLeft();
                // @ts-ignore
                } else if(CurrentModule === 'Movies'){
                    // @ts-ignore
                    VodLeft();
                // @ts-ignore
                } else if(CurrentModule === 'Moods'){
                    // @ts-ignore
                    MoodsLeft();
                } 
                break;
                
            // @ts-ignore
            case SMALL_ARROW_UP:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvPageUp();
                }
                break;
                
            // @ts-ignore
            case SMALL_ARROW_DOWN:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvPageDown();
                }
                break;
                
        /********** CANAL +/- **********/

            // @ts-ignore
            case REMOTE_CHANNEL_UP:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvChannelUp();
                }
                break;

            // @ts-ignore
            case REMOTE_CHANNEL_DOWN:
                // @ts-ignore
                if(CurrentModule === 'Tv'){
                    // @ts-ignore
                    TvChannelDown();
                }
                break;
        }

        // @ts-ignore
        $.ajax({
            type: "POST",
            url: '/BBINCO/TV/Core/Controllers/Firebase.php',
            data: { 
                Option : 'UpdateControlByMac',
                Estado: 'Ok',
                Orden: 'Null'
            }, 
            async: false,
            // @ts-ignore
            success: function (response) {
            }
        });

    }
}

InitialDataControl();
setInterval(DBControl, 1000);