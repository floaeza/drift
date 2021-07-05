// if (window.tizen !== undefined) {
//     var b2bcontrol = window.b2bapis.b2bcontrol;
// }

/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Reproductor tv
 * Vendor: Amino
 */
// Variables globales
var PlayingChannel      = false,
    PlayingVod          = false,
    PauseLive           = false,
    numberOfLanguages   = 0;

var WindowMaxWidth  = 0,
    WindowMaxHeight = 0,
    WindowMinWidth  = 0,
    WindowMinHeight = 0;

    GetWindowFullSize();
    GetWindowMinSize();

    Player.setListener(listener);

    Debug('PLAYER WEBAPIS.AVPLAY > LISTENER');

/* *****************************************************************************
 * Reproductor de canal
 * ****************************************************************************/

function PlayChannel(Source, Port){
Debug('PlayChannel('+Source+', '+Port+')');
    var CheckPort = '';

    if(Port){
        CheckPort = ':' + Port;
    }

    // Detiene el proceso de la reproduccion anterior
    StopVideo();
    Source = Source.replace('igmp','udp');
    Debug('PlayChannel=::::::: '+Source+CheckPort);

    // Reproduce el canal actual
    try {

        Player.open(Source+CheckPort);
        Debug('Player.open : '+Source+CheckPort);

        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();

        Player.prepareAsync(function() {
            Player.play();
        });

        Debug('PlayChannel > PLAYER');

    } catch (error) {
        Debug('PlayChannel > Error name = '+ error.name + ', Error message = ' + error.message);
    }




    // Activamos la bandera
    PlayingChannel   = true;

    // Si la guia esta cerrada muestra cuadro con informacion del canal en reproduccion
    ShowInfo();

    // Si tiene una fecha ya registrada guarda estadisticas en la BD
    if(StartDateChannel !== ''){
        SetChannelStatistics();
    }

    // Actualiza la fecha inicio de la reproduccion del canal */
    StartDateChannel = new Date();
}

/* *****************************************************************************
 * Reproduce canales digitales
 * ****************************************************************************/

function PlayDigitalChannel(Source){
    // Detiene el proceso de la reproduccion anterior
    StopVideo();
    Debug('PlayDigitalChannel > ::::::: '+Source);

    // Reproduce el video
    try {

        Player.open(Source);

        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();

        Player.prepareAsync(function() {
            Player.play();
        });

    } catch (error) {
        Debug('PlayDigitalChannel > Error name = '+ error.name + ', Error message = ' + error.message);
    }

    // Activamos la bandera
    PlayingChannel = true;

    // Si tiene una fecha ya registrada guarda estadisticas en la BD
    if(StartDateChannel !== ''){
        SetChannelStatistics();
    }

    // Actualiza la fecha inicio de la reproduccion del canal */
    StartDateChannel = new Date();
}

/* *****************************************************************************
 * Reproduce videos
 * ****************************************************************************/

function PlayVideo(Source){
    // Guarda la estadistica
    StopVideo();

    // Reproduce el video


    // Maximiza el video en caso de que no este en pantalla completa
    MaximizeTV();
}

function PlayMovie(Source){
    // Guarda la estadistica
    StopVideo();

    // Reproduce el video


    // Maximiza el video en caso de que no este en pantalla completa
    MaximizeTV();
}

function PreviewVideo(Source){
    // Guarda la estadistica
    StopVideo();

    // Reproduce el video


    SetPosition(400);

    // Maximiza el video en caso de que no este en pantalla completa
    MaximizeTV();

    PlayingVod = true;
}

function SetPosition(Pos){

}

/* *****************************************************************************
 * Obtiene los tamanos maximos y minimos de la pantalla
 * ****************************************************************************/

function GetWindowFullSize(){
    WindowMaxWidth   = 1920;
    WindowMaxHeight  = 1080;
}

function GetWindowMinSize(){
    WindowMinWidth   = ((1920)*TvPercentageSize)/100;
    WindowMinHeight  = ((1080)*TvPercentageSize)/100;
}

/* *****************************************************************************
 * Funcion para poner TV en pantalla completa
 * ****************************************************************************/

function MaximizeTV(){
    if(CurrentModule === 'Tv'){
        if(ActiveEpgContainer === true){
            // do nothing
        } else if(RecordingPanel === true){
            // do nothing
        } else  {
            Player.setDisplayRect(0, 0, WindowMaxWidth, WindowMaxHeight);
        }
    }
}

/* *****************************************************************************
 * Funcion para minimizar la TV
 * ****************************************************************************/

function MinimizeTV(){
    Player.setDisplayRect(TvPositionLeft, TvPositionTop, WindowMinWidth, WindowMinHeight);
}

/* *****************************************************************************
 * Reinicia el dispositivo
 * ****************************************************************************/

function RebootDevice(){
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

/* *****************************************************************************
 * Opciones reproduccion
 * ****************************************************************************/

function StopVideo(){
    Debug('STOP VIDEO >');

    try {
        Debug('STOP VIDEO > close');
        Player.close();
    } catch (e)  {
        Debug('STOP VIDEO > catch'+e);
    }

    PauseLive = false;
    PlayingRecording = false;
    Debug('STOP VIDEO <');
}

function PauseVideo(){

}

function ResumeVideo(){

}

function SpeedVideo(Speed){

}

function UpdatePosition(Option){
    PositionAsset = 0; /*SAMSUNG API*/

    (Option === 'add') ? PositionAsset += 30: PositionAsset -= 30;

    PositionAsset = 0; /*SAMSUNG API*/
}

/* *****************************************************************************
 * Obtiene la posicion del video en reproduccion (PAUSE LIVE Y GRABACIONES)
 * ****************************************************************************/

function AssetStatus(Duration){
    if(PlayingRecording === true || PlayingVod === true){

        PositionAsset = 0; /*SAMSUNG API*/

        DurationAsset = parseInt(Duration,10) * 60;

        PercentagePosition = Math.round((PositionAsset * 100) / DurationAsset);

    }
}