
<div class="Container thirteen wide column ContainerLayout ContainerLayout">
    <div class="ui segment">
        <h2 class="ui header">
            <i class="fa-magic grey icon"></i>
            <div class="content">
              [@LabelHeaderModules]
              <div class="sub header">[@LabelSubHeaderModules]</div>
            </div>
        </h2>

        <div class="Tabs">
            <ul>
                <li>
                    <a class="ui card" href="#Tab1" id="tab1">
                        <h5 class="ui header">
                            <i class="big icons">
                                <i class="blue magic icon"></i>
                                <i class="blue corner list icon"></i>
                            </i>
                            <div class="content">
                            [@LabelTabModuleList]
                            <div class="sub header">[@LabelSubTabModuleList]</div>
                            </div>
                        </h5>
                    </a>
                </li>
                <li>
                    <a class="ui card" href="#Tab2" id="tab2">
                        <h5 class="ui header">
                            <i class="big icons">
                                <i class="teal magic icon"></i>
                                <i class="teal corner add icon"></i>
                            </i>
                            <div class="content">
                            [@LabelTabCreateModule]
                            <div class="sub header">[@LabelSubCreateModule]</div>
                            </div>
                        </h5>
                    </a>
                </li>
                <li>
                    <a class="ui card" href="#Tab3" id="EditModule">
                        <h5 class="ui header">
                            <i class="big icons">
                                <i class="green magic icon"></i>
                                <i class="green corner pencil icon"></i>
                            </i>
                            <div class="content">
                            [@LabelTabEditModule]
                            <div class="sub header">[@LabelSubEditModule]</div>
                            </div>
                        </h5>
                    </a>
                </li>
                <li>
                    <a class="ui card" href="#Tab4" id="DeleteModule">
                        <h5 class="ui header">
                            <i class="big icons">
                                <i class="orange magic icon"></i>
                                <i class="orange corner trash icon"></i>
                            </i>
                            <div class="content">
                            [@LabelTabDeleteModule]
                            <div class="sub header">[@LabelSubDeleteModule]</div>
                            </div>
                        </h5>
                    </a>
                </li>
                <li>
                    <a class="ui card" href="#Tab5" id="tab5">
                        <h5 class="ui header">
                            <i class="big icons">
                                <i class="pink magic icon"></i>
                                <i class="pink corner unhide icon"></i>
                            </i>
                            <div class="content">
                            [@LabelTabShowModule]
                            <div class="sub header">[@LabelSubShowModule]</div>
                            </div>
                        </h5>
                    </a>
                </li>
            </ul>
            <div>
                <div id="Tab1" >
                    <div id="ModulesList"></div>
                </div>

                <div id="Tab2">
                    <div class="ui fluid ordered top attached steps">
                        <div class="active step" id="StepOne">
                            <div class="content">
                                <div class="title">[@StepOne]</div>
                                <div class="description">[@StepOneDescription]</div>
                            </div>
                        </div>
                        <div class="disabled step" id="StepTwo">
                            <div class="content">
                                <div class="title">[@StepTwo]</div>
                                <div class="description">[@StepTwoDescription]</div>
                            </div>
                        </div>
                        <div class="disabled step" id="StepThree">
                            <div class="content">
                                <div class="title">[@StepThree]</div>
                                <div class="description">[@StepThreeDescription]</div>
                            </div>
                        </div>
                    </div>
                    <div class="ui attached segment">
                        <div class="PanelStep" title="[@StepOneLong]" id="One">
                            <div class="ui raised segment header"><p>[@StepOneDescriptionLong]</p></div>
                            <div class="ui form">
                                <form id="NewForm1">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelModuleName]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="[@LabelModuleNamePlace]" name="ModuleName"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelModuleDescription]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="[@LabelModuleDescriptionPlace]" name="ModuleDescription"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelModuleIco]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui selection dropdown">
                                                <input name="ModuleIcon" id="ModuleIcon" type="hidden">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">
                                                    <img class="ui avatar image" src="">[@LabelModuleIcoPlace]
                                                </div>
                                                <div class="menu">[@IconsList]</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ButtonBox">
                                        <button class="SubmitNext small primary ui button" id="NextOne">[@LabelButtonNext]</button>
                                        <button class="SubmitClear small ui button">[@LabelButtonClear]</button>
                                        <button class="SubmitCancelModal small grey ui button" id="CancelDelete">[@LabelButtonCancel]</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="PanelStep" title="[@StepTwo]" id="Two">
                            <div class="ui raised segment header"><p>[@StepTwoDescription]</p></div>
                            <div class="ui form">
                                <form id="NewForm2">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelModuleTemplate]</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui dropdown" name="ModuleTemplate" id="ModuleTemplate">
                                                <option value=""> </option>
                                                [@TemplateOptionList]
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class="seven wide field"></div>
                                        <div class="four wide field">
                                            <img class="ui fluid image" src="" id="TemplateView">
                                        </div>
                                        <div class="three wide field"></div>
                                    </div>
                                </form>
                                <div class="ButtonBox">
                                    <button class="SubmitReturn small teal ui button" id="ReturnTo1">[@LabelButtonReturn]</button>
                                    <button class="SubmitNext small primary ui button" id="NextTwo">[@LabelButtonNext]</button>
                                </div>
                            </div>
                        </div>

                        <div class="PanelStep BackgroundMedia" title="[@StepThree]" id="Three">
                            <div class="ui raised segment header"><p>[@StepThreeDescription]</p></div>
                            <div class="ui form">
                                <div class="fields">
                                    <div class="sixteen wide field">
                                        <div class="ui horizontal aligned selection list">
                                            [@ListImages]
                                        </div>
                                    </div>
                                </div>
                                <div class="ButtonBox">
                                    <button class="SubmitReturn small teal ui button" id="ReturnTo2">[@LabelButtonReturn]</button>
                                    <button class="SubmitAccept small primary ui button" id="Save">[@LabelButtonAccept]</button>
                                </div>
                            </div>
                        </div>
                        
                        <!--CONTENEDORES PARA EDICION DE VIDEOS-->
                        <div class="PanelStep BackgroundMedia" title="[@StepThree]" id="ThreeVideo">
                            <div class="ui raised segment header"><p>[@StepThreeDescription]</p></div>
                            <div class="ui form">
                                <div class="fields">
                                    <div class="sixteen wide field">
                                        <div class="ui horizontal aligned selection list">
                                            [@ListVideos]
                                        </div>
                                    </div>
                                </div>
                                <div class="ButtonBox">
                                    <button class="SubmitReturn small teal ui button" id="ReturnTo2">[@LabelButtonReturn]</button>
                                    <button class="SubmitAccept small primary ui button" id="SaveVideo">[@LabelButtonAccept]</button>
                                </div>
                            </div>
                        </div>
                        <!--FIN CONTENEDORES DE EDICION DE VIDEOS-->
                        
                        <!-- AQUI ESTAN LOS CONTENEDORES DE EDICION DE SUBMENUS -->
                        <div class="PanelStep" title="[@StepThree]" id="ThreeSubmenu">
                            <div class="ui raised segment header"><p>[@StepThreeDescription] en cada opción</p></div>
                            <div class="ui form">
                                <form id="NewForm">
                                    <div class="ui horizontal divider">Opción 1</div>
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique un nombre para la opción 1</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="Submenu Item 1" name="ModuleSubmenuText1"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>Seleccione el icono para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui selection dropdown">
                                                <input name="ModuleIcon1" id="ModuleIcon1" type="hidden">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">
                                                    <img class="ui avatar image" src="">[@LabelModuleIcoPlace]
                                                </div>
                                                <div class="menu">[@IconsList]</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique el template para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui dropdown" name="ModuleTemplate" id="ModuleTemplateOp1">
                                                <option value=""> </option>
                                                [@TemplateOptionListSubmenu]
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ui horizontal divider">Opción 2</div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique un nombre para la opción 2</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="Submenu Item 2" name="ModuleSubmenuText2"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>Seleccione el icono para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui selection dropdown">
                                                <input name="ModuleIcon2" id="ModuleIcon2" type="hidden">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">
                                                    <img class="ui avatar image" src="">[@LabelModuleIcoPlace]
                                                </div>
                                                <div class="menu">[@IconsList]</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique el template para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui dropdown" name="ModuleTemplate" id="ModuleTemplateOp2">
                                                <option value=""> </option>
                                                [@TemplateOptionListSubmenu]
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ui horizontal divider">Opción 3</div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique un nombre para la opción 3</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="Submenu Item 3" name="ModuleSubmenuText3"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>Seleccione el icono para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui selection dropdown">
                                                <input name="ModuleIcon3" id="ModuleIcon3" type="hidden">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">
                                                    <img class="ui avatar image" src="">[@LabelModuleIcoPlace]
                                                </div>
                                                <div class="menu">[@IconsList]</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique el template para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui dropdown" name="ModuleTemplate" id="ModuleTemplateOp3">
                                                <option value=""> </option>
                                                [@TemplateOptionListSubmenu]
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ui horizontal divider">Opción 4</div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique un nombre para la opción 4</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" placeholder="Submenu Item 4" name="ModuleSubmenuText4"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>Seleccione el icono para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui selection dropdown">
                                                <input name="ModuleIcon4" id="ModuleIcon4" type="hidden">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">
                                                    <img class="ui avatar image" src="">[@LabelModuleIcoPlace]
                                                </div>
                                                <div class="menu">[@IconsList]</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>Indique el template para esta opción</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui dropdown" name="ModuleTemplate" id="ModuleTemplateOp4">
                                                <option value=""> </option>
                                                [@TemplateOptionListSubmenu]
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ButtonBox">
                                        <button class="SubmitReturn small teal ui button" id="ReturnTo2Submenu">[@LabelButtonReturn]</button>
                                        <button class="SubmitAccept small primary ui button" id="SaveSubmenu">[@LabelButtonAccept]</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- AQUI TERMINAN LOS CONTENEDORES DE EDICION DE LOS SUBMENUS -->

                    </div>
                </div>

                <div id="Tab3">
                    <div class="ui form">
                        <form id="EditNewForm1">
                            <input type="text" hidden name="EditModuleId" id="EditModuleId"/>
                            <input type="text" hidden name="EditModuleFatherId" id="EditModuleFatherId"/>
                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelModuleName]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><input type="text" placeholder="[@LabelModuleNamePlace]" name="EditModuleName" id="EditModuleName"/></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="six wide field">
                                    <label>[@LabelModuleDescription]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui input"><input type="text" placeholder="[@LabelModuleDescriptionPlace]" name="EditModuleDescription" id="EditModuleDescription"/></div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class=" six wide field">
                                    <label>[@LabelModuleIco]</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui selection dropdown" id="EditModuleIcon">
                                        <input name="ModuleIconEdit" type="hidden">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">
                                            <img class="ui avatar image" src="">[@LabelModuleIcoPlace]
                                        </div>
                                        <div class="menu">[@EditIconsList]</div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="sixteen wide field">
                                    <div class="ui horizontal divider" id="Divider">
                                        <i class="image icon"></i>
                                        Indique las imagenes a modificar
                                    </div>
                                </div>
                            </div>

                            <div class="fields BackgroundMedia">
                                <div class="sixteen wide field">
                                    <div class="ui horizontal aligned selection list" id="images"></div>
                                </div>
                            </div>

                            <div class="PanelStep" title="[@StepThree]" id="EditThree">
                                <div class="ui raised segment header"><p>[@StepThreeDescription]</p></div>
                                <div class="ui form">
                                    <div class="fields">
                                        <div class="sixteen wide field">
                                            <div class="ui horizontal aligned selection list">
                                                [@EditListImages]
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--EDICION DE TEMPLATE DE VIDEO-->
                            <div class="PanelStep" title="[@StepThree]" id="EditThreeVideo">
                                <div class="ui raised segment header"><p>[@StepThreeDescription]</p></div>
                                <div class="ui form">
                                    <div class="fields">
                                        <div class="sixteen wide field">
                                            <div class="ui horizontal aligned selection list">
                                                [@EditListVideos]
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN EDICION DE TEMPLATE DE VIDEO-->
                            
                            <div class="ButtonBox">
                                <button class="SubmitAccept small primary ui button" id="SaveEdit">[@LabelButtonAccept]</button>
                                <button class="SubmitCancelModal small grey ui button" id="CancelEdit">[@LabelButtonCancel]</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="Tab4">
                    <div class="ui modal" id="ModalDelete">
                        <div class="ui form">
                            <form id="DeleteFormModule" method="post" action="">
                                <h2 class="ui center aligned icon header">
                                    <i class="trash icon"></i>
                                    <div class="content">
                                      Realmente desea Eliminar el módulo seleccionado del sistema?
                                      <div class="sub header">Al eliminar un módulo ya no tendra acceso a este en el sistema</div>
                                    </div>
                                </h2>
                                <input type="text" hidden name="DeleteModuleId"/>
                                <div class="ButtonBox">
                                    <button type="button" class="SubmitAccept small primary ui button" id="Delete">[@LabelButtonAccept]</button>
                                    <button type="button" class="SubmitCancelModal small grey ui button" id="CancelDelete">[@LabelButtonCancel]</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="Tab5">
                    <div class="ui modal" id="ModalPreview">
                        <div class="header">[@LabelAdvisoryPreview]</div>
                        <div class="embed-container">
                            <iframe width="560" height="320" id="ModulePreview" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="ButtonBox">
                            <button type="button" class="SubmitCancelModal small ui button" id="CloseModal">[@LabelButtonClose]</button>
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
    $('#Two').hide();
    $('#Three').hide();
    $('#ThreeVideo').hide();
    $('#EditThree').hide();
    $('#EditThreeVideo').hide();
    $('#ThreeSubmenu').hide();

    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
    //var IconsURL = '[@IconsURL]';
    /* TAB 1: LISTA DE PAQUETES*/
    $('#ModulesList').puidatatable({
        selectionMode: 'single',
        resizableColumns: false,

        paginator: {
            rows: 8
        },
        responsive: true,
        emptyMessage: '[@LabelEmptyMessage]',
        columns: [
                { field: 'nombre_modulo', headerText: 'Módulo', sortable: true, filter: true,
                    content: function(response) {
                        return $('<span><img class="ui mini right spaced image" style="background-color: #565353; border-radius: 5px; " src="[@IconsURL]'+response.nombre_icono+'"/><b>  '+response.nombre_modulo+'</b></span>');
                    }
                },
                { field: 'nombre_template', headerText: 'Template',sortable: true, filter: true },
                { field: 'descripcion_modulo', headerText: 'Descripción',sortable: true, filter: true },
                { field: 'nivel_modulo', headerText: 'Ubicacion del módulo',sortable: true, filter: true,
                    content: function(response) {
                        var color = '';
                        var nivel = 0;
                        if(response.nivel_modulo == 0) {
                            color = 'green';
                            nivel = 1;
                        }else if(response.nivel_modulo == 1){
                            color = 'yellow';
                            nivel = 2;
                        }else if(response.nivel_modulo == 2){
                            color = 'red';
                            nivel = 3;
                        }else{
                            color = 'blue';
                }
                        //return $('<span style="color:'+ color +';"><b>'+ response.nivel_modulo +' Niveles abajo</b><i class="fa fa-level-down"></i></span>');
                        return $('<span>Nivel '+ nivel +'</span>');
                    }

                },
                { field: 'padre_modulo', headerText: 'Padre del módulo',sortable: true, filter: true,
                    content: function(response) {
                        var padre;
                        if(response.padre_modulo != null){
                            $.ajax({
                                async: false,
                                type: "POST",
                                url: '../Querys/Modules.php?Option=GetFather',
                                data: { data: response.padre_modulo },
                                success: function(response) {
                                    var data_array = $.parseJSON(response);
                                    padre = data_array[0]['nombre_modulo'];
                                }
                            });
                        }else{
                            //padre = 'Modulo Padre';
                            padre = 'Menu';
                        }
                        //return $('<span><b>'+ padre +'</b></span>');
                        return $('<span>'+ padre +'</span>');
                    }

                },
                { field: 'modulo_principal', headerText: 'Tipo de módulo',sortable: true, filter: true,
                    content: function(response) {
                        var texto = '';
                        var color = '';
                        if(response.modulo_principal == 1) {
                            color = '#0c2b53';
                            texto = 'Principal';
                        }else{
                            color = '#3c6c0f';
                            texto = 'Secundario';
                        }
                        //return $('<span style="color:'+ color +'; text-transform: uppercase; "><b>'+ texto +'</b></span>');
                        return $('<span style="color:'+ color +';">'+ texto +'</span>');
                    }

                }
            ],
        globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Modules.php?Option=SelectModules',
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
            $('.Tabs').puitabview('enable', 4);
            event.preventDefault();
        }
    });

    $('#tab1').click(function(){
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('disable', 4);
        $('#ModulesList').puidatatable('reload');
        $('#images').html('');
        $('#One').show();
        $('#Two').hide();
        $('#Three').hide();
        $('#EditThree').hide();
        $('#EditThreeVideo').hide();
        $('#StepOne').removeClass('completed');
        $('#StepOne').addClass('active');
        $('#StepTwo').removeClass('completed');
        $('#StepTwo').addClass('disabled');
        $('#StepThree').removeClass('active');
        $('#StepThree').addClass('disabled');
    });

    $('#tab2').click(function(){
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('disable', 4);
        $('#ModulesList').puidatatable('reload');
        $('#images').html('');
    });

    /* VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
            ModuleName: {
                identifier : 'ModuleName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputModuleName]' } ]
            },
            ModuleIcon: {
                identifier : 'ModuleIcon',
                rules: [ { type   : 'empty', prompt : '[@MessageInputModuleIcon]' } ]
            },
            ModuleTemplate: {
                identifier : 'ModuleTemplate',
                rules: [ { type   : 'empty', prompt : '[@MessageInputModuleTemplate' } ]
            },
            EditModuleName: {
                identifier : 'EditModuleName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputModuleName]' } ]
            },
            EditModuleIcon: {
                identifier : 'EditModuleIcon',
                rules: [ { type   : 'empty', prompt : '[@MessageInputModuleIcon]' } ]
            }
          },
          inline : true,
          on     : 'blur'

        });

    $('#NextOne').click(function(e){
        e.preventDefault();
        StepOneModules = $('#NewForm1').serializeArray();
        if(StepOneModules[0]['value'] != "" && StepOneModules[2]['value'] != ""){
            $('#One').slideToggle('hide');
            $('#Two').slideToggle('show');
            $('#StepOne').removeClass('active');
            $('#StepOne').addClass('completed');
            $('#StepTwo').removeClass('disabled');
            $('#StepTwo').addClass('active');
        }else{
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }

    });

    $('#ReturnTo1').click(function(e){
        e.preventDefault();
        $('#Two').slideToggle('hide');
        $('#One').slideToggle('show');
        $('#StepOne').removeClass('completed');
        $('#StepOne').addClass('active');
        $('#StepTwo').removeClass('active');
        $('#StepTwo').addClass('disabled');
    });

    $('#NextTwo').click(function(e){
        e.preventDefault();
        StepTwoModules = $('#ModuleTemplate').val();
        var texto = $('#ModuleTemplate').find('option:selected').text();
        if(StepTwoModules > 0 && texto !== 'Submenu' && texto !== 'SubmenuAndImage' && texto !== 'Video'){
            $.ajax({
                type: "POST",
                url: '../Querys/Modules.php?Option=TemplateVariableCount',
                data: { data: StepTwoModules },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    VariableCount = data_array[0]['count(*)'];
                }
            });
            $('#Two').slideToggle('hide');
            $('#Three').slideToggle('show');
            $('#StepTwo').removeClass('active');
            $('#StepTwo').addClass('completed');
            $('#StepThree').removeClass('disabled');
            $('#StepThree').addClass('active');
        }else if(StepTwoModules > 0 && texto === 'Submenu'){
            $('#Two').slideToggle('hide');
            $('#ThreeSubmenu').slideToggle('show');
            $('#StepTwo').removeClass('active');
            $('#StepTwo').addClass('completed');
            $('#StepThree').removeClass('disabled');
            $('#StepThree').addClass('active');
        }else if(StepTwoModules > 0 && texto === 'SubmenuAndImage'){
            $('#Two').slideToggle('hide');
            $('#ThreeSubmenu').slideToggle('show');
            $('#StepTwo').removeClass('active');
            $('#StepTwo').addClass('completed');
            $('#StepThree').removeClass('disabled');
            $('#StepThree').addClass('active');
        }else if(StepTwoModules > 0 && texto === 'Video'){
            $.ajax({
                type: "POST",
                url: '../Querys/Modules.php?Option=TemplateVariableCount',
                data: { data: StepTwoModules },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    VariableCount = data_array[0]['count(*)'];
                }
            });
            $('#Two').slideToggle('hide');
            $('#ThreeVideo').slideToggle('show');
            $('#StepTwo').removeClass('active');
            $('#StepTwo').addClass('completed');
            $('#StepThree').removeClass('disabled');
            $('#StepThree').addClass('active');
        }else{
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
    });

    $('#ReturnTo2').click(function(e){
        e.preventDefault();
        $('#Three').slideToggle('hide');
        $('#Two').slideToggle('show');
        $('#StepTwo').removeClass('completed');
        $('#StepTwo').addClass('active');
        $('#StepThree').removeClass('active');
        $('#StepThree').addClass('disabled');
    });

    $('#ReturnTo2Submenu').click(function(e){
        e.preventDefault();
        $('#ThreeSubmenu').slideToggle('hide');
        $('#Two').slideToggle('show');
        $('#StepTwo').removeClass('completed');
        $('#StepTwo').addClass('active');
        $('#StepThree').removeClass('active');
        $('#StepThree').addClass('disabled');
    });

    $('#Save').click(function(e){
        e.preventDefault();
        if(ImageArray.length == VariableCount){
            $('#StepThree').removeClass('active');
            $('#StepThree').addClass('completed');
            //console.log(ImageArray);
            if(StepOneModules[0]['value'] != '' && StepOneModules[2]['value'] != '' && StepTwoModules > 0 && ImageArray.length > 0 && ImageArray.length == VariableCount){
                $.ajax({
                    type: "POST",
                    url: '../Querys/Modules.php?Option=CreateModule',
                    data: { nombre_modulo:  StepOneModules[0]['value'], descripcion_modulo:  StepOneModules[1]['value'], nombre_icono:  StepOneModules[2]['value'], id_template: StepTwoModules, Images: ImageArray},
                    success: function(response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#ModulesList').puidatatable('reload');
                        $('#Three').slideToggle('hide');
                        $('#Two').slideToggle('hide');
                        $('#StepOne').removeClass('disabled');
                        $('#StepOne').addClass('active');
                        $('#StepTwo').removeClass('completed');
                        $('#StepTwo').addClass('disabled');
                        $('#StepThree').removeClass('active');
                        $('#StepThree').addClass('disabled');
                        $('.Tabs').puitabview('disable', 2);
                        $('.Tabs').puitabview('disable', 3);
                        $('.Tabs').puitabview('disable', 4);
                        $('.Tabs').puitabview('select', 0);
                        location.reload();
                    }
                });
            }else{
                addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
            }
        }else{
            addMessage('[@OptionSelectVariable]', { summary: '[@SummarySelectVariable]', detail: '[@MessageInputsValidateNumber] ' +(VariableCount-ImageArray.length)+ ' [@MessageInputsValidateNumberType]' });
        }
    });
    
    $('#SaveVideo').click(function(e){
        e.preventDefault();
        console.log(ImageArray+' === '+ImageArray.length+' === '+VariableCount);
        if(ImageArray.length == VariableCount){
            $('#StepThree').removeClass('active');
            $('#StepThree').addClass('completed');
            
            if(StepOneModules[0]['value'] != '' && StepOneModules[2]['value'] != '' && StepTwoModules > 0 && ImageArray.length > 0 && ImageArray.length == VariableCount){
                $.ajax({
                    type: "POST",
                    url: '../Querys/Modules.php?Option=CreateModule',
                    data: { nombre_modulo:  StepOneModules[0]['value'], descripcion_modulo:  StepOneModules[1]['value'], nombre_icono:  StepOneModules[2]['value'], id_template: StepTwoModules, Images: ImageArray},
                    success: function(response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#ModulesList').puidatatable('reload');
                        $('#ThreeVideo').slideToggle('hide');
                        $('#Two').slideToggle('hide');
                        $('#StepOne').removeClass('disabled');
                        $('#StepOne').addClass('active');
                        $('#StepTwo').removeClass('completed');
                        $('#StepTwo').addClass('disabled');
                        $('#StepThree').removeClass('active');
                        $('#StepThree').addClass('disabled');
                        $('.Tabs').puitabview('disable', 2);
                        $('.Tabs').puitabview('disable', 3);
                        $('.Tabs').puitabview('disable', 4);
                        $('.Tabs').puitabview('select', 0);
                        location.reload();
                    }
                });
            }else{
                addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
            }
        }else{
            addMessage('[@OptionSelectVariable]', { summary: '[@SummarySelectVariable]', detail: '[@MessageInputsValidateNumber] ' +(VariableCount-ImageArray.length)+ ' [@MessageInputsValidateNumberType]' });
        }
    });

    $('#SaveSubmenu').click(function(e){
        e.preventDefault();
        var data = $('#NewForm').serializeArray();
		//console.log(data);
        if(data[0]['value'] != '' && data[1]['value'] != '' && data[2]['value'] != '' && data[3]['value'] != '' && data[4]['value'] != '' && data[5]['value'] != '' && data[6]['value'] != '' && data[7]['value'] != '' && data[8]['value'] != '' && data[9]['value'] != '' && data[10]['value'] != '' && data[11]['value'] != ''){
            $.ajax({
                type: "POST",
                url: '../Querys/Modules.php?Option=CreateModule',
                data: { nombre_modulo:  StepOneModules[0]['value'], descripcion_modulo:  StepOneModules[1]['value'], nombre_icono:  StepOneModules[2]['value'], id_template: StepTwoModules, Images: ImageArray, array: data},
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    if(data_array['response'] === 'ok'){
                        $.ajax({
                            type: "POST",
                            url: '../Querys/Modules.php?Option=CreateModuleChild',
                            data: { array: data },
                            success: function(response) {
                                var data_array = $.parseJSON(response);
                                var MessageOption  = data_array['MessageOption'];
                                var MessageSummary = data_array['MessageSummary'];
                                var MessageDetail  = data_array['MessageDetail'];
                                addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                $('#ModulesList').puidatatable('reload');
                                $('#ThreeSubmenu').slideToggle('hide');
                                $('#Two').hide();
                                $('#StepOne').removeClass('completed');
                                $('#StepOne').addClass('active');
                                $('#StepTwo').removeClass('completed');
                                $('#StepTwo').addClass('disabled');
                                $('#StepThree').removeClass('active');
                                $('#StepThree').addClass('disabled');
                                $('.Tabs').puitabview('disable', 2);
                                $('.Tabs').puitabview('disable', 3);
                                $('.Tabs').puitabview('disable', 4);
                                $('.Tabs').puitabview('select', 0);
                                location.reload();
                            }
                        });
                    }else{
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                }
            });
        }else{
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
    });

    $('#ModuleTemplate').change(function(e){
        var data = $(this).val();
        if(data > 0){
            $.ajax({
                type: "POST",
                url: '../Querys/Modules.php?Option=TemplateList',
                data: { data: data },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    $('#TemplateView').attr('src', '[@PreviewsURL]'+data_array[0]['nombre_template']+'.png');
                }
            });
        }else{ }

        e.preventDefault();
    });

    function Selection(){
        var id = document.activeElement.id;
        var cls = $('#'+id+'').attr('class');
        if(cls === "ui rounded small image disabled"){
            var indice = ImageArray.indexOf($('#'+id+'').attr('name'));
            $('#'+id+'').removeClass('disabled');
            ImageArray.splice(indice, 1);
        }else{
            if(ImageArray.length < VariableCount){
                $('#'+id+'').addClass('disabled');
                ImageArray.push($('#'+id+'').attr('name'));
            }else{
                addMessage('[@OptionSelectVariable]', { summary: '[@SummarySelectVariable]', detail: '[@MessageMaximumVar]' });
            }
        }
    }

    /* TAB 3: EDITAR MODULO SELECCIONADO */
    $('#SaveEdit').click(function (event) {
        var arrayImages = { };
        var arrayImagesID = [];
        var arrayImagesSRC = [];
        var cadena = '';
        var form = $('#EditNewForm1').serializeArray();
        var images = document.getElementsByClassName('mod');
        console.log(images[0]['attributes'][1]['value'].substr(0, 3));
        if(images.length > 0 && images[0]['attributes'][1]['value'].substr(0, 3) !== 'Vid'){
            for(var i=0; i<images.length; i++){
                cadena = images[i]['attributes'][0]['value'];
                arrayImagesID.push(cadena.substr(3));
                arrayImagesSRC.push(images[i]['attributes'][2]['value']);
            }
            arrayImages = { arrayImagesID, arrayImagesSRC };
        }else if (images[0]['attributes'][1]['value'].substr(0, 3) === 'Vid'){
            for(var i=0; i<images.length; i++){
                cadena = images[i]['attributes'][1]['value'];
                arrayImagesID.push(cadena.substr(6));
                arrayImagesSRC.push(images[i]['attributes'][2]['value']);
            }
            arrayImages = { arrayImagesID, arrayImagesSRC };
        }else{ }
        console.log(arrayImages);
        $.ajax({
            type: "POST",
            url: "../Querys/Modules.php?Option=UpdateModule",
            data: { id_modulo: form[0]['value'], padre_modulo: form[1]['value'], nombre_modulo: form[2]['value'], descripcion_modulo: form[3]['value'], nombre_icono: form[4]['value'], dataImages: arrayImages },
            success: function (response) {
                var data_array = $.parseJSON(response);
                var MessageOption  = data_array['MessageOption'];
                var MessageSummary = data_array['MessageSummary'];
                var MessageDetail  = data_array['MessageDetail'];
                addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                $('.Tabs').puitabview('disable', 2);
                $('.Tabs').puitabview('disable', 3);
                $('.Tabs').puitabview('disable', 4);
                $('.Tabs').puitabview('select', 0);
                $('#ModulesList').puidatatable('reload');
                $('#images').html('');
                location.reload();
            }
        });
        event.preventDefault();
    });

    $('#EditModule').click(function () {
        var selection = $('#ModulesList').puidatatable('getSelection');
        console.log(selection);
        $('#ModulesList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 4);
        if (selection.length === 1) {
            if (selection[0]) {
                /*if(selection[0].modulo_principal !== "0"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('.Tabs').puitabview('disable', 4);
                    $('#ModulesList').puidatatable('reload');
                   addMessage('[@OptionPrincipalModule]', { summary: '[@SummaryPrincipalModule]', detail: '[@MessagePrincipalModule]' });

                }else*/ 
                if(selection[0].url_modulo === "Submenu.php" && selection[0].nombre_template !== "SubmenuAndImage"){
                    $("input[name='EditModuleId']").val(selection[0].id_modulo);
                    $("input[name='EditModuleName']").val(selection[0].nombre_modulo);
                    $("input[name='EditModuleDescription']").val(selection[0].descripcion_modulo);
                    $("#EditModuleIcon").dropdown("refresh");
                    $("#EditModuleIcon").dropdown("set selected", selection[0].nombre_icono);
                    $("#Divider").hide();
                }else if(selection[0].nombre_template === "SubmenuAndImage"){
                    $("input[name='EditModuleId']").val(selection[0].id_modulo);
                    $("input[name='EditModuleFatherId']").val(selection[0].padre_modulo);
                    $("input[name='EditModuleName']").val(selection[0].nombre_modulo);
                    $("input[name='EditModuleDescription']").val(selection[0].descripcion_modulo);
                    $("#EditModuleIcon").dropdown("refresh");
                    $("#EditModuleIcon").dropdown("set selected", selection[0].nombre_icono);
                    $("#Divider").show();
                    $.ajax({
                        type: "POST",
                        url: "../Querys/Modules.php?Option=GetAllFromModule",
                        data: { id_modulo: selection[0].id_modulo },
                        success: function (response) {
                            var data_array = $.parseJSON(response);
                            for(var Item = 12; Item < data_array.length; Item++){
                                $('#images').append('<div class="item"><img id="Old'+data_array[Item].id_modulo_contenido+'" class="ui rounded small image mod" name="'+data_array[Item].valor+'" src="[@ImagesURL]'+data_array[Item].valor+'" onclick="EditSelection();" tabindex="1"></div>');
                            }
                        }
                    });
                }else if(selection[0].nombre_template === "Video"){
                    $("input[name='EditModuleId']").val(selection[0].id_modulo);
                    $("input[name='EditModuleFatherId']").val(selection[0].padre_modulo);
                    $("input[name='EditModuleName']").val(selection[0].nombre_modulo);
                    $("input[name='EditModuleDescription']").val(selection[0].descripcion_modulo);
                    $("#EditModuleIcon").dropdown("refresh");
                    $("#EditModuleIcon").dropdown("set selected", selection[0].nombre_icono);
                    $("#Divider").show();
                    $.ajax({
                        type: "POST",
                        url: "../Querys/Modules.php?Option=GetAllFromModule",
                        data: { id_modulo: selection[0].id_modulo },
                        success: function (response) {
                            var data_array = $.parseJSON(response);
                            for(var Item = 0; Item < data_array.length; Item++){
                                $('#images').append('<div class="item"><video class="ui rounded small image mod" id="VidOld'+data_array[Item].id_modulo_contenido+'" name="'+data_array[Item].valor+'" src="[@VideosURL]'+data_array[Item].valor+'" width="220" height="140" autoplay muted style="margin:2%;" onclick="EditSelectionVideo();" autoplay muted style="margin:2%;" tabindex="1"></video></div>');
                            }
                        }
                    });
                }else if(selection[0].nivel_modulo > 0 && selection[0].nombre_template !== "Video"){
                    $("input[name='EditModuleId']").val(selection[0].id_modulo);
                    $("input[name='EditModuleFatherId']").val(selection[0].padre_modulo);
                    $("input[name='EditModuleName']").val(selection[0].nombre_modulo);
                    $("input[name='EditModuleDescription']").val(selection[0].descripcion_modulo);
                    $("#EditModuleIcon").dropdown("refresh");
                    $("#EditModuleIcon").dropdown("set selected", selection[0].nombre_icono);
                    $("#Divider").show();
                    $.ajax({
                        type: "POST",
                        url: "../Querys/Modules.php?Option=GetAllFromModule",
                        data: { id_modulo: selection[0].id_modulo },
                        success: function (response) {
                            var data_array = $.parseJSON(response);
                            for(var Item = 0; Item < data_array.length; Item++){
                                $('#images').append('<div class="item"><img id="Old'+data_array[Item].id_modulo_contenido+'" class="ui rounded small image mod" name="'+data_array[Item].valor+'" src="[@ImagesURL]'+data_array[Item].valor+'" onclick="EditSelection();" tabindex="1"></div>');
                            }
                        }
                    });
                }else {
                    $("input[name='EditModuleId']").val(selection[0].id_modulo);
                    $("input[name='EditModuleName']").val(selection[0].nombre_modulo);
                    $("input[name='EditModuleDescription']").val(selection[0].descripcion_modulo);
                    $("#EditModuleIcon").dropdown("refresh");
                    $("#EditModuleIcon").dropdown("set selected", selection[0].nombre_icono);
                    $("#Divider").show();
                    $.ajax({
                        type: "POST",
                        url: "../Querys/Modules.php?Option=GetAllFromModule",
                        data: { id_modulo: selection[0].id_modulo },
                        success: function (response) {
                            var data_array = $.parseJSON(response);
                            for(var Item = 0; Item < data_array.length; Item++){
                                $('#images').append('<div class="item"><img id="Old'+data_array[Item].id_modulo_contenido+'" class="ui rounded small image mod" name="'+data_array[Item].valor+'" src="[@ImagesURL]'+data_array[Item].valor+'" onclick="EditSelection();" tabindex="1"></div>');
                            }
                        }
                    });
                }
            }
        } else {
            addMessage('[@OptionSelectModule]', { summary: '[@SummarySelectModule]', detail: '[@MessageSelectModule]' });
        }
    });

    function EditSelection(){
        idModuleContent = document.activeElement.id;
        if(idModuleContent !== ''){
            $('#EditThree').slideToggle('show');
        }else{

        }
    }
    
    function EditSelectionVideo(){
        idModuleContent = document.activeElement.id;
        if(idModuleContent !== ''){
            $('#EditThreeVideo').slideToggle('show');
        }else{

        }
    }

    function change(){
        var idModuleContentNew = document.activeElement.id;
        if(idModuleContentNew > 0){
            document.getElementById(idModuleContent).setAttribute('src', $('#'+idModuleContentNew+'').attr('src'));
            document.getElementById(idModuleContent).setAttribute('name', $('#'+idModuleContentNew+'').attr('name'));
            idModuleContent = 0;
            $('#EditThree').slideToggle('hide');
        }else{

        }
    }
    
    function changeVideo(){
        var idModuleContentNew = document.activeElement.id;
        //console.log(idModuleContent+'  '+idModuleContentNew);
        if(idModuleContentNew){
            document.getElementById(idModuleContent).setAttribute('src', $('#'+idModuleContentNew+'').attr('src'));
            document.getElementById(idModuleContent).setAttribute('name', $('#'+idModuleContentNew+'').attr('name'));
            idModuleContent = 0;
            $('#EditThreeVideo').slideToggle('hide');
        }else{

        }
    }

     /* TAB 4: ELIMINAR MODULO SELECCIONADO */
    $('#Delete').click(function (event) {
        var data = $('#DeleteFormModule').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Modules.php?Option=DeleteModule",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('#ModalDelete').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('.Tabs').puitabview('disable', 4);
                    $('#ModulesList').puidatatable('reload');
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    });

    $('#DeleteModule').click(function () {
        var selection = $('#ModulesList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                if(selection[0].modulo_principal === "1"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('.Tabs').puitabview('disable', 4);
                    $('#ModulesList').puidatatable('reload');
                   addMessage('[@OptionPrincipalModule]', { summary: '[@SummaryPrincipalModule]', detail: '[@MessagePrincipalModule]' });

                }else if(selection[0].nivel_modulo === "0") {
                    $('#ModalDelete')
                        .modal('setting', 'closable', false)
                        .modal('attach events', '.SubmitCancelModal.small.grey.ui.button', 'hide')
                        .modal('show');
                    $("input[name='DeleteModuleId']").val(selection[0].id_modulo);
                }else{
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                    $('.Tabs').puitabview('disable', 4);
                    $('#ModulesList').puidatatable('reload');
                    addMessage('[@OptionSelectModule]', { summary: '[@SummarySelectModule]', detail: 'Seleccione el módulo padre para poder eliminar este módulo' });
                }
            }
        } else {
            addMessage('[@OptionSelectModule]', { summary: '[@SummarySelectModule]', detail: '[@MessageSelectModule]' });
        }
    });

    $('#tab5').click(function(){
        var selection = $('#ModulesList').puidatatable('getSelection');
        $.ajax({
            type: "POST",
            url: '../Querys/Modules.php?Option=SelectModuleType',
            data: { id_modulo: selection[0].id_modulo },
            success: function(res) {
                var data_array = $.parseJSON(res);
                if(data_array[0]['modulo_principal'] == 1){
                    $('#ModulePreview').attr('src', '[@ModulesURL]'+data_array[0]['url_modulo']+'?Module='+data_array[0]['id_modulo']);
                    $('#ModalPreview')
                        .modal('setting', 'closable', false)
                        .modal('attach events', '.SubmitCancelModal.small.ui.button', 'hide')
                        .modal('show');
                }else{
                    $('#ModulePreview').attr('src', '[@ModulesURLGeneral]'+selection[0].url_modulo+'?Module='+data_array[0]['id_modulo']);
                    $('#ModalPreview')
                        .modal('setting', 'closable', false)
                        .modal('attach events', '.SubmitCancelModal.small.ui.button', 'hide')
                        .modal('show');
                }
            }
        });
    });

    $('#CancelEdit').click(function(){
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('disable', 4);
        $('#ModulesList').puidatatable('reload');
        $('#images').html('');
    });

    $('#CancelDelete').click(function(){
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('disable', 4);
        $('#ModulesList').puidatatable('reload');
    });

    $('#CancelCreate').click(function(){
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('disable', 4);
        $('.Tabs').puitabview('select', 0);
        $('#ModulesList').puidatatable('reload');
    });

    $('#CloseModal').click(function(){
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('.Tabs').puitabview('disable', 4);
        $('.Tabs').puitabview('select', 0);
        $('#ModulesList').puidatatable('reload');
        $('#images').html('');
    });
</script>
