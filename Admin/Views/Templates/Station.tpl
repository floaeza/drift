<!-- CODIGO DE STACIONES PARA LA CREACION DE LOS TABS -->       
<div class="Container thirteen wide column ContainerLayout">
            <div class="ui segment">
            <h2 class="ui header">
                <i class="fa-th grey icon"></i>
                <div class="content">
                  [@LabelTitleSubmenuStation]
                  <div class="sub header">[@LabelSubTitleSubmenuStation]</div>
                </div>
            </h2>
           
            <div class="TabsStations">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1" id="StationPrincipal">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="blue grid layout icon"></i>
                                    <i class="blue corner list icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormListStation]
                                <div class="sub header">[@LabelSubListStation]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="teal grid layout icon"></i>
                                    <i class="teal corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormListStationTribune]
                                <div class="sub header">[@LabelSubCreateStationTribune]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    
                    
                    <li>
                        <a class="ui card" href="#Tab3">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="olive grid layout icon"></i>
                                    <i class="olive corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormStation]
                                <div class="sub header">[@LabelSubCreateStation]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab4" id="EditStation">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="green grid layout icon"></i>
                                    <i class="green corner pencil icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormEditStation]
                                <div class="sub header">[@LabelSubEditStation]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab5" id="DeleteStation">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="orange grid layout icon"></i>
                                    <i class="orange corner trash icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabDeleteStation]
                                <div class="sub header">[@LabelSubDeleteStation]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                </ul>
                <div>
                    <div id="TabsStations1">

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
                        <div id="StationList"></div>
                       
                        
                    </div> 
                    
                        
                    </div>
                
                      <div id="TabsStations2">
                          
                        <div class="ui form">
                            <h4 class="ui dividing header">[@LabelHeaderFormStationTribune]</h4>
                            <form id="NewForm" method="post" name="NewForm" action="">
                                
                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelNumStation]</label>
                                    </div>
                                    <div class="six wide field">
                                        <select class="ui search dropdown" name="NumStation" id="NumStation" onchange="Valor(this.value);">
                                            [@StationTribuneOptionList]
                                        </select>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelNameStation]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListNumberTribune]" name="NameStation"/></div>
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelIndicativeStation]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListIndicativeTribune]" name="IndicativeStation"/></div>
                                    </div>
                                </div>   
                                <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelSelectIcon]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui selection dropdown">
                                        <input name="UserImage" id="Icon" type="hidden"/>
                                        <i class="dropdown icon"></i>
                                        <div class="default text">[@LabelSelectIconStation]</div>
                                        <div class="menu" id="IconsTribune">[@IconsList]</div>
                                        
                                    </div>
                                    
                                    
                                    
                                </div><button class="ui button" id="Examine"><i class="attach icon"></i></button>
                                </div>
                                
                                
                                
                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="CancelTri small grey ui button">[@LabelButtonCancel]</button>
                                    <button type="button" class="SubmitClear  small ui button" id="ClearTri">[@LabelButtonClear]</button>
                                </div>
                                
                            </form>
                            
                            <div class="PanelStepM" title="Subir Imagen" id="PanelUpImages">
                             <form enctype="multipart/form-data" id="FormUploadAjax" method="post">
                            <!--input type="file" name="image"/-->
                            <div class="ButtonBox">
                                <div class="small primary ui input">
                                    <input type="file" name="image">
                                </div>
                                <button type="submit" class="SubmitAccept small primary ui button" id="UpImages">[@LabelButtonAccept]</button>
                                <button type="button" class="SubmitCancel small grey ui button" id="CancelImages">[@LabelButtonCancel]</button>
                            </div>
                             </form>
                            </div>   
                            
                        </div>
                         
                          </div>
                    
                    <div id="TabsStations3">
                            <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormStation]</h4>
                                <form id="NewFormL" method="post" name="NewFormL" action="">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelNumStation]</label>
                                        </div>  
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="NumStation" placeholder="LOCAL_#"/></div>
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelNameStation]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="NameStation" placeholder="Mi Estacion Local"/></div>
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelIndicativeStation]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="IndicativeStation" placeholder="M.E.L."/></div>
                                        </div>
                                    </div>
                                    
                                    <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelSelectIcon]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui selection dropdown">
                                        <input name="UserImage" id="Icon" type="hidden"/>
                                        <i class="dropdown icon"></i>
                                        <div class="default text">[@LabelSelectIconStation]</div>
                                        <div class="menu" id="IconsLocal">[@IconsList]</div>
                                    </div>
                                </div><button class="ui button" id="Examine2"><i class="attach icon"></i></button>
                            </div>
                                    
                                    
                                    
                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="CancelTri small grey ui button">[@LabelButtonCancel]</button>
                                    <button type="button" class="SubmitClear  small ui button" id="ClearTri">[@LabelButtonClear]</button>
                                </div> 
                            </form>
                                <div class="PanelStepM" title="Control parental" id="PanelUpImages2">
                             <form enctype="multipart/form-data" id="FormUploadAjax2" method="post">
                            <!--input type="file" name="image"/-->
                            <div class="ButtonBox">
                                <div class="small primary ui input">
                                    <input type="file" name="image">
                                </div>
                                <button type="submit" class="SubmitAccept small primary ui button" id="UpImages2">[@LabelButtonAccept]</button>
                                <button type="button" class="SubmitCancel small grey ui button" id="CancelImages2">[@LabelButtonCancel]</button>
                            </div>
                             </form>
                            </div> 
                        </div>
                    </div>
                    
                    
                    <div id="TabsStations4">
                        <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormEditStations]:  <span id="NumHeader"></span> - <span id="StationHeader"></span></h4>
                                <div class="BoxEdition">
                                    <div class="ui card">
                                        <div class="image">
                                            <img id="StationLogo">
                                        </div>   
                                         <a class="ui teal huge ribbon label" id="NameStationTarjet"></a>
                                        <div class="extra content CamelCase">
                                            <span>
                                                <i class="slack icon"></i>
                                                <span id="NumStationTarjet"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <form id="EditForm" method="post" name="EditForm" action="">
                                    
                                   <input type="text" hidden name="EditStationId"/>
                                    
                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelEditNumStation]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditNumStation"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelEditNameStation]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditNameStation"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelEditNameIndicative]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditIndicativeStation"/></div>
                                        </div>
                                    </div>
                                    <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelSelectIcon]</label>
                                                    </div>
                                                    <div class="six wide field">
                                    <div class="ui selection dropdown">
                                        <input name="UserImage" id="Icon" type="hidden"/>
                                        <i class="dropdown icon"></i>
                                        <div class="default text">[@LabelSelectIconStation]</div>
                                        <div class="menu" id="IconsLocal">[@IconsList]</div>
                                    </div>
                                </div>
                                                </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="CancelTri small grey ui button" >[@LabelButtonCancel]</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    
                    <div id="TabsStations5">
                        <div class="ui modal">
                            <div class="ui form">
                                <form id="DeleteForm" method="post" name="EditForm" action="">
                                    <h2 class="ui center aligned icon header">
                                        <i class="trash icon"></i>
                                        <div class="content">
                                          Realmente desea Eliminar la estación seleccionada del sistema?  
                                        </div>
                                    </h2>
                                    <input type="text" hidden name="DeleteStationId"/>
                                    <input type="text" hidden name="DeleteNameStation"/>
                                    <input type="text" hidden name="DeleteIndicativeStation"/>
                                    <div class="ButtonBox">
                                        <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                        <button type="button" class="SubmitCancelModalStation small grey ui button">[@LabelButtonCancel]</button>
                                    </div> 
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
             
                <div class="ui inverted active dimmer" id="preloader">
                <div class="ui indeterminate text centered inline loader" id="loader"></div>
                </div>
            </div>
        </div>
        
<script>
    

//ocultamos todos los paneles al inicio para despues poder mostrarlos con la opcion show
    $("#PanelUpImages").hide();
    $("#FormUploadAjax").hide();
    $("#PanelUpImages2").hide();
    $("#FormUploadAjax2").hide();
    //funcion para mostrar la ventana principal al momento que se le de clic al tab1 lista de estaciones
    $("#StationPrincipal").click(function() {
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('.TabsStations').puitabview('select', 0); 
    $('li.List').remove();
   });
    //funcion para limpiar el input de busqueda general de la tanla principal
    $("#ButtonFilterClear").click(function() {
    $("#GlobalFilter").val("");
    $('#GlobalFilter').keyup();
   });
   //funcion del boton para examinar en la computadora la imagen a subir al servidor, una vez que se haga click
   //se mostrara el div FormUploadAjax y Panel UpImages
    $("#Examine").click(function(event) {
    $("#FormUploadAjax").slideToggle('show');
    $("#NewForm").hide();
    $('#PanelUpImages').slideToggle('show');
    event.preventDefault();
   });
   //funcion de boton examinar en estacion local con la funcion de subir imagen al servidor
   $("#Examine2").click(function(event) {
    $("#FormUploadAjax2").slideToggle('show');
    $("#NewFormL").hide();
    $('#PanelUpImages2').slideToggle('show');
    event.preventDefault();
   });
   //boton para canselar alguna accion como crear o editar alguna estacion
    $('#CancelImages2').click(function (event) {
    $("#NewFormL").show();
    $("#FormUploadAjax2").hide();
    $('#PanelUpImages2').slideToggle('hide');
        event.preventDefault();
    });
    //boton para cancelar la subida de imagenes al servidor
    $('#CancelImages').click(function (event) {
    $("#NewForm").show();
    $("#FormUploadAjax").hide();
    $('#PanelUpImages').slideToggle('hide');
        event.preventDefault();
    });
    
    //CODIGO PARA SUBIR ICONO ESTACION TRIBUNE
   $("#UpImages").click(function (e) {
       
        var formData = new FormData(document.getElementById("FormUploadAjax"));
        $.ajax({
            url: "../Querys/Station.php?Option=UploadMultimediaIcon",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                var MessageOption  = response['MessageOption'];
                var MessageSummary = response['MessageSummary'];
                var MessageDetail  = response['MessageDetail'];
                addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                
                
            }
        });
    $("#NewForm").slideToggle('show');
    
    $("#FormUploadAjax").slideToggle('hide');
    $('#PanelUpImages').slideToggle('hide');  
    e.preventDefault();
    });
   //CODIGO PARA SUBIR ICONO ESTACION LOCAL
   $("#UpImages2").click(function (e) {
       
        var formData = new FormData(document.getElementById("FormUploadAjax2"));
        $.ajax({
            url: "../Querys/Station.php?Option=UploadMultimediaIcon2",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                var MessageOption  = response['MessageOption'];
                var MessageSummary = response['MessageSummary'];
                var MessageDetail  = response['MessageDetail'];
                addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                
                
            }
        });
    $("#NewFormL").slideToggle('show');
   
    $("#FormUploadAjax2").slideToggle('hide');
    $('#PanelUpImages2').slideToggle('hide');  
    e.preventDefault();
    });
    $('.imagen').click(function () {
        //alert($(this).attr('src'));
        $(this).attr('style','filter:alpha(opacity=25);-moz-opacity:.25;opacity:.25;');
    });


    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
//creamos la estructura que tendra nuestra tabla principal donde se mostraran las estaciones creadas
var tribune = $.parseJSON('[@TribuneParse]');
    $('#StationList').puidatatable({
            selectionMode: 'single',
            resizableColumns: true,
            columnResizeMode: 'expand',
            paginator: {
                rows: 8
            },
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                //campos de la tabla cat_estacion
                { field: 'numero_estacion', headerText: 'Numero estación', sortable: true, filter: true },
                { field: 'nombre_estacion', headerText: 'Nombre estación',sortable: true, filter: true },
                { field: 'indicativo', headerText: 'Indicativo',sortable: true, filter: true }
                
            ],
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                //seleccionamos el caso SelectStation que viene desde Station.php de la carpeta Querys
                url: '../Querys/Station.php?Option=SelectStation',
                dataType: "json",
                context: this,
                success: function(response) {
                    callback.call(this, response);
                }
            });
        },
        rowSelect: function(event) {
            //al dar click en la tabla se actiban los input desabilitados 3 y 4
            $('.TabsStations').puitabview('enable', 3);
            $('.TabsStations').puitabview('enable', 4);
            
            event.preventDefault();
        }
    });
    
    /* TAB 2: VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
              NumStation: {
                identifier : 'NumStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputNameStation]' } ]
            },
         
            NameStation: {
                identifier : 'NameStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputNameStation]' } ]
            },
            IndicativeStation: {
                identifier : 'IndicativeStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLastNameIndicative]' } ]
            },
            
            //EDITAR
            EditNumStation: {
                identifier : 'NumStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputNumStation]' } ]
            },
            EditNameStation: {
                identifier : 'NameStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputNameStation]' } ]
            },
            EditIndicativeStation: {
                identifier : 'IndicativeStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLastNameIndicative]' } ]
            }
            
            },
          inline : true,
          on     : 'blur'
          
        })
      ;
    
    
    function Valor(val){
        console.log(tribune.indicativo);
        for(var i = 0; i < tribune.length; i++){
            if(val === tribune[i]['numero_estacion']){
                $("input[name='NameStation']").val(tribune[i]['nombre_estacion']);
                $("input[name='IndicativeStation']").val(tribune[i]['indicativo']);
            }
        }
    }
    
    /* TAB 2: INSERTAR DATOS DE FORMULARIO EN LA BD*/
    $('#NewForm').submit(function (event) {
        // Valida si todos los inputs del formulario han sido llenados
        var MinInputs = 1;
        var ValidateInputs = 0;
        var data = $('#NewForm').serializeArray(); 
            $.each(data, function(i, field){
                if(!field.value[i]){
                    addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                } 
                else {
                    ValidateInputs ++;
                } 
            });
//se selecciona el caso InsertStation para insertar la estacion en la tabla cat_estacion
            if(ValidateInputs >= MinInputs){
                $.ajax({
                    type: "POST",
                    url: "../Querys/Station.php?Option=InsertStation",
                    data: data,
                    success: function (response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#StationList').puidatatable('reload');
                        setTimeout(function(){ 
                            acceptForm();
                        }, 3000);
                        $('.TabsStations').puitabview('select', 0); 
                    }
                });
            } else {
                // Do nothing
            }
        event.preventDefault();
    });     
    //formulario de alta de estaciones locales con el id NewFormL
    $('#NewFormL').submit(function (event) {
        // Valida si todos los inputs del formulario han sido llenados
        var MinInputs = 1;
        var ValidateInputs = 0;
        var data = $('#NewFormL').serializeArray(); 
            $.each(data, function(i, field){
                if(!field.value[i]){
                    addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                } 
                else {
                    ValidateInputs ++;
                } 
            });

            if(ValidateInputs >= MinInputs){
                $.ajax({
                    type: "POST",
                    url: "../Querys/Station.php?Option=InsertStation",
                    data: data,
                    success: function (response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#StationList').puidatatable('reload');
                        setTimeout(function(){ 
                            acceptForm();
                        }, 3000);
                        $('.TabsStations').puitabview('select', 0);
                        $('.TabsStations').puitabview('disable', 3);
                        $('.TabsStations').puitabview('disable', 4);
                    }
                });
            } else {
                // Do nothing
            }
        event.preventDefault();
    });     
    
    /* TAB 4: EDITAR Canal SELECCIONADO EditChannel */
    $('#EditForm').submit(function (event) {
        var data = $('#EditForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Station.php?Option=setStationEdit",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#StationList').puidatatable('reload');
                    setTimeout(function(){ 
                        acceptForm();
                    }, 3000);
                    $('.TabsStations').puitabview('select', 0);
                    $('.TabsStations').puitabview('disable', 3);
                    $('.TabsStations').puitabview('disable', 4);
                }
            });
        event.preventDefault();
    });  
    // Mandamos llamar los input desde name= "" y le asignamos el valor de lo que en ese momento contiene nuestra tabla de la base de datos.  
    var ChannelsLogosURL = "[@ChannelsLogosURL]";
     $('#EditStation').click(function () {
        var selection = $('#StationList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                // nombres de inputs y nombre de varables en nuestra base de datos
                $("input[name='EditStationId']").val(selection[0].id_estacion);
                $("input[name='EditNumStation']").val(selection[0].numero_estacion);
                $("input[name='EditNameStation']").val(selection[0].nombre_estacion);
                $("input[name='EditIndicativeStation']").val(selection[0].indicativo);
                
                $("#NumHeader").text(selection[0].numero_estacion);
                $("#StationHeader").text(selection[0].nombre_estacion);
                $("#NumStationTarjet").text(selection[0].numero_estacion);
                $("#NameStationTarjet").text(selection[0].nombre_estacion);
                $("#StationLogo").attr('src', ChannelsLogosURL + selection[0].logo); 
            }else{ }
        } else {
            addMessage('[@OptionSelectUser]', { summary: '[@SummarySelectUser]', detail: '[@MessageSelectStation]' });
        }
        
    });
    
    /* TAB 5: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                //
                url: "../Querys/Station.php?Option=StationDelet",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#StationList').puidatatable('reload');
                    $('form').form('clear');
                    $('#Message').puimessages('clear');
                    $('.TabsStations').puitabview('select', 0);
                    $('.TabsStations').puitabview('disable', 3);
                    $('.TabsStations').puitabview('disable', 4);
                    $("#GlobalFilter").val("");
                    $('#GlobalFilter').keyup();
                    $('li.List').remove();
                    setTimeout(function(){ 
                        acceptForm();
                    }, 2000);
                   
                }
            });
        event.preventDefault();
    }); 
    
    
    $('#DeleteStation').click(function () {
    var selection = $('#StationList').puidatatable('getSelection');
    if (selection.length === 1) {
        if (selection[0]) {
            //Valida el estatus del usuario [Un usuario inhabilitado(2) no puede ser eliminado ]
            if(selection[0]){
                $('.ui.modal')
                    .modal('setting', 'closable', false)
                    .modal('show');
                $("input[name='DeleteStationId']").val(selection[0].id_estacion);
                $("input[name='DeleteNameStation']").val(selection[0].nombre_estacion);
                $("input[name='DeleteIndicativeStation']").val(selection[0].numero_estacion);
                
            }
        }
    } else {
        addMessage('[@OptionSelectUser]', { summary: '[@SummarySelectUser]', detail: '[@MessageSelectStation]' });
    }
});
  
</script>