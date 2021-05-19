 <!-- 
 PLANTILLA DE LOGS EN EL SISTEMA 
 GUILLERMO ARCE CASILLAS
 MARTES 26 JUNIO 2017
 --> 
<div class="Container thirteen wide column ContainerLayout">
            <div class="ui segment">
            <h2 class="ui header">
                <i class="file text grey icon"></i>
                <div class="content">
                  [@LabelTitleSubmenuLogs]
                  <div class="sub header">[@LabelSubTitleSubmenuLogs]</div>
                </div>
            </h2>
            
            <div class="Tabs">
                
                <div>        
                    <div id="Tab1">
                     
                        
                        <div class="Filter ui icon input"id="ButtonClear">
                            <div class="ui icon input">
                            <input class="Inputs" id="GlobalFilter" type="text"placeholder="[@LabelPlaceHolderFilter]">
                            <i class="search icon"></i>
                            </div>
                        <div id="buttonClearMargen">
                            <button class="circular ui icon button" type="button" id="ButtonFilterClear">
                                    <i class="icon trash"></i>
                            </button>
                        </div>
                        </div>
                        
                        <div class="ui clearing divider"></div>
                        <div class="TableList" id="LogsList"></div>

                    </div>
                </div> 

            </div>
            <div class="ui inverted active dimmer" id="preloader">
                <div class="ui indeterminate text centered inline loader" id="loader"></div>
            </div>
            </div>
</div>
        
<script>
// codigo para poner loader antes de que carge todos los elementos
     $(document).ready(function() {
        $('#preloader').fadeOut('slow');
        
    });
   
   
    /* TAB 1: LISTA DE USUARIOS*/
  // creamos la tabla de logs con el id LogsList codigo bajado de primfaces
    $('#LogsList').puidatatable({
        
            caption: 'Single Selection',
            resizableColumns: true,
            columnResizeMode: 'expand',
            //resizableColumns: true,
            paginator: {
                rows: 8
            },
            
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                // EJMEMPLO PARA HACER EXPANDABLES ROWS EN CUALQUIER TABLA
                //{ rowToggler: true, bodyStyle: 'width:18px',headerStyle: 'width:18px' },
                { field: 'tipo_aviso', headerText: 'Tipo de evento',sortable: true, filter: true,
                //codigo para cambiar el valor de el campo tipo_aviso, si es info se cambia ala imagen llamada info de color azul y de forma circular
                 content: function(response) {
                        if(response.tipo_aviso === 'info') {
                             return $('<i class="big blue info circle icon"></i>');
                        }
                //codigo para cambiar el valor de el campo tipo_aviso, si es warn se cambia ala imagen llamada warninf sign de color naranja y de forma circular
                        else if(response.tipo_aviso === 'warn') {
                             return $('<i class="big orange warning sign icon circle"></i>');
                        }else if (response.tipo_aviso === 'error'){
                            return $('<i class="big red warning circle icon"></i>');
                        }
                        return $('<span style="color:'+ color +'; text-transform: uppercase; "><b>'+ response.tipo_aviso +'</b></span>');
                    }},
                { field: 'fecha_log', headerText: 'Fecha', sortable: true, filter: true },
                { field: 'nombre_usuario', headerText: 'Usuario',sortable: true, filter: true,
                // juntamos tres campos de la tabla cat_usuario imagen_usuario,nombre_perfil, nombre_usuario, apellido paterno y apellido_materno
                       content: function(response) {
                        return $('<span><img class="ui avatar image"  src="[@AvatarsURL]'+response.imagen_usuario+'"/> <b>'+response.nombre_perfil+'</b> <br>'+response.nombre_usuario+' '+response.apellido_paterno+' '+response.apellido_materno+'</span>');
                       }},
                { field: 'descripcion_log', headerText: 'Descripcion',sortable: true, filter: true}
                 
            ],
            
           
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Logs.php?Option=SelectLogs',
                dataType: "json",
                context: this,
                success: function(response) {
                    callback.call(this, response);
                }
            });
        }});
   // boton de limpiar el buscador general de la tabla dandole click se le asiga un espacio en blanco y un keyup que hace que se actualize la tabla.
  $("#ButtonFilterClear").click(function() {  
  $("#GlobalFilter").val("");
  $('#GlobalFilter').keyup();
  $('#LogsList').puidatatable('reload');
  });
    

</script>
