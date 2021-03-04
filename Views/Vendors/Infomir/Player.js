/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Reproductor tv
 * Vendor: Infomir
 */

    // Variables globales
    var PlayingChannel      = false,
        PlayingVod          = true,
        PauseLive           = false,
        PIDS                = [],
        numberOfLanguages   = 0;
        
    var WindowMaxWidth  = 0,
        WindowMaxHeight = 0,
        WindowMinWidth  = 0,
        WindowMinHeight = 0;

    var player = stbPlayerManager.list[0];

        gSTB.SetTopWin(0);
        
        GetWindowFullSize();
        GetWindowMinSize();


/* *****************************************************************************
 * Reproductor de canal
 * ****************************************************************************/
    
    function PlayChannel(Source, Port, ProgramIdChannnel, ProgramIdPosition){

        var CheckPort = '';
        
            if(Port){
                CheckPort = ':' + Port;
            }
            
        // Detiene el proceso de la reproduccion anterior
        Source = Source.replace('igmp','udp');

        // Detiene el proceso de la reproduccion anterior
        StopVideo();

        //gSTB.Play(url);
        player.play({
            uri: Source + CheckPort,
            solution: 'auto',
            program: ProgramIdPosition
        });
        
        Debug(Source + CheckPort);

        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();

        // Activamos la bandera
        PlayingChannel = true;
        
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

        // Reproduce el video
        player.play({
            uri: Source,
            solution: 'auto'
        });
        
        player.onPlayStart = function () {
            ImageDigital.src = '';
            ImageDigital.style.display = 'none';
        };
        
        player.onPlayEnd = function () {
            SetDigitalChannel();
        };

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
var Playlist = '',
    IndexPlaylist = 0;
    LengthPlaylist = 0;

    function PlayVideo(Source){
        // Detiene el proceso de la reproduccion anterior
        StopVideo();

        if(CurrentModule === 'Tv'){
            GetRaws(Source);

            LengthPlaylist = Playlist.length;
            Debug('--------------->>> '+Playlist[IndexPlaylist]);
            //Reproduce el video
            player.play({
                uri: Playlist[IndexPlaylist],
                solution: 'auto'
            });
        } else {
            //Reproduce el video
            player.play({
                uri: Source,
                solution: 'auto'
            });
            setTimeout(getPIDSInfo, 15000);
        }

        player.onPlayEnd = function () {
            if(CurrentModule === 'Tv' && PlayingRecording === true){
                // segmente de la grabacion termino
                SetPlaylist('forward');
            } else if(CurrentModule === 'Movies'){
                // Termino pelicula
                EndOfMovie();
            }
        };

        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();

    }
    function getPIDSInfo(){
            numberOfLanguages = 2;
            PIDS = ['esp', 'eng'];
    }
    function changeLanguage(positionLanguage){
        gSTB.SetAudioPID(positionLanguage+1);
    }



    function GetRaws(Source){
        var RawSource = Source.replace('rtsp','http') + '/raw/';
        RawSource = RawSource.replace('554','8080');

        Debug(RawSource);
        IndexPlaylist = 0;
        LengthPlaylist = 0;

        $.ajax({
            type: 'POST',
            async: false,
            url: 'Core/Controllers/GetRaws.php',
            data : {
                SourceRaw: RawSource,
            },
            success: function(data){
                Playlist = $.parseJSON(data);
            }
        });
    }


    function SetPlaylist(Direction){

        (Direction === 'forward') ? IndexPlaylist++: IndexPlaylist--;

        if(IndexPlaylist < 0){
            IndexPlaylist = 0;
        }

        if(IndexPlaylist > LengthPlaylist){
            OpenRecordPlayOptions();

            IndexPlaylist = 0;
        }  else {

            Debug('--------------->>> '+Playlist[IndexPlaylist]);

            player.play({
                uri: Playlist[IndexPlaylist],
                solution: 'auto'
            });
        }
    }

    function PreviewVideo(Source){
        // Guarda la estadistica
        StopVideo();

        // Reproduce el video
        player.play({
            uri: Source,
            solution: 'auto'
        });
        
        player.onPlayStart = function () {
           //player.position = 300;
           SetPosition(300);
        };

        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();
    }
    
    function SetPosition(Pos){
        player.position = Pos;
    }
    
    
/* *****************************************************************************
 * Obtiene los tamanos maximos y minimos de la pantalla
 * ****************************************************************************/

    function GetWindowFullSize(){
        WindowMaxWidth   = player.viewport['width'];
        WindowMaxHeight  = player.viewport['height']; 
        
        Debug(WindowMaxWidth);
        Debug(WindowMaxHeight);
    }
    
    function GetWindowMinSize(){
        
        WindowMinWidth   = (WindowMaxWidth*33)/100;
        WindowMinHeight  = (WindowMaxHeight*33)/100; 
        
        Debug(WindowMinWidth);
        Debug(WindowMinHeight);

    }
    
/* *****************************************************************************
 * Funcion para poner TV en pantalla completa
 * ****************************************************************************/
   
   function MaximizeTV(){
        //gSTB.SetViewport(WindowMaxWidth, WindowMaxHeighc, 0, 0);
        //player.setViewport({x: 0, y: 0, width: WindowMaxWidth, height: WindowMaxHeight});
        //gSTB.SetViewport(3840, 2160, 0, 0);
        
        player.setViewport({x: 0, y: 0, width: WindowMaxWidth, height: WindowMaxHeight,save: true});
        
        //Debug(JSON.stringify(player.viewport));
    }

/* *****************************************************************************
 * Funcion para minimizar la TV
 * ****************************************************************************/
    
    function MinimizeTV(){
        //gSTB.SetViewport(WindowMinWidth, WindowMinHeight, 15, 60);
        //player.setViewport({x: 15, y: 60, width: WindowMinWidth, height: WindowMinHeight});
        
//        if(window.screen.width === 1280){
//            gSTB.SetViewport(WindowMinWidth, WindowMinHeight, 40, 80);
//        } else {
//            gSTB.SetViewport(WindowMinWidth, WindowMinHeight, 15, 60);
//        }
        
        player.setViewport({x: 40, y: 80, width: WindowMinWidth, height: WindowMinHeight,save: true});

    }
    
/* *****************************************************************************
 * Reinicia el dispositivo
 * ****************************************************************************/ 
   
    function RebootDevice(){
        gSTB.ExecAction('reboot');
    }
    
/* *****************************************************************************
 * Funcion para detener la reproduccion de un video, multicast, etc.
 * ****************************************************************************/
    
    function StopVideo(){
        player.stop();
        
        PlayingRecording = false;
    }
    
    function PauseVideo(){
        player.pause();
    }
    
    function ResumeVideo(){
        player.resume();
    }
    
    function SpeedVideo(Speed){
        gSTB.SetSpeed(Speed);
    }
    
    function UpdatePosition(Option){
        
        PositionAsset = gSTB.GetPosTime();

        (Option === 'add') ? PositionAsset += 30: PositionAsset -= 30;

        gSTB.SetPosTime(PositionAsset);

        Debug('Speed:::::::::: '+PositionAssets);
        
        gSTB.Continue();
    }
    
/* *****************************************************************************
 * Obtiene la posicion del video en reproduccion (PAUSE LIVE Y GRABACIONES)
 * ****************************************************************************/ 

    function AssetStatus(Duration){
        if(PlayingRecording === true || PlayingVod === true){
//            PositionAsset = GetPosTime();
//            PositionAsset = stbPlayer.position;
            PositionAsset = gSTB.GetPosTime();
            DurationAsset = parseInt(Duration,10) * 60;
            
            PercentagePosition = Math.round((PositionAsset * 100) / DurationAsset);
        } 
    }
