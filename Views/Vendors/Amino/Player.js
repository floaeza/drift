// @ts-nocheck
/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Reproductor tv
 * Vendor: Amino
 */
    // Variables globales
    var PlayingChannel      = false,
        PlayDigita          = false,
        PlayingVod          = false,
        PauseLive           = false,
        PIDS                = [],
        numberOfLanguages   = 0;
        
    var WindowMaxWidth  = 0,
        WindowMaxHeight = 0,
        WindowMinWidth  = 0,
        WindowMinHeight = 0;

        GetWindowFullSize();
        GetWindowMinSize();


    var windowTV        = VideoDisplay.GetVideoWindow();
        
/* *****************************************************************************
 * Reproductor de canal
 * ****************************************************************************/
    function PlayChannel(Source, Port, ProgramIdChannnel, ProgramIdPosition, AudioPid){
    //function PlayChannel(Source, Port){
        //UpdateQuickInfoDevice();
        Debug('############################### PLAYCHANNEL AMINO');
        var CheckPort = '',
            CheckProgram = '';
        
            if(Port){
                CheckPort = ':' + Port;
            }

            if(ProgramIdChannnel){
               // CheckProgram = ';Progid='+ProgramIdChannnel+';audiopid='+AudioPid;
                CheckProgram = ';Progid='+ProgramIdChannnel;
            }
            
            // Debug('########################### Channelinfo: '+CheckProgram);
        // Detiene el proceso de la reproduccion anterior
        StopVideo();
        PlayDigita = false;
        // Reproduce el canal actual
        AVMedia.Play('src='+ Source+''+CheckPort+CheckProgram);
        //AVMedia.Play('src='+ Source+''+CheckPort);
        Debug('src='+ Source+''+CheckPort);
        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();
        Debug('############################### MaximizeTV');
        // Activamos la bandera
        PlayingChannel   = true;
        
        // Si la guia esta cerrada muestra cuadro con informacion del canal en reproduccion
        ShowInfo();
        Debug('############################### ShowInfo');
        // Si tiene una fecha ya registrada guarda estadisticas en la BD
        if(StartDateChannel !== ''){
            Debug('############################### ANTES DE SetChannelStatistics');
            SetChannelStatistics();
            Debug('############################### SetChannelStatistics');
            //
        }
        updateDataChannel();
        // Actualiza la fecha inicio de la reproduccion del canal */
        StartDateChannel = new Date();
        Debug('############################### StartDateChannel: '+StartDateChannel);
    }
    function updateDataChannel(){
        $.ajax({
            type: 'POST',
            url: './././Core/Controllers/DevicesStatus.php',
            data: { 
                Option : 'updateDataChannels',
                MacAddress : MacAddress,
                LastChannel: ChannelsJson[ChannelPosition].CHNL + ' - ' +ChannelsJson[ChannelPosition].NAME,
                ChannelPos: parseInt(ChannelPosition)
            }
        });
    }
/* *****************************************************************************
 * Reproduce canales digitales
 * ****************************************************************************/
    
    function PlayDigitalChannel(Source){
        // Detiene el proceso de la reproduccion anterior
        StopVideo();

        // Reproduce el video
        Debug('src='+ Source);
        AVMedia.Play('src='+ Source);
        PlayDigita = true;
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
        updateDataChannel();
    }
    
/* *****************************************************************************
 * Reproduce videos
 * ****************************************************************************/

    function PlayVideo(Source){
        // Guarda la estadistica
        StopVideo();

        // Reproduce el video
        AVMedia.Play('src='+ Source);

        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();
    }

    function PlayMovie(Source){
        // Guarda la estadistica
        StopVideo();

        // Reproduce el video
        AVMedia.Play('src='+ Source);

        setTimeout(getPIDSInfo, 15000);
        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();
    }
    function getPIDSInfo(){
        var PIDObject = AVMedia.GetAudioPIDs();
            numberOfLanguages = PIDObject.pids;
        for (var x = 1; x <= numberOfLanguages; x++) {
            PIDS.push(PIDObject[x].AudioLanguage);
        }
    }
    
    function PreviewVideo(Source){
        // Guarda la estadistica
        StopVideo();

        // Reproduce el video
        AVMedia.Play('src='+ Source);

        SetPosition(400);
        
        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();
        
        PlayingVod = true;
    }
    
    function SetPosition(Pos){
        AVMedia.SetPosition(Pos);
    }
    
    
/* *****************************************************************************
 * Obtiene los tamanos maximos y minimos de la pantalla
 * ****************************************************************************/

    function GetWindowFullSize(){
        WindowMaxWidth   = window.screen.width;
        WindowMaxHeight  = window.screen.height;
    }
    
    function GetWindowMinSize(){
        WindowMinWidth   = ((window.screen.width)*TvPercentageSize)/100;
        WindowMinHeight  = ((window.screen.height)*TvPercentageSize)/100;
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
                windowTV.SetRectangle('0', '0', WindowMaxWidth, WindowMaxHeight);
            }
        }
    }

/* *****************************************************************************
 * Funcion para minimizar la TV
 * ****************************************************************************/
    
    function MinimizeTV(){
        windowTV.SetRectangle(TvPositionLeft, TvPositionTop, WindowMinWidth, WindowMinHeight);
    }
    
/* *****************************************************************************
 * Reinicia el dispositivo
 * ****************************************************************************/ 
    
    function RebootDevice(){
        ASTB.Reboot();
    }

/* *****************************************************************************
 * Opciones reproduccion
 * ****************************************************************************/ 

    function StopVideo(){
        AVMedia.Stop();
        AVMedia.Kill();
        PauseLive = false;
        PlayingRecording = false;
        PlayDigita = false;
    }
    
    function PauseVideo(){
        //AVMedia.SetSpeed(0);
        AVMedia.Pause();
    }
    
    function ResumeVideo(){
        //AVMedia.SetSpeed(1);
        AVMedia.Continue();
    }
    
    function SpeedVideo(Speed){
        AVMedia.SetSpeed(Speed);
    }
    
    function UpdatePosition(Option){
        PositionAsset = AVMedia.GetPos();

        (Option === 'add') ? PositionAsset += 30: PositionAsset -= 30;

        AVMedia.SetPos(PositionAsset);

        
        PositionAsset = AVMedia.GetPos();

        //AVMedia.Continue();
    }
    
/* *****************************************************************************
 * Obtiene la posicion del video en reproduccion (PAUSE LIVE Y GRABACIONES)
 * ****************************************************************************/ 

    function AssetStatus(Duration){
        if(PlayingRecording === true || PlayingVod === true){

            PositionAsset = AVMedia.GetPosition();
           
            DurationAsset = parseInt(Duration,10) * 60;
            
            PercentagePosition = Math.round((PositionAsset * 100) / DurationAsset);

        } else if(PauseLive === true){
            
            var PltInfo = PVR.GetPltInfo();
            
            if(typeof PltInfo === 'object') {
                DurationAsset = PltInfo.duration;
                PositionAsset = PltInfo.position;

                if(DurationAsset !== 0){
                    PercentagePosition = Math.round((PositionAsset * 100) / DurationAsset);

                    //DurationAsset = DurationAsset * 2;
                }
            }
        }
    }

    function changeLanguage(positionLanguage){
        var PIDS = AVMedia.GetAudioPIDs();
        var AudioPid = PIDS[positionLanguage+1].AudioPID;
        var Status = AVMedia.SetAudioPID(AudioPid);
    }