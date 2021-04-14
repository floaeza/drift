<!--Contenido canal digital -->
<img id='ImageDigitalChannel'>

<iframe id='ContentFrame' src=''></iframe>

<!-- Cuadro con informacion del canal -->

<div id='InfoContainer' class='BackgroundInfo'>
    <div class='ChannelNumber'></div>
    <div class='Quality'></div>
    <div class='ChannelName'></div>
    <div class='Date'></div>
    <div class='Title'></div>
    <div class='Duration'></div>
    <div class='Time'></div>
    <div class='Description'></div>
    <div class='Rating'></div>
</div>

<div id='EpgContainer'>
    <!-- Contiene informacion del programa y el canal, fecha y hora -->
    <div id='EpgHeader'>
        <div id='EpgWeather'>

            <div id='TemperatureGroup'>
                <span id='WeatherFarenheit'></span><span>&deg; F/</span>
                <span id='WeatherCelsius'></span><span>&deg; C</span>
                <canvas id='WeatherIcon' width='30' height='30'></canvas>
            </div>
        </div>
        <div id='EpgDate'></div>
    </div>

    <!-- -->
    <div id='EpgNowAiring'></div>


    <div id='EpgDays'>
         <!--<b><i class='fa fa-chevron-left'></i></b>-->
        <div id='EpgDay'></div>
        <!--<b><i class='fa fa-chevron-right'></i></b>-->
    </div>

    <!-- Lista de canales -->
    <div id='EpgChannels'>
        <div id='ChannelRow1'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
        <div id='ChannelRow2'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
        <div id='ChannelRow3'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
        <div id='ChannelRow4'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
        <div id='ChannelRow5'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
        <div id='ChannelRow6'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
        <div id='ChannelRow7'><p class='ChannelNumber'></p><p class='ChannelName'></p></div>
    </div>

    <!-- Contiene las horas en la guia  -->
    <div id='EpgHours'>
        <div class='HourRow'></div>
        <div class='HourRow'></div>
        <div class='HourRow'></div>
        <div class='HourRow'></div>
        <div class='HourRow'></div>
    </div>

    <!-- Contiene la lista de programas, muestra hora inicio y titulo -->
    <div id='EpgPrograms'>
        <div id='ProgramRow1'></div>
        <div id='ProgramRow2'></div>
        <div id='ProgramRow3'></div>
        <div id='ProgramRow4'></div>
        <div id='ProgramRow5'></div>
        <div id='ProgramRow6'></div>
        <div id='ProgramRow7'></div>
    </div>

    <!-- Contiene las horas en la guia  -->
    <div id='ProgramFocus'></div>

    <div id='EpgProgramInfo'>
        <div id='EpgTitle'></div>
        <div id='EpgChannelLogo' class='EpgLogo'></div>
        <div id='EpgTime'></div>
        <div id='EpgRating'></div>
        <div id='EpgDescription'></div>
    </div>
    
    <!-- Contiene Logo Empresa-->
    <div id='EpgMainLogo' class='EpgMainLogo'><img src='Media/Logos/MainLogo.png'/> </div>

    <div id='Message'></div>
</div>
<!-- Barra Pause Live Tv y Grabacion en reproduccion -->

<div id='BarContainer'>
    <div id='BarPosition'></div>
    <div id='BarStatus'></div>
</div>

<!-- Opciones para grabar un programa -->
<div id='RecordingOptions'>
    <div class='RecordingOptionsButton'>Tune channel</div>
    <div class='RecordingOptionsButton'>Add record</div>
    <div class='RecordingOptionsButton'>Add manual record</div>
    <div class='RecordingOptionsButton'>Record all shows</div>
    <div class='RecordingOptionsButton'>Close</div>
</div>

<div id='RecordPlayOptions'>
    <div class='RecordingOptionsButton'>Play again</div>
    <div class='RecordingOptionsButton'>Delete</div>
    <div class='RecordingOptionsButton'>Stop</div>
    <div class='RecordingOptionsButton'>Close</div>
</div>

<!-- Opciones para grabar un programa manualmente | OnLoadHourPosition  & Hours[(0 - > 47)]  | -->
<div id='RecordingManualOptions'>
    <i class='fa fa-chevron-up'></i><br>
    <div class='TimeNewRecording'>00</div>
    <div class='TimeNewRecording'>00</div>
    <div class='TimeNewRecording'>00</div>
    <div class='TimeNewRecording' style='width: 35%;'>+15 min</div>
    <i class='fa fa-chevron-down'></i><br>

    <div class='RecordingOptionsButton'>Accept</div>
    <div class='RecordingOptionsButton'>Close</div>
</div>

<!-- Mensaje para grabaciones -->
<div id='RecorderMessage'></div>


<!-- Panel grabador -->
<div id='PvrContainer'>

    <div class='PvrHeader'>
        <i class='fa fa-chevron-left PvrChevronLeft'></i>
        <div id='CurrentPvrOption'></div>
        <i class='fa fa-chevron-right PvrChevronRight'></i>
    </div>

    <div id='PvrNow'></div>

    <div id='PvrMainLogo'><img src='Media/Logos/PvrMainLogo.png'/> </div>

           <div id='PvrWeather'>

            <div id='TemperatureGroup'>
                <span id='WeatherFarenheit'></span><span>&deg; F/</span>
                <span id='WeatherCelsius'></span><span>&deg; C</span>
                <canvas id='WeatherIcon' width='30' height='30'></canvas>
            </div>
        </div>

    <div id='PvrDate'></div>


    <div id='PvrList'>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
        <div class='PvrProgram'></div>
    </div>

    <div id='PvrInfo'>
        <div id='PvrProgramTitle'></div>
        <div id='PvrProgramDate'></div>
        <div id='PvrProgramDescription'></div>
    </div>

    <div id='PvrDiskInfo'>
        <div id='UsedSize'></div>
        <div class='BarUsedSize'></div>
        <div id='BarUsedSize'></div>
    </div>

    <div id='PvrOptions'>
        <div class='PvrOptionsButton'>Play</div>
        <div class='PvrOptionsButton'>Delete</div>
        <div class='PvrOptionsButton'>Close</div>
    </div>

    <div id='PvrDeleteOptions'>
        <div class='PvrOptionsButton'>Delete</div>
        <div class='PvrOptionsButton'>Close</div>
    </div>
</div>
