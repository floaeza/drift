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
        Offset            = 0,
        xhr;


    /* Valida la diferencia de horas en Samsung */
    if (window.tizen !== undefined) {
        var now = new tizen.TZDate(),
            TvHour = now.getHours();

        //Debug('------------------------- NOW:::: '+now);

        xhr = $.ajax({
            cache: false,
            type: 'POST',
            url: 'http://'+ServerIp+'/BBINCO/TV_DRIFT/Core/Models/Time.php',
            async : false,
            success: function (response) {
                var Today = $.parseJSON(response),
                    ServerHour   = Today.Hours;

                ////Debug('****************************************** > '+TvHour);
                //Debug('****************************************** > '+ServerHour);

                Offset = 9;

                //Debug(':::::::::::::::::::::::::::::OFFSET:: '+Offset);

                Today = null;
                ServerHour = null;
            }
        });
        xhr = null;
        now = null;
        TvHour = null;
    }

/*******************************************************************************
 * Funcion que escribe la fecha actual en la EPG, esta funcion tiene un timer
 * para actualizar fecha y hora infinitamente
 *******************************************************************************/
    
    function SetDate(){
        TimeRunning++;
        
        FormatDateAndHour = moment().subtract(Offset, 'hours').format('MMM, DD / h:mm A');
        CurrentStbDate = moment().subtract(Offset, 'hours').format('Y-MM-DD h:mm:ss');

        if(!Device){
            if (Device.Client === 'CHL') {
                FormatHour = moment().subtract(Offset, 'hours').format('h:mm A');
            } else {
                FormatHour = moment().subtract(Offset, 'hours').format('MMMM Do h:mm a');
            }
        } else {
            FormatHour = moment().subtract(Offset, 'hours').format('h:mm A');
        }

        if(CurrentModule === 'Tv'){

            if(typeof (ActiveInfoContainer) !== 'undefined' && ActiveInfoContainer === true){
                InfoContainerNodes[7].textContent  = FormatHour;
            } else if(typeof (ActiveEpgContainer) !== 'undefined' && ActiveEpgContainer === true){
                EpgDate.textContent = FormatDateAndHour;
            } else if(typeof (RecordingPanel) !== 'undefined' && RecordingPanel === true){
                PvrDate.textContent = FormatHour;
            }



            if(FormatHour === '12:01 AM'){

                SetEpgFile();
                //Debug('------------------------------ SetEpgFile -> FormatHour: '+FormatHour);

                if(Device['Type'] === 'WHP_HDDY' || Device['Type'] === 'PVR_ONLY'){
                    if(EpgDataActive === true){
                        GetProgramsSerie();
                    }
                }
            }
            if(FormatHour === '4:02 am'  && typeof(ASTB) !== 'undefined'){
                ASTB.Reboot();
            }

        } else if(CurrentModule === 'Menu' || CurrentModule === 'Movies'){
            // FormatDate = moment().subtract(Offset, 'hours').format('MMMM DD YYYY');
            // FormatHour = moment().subtract(Offset, 'hours').format('h:mm a');
            
            // if(FormatHour === '4:02 am'  && typeof(ASTB) !== 'undefined'){
            //     ASTB.Reboot();
            // }
            var daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            
            var currentDate = new Date();
            currentDate.setHours(currentDate.getHours() - 1);
            
            var dayOfWeek = daysOfWeek[currentDate.getDay()];
            var month = months[currentDate.getMonth()];
            var dayOfMonth = currentDate.getDate();
            var formattedDate = `${dayOfWeek}, ${month} ${dayOfMonth}`;
            
            var hour = currentDate.getHours();
            var minutes = currentDate.getMinutes().toString().padStart(2, '0');
            var ampm = hour >= 12 ? 'PM' : 'AM';
            
            // Convierte la hora en un formato de 12 horas
            if (hour > 12) {
                hour = hour - 12;
            }

            MenuDate.textContent = formattedDate;
            MenuHour.textContent = hour + ':' + minutes + ' ' + ampm;
        }

        
        /* */

        //Debug('TimeRunning: '+TimeRunning);
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
        //Debug('-------------------------------- FormatDateAndHour: '+FormatDateAndHour);
        setTimeout(SetDate, 50000);
    }

/*******************************************************************************
 * Activa timer para que se ejecute cada minuto (60000 milisegundos = 60 segundos)
 *******************************************************************************/
    /* Lo ejecuta la primera vez que carga */
    setTimeout(SetDate,500);
    
    /* Agrega intervalo 50000 = 50 segundos*/
    
    setTimeout(SetDate, 50000);

