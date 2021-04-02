/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Reproductor tv
 * Vendor: Infomir
 */

    // Variables globales
    var PlayingChannel  = false,
        PlayingVod      = true,
        PauseLive       = false;
        
    var WindowMaxWidth  = 0,
        WindowMaxHeight = 0,
        WindowMinWidth  = 0,
        WindowMinHeight = 0;

    var player = stbPlayerManager.list[0];
        //gSTB.SetTopWin(0);
        
        player.videoWindowMode = 0;
        player.aspectConversion = 5;
        
    var player2 = stbPlayerManager.list[1];
    
        player2.videoWindowMode = 0;
        player2.aspectConversion = 5;
    
    var Swap            = false,
        Playlist        = '',
        IndexPlaylist   = -1;
        LengthPlaylist  = 0;
        
        GetWindowFullSize();
        GetWindowMinSize();
        
        /* Set the preset window over others.
         * 0 	graphic window
         * 1 	video window   */
        gSTB.SetTopWin(0);
        

/* *****************************************************************************
 * Reproductor de canal
 * ****************************************************************************/
    
    function PlayChannel(Source, Port){

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
            solution: 'auto'
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
    
    function PlayVideo(Source){
        // Detiene el proceso de la reproduccion anterior
        StopVideo();

        // Reproduce el video
        if(CurrentModule === 'Tv'){
            IndexPlaylist = -1;
            LengthPlaylist = 0;
        
            GetRaws(Source);
        } else {
            //Reproduce el video
            player.play({
                uri: Source,
                solution: 'auto'
            });
            
            player.onPlayEnd = function () {
                if(CurrentModule === 'Movies'){
                    // Termino pelicula
                    EndOfMovie();
                }
            };
        }
        
        


        // Maximiza el video en caso de que no este en pantalla completa
        MaximizeTV();

    }
    

    function GetRaws(Source){
        var RawSource = Source.replace('rtsp','http') + '/raw/';
        RawSource = RawSource.replace('554','8080');

        Debug(RawSource);
        
        $.ajax({
            type: 'POST',
            async: false,
            url: 'Core/Controllers/GetRaws.php',
            data : {
                SourceRaw: RawSource
            },
            success: function(data){
                Playlist = $.parseJSON(data);
                
                LengthPlaylist = Playlist.length;
                
                Debug('---------- LengthPlaylist= '+LengthPlaylist);
                
                if(LengthPlaylist === 0){
                    Debug('---------- Stop record, sorry= '+LengthPlaylist);
                    PlayingRecording =  false;
                    
                    ShowRecorderMessage('Sorry for the incoveniences, it will be activated at short term.');
                
                    StopVideo();

                    HideBarStatus();

                    SetChannel('');
                } else {
                    LengthPlaylist--;
                    
                    DualPlay();
                }
            }
        });
    }
    
    function DualPlay(){
        IndexPlaylist++;
        Debug('------------------->>> a=  '+IndexPlaylist);
        Debug('------------------->>> A=  '+Playlist[IndexPlaylist]);

        player.play({
            uri: Playlist[IndexPlaylist],
            solution: 'auto'
        });
        
        IndexPlaylist++;
        
        if(IndexPlaylist === LengthPlaylist){
            // do nothing
        } else {
            Debug('------------------->>> b=  '+IndexPlaylist);
            Debug('------------------->>> B= '+Playlist[IndexPlaylist]);
            player2.play({
                uri: Playlist[IndexPlaylist],
                solution: 'auto'
            });
        }
        
        
        player.onPlayStart = function () {
           //player.position = 300;
           setTimeout(function(){ 
               if(Swap === false){
                    player2.pause();
                    Debug('--------------> player2.pause '+Swap);
                } else {
                    player.pause();
                    Debug('--------------> player.pause '+Swap);
                }
           }, 3000);
        };

        stbPlayerManager.swap(player2, player);
        
        player.onPlayEnd = function () {
            if(CurrentModule === 'Tv' && PlayingRecording === true){
                Debug('--------------> player.onPlayEnd '+IndexPlaylist);
                // Grabacion termino
                
                if(IndexPlaylist === LengthPlaylist){
                    OpenRecordPlayOptions();
                } else {
                    SwapPlayers();
                }
            }
        };

    }
    
    function SwapPlayers(){
        
//            player2.videoWindowMode = 1;
//            player.videoWindowMode = 2;

        Debug('--------------> SwapPlayers > Swap = '+Swap);
        if(Swap === false){
            Debug('--------------> SwapPlayers > FALSE ');
            player2.resume();
            Debug('--------------> SwapPlayers > player2.resume ');
            stbPlayerManager.swap(player, player2);
            Debug('--------------> SwapPlayers > stbPlayerManager.swap ');
            Swap = true;
            Debug('--------------> SwapPlayers > Swap = '+Swap);
            
            
            IndexPlaylist++;
            if(IndexPlaylist < LengthPlaylist){
                player.play({
                    uri: Playlist[IndexPlaylist],
                    solution: 'auto'
                });
            }
        } else {
            player.resume();
            stbPlayerManager.swap(player2, player);
            Swap = false;
            
            IndexPlaylist++;
            if(IndexPlaylist < LengthPlaylist){
                player2.play({
                    uri: Playlist[IndexPlaylist],
                    solution: 'auto'
                });
            }
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
        player2.setViewport({x: 0, y: 0, width: WindowMaxWidth, height: WindowMaxHeight,save: true});

//        player.setViewport({x: 0, y: 0, width: 720, height: 480,save: true});
//        player2.setViewport({x: 721, y: 0, width: 720, height: 480,save: true});
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
        player2.stop();
        PlayingRecording = false;
    }
    
    function PauseVideo(){
        Debug('-------------* PauseVideo + Swap = '+Swap);
        if(Swap === false){
            player.pause();
            Debug('-------------* PauseVideo + Swap = player');
        } else {
            player2.pause();
            Debug('-------------/ PauseVideo + Swap = player2');
        }
    }
    
    function ResumeVideo(){
        Debug('-------------* ResumeVideo + Swap = '+Swap);
        if(Swap === false){
            player.resume();
            Debug('-------------* ResumeVideo + Swap = player');
        } else {
            player2.resume();
            Debug('-------------/ ResumeVideo + Swap = player2');
        }
    }
    
    function SpeedVideo(Speed){
        gSTB.SetSpeed(Speed);
    }
    
    function UpdatePosition(Option){
        
        PositionAsset = gSTB.GetPosTime();

        (Option === 'add') ? PositionAsset += 30: PositionAsset -= 30;

        gSTB.SetPosTime(PositionAsset);
        
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
