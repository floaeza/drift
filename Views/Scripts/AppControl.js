
var Comando = [];
var MacAddressAppControl;

function InitialDataAppControl(){    
    // @ts-ignore
    if (typeof(ASTB) !== 'undefined') {
        AminoDeviceAppControl();
    // @ts-ignore
    } else if (typeof(ENTONE) !== 'undefined') {
        KamaiDeviceAppControl();
    // @ts-ignore
    } else if (typeof(gSTB) !== 'undefined'){
        InfomirDeviceAppControl();
    }           
}

function AminoDeviceAppControl(){
    // @ts-ignore
    MacAddressAppControl  = ASTB.GetMacAddress();
}

function KamaiDeviceAppControl(){
    // @ts-ignore
    MacAddressAppControl  = ENTONE.stb.getMacAddress();
}

function InfomirDeviceAppControl(){
    // @ts-ignore
    MacAddressAppControl  = gSTB.GetDeviceMacAddress();
}


function DBAppControl(){
    // @ts-ignore
    
    $.ajax({
        type: "POST",
        url: '/BBINCO/TV/Core/Controllers/Firebase.php',
        data: { 
            Option    : 'GetControllByMac',
            mac_address: MacAddressAppControl
        }, 
        async: false,
        success: function (response) {
            // @ts-ignore
            Comando  = $.parseJSON(response);
            //alert(Comando[0].MAC);
            //alert('Wenas Nochis');
        }
    });
    //alert(Comando[0]);
    ChangeAppControl()
}

function ChangeAppControl(){
       
    for(var i = 0; i < Comando.length; i++){
        // @ts-ignore
        //alert(Comando[0].MAC);
        if (Comando[i].STATUS === 'pendingServer'){
            // @ts-ignore
            switch(Comando[i].ORDEN){
                // @ts-ignore
                case 'REMOTE_RED':
                    // @ts-ignore
                    Red();
                    break;
    
                // @ts-ignore
                case 'REMOTE_BLUE':
                    // @ts-ignore
                    Blue();
                    break;
    
                // @ts-ignore
                case 'REMOTE_GREEN':
                    // @ts-ignore
                    Green();
                    break;
    
                // @ts-ignore
                case 'REMOTE_YELLOW':
                    // @ts-ignore
                    Yellow();
                    break;
                
                // @ts-ignore
                case 'ARROW_KEY_UP':
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
                case 'ARROW_KEY_DOWN':
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
                case 'ARROW_KEY_RIGHT':
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
                case 'ARROW_KEY_LEFT':
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
                case 'SMALL_ARROW_UP':
                    // @ts-ignore
                    if(CurrentModule === 'Tv'){
                        // @ts-ignore
                        TvPageUp();
                    }
                    break;
                    
                // @ts-ignore
                case 'SMALL_ARROW_DOWN':
                    // @ts-ignore
                    if(CurrentModule === 'Tv'){
                        // @ts-ignore
                        TvPageDown();
                    }
                    break;
                    
            /********** CANAL +/- **********/
    
                // @ts-ignore
                case 'REMOTE_CHANNEL_UP':
                    // @ts-ignore
                    if(CurrentModule === 'Tv'){
                        // @ts-ignore
                        TvChannelUp();
                    }
                    break;
    
                // @ts-ignore
                case 'REMOTE_CHANNEL_DOWN':
                    // @ts-ignore
                    if(CurrentModule === 'Tv'){
                        // @ts-ignore
                        TvChannelDown();
                    }
                    break;
                case 'REMOTE_GUIDE':
                        if(CurrentModule === 'Tv'){
                            TvGuide();
                        }
                    break;
            }
    
            //$.ajax({
            //    type: "POST",
            //    url: '/BBINCO/TV/Core/Controllers/Firebase.php',
            //    data: { 
            //        Option    : 'DeleteControlbyMac',
            //        MacAddress: '00:1a:79:6c:cc:3e'
            //    }, 
            //    async: false,
            //    success: function (response) {
            //        // @ts-ignore
            //        Comando  = $.parseJSON(response);
            //        //alert(Comando[0].MAC);
            //    }
            //});
    

            $.ajax({
                type: "POST",
                url: '/BBINCO/TV/Core/Controllers/Firebase.php',
                data: { 
                    Option    : 'UpdateControlByMac',
                    mac_address: MacAddressAppControl
                }, 
                async: false,
                success: function (response) {
                    //alert(Comando[0].MAC);
                }
            });
        }
    }
}

InitialDataAppControl();

//if (typeof(gSTB) !== 'undefined'){
    
setInterval(DBAppControl, 1000);
//}     
