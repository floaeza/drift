
<div class="Container thirteen wide column ContainerLayout" id="ReloadAll">
            <div class="ui segment">
            <h2 class="ui header">
                <i class="fa-users grey icon"></i>
                <div class="content">
                  [@LabelTitleGroup]
                  <div class="sub header">[@LabelSubTitleGroup]</div>
                </div>
            </h2>

            <div class="Tabs">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1" id="principal">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="blue users icon"></i>
                                    <i class="blue corner list icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabGroupList]
                                <div class="sub header">[@LabelSubTabGroupList]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="teal users icon"></i>
                                    <i class="teal corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabGroupNew]
                                <div class="sub header">[@LabelSubTabGroupNew]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="EditGroup">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="green users icon"></i>
                                    <i class="green corner pencil icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabGroupEdit]
                                <div class="sub header">[@LabelSubTabGroupEdit]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab4" id="DeleteGroup">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="grey users icon"></i>
                                    <i class="grey corner trash outline icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabGroupDelete]
                                <div class="sub header">[@LabelSubTabGroupDelete]</div>
                                </div>
                            </h5>
                        </a>
                    </li>

                </ul>

                <div>
                    <div id="Tab1" >
                        <div class="Filter ui icon input">
                            <div class="ui icon input">
                            <input class="Inputs" id="GlobalFilter" type="text" placeholder="[@LabelPlaceHolderFilter]">
                            <i class="search icon"></i>
                            </div>
                            <div id="buttonClearMargen">
                                <button class="circular ui icon button" type="button">
                                        <i class="icon trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="ui clearing divider"></div>
                        <div class="TableList" id="GroupList"></div>
                    </div>



                    <div id="Tab2">
                        <div class="ui form">
                            <h4 class="ui dividing header">[@LabelHeaderFormCreateGroup]</h4>
                            <form id="NewForm" method="post" name="NewForm" action="">
                                <div class="fields">
                                    <div class="six wide field">
                                        <label>[@LabelNameGroup]</label>
                                    </div>  
                                    <div class="six wide field">
                                        <div class="ui input"><input  type="text" name="NameGroup" id="NameGroup"></div>
                                    </div>
                                </div>


                               <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelDescriptionGroup]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui input"><input name="DescriptionGroup" id="DescriptionGroup"></div>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelValidityGroup]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui calendar date" id="date">
                                            <div class="ui input left icon">
                                                <i class="calendar icon"></i>
                                                <input type="text" placeholder="Date/Time" name="ValidityGroup" id="ValidityGroup">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelMembersGroup]</label>
                                    </div>
                                    <div class="six wide field">
                                        <select class="ui fluid search dropdown" multiple="" name="MembersGroup" id="MembersGroup">
                                            [@MembersList]
                                        </select>
                                    </div>
                                </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="SubmitCancel small grey ui button">[@LabelButtonCancel]</button>
                                    <button type="button" class="SubmitClear  small ui button">[@LabelButtonClear]</button>
                                </div> 
                            </form>
                        </div>
                    </div>

                    <div id="Tab3">
                        <div class="ui form">
                            <h4 class="ui dividing header">[@LabelHeaderFormEditGroup]</h4>
                            <div class="BoxEdition">
                                <br>
                                <div class="ui card teal">
                                    <div class="image">
                                        <img id="UsersAvatar">
                                    </div>
                                    <div class="content">
                                        <a class="ui teal huge ribbon label">
                                            <span class="header" id="EditNameGroup"></span>
                                        </a>
                                        <br>
                                      <div class="description">
                                          <span id="EditDescriptionGroup"></span>
                                          <br>
                                          <span id="EditValidityGroup"></span>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <form id="EditForm" method="post" name="EditForm" action="">
                                <input  type="text" hidden name="EditIdGroup" id="EditIdGroup">
                                <div class="fields">
                                    <div class="six wide field">
                                        <label>[@LabelNameGroup]</label>
                                    </div>  
                                    <div class="six wide field">
                                        <div class="ui input"><input  type="text" name="EditNameGroup" id="EditNameGroupForm"></div>
                                    </div>
                                </div>


                               <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelDescriptionGroup]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui input"><input name="EditDescriptionGroup" id="EditDescriptionGroupForm"></div>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelValidityGroup]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui calendar edit" id="date">
                                            <div class="ui input left icon">
                                                <i class="calendar icon"></i>
                                                <input type="text" placeholder="Date/Time" name="EditValidityGroup" id="EditValidityGroupForm">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelMembersGroup]</label>
                                    </div>
                                    <div class="six wide field">
                                        <select class="ui fluid search dropdown" multiple="" name="EditMembersGroup" id="EditMembersGroup">
                                            [@MembersList]
                                        </select>
                                    </div>
                                </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="SubmitCancel small grey ui button">[@LabelButtonCancel]</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    
                    <!-- ventana emergente de miembros para agregar tarjeta-->
                    
                    <div id="Tab4">
                        <div class="ui modal">
                            <div class="ui form">
                                <form id="DeleteForm" method="post" name="EditForm" action="">
                                    <h2 class="ui center aligned icon header">
                                        <i class="trash icon"></i>
                                        <div class="content">
                                          Realmente desea eliminar el registro seleccionado del sistema?
                                          <div class="sub header">El grupo se eliminara por completo del sistema</div>
                                        </div>
                                    </h2>
                                    <input type="text" hidden name="DeleteIdGroup"/>
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
    
    var AvatarsURL = "[@AvatarsURL]";
    
    $("#ButtonFilterClear").click(function() {
        $("#GlobalFilter").val("");
        $('#GlobalFilter').keyup();
    });
   
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
    
    $('#GroupList').puidatatable({
            selectionMode: 'single',
            paginator: {
                rows: 8
            },
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                { rowToggler: true, bodyStyle: 'width:20px',headerStyle: 'width:40px' },
                { field: 'nombre_grupo', headerText: 'Nombre del grupo',sortable: true, filter: true },
                { field: 'descripcion_grupo', headerText: 'Descripcion',sortable: true, filter: true },
                { field: 'vigencia', headerText: 'Vigencia',sortable: true, filter: true }
            ],
            expandableRows: true,
            expandedRowContent: function(response) {
                var Members = '<div class="ui grid">';
                $.ajax({
                    type: "POST",
                    async:false,
                    url: '../Querys/MemberGroup.php?Option=SelectGroupMembers',
                    data: { IDGroup: response.id_grupo },
                    success: function(response2) {
                        
                        var data_array = $.parseJSON(response2);
                        for(var Item = 0; Item < data_array.length; Item++){
                            Members += '<div class="four wide column"><div class="ui cards">'+
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
                                        '</div></div>';
                        }
                    }
                });
                return Members+'</div>';
            },
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/MemberGroup.php?Option=SelectGroups',
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

    /* TAB 2: VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
            NameGroup: {
                identifier : 'NameGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateNameGroup]' } ]
            },
            DescriptionGroup: {
                identifier : 'DescriptionGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateDescriptionGroup]' } ]
            },
            ValidityGroup: {
                identifier : 'ValidityGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateValidityGroup]' } ]
            },
            MembersGroup: {
                identifier : 'MembersGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateMembersGroup]' } ]
            },
            EditNameGroup: {
                identifier : 'EditNameGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateNameGroup]' } ]
            },
            EditDescriptionGroup: {
                identifier : 'EditDescriptionGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateDescriptionGroup]' } ]
            },
            EditValidityGroup: {
                identifier : 'EditValidityGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateValidityGroup]' } ]
            },
            EditMembersGroup: {
                identifier : 'EditMembersGroup',
                rules: [ { type   : 'empty', prompt : '[@LabelValidateMembersGroup]' } ]
            }
          },
          inline : true,
          on     : 'blur'

        });
        
    $("#NewForm").submit(function(event){
        var nombre = $('#NameGroup').serializeArray();
        var descripcion = $('#DescriptionGroup').serializeArray();
        var miembros = $('#MembersGroup').serializeArray();
        var fecha = $('#ValidityGroup').val();
        var date = fecha.substr(0,15);
        var hour= fecha.substr(-5,5);
        var f = new Date(date).toISOString(date).slice(0, 10).replace('T', ' ');
        var CompleteDate = f+' '+hour+':00';
        //console.log(CompleteDate);
        if(nombre[0]['value'] != '' && descripcion[0]['value'] != '' && CompleteDate != '' && miembros.length > 0){
            $.ajax({
                type: "POST",
                url: "../Querys/MemberGroup.php?Option=SetNewGroup",
                data: { NameGroup: nombre[0]['value'], DescriptionGroup: descripcion[0]['value'], ValidityGroup: CompleteDate, MembersGroup: miembros },
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#GroupList').puidatatable('reload');
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
    
    $('#EditGroup').click(function () {
        var selection = $('#GroupList').puidatatable('getSelection');
        var Item=0;
        var fecha = selection[0].vigencia;
        $('.Tabs').puitabview('disable', 3);
        //console.log(selection);
        if (selection.length === 1) {
            if (selection[0]) {
                $("input[name='EditIdGroup']").val(selection[0].id_grupo);
                $("input[name='EditNameGroup']").val(selection[0].nombre_grupo);
                $("input[name='EditDescriptionGroup']").val(selection[0].descripcion_grupo);
                //$("input[name='EditValidityGroup']").val(selection[0].vigencia);
                $(".ui.calendar.edit").calendar('set date', new Date( fecha.substr(0,4), Number(fecha.substr(5,2))-1, fecha.substr(8,2), fecha.substr(11,2), fecha.substr(14,2), fecha.substr(17,2) ));
                $.ajax({
                    type: "POST",
                    url: '../Querys/MemberGroup.php?Option=SelectGroupMembers',
                    data: { IDGroup: selection[0].id_grupo },
                    success: function(response) {
                        var data_array = $.parseJSON(response);
                        for(Item = 0; Item < data_array.length; Item++){
                            $("#EditMembersGroup").dropdown("refresh");
                            $("#EditMembersGroup").dropdown("set selected", data_array[Item].id_locacion);
                        }
                    }
                });
                $("#EditNameGroup").text(selection[0].nombre_grupo);
                $("#EditDescriptionGroup").text(selection[0].descripcion_grupo);
                $("#EditValidityGroup").text(selection[0].vigencia);
            }
        } else {
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }

    });
    
    $("#EditForm").submit(function(event){
        var id = $('#EditIdGroup').serializeArray();
        var nombre = $('#EditNameGroupForm').serializeArray();
        var descripcion = $('#EditDescriptionGroupForm').serializeArray();
        var miembros = $('#EditMembersGroup').serializeArray();
        var fecha = $('#EditValidityGroupForm').val();
        var date = fecha.substr(0,15);
        var hour= fecha.substr(-5,5);
        var f = new Date(date).toISOString(date).slice(0, 10).replace('T', ' ');
        var CompleteDate = f+' '+hour+':00';
        //console.log(id[0]['value']);
        if(id[0]['value'] != '' && nombre[0]['value'] != '' && descripcion[0]['value'] != '' && CompleteDate != '' && miembros.length > 0){
            $.ajax({
                type: "POST",
                url: "../Querys/MemberGroup.php?Option=SetEditGroup",
                data: { IdGroup: id[0]['value'], NameGroup: nombre[0]['value'], DescriptionGroup: descripcion[0]['value'], ValidityGroup: CompleteDate, MembersGroup: miembros },
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#GroupList').puidatatable('reload');
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
    
    $('#DeleteGroup').click(function () {
        var selection = $('#GroupList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $('.ui.modal')
                    .modal('setting', 'closable', false)
                    .modal('show');
                $("input[name='DeleteIdGroup']").val(selection[0].id_grupo);
            }
        } else {
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
    });
    
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/MemberGroup.php?Option=DeleteGroup",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#GroupList').puidatatable('reload');
                    $('.Tabs').puitabview('disable', 3);
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    });

</script>
