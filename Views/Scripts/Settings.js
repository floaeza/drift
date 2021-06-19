// @ts-nocheck
/******************************************************************************
 * @Objetivo: Obtiene la configuracion del dispositivo y define la forma de debuguear
 * @CreadoPor: Tania Maldonado
 * @Fecha: Noviembre 2019
 *******************************************************************************/

    var Line        = 0,
        Executing   = false,
        EventString = '',
        EventHdmi   = 0,
        EventNetman = '',
        CurrentStbDate = moment().format('Y-MM-DD h:mm:ss');

    var DivDebug  = document.getElementById('DebugText'),
        DebugText = '';

    alert('CREACION DIV PARA DEBUG');
    
    function DebugOnScreen(DebugTxt){
        DebugText = document.createElement('P');


        ++Line;

        if(Line > 25){
            ClearDebugOnScreen();
            Line = 0;
        }

        DebugText.innerHTML = DebugTxt;
        DivDebug.appendChild(DebugText);
    }
    
    function ClearDebugOnScreen(){
        DivDebug.innerHTML = '';
    }

    var MacAddress  = '00:00:00:00:00:00',
        Device      = '',
        Libraries   = '',
        Debug       = console.log;


    SetData();

    function AminoDevice(){
        if(typeof(ASTB) !== 'undefined'){
            MacAddress = ASTB.GetMacAddress();
            Debug      = ASTB.DebugString;
        } else {
            KamaiDevice();
        }
    }
        
    function LgDevice(){
        if(typeof(hcap) !== 'undefined') {
            var GetNetwork = {
                'index': 1,
                'onSuccess': function (response_device) {
                    MacAddress = response_device.mac;
                    Debug = DebugOnScreen;
                }
            };
            hcap.network.getNetworkDevice(GetNetwork);
        } else {
            //
        }
    }

    function SamsungDevice(){
        if (window.tizen !== undefined) {
            alert('IF -> TIZEN');
            var b2bcontrol = window.b2bapis.b2bcontrol;
            try {
                //MACAddress = b2bcontrol.getMACAddress();
                MacAddress  = 'fc:03:9f:5c:98:ed';
                Debug      = DebugOnScreen;
            } catch (e) {
                //'[getMACAddress] call syncFunction exception [' + e.code + '] name: ' + e.name + ' message: ' + e.message);
            }
        } else {
            console.log('ELSE -> LG');
            LgDevice();
        }
    }

    function KamaiDevice(){
        if(typeof(ENTONE) !== 'undefined'){
            MacAddress = ENTONE.stb.getMacAddress();
            Debug      = DebugOnScreen;
        } else {
            InfomirDevice();
        }
    }
    
    function InfomirDevice(){
        if(typeof(gSTB) !== 'undefined'){
            MacAddress = gSTB.GetDeviceMacAddress();
            Debug      = DebugOnScreen;
        } else {
            SamsungDevice();
        }
    }

// Obtiene los datos de los dispositivos por marca en el siguiente orden:
// 1 - Amino 
// 2 - Kamai
// 3 - Infomir
// 4 - Samsung
// 5 - Lg

    function SetData() {
        console.log('SET DATA');
        AminoDevice();
    }


    // Device
    $.ajax({
        type: 'POST',
        async: false,
        url: 'Core/Controllers/Device.php',
        data: { 
            MacAddress : MacAddress,
            EventString : 'Boot successful',
            CurrentDateStb : CurrentStbDate
        },
        success: function (response){
            Debug(CurrentStbDate);
            Device = $.parseJSON(response);

              if(Device['Debug'] === '1'){
                  DivDebug.style.display = 'inline';
                  Debug = DebugOnScreen;
              }
        }
    });
    
    //Libraries
    $.ajax({
        type: 'POST',
        async: false,
        url: 'Core/Models/Libraries.php',
        data: { 
            GetJson : true
        },
        success: function (response){
            Libraries = $.parseJSON(response);
        }
    });
    
    
    function UpdateInfoDevice(){
        Debug('----------------> UpdateInfoDevice');

        Debug('----------------> MacAddress '+MacAddress);
        Debug('----------------> EventString '+EventString);
        Debug('----------------> EventHdmi '+EventHdmi);
        Debug('----------------> Date '+CurrentStbDate);
        $.ajax({
            type: 'POST',
            url: 'Core/Controllers/Device.php',
            data: {
                MacAddress: MacAddress,
                EventString: EventString,
                EventHdmi: EventHdmi,
                //EventNetman: EventNetman,
                CurrentDate: CurrentStbDate
            },
            beforeSend: function (){
                Executing = true;
            },
            success: function (response) {
                Device = $.parseJSON(response);

                Debug('----------------> Device'+Device);

                if (Device['Services']['Reboot'] === true) {
                    RebootDevice();
                } else {
                    Debug('----------------> CurrentModule '+CurrentModule);
                    // Busca actualizacion si lleva mas de un dia funcionando el amino
                    if (CurrentModule === 'Tv') {
                        if (Device['EpgModificationTime'] !== '03' && LastUpdatedTime !== Device['EpgModificationTime']) {
                            // Actualiza si la hora del archivo es diferente de la hora programada de actualizacion
                            // Y si no se ha actualizado a la hora
                            if (ActiveEpgContainer !== true && ActiveInfoContainer !== true) {
                                // Solo actualiza si no esta activa la guia o la info
                                LastUpdatedTime = Device['EpgModificationTime'];

                                BackUpChannelsJson = ChannelsJson;

                                SetEpgFile();

                                CheckUpdatedJson();
                            }
                        }
                    } else if (CurrentModule === 'Menu' || CurrentModule === 'Movies') {
                        // do nothing
                    } else {
                        UpdateMultimedia();
                    }
                }
            },
            complete: function (data){
                Executing = false;
            }
        });

        Debug('----------------< UpdateInfoDevice');
    }

function UpdateQuickInfoDevice(){

    var OnScreen = '';
    if (CurrentModule === 'Tv') {
        OnScreen = ChannelsJson[ChannelPosition].CHNL + ' - ' +ChannelsJson[ChannelPosition].NAME;
    } else {
        OnScreen =  CurrentModule;
    }

    Debug('CurrentModule:: '+CurrentModule);
    Debug('OnScreen:: '+OnScreen);



    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/DeviceInfo.php',
        data: {
            MacAddress: MacAddress,
            DeviceId: Device.DeviceId,
            EventString: EventString,
            EventHdmi: EventHdmi,
            //EventNetman: EventNetman,
            LastChannel: OnScreen,
            CurrentDateStb: CurrentStbDate
        },
        beforeSend: function (){
            Executing = true;
            Debug('BD > Executing:: '+Executing);
        },
        success: function (response) {
            var RebootResponse = $.parseJSON(response);

            if(RebootResponse === '1'){
                RebootDevice();
            }

            RebootResponse = null;
        },
        complete: function (data){
            Executing = false;
            Debug('CT > Executing:: '+Executing);
        }
    });
}