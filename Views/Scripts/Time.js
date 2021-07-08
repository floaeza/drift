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

        Debug('------------------------- NOW:::: '+now);

        $.ajax({
            type: 'POST',
            url: 'http://'+ServerIp+'/BBINCO/TV/Core/Models/Time.php',
            async : false,
            success: function (response) {
                var Today = $.parseJSON(response),
                    ServerHour   = Today.Hours;

                Debug('****************************************** > '+TvHour);
                Debug('****************************************** > '+ServerHour);

                Offset = parseInt(TvHour) - parseInt(ServerHour);

                Debug(':::::::::::::::::::::::::::::OFFSET:: '+Offset);

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
        
        FormatDateAndHour = moment().subtract('hours', Offset).format('MMM, DD / h:mm A');
        CurrentStbDate = moment().subtract('hours', Offset).format('Y-MM-DD h:mm:ss');

        //Debug('################################################ FormatDateAndHour '+FormatDateAndHour);
        //Debug('################################################ CurrentStbDate '+CurrentStbDate);

        if(!Device){
            //Debug('################################################ !Device ');
            if (Device.Client === 'CHL') {
                FormatHour = moment().subtract('hours', Offset).format('h:mm A');
                //Debug('------------------------------------------------ 1');
            } else {
                FormatHour = moment().subtract('hours', Offset).format('MMMM Do h:mm a');
                //Debug('------------------------------------------------ 2');
            }
        } else {
            FormatHour = moment().subtract('hours', Offset).format('MMMM Do h:mm a');
            //Debug('------------------------------------------------ 3');
        }

    Debug('############################################################### FormatHour1 === '+FormatHour);


        if(CurrentModule === 'Tv'){

            Debug('############################################################### CurrentModule === '+CurrentModule);
            if(ActiveInfoContainer === true){
                InfoContainerNodes[7].textContent  = FormatHour;
            } else if(ActiveEpgContainer === true){
                EpgDate.textContent = FormatDateAndHour;
            } else if(typeof (RecordingPanel) !== 'undefined'){
                if(RecordingPanel === true) {
                    PvrDate.textContent = FormatHour;
                }
            }

            Debug('############################################################### FormatHour2 === '+FormatHour);

            if(FormatHour === '12:01 AM'){

                clearInterval(TimerDate);

                TimerDate = setInterval(SetDate, 50000);

                SetEpgFile();
                Debug('------------------------------ SetEpgFile -> FormatHour: '+FormatHour);

                if(Device['Type'] === 'WHP_HDDY' || Device['Type'] === 'PVR_ONLY'){
                    if(EpgDataActive === true){
                        GetProgramsSerie();
                    }
                }
            }

        } else if(CurrentModule === 'Menu' || CurrentModule === 'Movies'){
            FormatDate = moment().subtract('hours', Offset).format('MMM DD ');
            FormatHour = moment().subtract('hours', Offset).format('h:mm a');
        
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
        Debug('-------------------------------- FormatDateAndHour: '+FormatDateAndHour);
    }

/*******************************************************************************
 * Activa timer para que se ejecute cada minuto (60000 milisegundos = 60 segundos)
 *******************************************************************************/
    /* Lo ejecuta la primera vez que carga */
    SetDate();
    
    /* Agrega intervalo 50000 = 50 segundos*/
    TimerDate = setInterval(SetDate, 50000);

