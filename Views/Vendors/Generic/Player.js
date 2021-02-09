/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Reproductor tv
 * Vendor: Generico
 */

    // Variables globales
    var PlayingChannel  = false,
        PlayingVod      = false,
        PlayingRecording = false,
        PauseLive       = false;

    var WindowMaxWidth  = 0,
        WindowMaxHeight = 0,
        WindowMinWidth  = 0,
        WindowMinHeight = 0;

/* *****************************************************************************
 * Reproductor de canal
 * ****************************************************************************/
    function PlayChannel(Source, Port){
        // Activamos la bandera
        PlayingChannel = true;
        
        Debug('Playing: '+Source + ':'+Port);
        
        // Si la guia esta cerrada muestra cuadro con informacion del canal en reproduccion
        ShowInfo();
    }

/* *****************************************************************************
 * Reproduce canales digitales
 * ****************************************************************************/
    
    function PlayDigitalChannel(Source){
        // Activamos la bandera
        PlayingChannel = true;

        Debug('Playing DC: '+Source);
        
        // Si la guia esta cerrada muestra cuadro con informacion del canal en reproduccion
        ShowInfo();
    }
    
/* *****************************************************************************
 * Reproduce videos
 * ****************************************************************************/

    function PlayVideo(Source){
        Debug('Playing: '+Source);
    }
    
    function PreviewVideo(Source){
         Debug('Playing: '+Source);
         
         PlayingVod = true;
    }
    
/* *****************************************************************************
 * Funcion para poner TV en pantalla completa
 * ****************************************************************************/
    function MaximizeTV(){
    }

/* *****************************************************************************
 * Funcion para minimizar la TV
 * ****************************************************************************/
    function MinimizeTV(){
    }
    
/* *****************************************************************************
 *
 * ****************************************************************************/ 
    function RebootDevice(){
        location.reload();
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

/* *****************************************************************************
 * Obtiene la posicion del video en reproduccion (PAUSE LIVE Y GRABACIONES)
 * ****************************************************************************/ 

    function AssetStatus(Duration){
        if(PlayingRecording === true || PlayingVod === true){

        }
    }