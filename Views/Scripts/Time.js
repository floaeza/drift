// @ts-nocheck
/******************************************************************************
 * @Objetivo: Actualiza la hora
 * @CreadoPor: Tania Maldonado
 * @Fecha: Noviembre 2019
 *******************************************************************************/

/* Validacion para reinicar dispositivo y buscar actualizaciones de la epg */
    var TimeRunning       = 0,
        MaxMinutesRunning = 15,
        TimerDate         = 0,
        Offset            = 0;


    /* Valida la diferencia de horas en Samsung */

    if (window.tizen !== undefined) {
        var now = new tizen.TZDate(),
            TvHour = now.getHours();

        $.ajax({
            type: 'POST',
            url: 'http://'+ServerIp+'/BBINCO/TV/Core/Models/Time.php',
            async : false,
            success: function (response) {
                var Today = $.parseJSON(response),
                    ServerHour   = Today.Hours;

                Debug('************** > '+TvHour);
                Debug('************** > '+ServerHour);

                Offset = parseInt(TvHour) - parseInt(ServerHour);

                Debug('::OFFSET:: '+HourDifference);

                Today = null;
                ServerHour = null;
            }
        });

        now = null;
        TvHour = null;
    }

/*******************************************************************************
 * Funcion que escribe la fecha actual en la EPG, esta funcion tiene un timer
 * para actualizar fecha y hora infinitamente
 *******************************************************************************/
    
    function SetDate(){
        TimeRunning++;
        
        FormatDateAndHour = moment().format('MMM, DD / h:mm A').subtract('hours', Offset);;
        CurrentStbDate = moment().format('Y-MM-DD h:mm:ss').subtract('hours', Offset);;

        if(!Device){
            if (Device.Client === 'CHL') {
                FormatHour = moment().format('h:mm A').subtract('hours', Offset);;
            } else {
                FormatHour = moment().format('MMMM Do h:mm a').subtract('hours', Offset);;
            }
        } else {
            FormatHour = moment().format('MMMM Do h:mm a').subtract('hours', Offset);;
        }

        //.subtract('hours', Offset);

        if(CurrentModule === 'Tv'){
            if(ActiveInfoContainer === true){
                InfoContainerNodes[7].textContent  = FormatHour;
            } else if(ActiveEpgContainer === true){
                EpgDate.textContent = FormatDateAndHour;
            } else if(typeof (RecordingPanel) !== 'undefined'){
                if(RecordingPanel === true) {
                    PvrDate.textContent = FormatHour;
                }
            }

            if(FormatHour === '12:01 AM'){

                clearInterval(TimerDate);

                TimerDate = setInterval(SetDate, 50000);

                SetEpgFile();
                Debug('------------- SetEpgFile -> FormatHour: '+FormatHour);

                if(Device['Type'] === 'WHP_HDDY' || Device['Type'] === 'PVR_ONLY'){
                    if(EpgDataActive === true){
                        GetProgramsSerie();
                    }
                }
            }

        } else if(CurrentModule === 'Menu' || CurrentModule === 'Movies'){
            FormatDate = moment().format('MMM DD ').subtract('hours', Offset);;
            FormatHour = moment().format('h:mm a').subtract('hours', Offset);;
        
            MenuDate.textContent = FormatDate;
            MenuHour.textContent = FormatHour;
        }

        
        /* */

        Debug('TimeRunning: '+TimeRunning);
        if(TimeRunning > MaxMinutesRunning){
            
            TimeRunning = 0;

            if(Executing === false){
                if(CurrentModule !== 'Tv') {
                    UpdateInfoDevice();
                } else {
                    UpdateQuickInfoDevice();
                }
            }
        }
        Debug('------------- FormatDateAndHour: '+FormatDateAndHour);
    }

/*******************************************************************************
 * Activa timer para que se ejecute cada minuto (60000 milisegundos = 60 segundos)
 *******************************************************************************/
    /* Lo ejecuta la primera vez que carga */
    SetDate();
    
    /* Agrega intervalo 50000 = 50 segundos*/
    TimerDate = setInterval(SetDate, 50000);

