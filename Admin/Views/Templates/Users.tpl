       
<div class="Container thirteen wide column ContainerLayout">
    
            <div id="sidebar" class="sidebar">
                <a class="close-button" onclick="hide()"><i class="window close icon"></i></a>
                <div class="help">
                    
                </div>
            </div>
    
            <div class="ui segment">
            <h2 class="ui header">
                <i class="users grey icon"></i>
                <div class="content">
                  [@LabelTitleSubmenu]
                  <div class="sub header">[@LabelSubTitleSubmenu]</div>
                </div>
            </h2>
            
            <div class="Tabs">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="blue user icon"></i>
                                    <i class="blue corner list icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabUserList]
                                <div class="sub header">[@LabelSubListUsers]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="teal user icon"></i>
                                    <i class="teal corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabCreateUser]
                                <div class="sub header">[@LabelSubCreateUser]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="EditUser">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="green user icon"></i>
                                    <i class="green corner write icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabEditUser]
                                <div class="sub header">[@LabelSubEditUser]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab4" id="DeleteUser">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="orange user icon"></i>
                                    <i class="orange corner trash icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabDeleteUser]
                                <div class="sub header">[@LabelSubDeleteUser]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                </ul>
                <div>                
                    <div id="Tab1" >
                        <div class="Filter ui icon input"id="ButtonClear">
                            <div class="ui icon input">
                            <input class="Inputs" id="GlobalFilter" type="text"placeholder="[@LabelPlaceHolderFilter]" >
                            <i class="search icon"></i>
                            </div>
                        <div id="buttonClearMargen">
                            <button class="circular ui icon button" type="button" id="ButtonFilterClear">
                                    <i class="icon trash"></i>
                            </button>
                        </div>
                        </div>
                        
                       <div class="ui clearing divider"></div>
                        <div class="TableList" id="UserList"></div>
                       
                        
                    </div>   
                
                    <div id="Tab2">
                            <div class="ui form">
                                <div class="ui segment">
                                <h4 class="ui dividing header">[@LabelHeaderFormUser]</h4>

                                <form id="NewForm" method="post" name="NewForm" action="">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelUserName]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListNameUser]" name="UserName"/></div>
                                        </div>
                                    </div>

                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelUserLastNameF]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListLastNameUser]" name="LastNameF"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelUserLastNameM]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListFirstNameUser]" name="LastNameM"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelUserEmail]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="UserEmail" placeholder="ejemplo@gmail.com"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelUserPass]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="password" id="pass1" name="UserPass" placeholder="Contraseña"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelUserProfile]</label>
                                        </div>
                                        <div class=" six wide field">
                                        <select class="ui dropdown" name="ProfileId">
                                            [@ProfileOptionList]
                                        </select>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelUserAvatar]</label>
                                        </div>
                                        <div class=" six wide field">
                                            <div class="ui selection dropdown">
                                                <input name="UserImage" type="hidden">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">[@LabelSelectAvatar]</div>
                                                <div class="menu">
                                                    <div class="item" data-value="default.jpg">
                                                        <img class="ui avatar image" src="[@AvatarsURL]default.jpg">
                                                    </div>
                                                    <div class="item" data-value="christian.jpg">
                                                        <img class="ui avatar image" src="[@AvatarsURL]christian.jpg">
                                                    </div>
                                                    <div class="item" data-value="elyse.png">
                                                        <img class="ui avatar image" src="[@AvatarsURL]elyse.png">
                                                    </div>
                                                    <div class="item" data-value="kristy.png">
                                                        <img class="ui avatar image" src="[@AvatarsURL]kristy.png">
                                                    </div>
                                                    <div class="item" data-value="matthew.png">
                                                        <img class="ui avatar image" src="[@AvatarsURL]matthew.png">
                                                    </div>
                                                    <div class="item" data-value="meredith.jpg">
                                                        <img class="ui avatar image" src="[@AvatarsURL]meredith.jpg">
                                                    </div>
                                                    <div class="item" data-value="rachel.png">
                                                        <img class="ui avatar image" src="[@AvatarsURL]rachel.png">
                                                    </div>
                                                    <div class="item" data-value="tom.jpg">
                                                        <img class="ui avatar image" src="[@AvatarsURL]tom.jpg">
                                                    </div>
                                                </div>
                                            </div>
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
                    </div>
                    <div id="Tab3">
                        
                        <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormEditUser]</h4>
                         <!-- ventana emergente de miembros para agregar tarjeta-->
                                <div class="BoxEdition">
                                    <div class="ui card teal">
                                        <div class="image">
                                          <img id="UsersAvatar">
                                        </div>
                                        <div class="content">
                                             <a class="ui teal huge ribbon label" id="UsersNameHeader"></a>
                                            <span>&nbsp;</span>
                                            <div class="meta">
                                                <span class="header" id="UsersPatHeader"></span>
                                                <span class="header" id="UsersMatHeader"></span>
                                            </div>
                                          <div class="description">
                                            <span id="UsersEmail"></span>
                                            
                                          </div>
                                        </div>
                                    <div class="extra content CamelCase">
                                      <span>
                                        <i class="user icon"></i>
                                        <span id="UsersProfile"></span>
                                        <br>
                                        <i class="th list icon"></i>
                                        <span id="UsersState"></span>
                                      </span>
                                    </div>
                                    </div>
                                </div>
                                <!-- ventana emergente de miembros para agregar tarjeta-->
                                
                                            <form id="EditForm" method="post" name="EditForm" action="">

                                                <input type="text" hidden name="EditUserId"/>

                                                <div class="fields">
                                                    <div class="six wide field">
                                                        <label>[@LabelUserName]</label>
                                                    </div>
                                                    <div class="six wide field">
                                                        <div class="ui input"><input type="text" name="EditUserName"/></div>
                                                    </div>
                                                </div>

                                               <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserLastNameF]</label>
                                                    </div>
                                                    <div class="six wide field">
                                                        <div class="ui input"><input type="text" name="EditLastNameF"/></div>
                                                    </div>
                                                </div>

                                                <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserLastNameM]</label>
                                                    </div>
                                                    <div class="six wide field">
                                                        <div class="ui input"><input type="text" name="EditLastNameM"/></div>
                                                    </div>
                                                </div>

                                                <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserEmail]</label>
                                                    </div>
                                                    <div class="six wide field">
                                                        <div class="ui input"><input type="text" name="EditUserEmail"/></div>
                                                    </div>
                                                </div>

                                                <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserPass]</label>
                                                    </div>
                                                    <div class="six wide field">
                                                        <div class="ui input"><input type="password" id="pass1" name="EditUserPass"/></div>
                                                    </div>
                                                </div>

                                                <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserProfile]</label>
                                                    </div>
                                                    <div class=" six wide field">
                                                    <select class="ui dropdown" name="EditProfileId" id="EditProfileId">
                                                        [@ProfileEditOptionList]
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserStatus]</label>
                                                    </div>
                                                    <div class=" six wide field">
                                                    <select class="ui dropdown" name="EditStatusId" id="EditStatusId">
                                                        [@StatusEditOptionList]
                                                    </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="fields">
                                                    <div class=" six wide field">
                                                        <label>[@LabelUserAvatar]</label>
                                                    </div>
                                                    <div class=" six wide field">
                                                        <div class="ui selection dropdown">
                                                            <input name="UserImage" type="hidden" id="EditUserAvatarImg">
                                                            <i class="dropdown icon"></i>

                                                            <div class="text">
                                                                <img class="ui avatar image" id="EditUserAvatarSrc" src="">
                                                              </div>

                                                            <div class="menu">
                                                                <div class="item" data-value="default.jpg">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]default.jpg">
                                                                </div>
                                                                <div class="item" data-value="christian.jpg">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]christian.jpg">
                                                                </div>
                                                                <div class="item" data-value="elyse.png">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]elyse.png">
                                                                </div>
                                                                <div class="item" data-value="kristy.png">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]kristy.png">
                                                                </div>
                                                                <div class="item" data-value="matthew.png">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]matthew.png">
                                                                </div>
                                                                <div class="item" data-value="meredith.jpg">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]meredith.jpg">
                                                                </div>
                                                                <div class="item" data-value="rachel.png">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]rachel.png">
                                                                </div>
                                                                <div class="item" data-value="tom.jpg">
                                                                    <img class="ui avatar image" src="[@AvatarsURL]tom.jpg">
                                                                </div>
                                                            </div>
                                                        </div>
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
                                          Realmente desea inhabilitar el registro seleccionado del sistema?
                                          <div class="sub header">Al inhabilitar un usuario ya no tendra acceso al sistema la proxima vez que inicie sesion</div>
                                        </div>
                                    </h2>
                                    <input type="text" hidden name="DeleteUserId"/>
                                    <input type="text" hidden name="DeleteUserName"/>
                                    <input type="text" hidden name="DeleteUserLastName"/>
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

    $('#UserList').puidatatable({ 
            selectionMode: 'single',
            resizableColumns: true,
            columnResizeMode: 'expand',
            //resizableColumns: true,
            paginator: {
                rows: 10
            },
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                // EJMEMPLO PARA HACER EXPANDABLES ROWS EN CUALQUIER TABLA
                //{ rowToggler: true, bodyStyle: 'width:18px',headerStyle: 'width:18px' },
                { field: 'nombre_usuario', headerText: 'Nombre', sortable: true, filter: true },
                { field: 'apellido_paterno', headerText: 'Apellido paterno',sortable: true, filter: true },
                { field: 'apellido_materno', headerText: 'Apellido materno',sortable: true, filter: true },
                { field: 'correo_usuario', headerText: 'Correo',sortable: true, filter: true },
                { field: 'nombre_perfil', headerText: 'Perfil',sortable: true, filter: true },
                { field: 'estatus_usuario', headerText: 'Estatus',sortable: true, filter: true,
                    content: function(response) {
                        var icon , color;
                        if(response.estatus_usuario === 'habilitado') {
                             color = 'green';
                             icon = '<i class="'+color+' checkmark icon"></i>';
                        }
                        else if(response.estatus_usuario === 'inhabilitado') {
                             color = 'orange';
                             icon = '<i class="'+color+' minus icon"></i>';
                        }
                        else if(response.estatus_usuario === 'eliminado') {
                             color = 'red';
                             icon = '<i class="'+color+' remove icon"></i>';
                        }
                        return $('<span style="color:'+ color +'; text-transform: uppercase; ">'+ icon +'<b>'+ response.estatus_usuario +'</b></span>');
                    }
                }
                /*{ field: 'imagen_usuario', headerText: 'Imagen',
                    content: function(response) {
                        return $('<span><img style ="height: 50px;" src="[@AvatarsURL]' + response.imagen_usuario + '"/></div></span>');
                    }
                }*/
            ],
            
            // EJMEMPLO PARA HACER EXPANDABLES ROWS EN CUALQUIER TABLA
            //expandableRows: true,
            //expandedRowContent: function(response) {
            //return $('<div class="ui-grid" style="width:200px"></div>')
            //        .append('<div class="ui-grid-row"><div class="ui-grid-col-12"><img style ="height: 50px;" src="http://172.16.0.10/Dropbox/BBINCOTV/BACK_TV/Media/Avatars/' + response.imagen_usuario + '"/></div>');
            //},
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Users.php?Option=SelectUsers',
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
  $('#UserList').puidatatable('reload');
  });
    /* TAB 2: VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
            UserName: {
                identifier : 'UserName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputUserName]' } ]
            },
            LastNameF: {
                identifier : 'LastNameF',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLastNameF]' } ]
            },
            LastNameM: {
                identifier : 'LastNameM',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLastNameM]' } ]
            },
            UserEmail: {
                identifier : 'UserEmail',
                rules: [ { type   : 'email', prompt : '[@MessageInputUserEmail]' } ]
            },
            UserPass: {
                identifier : 'UserPass',
                rules: [ { type   : 'empty', prompt : '[@MessageInputUserPass]' },
                         { type   : 'minLength[5]', prompt : '[@MessageInputLenghtPassGeneral]' } ]
            },
            EditUserName: {
                identifier : 'UserName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputUserName]' } ]
            },
            EditLastNameF: {
                identifier : 'LastNameF',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLastNameF]' } ]
            },
            EditLastNameM: {
                identifier : 'LastNameM',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLastNameM]' } ]
            },
            EditUserEmail: {
                identifier : 'UserEmail',
                rules: [ { type   : 'email', prompt : '[@MessageInputUserEmail]' } ]
            },
            EditUserPass: {
                identifier : 'UserPass',
                rules: [ { type   : 'empty', prompt : '[@MessageInputUserPass]' },
                         { type   : 'minLength[5]', prompt : '[@MessageInputLenghtPass]' } ]
            }
          },
          inline : true,
          on     : 'blur'

        })
      ;

    /* TAB 2: INSERTAR DATOS DE FORMULARIO EN LA BD*/
    $('#NewForm').submit(function (event) {
        // Valida si todos los inputs del formulario han sido llenados
        var MinInputs = 5;
        var ValidateInputs = 0;
        var data = $('#NewForm').serializeArray();
            $.each(data, function(i, field){
                if(!field.value[i]){
                    
                }
                else {
                    ValidateInputs ++;
                }
            });

            if(ValidateInputs >= MinInputs){
                $.ajax({
                    type: "POST",
                    url: "../Querys/Users.php?Option=InsertUser",
                    data: data,
                    success: function (response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#UserList').puidatatable('reload');
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
        var data = $('#EditForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Users.php?Option=UpdateUser",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#UserList').puidatatable('reload');
                    $('.Tabs').puitabview('disable', 3);
                    setTimeout(function(){
                        acceptForm();
                    }, 3000);
                }
            });
        event.preventDefault();
    });

    var AvatarsURL = "[@AvatarsURL]";
     $('#EditUser').click(function () {
        var selection = $('#UserList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                //Valida el estatus del usuario [Un usuario Suspendido(3) no puede ser modificado]
                if(selection[0].id_estatus_usuario === "3"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                   addMessage('[@OptionDisableUser]', { summary: '[@SummaryDisableUser]', detail: '[@MessageDisableUser]' });
                }else {
                    var pass = Base64.decode(selection[0].clave);
                    $("input[name='EditUserId']").val(selection[0].id_usuario);
                    $("input[name='EditUserEmail']").val(selection[0].correo_usuario);
                    $("input[name='EditUserPass']").val(pass);
                    $("input[name='EditUserName']").val(selection[0].nombre_usuario);
                    $("input[name='EditLastNameF']").val(selection[0].apellido_paterno);
                    $("input[name='EditLastNameM']").val(selection[0].apellido_materno);
                    $("#EditProfileId").dropdown("refresh");
                    $("#EditProfileId").dropdown("set selected", selection[0].id_perfil);
                    $("#EditStatusId").dropdown("refresh");
                    $("#EditStatusId").dropdown("set selected", selection[0].id_estatus_usuario);
                    
                    $("#EditUserAvatarImg").val(selection[0].imagen_usuario);
                    $("#EditUserAvatarSrc").attr('src', AvatarsURL + selection[0].imagen_usuario);
                    
                    $("#UsersNameHeader").text(selection[0].nombre_usuario);
                    $("#UsersPatHeader").text(selection[0].apellido_paterno);
                    $("#UsersMatHeader").text(selection[0].apellido_materno);
                    $("#UsersEmail").text(selection[0].correo_usuario);
                    $("#UsersProfile").text(selection[0].nombre_perfil);
                    $("#UsersState").text(selection[0].estatus_usuario);
                    $("#UsersAvatar").attr('src', AvatarsURL + selection[0].imagen_usuario);
                }
            }
        } else {
            addMessage('[@OptionSelectUser]', { summary: '[@SummarySelectUser]', detail: '[@MessageSelectUser]' });
        }

    });

    /* TAB 4: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Users.php?Option=DeleteUser",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#UserList').puidatatable('reload');
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    });

    $('#DeleteUser').click(function () {
        var selection = $('#UserList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                //Valida el estatus del usuario [Un usuario Suspendido(3) no puede ser eliminado ]
                if(selection[0].id_estatus_usuario === "3"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                   addMessage('[@OptionDisableUser]', { summary: '[@SummaryDisableUser]', detail: '[@MessageDisableUser]' });
                }else {
                    $('.ui.modal')
                        .modal('setting', 'closable', false)
                        .modal('show');
                    $("input[name='DeleteUserId']").val(selection[0].id_usuario);
                    $("input[name='DeleteUserName']").val(selection[0].nombre_usuario);
                    $("input[name='DeleteUserLastName']").val(selection[0].apellido_paterno);
                }
            }
        } else {
            addMessage('[@OptionSelectUser]', { summary: '[@SummarySelectUser]', detail: '[@MessageSelectUser]' });
        }
    });



</script>
