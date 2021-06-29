if (window.tizen !== undefined) {
    var b2bcontrol = window.b2bapis.b2bcontrol;
}

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

var Player = webapis.avplay;
    //Player.setListener(listener);

webapis.appcommon.setScreenSaver(
    webapis.appcommon.AppCommonScreenSaverState.SCREEN_SAVER_OFF,
    function(result) {
        console.log(result);
    }, function(error) {
        console.log(JSON.stringify(error));
    }
);

/* *****************************************************************************
 * Reproductor de canal
 * ****************************************************************************/

function PlayChannel(Source, Port, ProgramIdChannnel, ProgramIdPosition, AudioPid){

    var CheckPort = '',
        CheckProgram = '';

    if(Port){
        CheckPort = ':' + Port;
    }

    if(ProgramIdChannnel){
        CheckProgram = ';Progid='+ProgramIdChannnel+';audiopid='+AudioPid;
    }

    // Detiene el proceso de la reproduccion anterior
    StopVideo();
    Source = Source.replace('igmp','udp');
    Debug('PlayChannel=::::::: '+Source+CheckPort);

    // Reproduce el canal actual
    try {
        Player.close();
        Player.open(Source+CheckPort);
        Player.setDisplayRect(0, 0, 1920, 1080);
        Player.setListener(listener);
        Player.prepareAsync(function() {
            Player.play();
        });

    } catch (error) {
        Debug('PlayChannel > Error name = '+ error.name + ', Error message = ' + error.message);
    }

    // Maximiza el video en caso de que no este en pantalla completa
    MaximizeTV();

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
        Player.close();
        Player.open(Source);
        Player.setDisplayRect(0, 0, 1920, 1080);
        //Player.setListener(listener);
        Player.prepareAsync(function() {
            Player.play();
        });

    } catch (error) {
        Debug('PlayDigitalChannel > Error name = '+ error.name + ', Error message = ' + error.message);
    }

    // Maximiza el video en caso de que no este en pantalla completa
    MaximizeTV();

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
 * Funcion para poner TV en pantalla completa
 * ****************************************************************************/

function MaximizeTV(){
    if(CurrentModule === 'Tv'){
        if(ActiveEpgContainer === true){
            // do nothing
        } else if(RecordingPanel === true){
            // do nothing
        } else  {

        }
    }
}

/* *****************************************************************************
 * Funcion para minimizar la TV
 * ****************************************************************************/

function MinimizeTV(){

}

/* *****************************************************************************
 * Reinicia el dispositivo
 * ****************************************************************************/

function RebootDevice(){

}

/* *****************************************************************************
 * Opciones reproduccion
 * ****************************************************************************/

function StopVideo(){
    PauseLive = false;
    PlayingRecording = false;
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