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
        CurrentStbDate = '';

    var DivDebug  = document.getElementById('DebugText'),
        DebugText = '';
    
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
        var GetNetwork = {
            'index' : 1,
            'onSuccess' : function(response_device) {
                MacAddress = response_device.mac;
                Debug      = DebugOnScreen;
            }
        };
        hcap.network.getNetworkDevice(GetNetwork);
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
            LgDevice();
        }
    }

// Obtiene los datos de los dispositivos por marca en el siguiente orden:
// 1 - Amino 
// 2 - Kamai
// 3 - Infomir
// 4 - Lg

    function SetData() {
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
        $.ajax({
            type: 'POST',
            url: 'Core/Controllers/Device.php',
            data: {
                MacAddress: MacAddress,
                EventString: EventString,
                EventHdmi: EventHdmi,
                EventNetman: EventNetman,
                CurrentDate: moment().format('Y-MM-DD h:mm:ss')
            },
            beforeSend: function (){
                Executing = true;
            },
            success: function (response) {
                Device = $.parseJSON(response);

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
    $.ajax({
        type: 'POST',
        url: 'Core/Controllers/DeviceInfo.php',
        data: {
            MacAddress: MacAddress,
            DeviceId: Device.DeviceId,
            EventString: EventString,
            EventHdmi: EventHdmi,
            //EventNetman: EventNetman,
            LastChannel: ChannelsJson[ChannelPosition].CHNL + ' - ' +ChannelsJson[ChannelPosition].NAME,
            CurrentDateStb: CurrentStbDate
        },
        beforeSend: function (){
            Executing = true;
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
        }
    });
}