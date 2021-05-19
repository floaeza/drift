<script src="[@ProyectURL]/Views/Librarys/loader.js"></script>
<script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', { 'packages':['corechart', 'bar'] });
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(DrawCharts);


      
        /* Variables grafica con tiempo de vista de todos los canales*/
        var ChannelsViewObj = [],
            ChannelsListJson = '',
            From = 'Beginning', // Beginning | Day | Month
            Order = 'nombre_canal ASC',
            Parameter = '';

        /* Ordena la grafica de forma ascendente o descente*/
        function UpdateOrder(OrderBy){
            /* Actualiza la variable general con el parametro seleccionado*/
            Order = OrderBy;
            /* Dibuja de nuevo la grafica */
            DrawChannelsViewTime();
        }
        
        /* Obtiene los datos por dia seleccionado */
        function UpdateByDay(DayString){
		
            /* Formatea la fecha seleccionada */
            var DateArray = DayString.split(/(\s+)/),
                Day       = DateArray[0],
                Month     = getMonthString(DateArray[2].replace(/\,/g,"")),
                Year      = DateArray[4],
                SubHeader = document.getElementById('SubTitleChannelsViewTime');

            /* Actualiza los parametros generales*/
                Parameter = PadZero(Day,2) +'-'+PadZero(Month,2)+'-'+Year;
                From      = 'Day';
                
            /* Actualiza el subtitulo de la grafica y dibuja de nuevo la grafica */
                SubHeader.innerHTML = DayString;
                DrawChannelsViewTime();
        }
        
        /* Obtiene los datos por mes seleccionado */
        function UpdateByMonth(MonthString){
            /* Formatea la fecha seleccionada */
            var DateArray = MonthString.split(/(\s+)/),
                Month     = getMonthString(DateArray[0]),
                Year      = DateArray[2],
                SubHeader = document.getElementById('SubTitleChannelsViewTime');
            /* Actualiza los parametros generales*/
                Parameter = PadZero(Month,2)+'-'+Year;
                From      = 'Month';
                
            /* Actualiza el subtitulo de la grafica y dibuja de nuevo la grafica */
                SubHeader.innerHTML = MonthString;
                DrawChannelsViewTime();
        }
        
        
      
        /* Dibuja la grafica con el tiempo de vista de todos los canales */
        function DrawChannelsViewTime() {
            $.ajax({
                type: "POST",
                url: "[@ProyectURL]/Core/Querys/Trends.php",
                data: { 
                    Option    : 'ChannelsViewTime',
                    From      : From,
                    Parameter : Parameter,
                    OrderBy   : Order
                }, 
                async: false,
                success: function (response) {
                    ChannelsListJson = response;
                    ChannelsViewObj  = $.parseJSON(response);
                }
            });

            var data = new google.visualization.DataTable();
                data.addColumn('string', 'Canal');
                data.addColumn('number', 'Horas');
                data.addColumn({ type: 'string', role: 'style' });
                data.addColumn({ type: 'string', role: 'annotation' });
                
                data.addRows(ChannelsViewObj);

            var options = {
                legend: { position: 'none' },
                chartArea: { 
                    width: '50%',
                    height: '90%'
                },
                hAxis: {
                    title: 'Tiempo visto en horas',
                    minValue: 0,
                    textStyle: { 
                        fontName: 'Arial', 
                        fontSize: '12' 
                    }  
                },
                vAxis: {
                    title: 'Canales',
                    textStyle: {
                        fontName: 'Arial', 
                        fontSize: '12' 
                    }
                }
            };

            /* Dibuja la grafica en el div seleccionado */
            var ChannelsChart = new google.visualization.BarChart(document.getElementById('ChannelsViewTime'));
                /* Crea una imagen de la grafica en caso de descargar imagen */
                google.visualization.events.addListener(ChannelsChart, 'ready', function () {
                    var ChartImage = ChannelsChart.getImageURI();
                    // do something with the image URI, like:
                    document.getElementById('ChannelListImage').src = ChartImage;
                });
                /* Dibuja */
                ChannelsChart.draw(data, options);
        }
        
        
        /* Funcion para ejecutar todas las graficas al inicio */
        function DrawCharts(){
            /* Lista el tiempo de vista de todos los canales */
                DrawChannelsViewTime();
        }
</script>
<div class="Container thirteen wide column ContainerLayout">
    <!-- CONTENEDOR GRAFICA TIEMPO DE VISTA DE TODOS LOS CANALES -->
    <div style="border: 2px solid #d5d5d5; padding: 1%; width: 98%; float: left; border-radius: 5px;">
        
        <h2 class="ui header">Tiempo total de reproduccion de todos los canales
            <div id="SubTitleChannelsViewTime" class="sub header">Desde el comienzo de los tiempos</div>
        </h2>
        
        <div>
            <div style="height: 100px;text-align: center; width: 48%;margin: 0% 1% 0% 1%;border: 2px solid #e3e3e3;border-radius: 5px; float: right;">
                <div style="width: 33.3%;float: left; margin-top: 4%;">
                    <div class="ui floating labeled icon dropdown green button">
                        <i class="filter icon"></i>
                        <span class="text">Ordenar por</span>
                        <div class="menu">
                            <div id="ChannelAsc"  class="item"><i class="arrow down icon"></i>A-Z (Canal)</div>
                            <div id="ChannelDesc" class="item"><i class="arrow down icon"></i>Z-A (Canal)</div>
                                <div class="divider"></div>
                            <div id="HoursDesc"   class="item"><i class="arrow down icon"></i>9-0 (Hora)</div>
                            <div id="HoursAsc"    class="item"><i class="arrow down icon"></i>0-9 (Hora)</div>
                        </div>
                    </div>
                </div>

                <div style="width: 33.3%;float: left; margin-top: 4%;">
                    <button id="ExportX01" class="ui labeled icon teal button">
                        <i class="download icon"></i>Exportar XLS
                    </button>
                </div>

                <div style="width: 33.3%;float: left; margin-top: 4%;">
                    <button id="ExportP01" class="ui labeled icon blue button">
                        <i class="download icon"></i>Exportar PNG
                    </button>
                </div>
            </div>
            
            <div style="height: 100px;text-align: center; width: 48%;margin: 0% 1% 0% 1%;border: 2px solid #e3e3e3;border-radius: 5px;">
                <div style="width: 38%;float: left;">
                    <h3 style="margin-top: 3%;margin-bottom: 2%;">Filtro por dia</h3>
                    <div class="ui calendar" id="FilterByDay">
                        <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" placeholder="Date">
                        </div>
                    </div>
                </div>

                <div style="width: 38%;float: left;">
                    <h3 style="margin-top: 3%;margin-bottom: 2%;">Filtro por mes</h3>
                    <div class="ui calendar" id="FilterByMonth">
                        <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" placeholder="Date">
                        </div>
                    </div>
                </div>
                
                <div style="width: 24%;float: left;">
                    <h3 style="margin-top: 3%;margin-bottom: 2%;">Limpiar filtro</h3>
                    <button id="Clear01" class="circular ui icon twitter button"><i class="icon eraser"></i></button>
                </div>
            </div>
        </div>

        <div id="ChannelsViewTime" style="height: 1800px; width: 900px;"></div>
        
        <div class="ui modal">
            <div class="header">Clic derecho para sobre la imagen para descargarla</div>
            <div class="image content">
                <div class="ui medium image">
                  <img id="ChannelListImage" src="">
                </div>
            </div>
        </div>
    <!-- FIN CONTENEDOR GRAFICA TIEMPO DE VISTA DE TODOS LOS CANALES -->
            
</div>
        
<script>
     $(document).ready(function() {
        $('#preloader').fadeOut('slow');
        
        $('#FilterByDay').calendar({ 
            type: 'date',
            onChange: function (date, text) {
                UpdateByDay(text);
            }
        });
        
        $('#FilterByMonth').calendar({ 
            type: 'month',
            onChange: function (date, text) {
                UpdateByMonth(text);
            }
        });
        
        $('#ExportX01').click(function(){ 
            JSONToCSVConvertor(ChannelsListJson, "Channels Report", true);
        });
        
        $('#ExportP01').click(function(){ 
            $('.ui.modal')
            .modal('show')
            ;
        });
        
        $('#Clear01').click(function(){ 
            From = 'Beginning';
            Order = 'nombre_canal ASC';
            Parameter = '';
            DrawChannelsViewTime();
            
            var SubHeader = document.getElementById('SubTitleChannelsViewTime');
                SubHeader.innerHTML = 'Desde el comienzo de los tiempos';
        });
        
        
        $('#ChannelDesc').click(function(){ UpdateOrder('nombre_canal DESC'); });
        $('#ChannelAsc').click(function(){ UpdateOrder('nombre_canal ASC'); });

        $('#HoursDesc').click(function(){ UpdateOrder('segundos DESC'); });
        $('#HoursAsc').click(function(){ UpdateOrder('segundos ASC'); });
   
    });
    

    /* FUNCIONES GENERALES */
    function getMonthString(month){
        return new Date(Date.parse(month+" 1, 2021")).getMonth()+1;
    }

    function PadZero(number, length) {
        var my_string = '' + number;
        while (my_string.length < length) {
            my_string = '0' + my_string;
        }
        return my_string;
    }
    
    function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
        //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
        var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

        var CSV = '';    
        //Set Report title in first row or line

        CSV += ReportTitle + '\r\n\n';

        //This condition will generate the Label/Header
        if (ShowLabel) {
            var row = "";

            //This loop will extract the label from 1st index of on array
            for (var index in arrData[0]) {

                //Now convert each value to string and comma-seprated
                row += index + ',';
            }

            row = row.slice(0, -1);

            //append Label row with line break
            CSV += row + '\r\n';
        }

        //1st loop is to extract each row
        for (var i = 0; i < arrData.length; i++) {
            var row = "";

            //2nd loop will extract each column and convert it in string comma-seprated
            for (var index in arrData[i]) {
                row += '"' + arrData[i][index] + '",';
            }

            row.slice(0, row.length - 1);

            //add a line break after each row
            CSV += row + '\r\n';
        }

        if (CSV == '') {        
            alert("Invalid data");
            return;
        }   

        //Generate a file name
        var fileName = "Report_";
        //this will remove the blank-spaces from the title and replace it with an underscore
        fileName += ReportTitle.replace(/ /g,"_");   

        //Initialize file format you want csv or xls
        var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

        // Now the little tricky part.
        // you can use either>> window.open(uri);
        // but this will not work in some browsers
        // or you will not get the correct file extension    

        //this trick will generate a temp <a /> tag
        var link = document.createElement("a");    
        link.href = uri;

        //set the visibility hidden so it will not effect on your web-layout
        link.style = "visibility:hidden";
        link.download = fileName + ".csv";

        //this part will append the anchor tag and remove it after automatic click
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
