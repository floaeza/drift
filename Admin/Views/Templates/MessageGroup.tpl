       
<div class="Container thirteen wide column ContainerLayout">
    <div class="ui segment">
    <h2 class="ui header">
        <i class="comments grey icon"></i>
        <div class="content">
          [@LabelTitleSubmenuMessagesGroup]
          <div class="sub header">[@LabelSubTitleSubmenuMessagesGroup]</div>
        </div>
    </h2>

    <div class="Tabs">
        <ul>
            <li>
                <a class="ui card" href="#Tab1" id="tab1">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="blue comments icon"></i>
                            <i class="blue corner list icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabMessagesGroupList]
                        <div class="sub header">[@LabelSubListMessagesGroup]</div>
                        </div>
                    </h5>
                </a>
            </li>
            <li>
                <a class="ui card" href="#Tab2">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="teal comments icon"></i>
                            <i class="teal corner add icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabCreateMessagesGroup]
                        <div class="sub header">[@LabelSubCreateMessagesGroup]</div>
                        </div>
                    </h5>
                </a>
            </li>
            <li>
                <a class="ui card" href="#Tab3" id="EditMessagesGroup">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="green comments icon"></i>
                            <i class="green corner pencil icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabEditMessagesGroup]
                        <div class="sub header">[@LabelSubEditMessagesGroup]</div>
                        </div>
                    </h5>
                </a>
            </li>
            <li>
                <a class="ui card" href="#Tab4" id="DeleteMessagesGroup">
                    <h5 class="ui header">
                        <i class="big icons">
                            <i class="orange comments icon"></i>
                            <i class="orange corner trash icon"></i>
                        </i>
                        <div class="content">
                        [@LabelTabDeleteMessagesGroup]
                        <div class="sub header">[@LabelSubDeleteMessagesGroup]</div>
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
                <div class="TableList" id="MessagesGroupList"></div>
            </div>   

            <div id="Tab2">
                <div class="ui form">
                    <div class="ui segment">
                    <h4 class="ui dividing header">[@LabelHeaderFormMessagesGroup]</h4>
                    <div class="BoxEdition" id="card">
                        
                    </div>
                    
                        <form id="NewForm" method="post" name="NewForm" action="">
                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesGroupAddressee]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui search dropdown" name="MessagesGroupAddressee" id="MessagesGroupAddressee">
                                        <option value="">[@LabelMessagesGroupAddresseeOptionList]</option>
                                        [@GroupOptionList]
                                    </select>
                                </div>
                            </div>

                           <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesGroupSubject]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><input type="text" placeholder="[@LabelMessagesGroupSubjectPlace]" name="MessagesGroupSubject" id="MessagesGroupSubject"/></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesGroupContent]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><textarea type="text" placeholder="[@LabelMessagesGroupContentPlace]" name="MessagesGroupContent" id="MessagesGroupContent"></textarea></div>
                                    <div id="textarea_feedback"></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesGroupDate]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui calendar date" id="date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" placeholder="Date/Time" name="MessagesGroupDate" id="MessagesGroupDate">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesGroupType]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui dropdown sel" name="MessagesGrouType" id="MessagesGroupType">
                                        <option value="">[@LabelSelectMessagesGroupType]</option>
                                        [@MessageOptionList]
                                    </select>
                                </div>
                            </div>
                            
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
                    <h4 class="ui dividing header">[@LabelHeaderFormMessagesGroup]</h4>
                    <div class="BoxEdition" id="editcard">
                        
                    </div>
                    
                        <form id="EditForm" method="post" name="NewForm" action="">
                            <input type="text" hidden name="IdMessagesGroupEdit" id="IdMessagesGroupEdit"/>
                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesGroupAddressee]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui search disabled dropdown" name="MessagesGroupAddresseeEdit" id="MessagesGroupAddresseeEdit">
                                        <option value="">[@LabelMessagesGroupAddresseeOptionList]</option>
                                        [@GroupOptionList]
                                    </select>
                                </div>
                            </div>

                           <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesGroupSubject]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><input type="text" name="MessagesGroupSubjectEdit" id="MessagesGroupSubjectEdit"/></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesGroupContent]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><textarea type="text" name="MessagesGroupContentEdit" id="MessagesGroupContentEdit"></textarea></div>
                                    <div id="textarea_feedbackEdit"></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelMessagesGroupDate]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui calendar edit" id="date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" placeholder="Date/Time" name="MessagesGroupDateEdit" id="MessagesGroupDateEdit">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelMessagesGroupType]</label>
                                </div>
                                <div class="six wide field">
                                    <select class="ui dropdown sel" name="MessagesGroupTypeEdit" id="MessagesGroupTypeEdit">
                                        <option value="">[@LabelSelectMessagesGroupType]</option>
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
                            <input type="text" hidden name="DeleteMessagesGroupId"/>
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
    $('#MessagesGroupList').puidatatable({
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
                { field: 'nombre_grupo', headerText: 'Destinatario',sortable: true, filter: true },
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
                }
            ],
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/MessagesGroup.php?Option=SelectMessagesGroup',
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
        $('#MessagesGroupList').puidatatable('reload');
    });
    
    /* TAB 2: VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
            MessagesGroupAddressee: {
                identifier : 'MessagesGroupAddressee',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupAddressee]' } ]
            },
            MessagesGroupSubject: {
                identifier : 'MessagesGroupSubject',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupSubject]' } ]
            },
            MessagesGroupContent: {
                identifier : 'MessagesGroupContent',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupContent]' } ]
            },
            MessagesGroupDate: {
                identifier : 'MessagesGroupDate',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupDate]' } ]
            },
            MessagesGroupAddresseeEdit: {
                identifier : 'MessagesGroupAddresseeEdit',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupAddressee]' } ]
            },
            MessagesGroupSubjectEdit: {
                identifier : 'MessagesGroupSubjectEdit',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupSubject]' } ]
            },
            MessagesGroupContentEdit: {
                identifier : 'MessagesGroupContentEdit',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupContent]' } ]
            },
            MessagesGroupDateEdit: {
                identifier : 'MessagesGroupDateEdit',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMessagesGroupDate]' } ]
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
        var destino = $('#MessagesGroupAddressee').serializeArray();
        var asunto = $('#MessagesGroupSubject').serializeArray();
        var contenido = $('#MessagesGroupContent').serializeArray();
        var tipo = $('#MessagesGroupType').serializeArray();
        var fecha = $('#MessagesGroupDate').val();
        var date = fecha.slice(0, -5);
        var hour= fecha.substr(-5,5);
        var f = new Date(date).toISOString(date).slice(0, 10).replace('T', ' ');
        var CompleteDate = f+' '+hour+':00';
        //console.log(CompleteDate);
        if(destino[0]['value'] != '' && asunto[0]['value'] != '' && contenido[0]['value'] != '' && tipo[0]['value'] != '' && CompleteDate != '' && UserId > 0){
            $.ajax({
                type: "POST",
                url: "../Querys/MessagesGroup.php?Option=InsertMessagesGroup",
                data: { destino: destino[0]['value'], asunto: asunto[0]['value'], contenido: contenido[0]['value'], tipo: tipo[0]['value'], fecha: CompleteDate, usuario: UserId },
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#MessagesGroupList').puidatatable('reload');
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
        var mensaje = $('#IdMessagesGroupEdit').serializeArray();
        var asunto = $('#MessagesGroupSubjectEdit').serializeArray();
        var contenido = $('#MessagesGroupContentEdit').serializeArray();
        var tipo = $('#MessagesGroupTypeEdit').serializeArray();
        var fecha = $('#MessagesGroupDateEdit').val();
        var date = fecha.slice(0, -5);
        var hour= fecha.substr(-5,5);
        var f = new Date(date).toISOString(date).slice(0, 10).replace('T', ' ');
        var CompleteDate = f+' '+hour+':00';
        //console.log(contenido);
        if(mensaje[0]['value'] != '' && asunto[0]['value'] != '' && contenido[0]['value'] != '' && tipo[0]['value'] != '' && CompleteDate != '' && UserId > 0){
            $.ajax({
                type: "POST",
                url: "../Querys/MessagesGroup.php?Option=UpdateMessagesGroup",
                data: { IdMensaje: mensaje[0]['value'], asunto: asunto[0]['value'], contenido: contenido[0]['value'], tipo: tipo[0]['value'], fecha: CompleteDate, usuario: UserId },
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#MessagesGroupList').puidatatable('reload');
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

     $('#EditMessagesGroup').click(function () {
         $(".BoxEdition").html("");
        var selection = $('#MessagesGroupList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                if(selection[0].id_estatus_lectura === "1"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('#MessagesGroupList').puidatatable('reload');
                   addMessage('[@OptionDisableMessagesGroup]', { summary: '[@SummaryDisableMessagesGroup]', detail: '[@MessageDisableMessagesGroup]' });
                }else {
                    UpdateMembersGroup(selection[0].id_grupo);
                    var fecha = selection[0].fecha_fin_envio;
                    var cuerpo = selection[0].cuerpo_mensaje;
                    $("input[name='IdMessagesGroupEdit']").val(selection[0].id_mensaje);
                    $("#MessagesGroupAddresseeEdit").dropdown("refresh");
                    $("#MessagesGroupAddresseeEdit").dropdown("set selected", selection[0].id_grupo);
                    $("input[name='MessagesGroupSubjectEdit']").val(selection[0].asunto);
                    $("textarea#MessagesGroupContentEdit").val(selection[0].cuerpo_mensaje);
                    $('#textarea_feedbackEdit').html((text_max-cuerpo.length) + ' characters remaining');
                    $(".ui.calendar.edit").calendar('set date', new Date( fecha.substr(0,4), Number(fecha.substr(5,2))-1, fecha.substr(8,2), fecha.substr(11,2), fecha.substr(14,2), fecha.substr(17,2) ));
                    $("#MessagesGroupTypeEdit").dropdown("refresh");
                    $("#MessagesGroupTypeEdit").dropdown("set selected", selection[0].id_tipo_mensaje);
                }
            }
        } else {
            addMessage('[@OptionSelectMessagesGroup]', { summary: '[@SummarySelectMessagesGroup]', detail: '[@MessageSelectMessagesGroup]' });
        }

    });

    /* TAB 4: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/MessagesGroup.php?Option=DeleteMessagesGroup",
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
                    $('#MessagesGroupList').puidatatable('reload');
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    });

    $('#DeleteMessagesGroup').click(function () {
        $(".BoxEdition").html("");
        var selection = $('#MessagesGroupList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $('.ui.modal')
                    .modal('setting', 'closable', false)
                    .modal('show');
                $("input[name='DeleteMessagesGroupId']").val(selection[0].id_mensaje);
            }
        } else {
            addMessage('[@OptionSelectMessagesGroup]', { summary: '[@SummarySelectMessagesGroup]', detail: '[@MessageSelectMessagesGroup]' });
        }
    });

    $('#CancelEdit').click(function (){
        $(".BoxEdition").html("");
        $('#MessagesGroupList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('select', 0);
    });
    
    $('#Cancel').click(function (){
        $(".BoxEdition").html("");
        $('#MessagesGroupList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('select', 0);
    });
    
    $('#tab1').click(function (){
        $(".BoxEdition").html("");
        $('#MessagesGroupList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('select', 0);
    });

    $('#MessagesGroupAddressee').change(function(e){
        var data = $(this).val();
        $(".BoxEdition").html("");
        if(data !== ''){
            var Members = "";
            $.ajax({
                type: "POST",
                async:false,
                url: '../Querys/MemberGroup.php?Option=SelectGroupMembers',
                data: { IDGroup: data },
                success: function(response2) {
                    var data_array = $.parseJSON(response2);
                    for(var Item = 0; Item < data_array.length; Item++){
                        Members += '<div class="ui cards">'+
                                        '<div class="blue card">'+
                                          '<div class="content">'+
                                            '<img class="right floated mini ui image" src="'+AvatarsURL+'default.png">'+
                                            '<div class="header">'+
                                              data_array[Item].titulo_miembro+' '+data_array[Item].nombre_miembro+' '+data_array[Item].apellido_miembro+
                                            '</div>'+
                                            '<div class="meta"><b>'+
                                              data_array[Item].codigo_miembro+
                                            '</b></div>'+
                                            '<div class="description">'+
                                              'Location: '+data_array[Item].codigo_locacion+' <br> Mail: '+data_array[Item].correo_miembro+
                                            '</div>'+
                                          '</div>'+
                                        '</div>'+
                                    '</div>';
                    }
                    $(".BoxEdition").append(Members);
                }
            });
        }else{ console.log('data is null: '+data); }
        
        e.preventDefault();
    });
    
    function UpdateMembersGroup(data){
        var Members = "";
        $(".BoxEdition").html("");
        $.ajax({
            type: "POST",
            async:false,
            url: '../Querys/MemberGroup.php?Option=SelectGroupMembers',
            data: { IDGroup: data },
            success: function(response2) {
                var data_array = $.parseJSON(response2);
                for(var Item = 0; Item < data_array.length; Item++){
                    Members += '<div class="ui cards">'+
                                    '<div class="blue card">'+
                                      '<div class="content">'+
                                        '<img class="right floated mini ui image" src="'+AvatarsURL+'default.png">'+
                                        '<div class="header">'+
                                          data_array[Item].titulo_miembro+' '+data_array[Item].nombre_miembro+' '+data_array[Item].apellido_miembro+
                                        '</div>'+
                                        '<div class="meta"><b>'+
                                          data_array[Item].codigo_miembro+
                                        '</b></div>'+
                                        '<div class="description">'+
                                          'Location: '+data_array[Item].codigo_locacion+' <br> Mail: '+data_array[Item].correo_miembro+
                                        '</div>'+
                                      '</div>'+
                                    '</div>'+
                                '</div>';
                }
                $(".BoxEdition").append(Members);
            }
        });
    }
    
    var text_max = 255;
    $('#textarea_feedback').html(text_max + ' characters remaining');
    
    $('#MessagesGroupContent').keyup(function() {
        var text_length = $('#MessagesGroupContent').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
    $('#MessagesGroupContentEdit').keyup(function() {
        var text_length = $('#MessagesGroupContentEdit').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedbackEdit').html(text_remaining + ' characters remaining');
    });

    $('#MessagesGroupType').change(function(e){
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
    
    $('#MessagesGroupTypeEdit').change(function(e){
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
