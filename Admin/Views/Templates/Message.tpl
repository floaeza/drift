       
<div class="Container thirteen wide column ContainerLayout">
    <div class="ui segment">
    <h2 class="ui header">
        <i class="comment grey icon"></i>
        <div class="content">
          [@LabelTitleSubmenuMessages]
          <div class="sub header">[@LabelSubTitleSubmenuMessages]</div>
        </div>
    </h2>

    <div class="Tabs">
        <ul>
            <li>
                <a class="ui card" href="#Tab1" id="tab1">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="blue comment icon"></i>
                            <i class="blue corner list icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabMessagesList]
                        <div class="sub header">[@LabelSubListMessages]</div>
                        </div>
                    </h5>
                </a>
            </li>
            <li>
                <a class="ui card" href="#Tab2">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="teal comment icon"></i>
                            <i class="teal corner add icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabCreateMessages]
                        <div class="sub header">[@LabelSubCreateMessages]</div>
                        </div>
                    </h5>
                </a>
            </li>
            <li>
                <a class="ui card" href="#Tab3" id="EditMessages">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="green comment icon"></i>
                            <i class="green corner pencil icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabEditMessages]
                        <div class="sub header">[@LabelSubEditMessages]</div>
                        </div>
                    </h5>
                </a>
            </li>
            <li>
                <a class="ui card" href="#Tab4" id="DeleteMessages">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="orange comment icon"></i>
                            <i class="orange corner trash icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabDeleteMessages]
                        <div class="sub header">[@LabelSubDeleteMessages]</div>
                        </div>
                    </h5>
                </a>
            </li>
        </ul>
        <div>                
            <div id="Tab1" >
                <div class="Filter ui icon input"id="ButtonClear">
                    <div>
                        <input class="Inputs" id="GlobalFilter" placeholder="[@LabelPlaceHolderFilter]"/>
                        <i class="search icon"></i>
                    </div>

                    <div>
                        <button class="circular ui icon button" type="button" id="ButtonFilterClear">
                            <i class="icon trash"></i>
                        </button>
                    </div>
                </div>

                <div class="ui clearing divider"></div>
                <div class="TableList" id="MessagesList"></div>
            </div>   

            <div id="Tab2">
                <div class="ui form">
                    <div class="ui segment">
                    <h4 class="ui dividing header">[@LabelHeaderFormMessages]</h4>
                    <div class="BoxEdition" id="card">
                        <div class="ui blue card">
                            <div class="image">
                                <img id="UsersAvatar">
                            </div>
                            
                            <div class="content">
                                <a class="ui teal ribbon label">[@LabelMessagesDestinationData]</a>
                                <div>&nbsp;</div>
                                <span class="header" id="CodeMember">[@LabelMemberCode]</span>
                                <div class="meta">
                                    <span class="header" id="Title">title</span>
                                    <span class="header" id="Name"></span>
                                    <span class="header" id="LastName"></span>
                                </div>
                              <div class="description">
                                  <span id="Description"></span>
                                  <span id="LocationCode"></span>
                              </div>
                            </div>
                            <div class="extra content CamelCase">
                              <span>
                                [@LabelEditStatusLocation]
                                <span id="Status"></span>
                                <br>
                                [@LabelEditModule]
                                <span id="Module"></span>
                              </span>
                            </div>
                        </div>
                    </div>
                    
                        <form id="NewForm" method="post" name="NewForm" action="">
                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesAddressee]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui search dropdown" name="MessagesAddressee" id="MessagesAddressee">
                                        <option value="">[@LabelMessagesAddresseeOptionList]</option>
                                        [@LocationOptionList]
                                    </select>
                                </div>
                            </div>

                           <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesSubject]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><input type="text" placeholder="[@LabelMessagesSubjectPlace]" name="MessagesSubject" id="MessagesSubject"/></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesContent]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><textarea type="text" placeholder="[@LabelMessagesContentPlace]" name="MessagesContent" id="MessagesContent"></textarea></div>
                                    <div id="textarea_feedback"></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesDate]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui calendar date" id="date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" placeholder="Date/Time" name="MessagesDate" id="MessagesDate">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesType]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui dropdown sel" name="MessagesType" id="MessagesType">
                                        <option value="">[@LabelSelectMessagesType]</option>
                                        [@MessageOptionList]
                                    </select>
                                </div>
                            </div>
                            
                            <!--div class="fields">
                                <div class=" six wide field">
                                    <label>fecha y hora inicial:</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui calendar date" id="date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" placeholder="Date/Time" name="MessagesDate" id="MessagesDate">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                                                        
                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesDate]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui calendar date" id="date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" placeholder="Date/Time" name="MessagesDate" id="MessagesDate">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="six wide field">
                                    <label>Tipo de mensaje:</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui dropdown sel" name="MessagesType" id="MessagesType">
                                        <option value="">Seleccione un tipo de mensaje</option>
                                        [@MessageOptionList]
                                    </select>
                                </div>
                            </div>
                            
                            <div class="fields">
                                <div class=" six wide field">
                                    <label>Repeat By:</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui dropdown sel" name="MessagesType" id="MessagesType">
                                        <option value="">Seleccione un tipo de mensaje</option>
                                        [@MessageOptionList]
                                    </select>
                                </div>
                            </div-->
                            
                            <div class="ButtonBox">
                                <button type="submit" class="SubmitSend small primary ui button">[@LabelButtonSend]</button>
                                <button type="button" class="SubmitCancelSend small grey ui button" id="Cancel">[@LabelButtonCancel]</button>
                                <button type="button" class="SubmitClearMessage  small ui button">[@LabelButtonClear]</button>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
            
            <div id="Tab3">
                <div class="ui form">
                    <div class="ui segment">
                    <h4 class="ui dividing header">[@LabelHeaderFormMessages]</h4>
                    <div class="BoxEdition" id="editcard">
                        <div class="ui blue card">
                            <div class="image">
                                <img id="EditUsersAvatar">
                            </div>
                            <div class="content">
                                <a class="ui teal ribbon label">[@LabelMessagesDestinationData]</a>
                                <div>&nbsp;</div>
                                <span class="header" id="EditCodeMember">[@LabelMemberCode]</span>
                                <div class="meta">
                                    <span class="header" id="EditTitle">title</span>
                                    <span class="header" id="EditName"></span>
                                    <span class="header" id="EditLastName"></span>
                                </div>
                              <div class="description">
                                  <span id="EditDescription"></span>
                                  <span id="EditLocationCode"></span>
                              </div>
                            </div>
                            <div class="extra content CamelCase">
                              <span>
                                <br>
                                [@LabelEditStatusLocation]
                                <span id="EditStatus"></span>
                                <br>
                                [@LabelEditModule]
                                <span id="EditModule"></span>
                              </span>
                            </div>
                        </div>
                    </div>
                    
                        <form id="EditForm" method="post" name="NewForm" action="">
                            <input type="text" hidden name="IdMessagesEdit" id="IdMessagesEdit"/>
                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesAddressee]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui search disabled dropdown" name="MessagesAddresseeEdit" id="MessagesAddresseeEdit">
                                        <option value="">[@LabelMessagesAddresseeOptionList]</option>
                                        [@LocationOptionList]
                                    </select>
                                </div>
                            </div>

                           <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesSubject]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><input type="text" name="MessagesSubjectEdit" id="MessagesSubjectEdit"/></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesContent]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><textarea type="text" name="MessagesContentEdit" id="MessagesContentEdit"></textarea></div>
                                    <div id="textarea_feedbackEdit"></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesDate]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui calendar edit" id="date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" placeholder="Date/Time" name="MessagesDateEdit" id="MessagesDateEdit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesType]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui dropdown sel" name="MessagesTypeEdit" id="MessagesTypeEdit">
                                        <option value="">[@LabelSelectMessagesType]</option>
                                        [@MessageOptionList]
                                    </select>
                                </div>
                            </div>

                            <div class="ButtonBox">
                                <button type="submit" class="SubmitSend small primary ui button">[@LabelButtonSend]</button>
                                <button type="button" class="SubmitCancelSend small grey ui button" id="CancelEdit">[@LabelButtonCancel]</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="Tab4">
                <div class="ui modal">
                    <div class="ui form">
                        <form id="DeleteForm" method="post" name="EditForm" action="">
                            <h2 class="ui center aligned icon header">
                                <i class="trash icon"></i>
                                <div class="content">
                                  Realmente desea eliminar el mensaje seleccionado del sistema?
                                  <div class="sub header">Al eliminar el mensaje ya no esta disponible para el member</div>
                                </div>
                            </h2>
                            <input type="text" hidden name="DeleteMessagesId"/>
                            <div class="ButtonBox">
                                <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                <button type="button" class="SubmitCancelModal small grey ui button">[@LabelButtonCancel]</button>
                            </div>
                        </form>
                    </div>
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
    
     $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
    /* TAB 1: LISTA DE USUARIOS*/
    $('#MessagesList').puidatatable({
            selectionMode: 'single',
            resizableColumns: true,
            columnResizeMode: 'expand',
            paginator: {
                rows: 10
            },
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                { field: 'nombre_usuario', headerText: 'Emisor', sortable: true, filter: true },
                { field: 'destinatario', headerText: 'Destinatario',sortable: true, filter: true },
                { field: 'asunto', headerText: 'Asunto',sortable: true, filter: true },
                { field: 'fecha_envio', headerText: 'Enviado el',sortable: true, filter: true },
                { field: 'id_estatus_lectura', headerText: 'Estatus',sortable: true, filter: true,
                    content: function(response) {
                        if(response.id_estatus_lectura === '1') {
                             var color = '#92ce67';
                             var texto = '  Leido';
                             var icon = '<i class="'+color+' fa fa-envelope-open"></i>';
                        }
                        else if(response.id_estatus_lectura === '2') {
                             var color = '#00ACC8';
                             var texto = '  Sin Leer';
                             var icon = '<i class="'+color+' fa fa-envelope"></i>';
                        }
                        return $('<span style="color:'+ color +'; text-transform: uppercase; ">'+icon+'<b>'+ texto +'</b></span>');
                    }
                },
                { field: 'id_tipo_mensaje', headerText: 'Tipo',sortable: true, filter: true,
                    content: function(response) {
                        if(response.tipo_mensaje === 'Info') {
                             var color = '#4083b4';
                             var icon = '<i class="'+color+' fa fa-exclamation-circle"></i>';
                        }
                        else if(response.tipo_mensaje === 'Warn') {
                             var color = '#e96e6e';
                             var icon = '<i class="'+color+' fa fa-exclamation-triangle"></i>';
                        }
                        else if(response.tipo_mensaje === 'Promo') {
                             var color = '#5fad5f';
                             var icon = '<i class="'+color+' fa fa-product-hunt"></i>';
                        }
                        return $('<span style="color:'+ color +'; text-transform: uppercase; ">'+icon+'<b> '+ response.tipo_mensaje +'</b></span>');
                    }
                }
            ],
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Messages.php?Option=SelectMessages',
                dataType: "json",
                context: this,
                success: function(response) {
                    callback.call(this, response);
                }
            });
        },
        rowSelect: function(event) {
            $('.Tabs').puitabview('enable', 2);
            $('.Tabs').puitabview('enable', 3);
            event.preventDefault();
        }
    });
    
    $("#ButtonFilterClear").click(function() {  
        $("#GlobalFilter").val("");
        $('#GlobalFilter').keyup();
        $('#MessagesList').puidatatable('reload');
    });
    
    /* TAB 2: VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
            MessagesAddressee: {
                identifier : 'MessagesAddressee',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesAddressee]' } ]
            },
            MessagesSubject: {
                identifier : 'MessagesSubject',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesSubject]' } ]
            },
            MessagesContent: {
                identifier : 'MessagesContent',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesContent]' } ]
            },
            MessagesDate: {
                identifier : 'MessagesDate',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesDate]' } ]
            }
          },
          inline : true,
          on     : 'blur'

        })
      ;

    var AvatarsURL = "[@AvatarsURL]";
    var UserId = '[@UserId]';
    /* TAB 2: INSERTAR DATOS DE FORMULARIO EN LA BD*/
    $('#NewForm').submit(function (event) {
        var destino = $('#MessagesAddressee').serializeArray();
        var asunto = $('#MessagesSubject').serializeArray();
        var contenido = $('#MessagesContent').serializeArray();
        var tipo = $('#MessagesType').serializeArray();
        var fecha = $('#MessagesDate').val();
        var date = fecha.slice(0, -5);
        var hour= fecha.substr(-5,5);
        var f = new Date(date).toISOString(date).slice(0, 10).replace('T', ' ');
        var CompleteDate = f+' '+hour+':00';
        //console.log(CompleteDate);
        if(destino[0]['value'] != '' && asunto[0]['value'] != '' && contenido[0]['value'] != '' && tipo[0]['value'] != ''  && CompleteDate != '' && UserId > 0){
            $.ajax({
                type: "POST",
                url: "../Querys/Messages.php?Option=InsertMessages",
                data: { destino: destino[0]['value'], asunto: asunto[0]['value'], contenido: contenido[0]['value'], tipo: tipo[0]['value'], fecha: CompleteDate, usuario: UserId },
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#MessagesList').puidatatable('reload');
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('.Tabs').puitabview('select', 0);
                    setTimeout(function(){
                        acceptForm();
                    }, 3000);
                }
            });
        } else {
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
        event.preventDefault();
    });

    /* TAB 3: EDITAR REGISTRO SELECCIONADO */
    $('#EditForm').submit(function (event) {
        var mensaje = $('#IdMessagesEdit').serializeArray();
        var asunto = $('#MessagesSubjectEdit').serializeArray();
        var contenido = $('#MessagesContentEdit').serializeArray();
        var tipo = $('#MessagesTypeEdit').serializeArray();
        var fecha = $('#MessagesDateEdit').val();
        var date = fecha.slice(0, -5);
        var hour= fecha.substr(-5,5);
        //console.log(date);
        var f = new Date(date).toISOString(date).slice(0, 10).replace('T', ' ');
        var CompleteDate = f+' '+hour+':00';
        //console.log(fecha);
        if(mensaje[0]['value'] != '' && asunto[0]['value'] != '' && contenido[0]['value'] != '' && tipo[0]['value'] != '' && CompleteDate != '' && UserId > 0){
            $.ajax({
                type: "POST",
                url: "../Querys/Messages.php?Option=UpdateMessages",
                data: { IdMensaje: mensaje[0]['value'], asunto: asunto[0]['value'], contenido: contenido[0]['value'], tipo: tipo[0]['value'], fecha: CompleteDate, usuario: UserId },
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#MessagesList').puidatatable('reload');
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('.Tabs').puitabview('select', 0);
                    setTimeout(function(){
                        acceptForm();
                    }, 3000);
                }
            });
        } else {
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
        event.preventDefault();
    });

     $('#EditMessages').click(function () {
        var selection = $('#MessagesList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                if(selection[0].id_estatus_lectura === "1"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('#MessagesList').puidatatable('reload');
                   addMessage('[@OptionDisableMessages]', { summary: '[@SummaryDisableMessages]', detail: '[@MessageDisableMessages]' });
                }else {
                    var fecha = selection[0].fecha_fin_envio;
                    var cuerpo = selection[0].cuerpo_mensaje;
                    $("input[name='IdMessagesEdit']").val(selection[0].id_mensaje);
                    $("#MessagesAddresseeEdit").dropdown("refresh");
                    $("#MessagesAddresseeEdit").dropdown("set selected", selection[0].destinatario);
                    $("input[name='MessagesSubjectEdit']").val(selection[0].asunto);
                    $("textarea#MessagesContentEdit").val(selection[0].cuerpo_mensaje);
                    $('#textarea_feedbackEdit').html((text_max-cuerpo.length) + ' characters remaining');
                    $(".ui.calendar.edit").calendar('set date', new Date( fecha.substr(0,4), fecha.substr(5,2), fecha.substr(8,2), fecha.substr(11,2), fecha.substr(14,2), fecha.substr(17,2) ));
                    $.ajax({
                        type: "POST",
                        url: '../Querys/Messages.php?Option=getMemberData',
                        data: { data: selection[0].destinatario },
                        success: function(response) {
                            var data_array = $.parseJSON(response);
                            //console.log(data_array);
                            $("#EditCodeMember").text(data_array[0]['codigo_miembro']);
                            $("#EditTitle").text(data_array[0]['titulo_miembro']);
                            $("#EditName").text(data_array[0]['nombre_miembro']);
                            $("#EditLastName").text(data_array[0]['apellido_miembro']);
                            $("#EditDescription").text(data_array[0]['descripcion_locacion']);
                            $("#EditLocationCode").text(data_array[0]['codigo_locacion']);
                            $("#EditStatus").text(data_array[0]['descripcion_estatus_locacion']);
                            $("#EditModule").text(data_array[0]['nombre_modulo']);
                            $("#EditUsersAvatar").attr('src', AvatarsURL + 'default.png');
                        }
                    });
                    $("#MessagesTypeEdit").dropdown("refresh");
                    $("#MessagesTypeEdit").dropdown("set selected", selection[0].id_tipo_mensaje);
                }
            }
        } else {
            addMessage('[@OptionSelectMessages]', { summary: '[@SummarySelectMessages]', detail: '[@MessageSelectMessages]' });
        }

    });

    /* TAB 4: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Messages.php?Option=DeleteMessages",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('#MessagesList').puidatatable('reload');
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    });

    $('#DeleteMessages').click(function () {
        var selection = $('#MessagesList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $('.ui.modal')
                    .modal('setting', 'closable', false)
                    .modal('show');
                $("input[name='DeleteMessagesId']").val(selection[0].id_mensaje);
            }
        } else {
            addMessage('[@OptionSelectMessages]', { summary: '[@SummarySelectMessages]', detail: '[@MessageSelectMessages]' });
        }
    });

    $('#CancelEdit').click(function (){
        $('#MessagesList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('select', 0);
    });
    
    $('#Cancel').click(function (){
        $('#MessagesList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('select', 0);
    });
    
    $('#tab1').click(function (){
        $('#MessagesList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('select', 0);
    });

    $('#MessagesAddressee').change(function(e){
        var data = $(this).val();
        if(data !== ''){
            $.ajax({
                type: "POST",
                url: '../Querys/Messages.php?Option=getMemberData',
                data: { data: data },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    //console.log(data_array);
                    $("#CodeMember").text(data_array[0]['codigo_miembro']);
                    $("#Title").text(data_array[0]['titulo_miembro']);
                    $("#Name").text(data_array[0]['nombre_miembro']);
                    $("#LastName").text(data_array[0]['apellido_miembro']);
                    $("#Description").text(data_array[0]['descripcion_locacion']);
                    $("#LocationCode").text(data_array[0]['codigo_locacion']);
                    $("#Status").text(data_array[0]['descripcion_estatus_locacion']);
                    $("#Module").text(data_array[0]['nombre_modulo']);
                    $("#UsersAvatar").attr('src', AvatarsURL + 'default.png');
                }
            });
        }else{ console.log('data is null: '+data); }
        
        e.preventDefault();
    });
    
    var text_max = 255;
    $('#textarea_feedback').html(text_max + ' characters remaining');
    
    $('#MessagesContent').keyup(function() {
        var text_length = $('#MessagesContent').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
    
    $('#MessagesContentEdit').keyup(function() {
        var text_length = $('#MessagesContentEdit').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedbackEdit').html(text_remaining + ' characters remaining');
    });

    $('#MessagesType').change(function(e){
        var data = $(this).val();
        if(data === '1'){
            $('.sel').css({ 'color':'blue','background':'#edebe3' });
        }else if(data === '2'){ 
            $('.sel').css({ 'color':'red','background':'#edebe3' });
        }else if(data === '3'){
            $('.sel').css({ 'color':'green','background':'#edebe3' });
        }

        e.preventDefault();
    });
    
    $('#MessagesTypeEdit').change(function(e){
        var data = $(this).val();
        if(data === '1'){
            $('.sel').css({ 'color':'blue','background':'#edebe3' });
        }else if(data === '2'){ 
            $('.sel').css({ 'color':'red','background':'#edebe3' });
        }else if(data === '3'){
            $('.sel').css({ 'color':'green','background':'#edebe3' });
        }

        e.preventDefault();
    });

</script>
