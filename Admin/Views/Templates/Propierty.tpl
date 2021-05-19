        <div class="Container thirteen wide column ContainerLayout">
            <div class="ui segment">
            <h2 class="ui left floated header">[@LabelTitleSubmenu3]</h2>
            <div class="ui clearing divider"></div>
            <div class="Tabs">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1">
                            <h3 class="ui header">
                                <i class="blue users icon"></i>
                                <div class="content">
                                [@LabelTabMemberList]
                                <div class="sub header">[@LabelSubListMember]</div>
                                </div>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2">
                            <h3 class="ui header">
                                <i class="teal add user icon"></i>
                                <div class="content">
                                [@LabelTabCreateMember]
                                <div class="sub header">[@LabelSubCreateMember]</div>
                                </div>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="EditMember">
                            <h3 class="ui header">
                                <i class="green edit icon"></i>
                                <div class="content">
                                [@LabelTabEditMember]
                                <div class="sub header">[@LabelSubEditMember]</div>
                                </div>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab4" id="DeleteMember">
                            <h3 class="ui header">
                                <i class="orange trash icon"></i>
                                <div class="content">
                                [@LabelTabDeleteMember]
                                <div class="sub header">[@LabelSubDeleteMember]</div>
                                </div>
                            </h3>
                        </a>
                    </li>
                </ul>
                <div>
                    <div id="Tab1">
                        <div class="Filter ui input">
                            <input class="Inputs" id="GlobalFilter" placeholder="[@LabelPlaceHolderFilter]">
                        </div>
                        <div id="MemberList"></div>
                    </div>
                    <div id="Tab2">
                            <div class="ui form six wide field">
                                <h4 class="ui dividing header">[@LabelHeaderFormMember]</h4>

                                <form id="NewForm" method="post" name="NewForm" action="">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelMemberTitle]</label>
                                        </div>  
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="MemberTitle"/></div>
                                        </div>
                                    </div>
                                    
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelMemberName]</label>
                                        </div>  
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="MemberName"/></div>
                                        </div>
                                    </div>

                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelMemberLastNameF]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="LastNameF"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelMemberEmail]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="MemberEmail" placeholder="ejemplo@gmail.com"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelMemberCode]</label>
                                        </div>
                                        <div class=" six wide field">
                                            <div class="ui input"><input type="text" name="MemberCode"/></div>
                                        </div>
                                    </div>
                                    
                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="SubmitCancel small grey ui button">[@LabelButtonCancel]</button>
                                    <button type="button" class="SubmitClear  samll ui button">[@LabelButtonClear]</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    <div id="Tab3">
                        <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormEditMember]: <span id="PropiertyHeader"></span></h4>

                                <form id="EditForm" method="post" name="EditForm" action="">
                                    
                                    <input type="text" hidden name="EditMemberId"/>
                                    
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelMemberTitle]</label>
                                        </div>  
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditMemberTitle"/></div>
                                        </div>
                                    </div>
                                    
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelMemberName]</label>
                                        </div>  
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditMemberName"/></div>
                                        </div>
                                    </div>

                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelMemberLastNameF]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditLastNameF"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelMemberEmail]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditMemberEmail" placeholder="ejemplo@gmail.com"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelMemberCode]</label>
                                        </div>
                                        <div class=" six wide field">
                                            <div class="ui input"><input type="text" name="EditMemberCode"/></div>
                                        </div>
                                    </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="SubmitCancel small grey ui button">[@LabelButtonCancel]</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    
                    <div id="Tab4">
                        <div class="ui modal">
                            <div class="ui form">
                                <form id="DeleteForm" method="post" name="EditForm" action="">
                                    <h2 class="ui center aligned icon header">
                                        <i class="trash icon"></i>
                                        <div class="content">
                                          Realmente desea eliminar el registro seleccionado del sistema?
                                          <div class="sub header">Al eliminar un miembro ya no podra seleccionarlo la proxima vez</div>
                                        </div>
                                    </h2>
                                    <input type="text" hidden name="DeleteMemberId"/>
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
<script>  
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
    
    /* TAB 1: LISTA DE USUARIOS*/
    $('#MemberList').puidatatable({
            selectionMode: 'single',
            resizableColumns: true,
            columnResizeMode: 'expand',
            paginator: {
                rows: 8
            },
            responsive: true,
            
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                { field: 'codigo_miembro', headerText: 'Codigo', sortable: true, filter: true },
                { field: 'titulo', headerText: 'Titulo',sortable: true, filter: true },
                { field: 'nombre_miembro', headerText: 'Nombre',sortable: true, filter: true },
                { field: 'paterno_miembro', headerText: 'Apellido Paterno',sortable: true, filter: true },
                { field: 'correo_miembro', headerText: 'Correo',sortable: true, filter: true },

            ],
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Propierty.php?Option=SelectPropiertys',
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
            MemberTitle: {
                identifier : 'MemberTitle',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberTitle]' } ]
            },
            MemberName: {
                identifier : 'MemberName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberName]' } ]
            },
            LastNameF: {
                identifier : 'LastNameF',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberLastNameF]' } ]
            },
            MemberEmail: {
                identifier : 'MemberEmail',
                rules: [ { type   : 'email', prompt : '[@MessageInputMemberEmail]' } ]
            },
            MemberCode: {
                identifier : 'MemberCode',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberCode]' } ]
            },
            EditMemberTitle: {
                identifier : 'EditMemberTitle',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberTitle]' } ]
            },
            EditMemberName: {
                identifier : 'EditMemberName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberName]' } ]
            },
            EditLastNameF: {
                identifier : 'EditLastNameF',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberLastNameF]' } ]
            },
            EditMemberEmail: {
                identifier : 'EditMemberEmail',
                rules: [ { type   : 'email', prompt : '[@MessageInputMemberEmail]' } ]
            },
            EditMemberCode: {
                identifier : 'EditMemberCode',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMemberCode]' } ]
            }
          },
          inline : true,
          on     : 'blur'
          
        })
      ;
      
    /* TAB 2: INSERTAR DATOS DE FORMULARIO EN LA BD*/
    $('#NewForm').submit(function (event) {
        // Valida si todos los inputs del formulario han sido llenados
        var MinInputs = 2;
        var ValidateInputs = 0;
        var data = $('#NewForm').serializeArray();
            $.each(data, function(i, field){
                alert(field.value[i]);
                if(!field.value[i]){
                    //addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                } 
                else {
                    ValidateInputs ++;
                } 
            });

            if(ValidateInputs >= MinInputs){
                $.ajax({
                    type: "POST",
                    url: "../Querys/Propierty.php?Option=InsertPropierty",
                    data: data,
                    success: function (response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#MemberList').puidatatable('reload');
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
        var data = $('#EditForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Propierty.php?Option=UpdatePropierty",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#MemberList').puidatatable('reload');
                    setTimeout(function(){ 
                        acceptForm();
                    }, 3000);
                }
            });
        event.preventDefault();
    });  
    
     $('#EditMember').click(function () {
        var selection = $('#MemberList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                //Valida el estatus del usuario [Un usuario inhabilitado(2) no puede ser modificado]
                if(selection[0].id_estatus_usuario === "2"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                   addMessage('[@OptionDisableMember]', { summary: '[@SummaryDisableMember]', detail: '[@MessageDisableMember]' });
                }else {
                    $("input[name='EditMemberId']").val(selection[0].id_miembro);
                    $("input[name='EditMemberTitle']").val(selection[0].titulo);
                    $("input[name='EditMemberName']").val(selection[0].nombre_miembro);
                    $("input[name='EditLastNameF']").val(selection[0].paterno_miembro);
                    $("input[name='EditMemberEmail']").val(selection[0].correo_miembro);
                    $("input[name='EditMemberCode']").val(selection[0].codigo_miembro);
                    $("#PropiertyHeader").text(selection[0].nombre_miembro);
                }
            }
        } else {
            addMessage('[@OptionSelectMember]', { summary: '[@SummarySelectMember]', detail: '[@MessageSelectMember]' });
        }
        
    });
    
    /* TAB 4: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Propierty.php?Option=DeletePropierty",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#MemberList').puidatatable('reload');
                    setTimeout(function(){ 
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    }); 

    $('#DeleteMember').click(function () {
        var selection = $('#MemberList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                //Valida el estatus del usuario [Un usuario inhabilitado(2) no puede ser eliminado ]
                if(selection[0].id_estatus_usuario === "2"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                   addMessage('[@OptionDisableMember]', { summary: '[@SummaryDisableMember]', detail: '[@MessageDisableMember]' });
                }else {
                    $('.ui.modal')
                        .modal('setting', 'closable', false)
                        .modal('show');
                    $("input[name='DeleteMemberId']").val(selection[0].id_miembro);
                }
            }
        } else {
            addMessage('[@OptionSelectMember]', { summary: '[@SummarySelectMember]', detail: '[@MessageSelectMember]' });
        }
    });
</script>