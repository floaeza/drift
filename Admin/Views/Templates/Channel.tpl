<!-- Tpl de canales donde creamos los tabs y la funcion de cada uno de ellos
Guillermo Arce
junio 2017-->
  <div class="Container thirteen wide column ContainerLayout">
            <div class="ui segment">
                <h2 class="ui header">
                <i class="fa-play-circle grey icon"></i>
                <div class="content">
                  [@LabelTitleSubmenuChannel]
                  <div class="sub header">[@LabelSubTitleSubmenuChannel]</div>
                </div>
            </h2>

            <div class="Tabs">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="blue video play icon"></i>
                                    <i class="blue corner list icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormListChannel]
                                <div class="sub header">[@LabelSubListChannel]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="teal video play icon"></i>
                                    <i class="teal corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormChannel]
                                <div class="sub header">[@LabelSubCreateChannel]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="EditChannel">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="green video play icon"></i>
                                    <i class="green corner pencil icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormSubChannel]
                                <div class="sub header">[@LabelSubEditChannel]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab4" id="DeleteUser">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="orange video play icon"></i>
                                    <i class="orange corner trash icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabDeleteChannel]
                                <div class="sub header">[@LabelSubDeleteChannel]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                </ul>
                <div>
                    <div id="Tab1" >

                        <div class="Filter ui icon input" id="ButtonClear">
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
                        <div id="ChannelList"></div>


                    </div>

                    <div id="Tab2">
                            <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormChannel]</h4>

                                <form id="NewForm" method="post" name="NewForm" action="">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelChannelName]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input" onsubmit=""><input   type="text" name="DirectionMultiCast" value="igmp://"/></div>
                                        </div>
                                    </div>


                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelChannelPuert]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="number" name="NamePort" value="2001"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelChannelStation]</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui dropdown" name="NameStation">
                                        [@LocationTypeOptionStation]
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

                            <h4 class="ui dividing header" >[@LabelHeaderFormEditChannel]: <span id="ChannelHeader"></span></h4>

                            <div class="BoxEdition">
                                <div class="ui card">
                                    <div class="image">
                                        <!--img class="right floated mini ui image" id="ChannelLogo"-->
                                    </div>
                                    <div class="content">

                                        <a class="ui teal huge ribbon label" id="StationIndicative"></a>
                                            <span>&nbsp;</span>
                                        <div class="meta">
                                            <span class="header" id="Multicast"></span>
                                            <span class="header" id="Port"></span>
                                        </div>
                                        <div class="description">
                                            <span id="StationNumber"></span>
                                            <span id="StationName"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form id="EditForm" method="post" name="EditForm" action="">

                                <input type="text" hidden name="EditChannelId"/>


                               <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelEditDirectionMulti]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui input"><input type="text" name="EditDirectionMultiCast"/></div>
                                    </div>
                                </div>




                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelEditPort]</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui input"><input type="number" name="EditNamePort"/></div>
                                    </div>
                                </div>



                                <div class="fields">
                                    <div class=" six wide field">
                                        <label>[@LabelEditStation]</label>
                                    </div>
                                    <div class=" six wide field">
                                    <select class="ui dropdown" name="EditNameStation" id="EditNameStation">
                                       [@LocationTypeOptionStation]
                                    </select>
                                    </div>
                                </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                    <button type="button" class="SubmitCancel small grey ui button">[@LabelButtonCancel]</button>
                                </div>
                                <br><br><br><br><br><br><br><br><br>
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
                                          Realmente desea Eliminar el canal seleccionado del sistema?
                                        </div>
                                    </h2>
                                    <input type="text" hidden name="DeleteChannelId"/>
                                    <input type="text" hidden name="DeleteChannelName"/>
                                    <input type="text" hidden name="DeleteChannelMultiCast"/>
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
                <div class="ui indeterminate text loader" id="loader"></div>
            </div>
        </div>
</div>

<script>
    //boton que limpia y actualiza la tabla principal
    $("#ButtonFilterClear").click(function() {
        $("#GlobalFilter").val("");
        $('#GlobalFilter').keyup();

    });
    //funcion loandig que aparese antes de que carge todos los elementos.
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });

    /* TAB 1: LISTA DE CANALES: creamos la tabla en el tab1*/
    $('#ChannelList').puidatatable({
            selectionMode: 'single',
            paginator: {
                rows: 8
            },
            responsive: true,
            resizableColumns: true,
            columnResizeMode: 'expand',
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                { field: 'src', headerText: 'Dirección multicast', sortable: true, filter: true },
                { field: 'puerto', headerText: 'Puerto',sortable: true, filter: true },
                { field: 'numero_estacion', headerText: 'Numero estación',sortable: true, filter: true },
                { field: 'nombre_estacion', headerText: 'Estación',sortable: true, filter: true },
				{ field: 'indicativo', headerText: 'Indicativo',sortable: true, filter: true }


            ],
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                //Utilizamos el case SelectChannel para poder llamar los datos de nuestra tabla de la base de datos
                type: "GET",
                url: '../Querys/Channel.php?Option=SelectChannel',
                dataType: "json",
                context: this,
                success: function(response) {
                    callback.call(this, response);
                }
            });
        },
        //funcion al momento de seleccionar un campo de la tabla se actiban los tabs 2 y 3
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
            DirectionMultiCast: {
                identifier : 'DirectionMultiCast',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMulticast]' } ]
            },
            NamePort: {
                identifier : 'NamePort',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPort]' } ]
            },
            NameStation: {
                identifier : 'NameStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputStation]' } ]
            },

            EditDirectionMultiCast: {
                identifier : 'DirectionMultiCast',
                rules: [ { type   : 'empty', prompt : '[@MessageInputMulticast]' } ]
            },
            EditNamePort: {
                identifier : 'NamePort',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPort]' } ]
            },
            EditNameStation: {
                identifier : 'NameStation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputStation]' } ]
            }
            },
          inline : true,
          on     : 'blur'

        })
      ;

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

            if(ValidateInputs >= MinInputs){
                //creamos el caso llamado InsertChannel que tene como funcion agregar lo que ingresemos en los inputs.
                $.ajax({
                    type: "POST",
                    url: "../Querys/Channel.php?Option=InsertChannel",
                    data: data,
                    success: function (response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        //recargamos la tabla
                        $('#ChannelList').puidatatable('reload');
                        setTimeout(function(){
                            acceptForm();
                        }, 3000);
                    }
                });
            } else {
                // Do nothing
            }
        event.preventDefault();
    });

    /* TAB 3: EDITAR Canal SELECCIONADO EditChannel */
    $('#EditForm').submit(function (event) {
        var data = $('#EditForm').serializeArray();

            $.ajax({
                type: "POST",
                //seleccionaos el caso setChannelEdit que su funcion es editar los campos de los inputs
                url: "../Querys/Channel.php?Option=setChannelEdit",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#ChannelList').puidatatable('reload');
                    //desactivamos el tab 3 una ves que se complete la funcion
                    $('.Tabs').puitabview('disable', 3);
                    setTimeout(function(){
                        acceptForm();
                    }, 3000);
                }
            });
        event.preventDefault();
    });
    // parte dos
     $('#EditChannel').click(function () {
        var selection = $('#ChannelList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                //comparamos si el ususario esta activado en el sistema si esta activado se continua.
                if(selection[0].id_estatus_usuario === "2"){
                    $('.Tabs').puitabview('disable', 2);
                    $('.Tabs').puitabview('disable', 3);
                   addMessage('[@OptionDisableUser]', { summary: '[@SummaryDisableUser]', detail: '[@MessageDisableUser]' });
                }else {
                    //campos de los inputs y el valor de lo que contiene nuestra tabla de la base de datos
                    $("input[name='EditChannelId']").val(selection[0].id_canal);
                    $("input[name='EditDirectionMultiCast']").val(selection[0].src);
                    $("input[name='EditNamePort']").val(selection[0].puerto);
                    $("#EditNameStation").dropdown("refresh");
                    $("#EditNameStation").dropdown("set selected", selection[0].id_estacion);
                    $("#ChannelHeader").text(selection[0].src);

                    $("#ChannelLogo").attr('src', '[@ChannelsLogosURL]'+selection[0].logo);
                    $("#StationIndicative").text(selection[0].indicativo);
                    $("#Multicast").text(selection[0].src);
                    $("#Port").text(selection[0].puerto);
                    $("#StationNumber").text(selection[0].numero_estacion);
                    $("#StationName").text(selection[0].nombre_estacion);
                }
            }
        } else {
            addMessage('[@OptionSelectUser]', { summary: '[@SummarySelectUser]', detail: '[@MessageSelectChannel]' });
        }

    });

    /* TAB 4: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                //mandamos llamar el caso DeleteChannel para eliminar el canal seleccionado
                url: "../Querys/Channel.php?Option=DeleteChannel",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#ChannelList').puidatatable('reload');
                    $('.Tabs').puitabview('disable', 3);
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                }
            });
        event.preventDefault();
    });
//parte dos
    $('#DeleteUser').click(function () {
        var selection = $('#ChannelList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $('.ui.modal')
                .modal('setting', 'closable', false)
                .modal('show');
                $("input[name='DeleteChannelId']").val(selection[0].id_canal);
                $("input[name='DeleteChannelName']").val(selection[0].nombre_estacion);
                $("input[name='DeleteChannelMultiCast']").val(selection[0].src);

            }
        } else {
            addMessage('[@OptionSelectUser]', { summary: '[@SummarySelectUser]', detail: '[@MessageSelectChannel]' });
        }
    });
</script>
