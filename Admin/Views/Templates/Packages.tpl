        <div class="Container thirteen wide column ContainerLayout">
            <div class="ui segment">
                <h2 class="ui header">
                <i class="fa-cubes grey icon"></i>
                <div class="content">
                  [@LabelSubListPackages]
                  <div class="sub header">[@LabelSubTitleSubmenuPackages]</div>
                </div>
            </h2>
            <div class="Tabs">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="blue cubes icon"></i>
                                    <i class="blue corner list icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormListPackages]
                                <div class="sub header">[@LabelSubListPackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <!--li>
                        <a class="ui card" href="#Tab2" id="d">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="teal cubes icon"></i>
                                    <i class="teal corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormPackagesT]
                                <div class="sub header">[@LabelSubCreatePackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="EditPackages">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="green cubes icon"></i>
                                    <i class="green corner pencil icon"></i>
                                </i>
                                <div class="content">
                                [@LabelHeaderFormEditPackages]
                                <div class="sub header">[@LabelSubEditPackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab4" id="DeletePackages">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="orange cubes icon"></i>
                                    <i class="orange corner trash icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabDeletePackages]
                                <div class="sub header">[@LabelSubDeletPackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li id="li5">
                        <a class="ui card" href="#Tab5" id="EditChannelPackages">
                            <h5 class="ui header">
                                <i class="orange trash icon"></i>
                                <div class="content">
                                [@LabelTabDeletePackages]
                                <div class="sub header">[@LabelSubDeletPackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li id="li6">
                        <a class="ui card" href="#Tab6" id="Edit2ChannelPackages">
                            <h5 class="ui header">
                                <i class="orange trash icon"></i>
                                <div class="content">
                                [@LabelTabDeletePackages]
                                <div class="sub header">[@LabelSubDeletPackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li id="li7">
                        <a class="ui card" href="#Tab6" id="PackageEPG">
                            <h5 class="ui header">
                                <i class="orange trash icon"></i>
                                <div class="content">
                                [@LabelTabDeletePackages]
                                <div class="sub header">[@LabelSubDeletPackages]</div>
                                </div>
                            </h5>
                        </a>
                    </li-->
                </ul>
                <div>
                    <div id="Tab1">
                        <!--<div class="Filter ui input"><input class="Inputs" id="GlobalFilter" placeholder="[@LabelPlaceHolderFilter]"></div>-->
                        <div id="PackagesList"></div>
                        <div id="PackageChannelsList" class="ui three cards">[@LabelTextChannelList]</div>
                        
                        <div class="ButtonBox">
                            <!--button type="submit" class="small primary ui button disabled" id="EPG"><i class="clone icon"></i>[@LabelButtonCreateEPG]</button-->
                            <!--button type="submit" class="small green ui button disabled" id="EPG_view"><i class="browser icon"></i>EPG</button-->
                        </div>
                        
                    </div>
                    <div id="Tab2">
                            <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormPackages1]</h4>

                                <form id="NewForm" method="post" name="NewForm" action="">
                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelPackagesName]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="PackagesName"/></div>
                                        </div>
                                    </div>

                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelPackagesDescription]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="PackagesDescription"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelPackagesChannels]</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui fluid search dropdown" multiple="" name="PackagesChannels">
                                                <option value="">[@FindChannels]</option>
                                                [@ChannelsOptionList]
                                            </select>
                                        </div>
                                    </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitNext small primary ui button" id="Next">[@LabelButtonNext]</button>
                                    <button type="button" class="SubmitCancel small grey ui button">[@LabelButtonCancel]</button>
                                    <button type="button" class="SubmitClear  samll ui button">[@LabelButtonClear]</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="Tab3">
                        <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormEditPackages2]:  <span id="PackagesHeader"></span></h4>

                                <form id="EditForm" method="post" name="NewForm" action="">

                                    <input type="text" hidden name="EditPackagesId"/>

                                    <div class="fields">
                                        <div class="six wide field">
                                            <label>[@LabelPackagesName]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditPackagesName"/></div>
                                        </div>
                                    </div>

                                   <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelPackagesDescription]</label>
                                        </div>
                                        <div class="six wide field">
                                            <div class="ui input"><input type="text" name="EditPackagesDescription"/></div>
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class=" six wide field">
                                            <label>[@LabelPackagesChannels]</label>
                                        </div>
                                        <div class="six wide field">
                                            <select class="ui fluid search dropdown multiple" id="EditPackagesChannels" name="EditPackagesChannels">
                                                <option value="">[@FindChannels]</option>
                                                [@EditChannelsOptionList]
                                            </select>
                                        </div>
                                    </div>

                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitNext small primary ui button" id="EditNext">[@LabelButtonNext]</button>
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
                                          Realmente desea eliminar el paquete seleccionado del sistema?
                                          <div class="sub header">La eliminacion de un paquete afectara el funcionamiento de los dispositivo asociados.</div>
                                        </div>
                                    </h2>
                                    <input type="text" hidden name="DeletePackagesId"/>
                                    <input type="text" hidden name="DeletePackagesName"/>
                                    <input type="text" hidden name="DeletePackagesDescription"/>
                                    <div class="ButtonBox">
                                        <button type="submit" class="SubmitAccept small primary ui button">[@LabelButtonAccept]</button>
                                        <button type="button" class="SubmitCancelModal small grey ui button">[@LabelButtonCancel]</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="Tab5">
                        <div class="six wide column">
                            <div class="PanelStep" title="[@LabelHeaderFormPackagesStep2]">
                                <div class="ui raised segment header"><p>[@LabelHeaderFormPackages2]</p></div>
                                <div class="ui form">
                                    <div class="fields">
                                        <div class="label">
                                            <label>[@LabelPackagesChannelsBeans]</label>
                                        </div>
                                        <div>
                                            <div class="ui input">
                                                <input type="text" name="Bean" id="Bean"/>
                                            </div>
                                            <button class="circular green ui icon button" id="PackageChannelsBean"><i class="icon add circle"></i></button>
                                        </div>
                                    </div>
                                    <div class="ButtonBox">
                                        <button class="SubmitAccept small primary ui button" id="SavePackageChannels">[@LabelButtonAccept]</button>
                                        <button class="SubmitCancel small grey ui button" id="CancelPackageChannels">[@LabelButtonCancel]</button>
                                    </div>
                                    <br>
                                    <div id="ChannelPackageList"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Tab6">
                        <div class="six wide column">
                            <div class="PanelStep" title="[@LabelHeaderFormPackagesStep2]">
                                <div class="ui raised segment header"><p>[@LabelHeaderFormPackages2]</p></div>
                                <div class="ui form">
                                    <div class="fields">
                                        <div class="label">
                                            <label>[@LabelPackagesChannelsBeans]</label>
                                        </div>
                                        <div>
                                            <div class="ui input">
                                                <input type="text" name="EditBean" id="EditBean"/>
                                            </div>
                                            <button class="circular green ui icon button" id="EditPackageChannelsBean"><i class="icon add circle"></i></button>
                                        </div>
                                    </div>
                                    <div class="ButtonBox">
                                        <button class="SubmitAccept small primary ui button" id="EditSavePackageChannels">[@LabelButtonAccept]</button>
                                        <button class="SubmitCancel small grey ui button" id="EditCancelPackageChannels">[@LabelButtonCancel]</button>
                                    </div>
                                    <br>
                                    <div id="EditChannelPackageList"></div>
                                </div>do
                            </div>
                        </div>
                    </div>
                    <div id="Tab7">
                        <div class="six wide column">
                            <div class="PanelStepEPG" id="PackageEPG">
                                <div class="ui form">
                                    <!--div class="EPG_container">
                                        <div class="title_table_EPG">Ch/Hrs</div>
                                        <div class="hours_container">
                                            <ul class="hours_list">
                                                <li><div id="hour0"></div></li><li><div id="hour1"></div></li><li><div id="hour2"></div></li><li><div id="hour3"></div></li><li><div id="hour4"></div></li>
                                            </ul>
                                        </div>
                                        <div class="channel_container">
                                            <ul class="channel_list">
                                                <li id="0" class="channel_name"></li><li id="1" class="channel_name"></li><li id="2" class="channel_name"></li><li id="3" class="channel_name"></li><li id="4" class="channel_name"></li>
                                            </ul>
                                        </div>
                                        <div id="program_container" class="program_container">
                                            <ul class="program_list">
                                                <li class="Canal"><div id="00" class="program_box" ></div><div id="01" class="program_box" ></div><div id="02" class="program_box" ></div><div id="03" class="program_box" ></div><div id="04" class="program_box" ></div><div id="05" class="program_box" ></div><div id="06" class="program_box" ></div><div id="07" class="program_box" ></div><div id="08" class="program_box" ></div><div id="09" class="program_box" ></div></li>
                                                <li class="Canal"><div id="10" class="program_box" ></div><div id="11" class="program_box" ></div><div id="12" class="program_box" ></div><div id="13" class="program_box" ></div><div id="14" class="program_box" ></div><div id="15" class="program_box" ></div><div id="16" class="program_box" ></div><div id="17" class="program_box" ></div><div id="18" class="program_box" ></div><div id="19" class="program_box" ></div></li>
                                                <li class="Canal"><div id="20" class="program_box" ></div><div id="21" class="program_box" ></div><div id="22" class="program_box" ></div><div id="23" class="program_box" ></div><div id="24" class="program_box" ></div><div id="25" class="program_box" ></div><div id="26" class="program_box" ></div><div id="27" class="program_box" ></div><div id="28" class="program_box" ></div><div id="29" class="program_box" ></div></li>
                                                <li class="Canal"><div id="30" class="program_box" ></div><div id="31" class="program_box" ></div><div id="32" class="program_box" ></div><div id="33" class="program_box" ></div><div id="34" class="program_box" ></div><div id="35" class="program_box" ></div><div id="36" class="program_box" ></div><div id="37" class="program_box" ></div><div id="38" class="program_box" ></div><div id="39" class="program_box" ></div></li>
                                                <li class="Canal"><div id="40" class="program_box" ></div><div id="41" class="program_box" ></div><div id="42" class="program_box" ></div><div id="43" class="program_box" ></div><div id="44" class="program_box" ></div><div id="45" class="program_box" ></div><div id="46" class="program_box" ></div><div id="47" class="program_box" ></div><div id="48" class="program_box" ></div><div id="49" class="program_box" ></div></li>
                                            </ul>
                                        </div>
                                    </div-->
                                    
                                    <div class="ButtonBox">
                                        <button class="green ui icon button" id="GoBack"><i class="icon reply"></i> Regresar </button>
                                    </div>
                                </div>
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
    $('#PackageEPG').hide();
    $('#EditChannelPackages').hide();
    $('#Edit2ChannelPackages').hide();
    $('#li5').hide();
    $('#li6').hide();
    $('#li7').hide();

    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });

    /* TAB 1: LISTA DE PAQUETES*/
    $('#PackagesList').puidatatable({
        selectionMode: 'single',
        resizableColumns: true,
        columnResizeMode: 'expand',
        paginator: {
            rows: 8
        },
        responsive: true,
        emptyMessage: '[@LabelEmptyMessage]',
        columns: [
               // { rowToggler: true, bodyStyle: 'width:18px',headerStyle: 'width:18px' },
                { field: 'nombre_paquete', headerText: 'Paquete', sortable: true, filter: true },
                { field: 'descripcion_paquete', headerText: 'Descripción',sortable: true, filter: true }

            ],
        /*expandableRows: true,
        expandedRowContent: function(response) {
            //for(var i=0; i<response.length; i++){
                /*return $('<div class="ui-grid" style="width:300px"></div>')
                .append('<div class="ui-grid-row"><div class="ui-grid-col-6"><img img style ="height: 50px;"  src="http://172.16.0.10/BBINCOTV_Media/ChannelsLogos/' + Channels[i]['logo'] + '"/></div>')
                .append('<div class="ui-grid-row"><div class="ui-grid-col-6">SRC: '+Channels[i]['src']+'</div>')
                .append('<div class="ui-grid-row"><div class="ui-grid-col-6">Canal: '+Channels[i]['numero_canal']+'</div><div class="ui-grid-col-6">' + Channels[i]['indicativo'] +'</div></div>');*/
            //}
       // },*/
        globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Packages.php?Option=SelectPackages',
                dataType: "json",
                context: this,
                success: function(response) {
                    callback.call(this, response);
                }
            });
        },
        rowSelect: function(event, data) {
            var PackageId = data.id_paquete;
            $.ajax({
                type: "GET",
                url: '../Querys/Packages.php?Option=SelectPackagesChannelsList',
                data : { PackageId : PackageId },
                context: this,
                success: function(response) {
                    var DataArray = $.parseJSON(response);
                    $("#PackageChannelsList").html(DataArray);
                }
            });
            $('.Tabs').puitabview('enable', 2);
            $('.Tabs').puitabview('enable', 3);
            $('#EPG').removeClass('disabled');
            $('#EPG_view').removeClass('disabled');
            event.preventDefault();
        }
    });

    /* TAB 2: VALIDACION FORMULARIO*/
    $('.ui.form')
        .form({
          fields: {
            PackagesName: {
                identifier : 'PackagesName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPackagesName]' } ]
            },
            PackagesDescription: {
                identifier : 'PackagesDescription',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPackagesDescription]' } ]
            },
            PackagesChannels: {
                identifier : 'PackagesChannels',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPackagesChannels]' } ]
            },
            EditPackagesName: {
                identifier : 'EditPackagesName',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPackagesName]' } ]
            },
            EditPackagesDescription: {
                identifier : 'EditPackagesDescription',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPackagesDescription]' } ]
            },
            EditPackagesChannels: {
                identifier : 'EditPackagesChannels',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPackagesChannels]' } ]
            }
          },
          inline : true,
          on     : 'blur'

        })
      ;

    /* TAB 2: INSERTAR DATOS DE FORMULARIO EN LA BD*/
    $('#Next').click(function (event) {
        PackagesName= $('input[name=PackagesName]').serializeArray();
        PackagesDescription= $('input[name=PackagesDescription]').serializeArray();
        channels = $('select[name=PackagesChannels]').serializeArray();
            if(PackagesName[0]['value'] !== null && PackagesDescription[0]['value'] !== null && channels[0]['value'] > 0){
                $('#ChannelPackageList').puidatatable({
                        editMode: 'cell',
                        resizableColumns: true,
                        columnResizeMode: 'expand',
                        scrollable: true,
                        scrollHeight: '250',
                        emptyMessage: '[@LabelEmptyMessage]',
                        columns: [
                            { field: 'src', headerText: 'Multicast', sortable: true },
                            { field: 'nombre_estacion', headerText: 'Nombre  del canal',sortable: true },
                            { headerText: 'Canal a sintonizar',sortable: true, editor: 'input' }
                        ],
                    datasource: function(callback) {
                        $.ajax({
                            type: "POST",
                            url: '../Querys/Packages.php',
                            dataType: "json",
                            data: { Option: "FirstStepInsertPackages", Channels: channels },
                            context: this,
                            success: function(response) {
                                callback.call(this, response);
                            }
                        });
                    }
                });
                $('.Tabs').puitabview('select', 4);
            } else {
                addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
            }
        event.preventDefault();
    });

    $('#PackageChannelsBean').click(function(){
        var Bean = $('input[name=Bean]').serializeArray();
        var seed = parseInt(Bean[0]['value']);
        if(seed > 0 && Bean !== ""){
            $("#ChannelPackageList tbody tr").each(function () {
                var td = 0;
                $(this).children("td").each(function () {
                    if(td == 2){
                        $(this).text(seed);
                    }
                    td++;
                });
                seed++;
            });
        }else{
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageBeanPackages]' });
        }
    });

    $('#SavePackageChannels').click(function(){
        var Bean = $('input[name=Bean]').serializeArray();
        var seed = parseInt(Bean[0]['value']);
        var channel;
        var Item;
        $("#ChannelPackageList tbody tr").each(function () {
            $(this).children("td").each(function () {
                    channel = $(this).text();
            });
            compareChannels(channel);
        });
        if(Bean[0]['value'] === "" && channel > 0 && ok == true){
            Item = 0;
            $.ajax({
                type: "POST",
                url: '../Querys/Packages.php?Option=InsertPackages',
                data: { Name: PackagesName[0]['value'], Description: PackagesDescription[0]['value'] },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    if(data_array['idPackage'] > 0){
                        $("#ChannelPackageList tbody tr").each(function () {
                            Item++;
                            $(this).children("td").each(function () {
                                    channel = $(this).text();
                            });
                            $.ajax({
                                type: "POST",
                                url: '../Querys/Packages.php?Option=InsertPackagesRelation',
                                data: { Number: channel, Channel: channels[Item-1]['value'], IdPackage: data_array['idPackage'] },
                                success: function(response) {
                                    var data_array = $.parseJSON(response);
                                    if(Item-1 === channels.length){
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }else{
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }
                                    var MessageOption  = data_array['MessageOption'];
                                    var MessageSummary = data_array['MessageSummary'];
                                    var MessageDetail  = data_array['MessageDetail'];
                                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                }
                            });
                        });
                    }else{
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                }
            });
            $('#PackagesList').puidatatable('reload');
            setTimeout(function(){
                acceptForm();
            }, 3000);
            $('#Bean').val("");
            ok = true;
            $('#EPG').addClass('disabled');
            $('#EPG_view').addClass('disabled');
        }else if (seed > 0 && ok == true){
            $.ajax({
                type: "POST",
                url: '../Querys/Packages.php?Option=InsertPackages',
                data: { Name: PackagesName[0]['value'], Description: PackagesDescription[0]['value'] },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    if(data_array['idPackage'] > 0){
                        for(Item = 0; Item < channels.length; Item++){
                            $.ajax({
                                type: "POST",
                                url: '../Querys/Packages.php?Option=InsertPackagesRelation',
                                data: { Number: (Item+seed), Channel: channels[Item]['value'], IdPackage: data_array['idPackage'] },
                                success: function(response) {
                                    data_array = $.parseJSON(response);
                                    if(data_array['Value'] > 0){
                                        seed++;
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }else{
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }
                                }
                            });
                        }
                    }else{
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                }
            });
            $('#PackagesList').puidatatable('reload');
            setTimeout(function(){
                acceptForm();
            }, 3000);
            $('#Bean').val("");
            ok = true;
            $('#EPG').addClass('disabled');
            $('#EPG_view').addClass('disabled');
        }else{
            ok = true;
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageBeanPackages]' });
        }

    });

    $('#CancelPackageChannels').click(function(){
        $('form').form('clear');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('#PackagesList').puidatatable('reload');
        $('.Tabs').puitabview('select', 0);
    });

    /* TAB 3: EDITAR REGISTRO SELECCIONADO */
    $('#EditForm').submit(function (event) {
        var data = $('#EditForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Packagess.php?Option=UpdatePackages",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#PackagesList').puidatatable('reload');
                    setTimeout(function(){
                        acceptForm();
                    }, 3000);
                }
            });
        event.preventDefault();
    });

    $('#EditPackages').click(function () {
       var selection = $('#PackagesList').puidatatable('getSelection');
       var data_array;
       if (selection.length === 1) {
           if (selection[0]) {
               $("input[name='EditPackagesId']").val(selection[0].id_paquete);
               $("input[name='EditPackagesName']").val(selection[0].nombre_paquete);
               $("input[name='EditPackagesDescription']").val(selection[0].descripcion_paquete);
               $("#PackagesHeader").text(selection[0].nombre_paquete);
               $.ajax({
                   type: "POST",
                   url: '../Querys/Packages.php?Option=SelectChannelPackages',
                   data: { IDPackage: selection[0].id_paquete },
                   success: function(response) {
                       data_array = $.parseJSON(response);
                       for(Item = 0; Item < data_array.length; Item++){
                           $("#EditPackagesChannels").dropdown("refresh");
                           $("#EditPackagesChannels").dropdown("set selected", data_array[Item].id_canal);
                       }
                   }
               });
           }
       } else {
           addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageSelectPackages]' });
       }

    });
    //var canal = 0;
    $('#EditNext').click(function (event) {
        EditPackageId= $('input[name=EditPackagesId]').serializeArray();
        EditPackagesName= $('input[name=EditPackagesName]').serializeArray();
        EditPackagesDescription= $('input[name=EditPackagesDescription]').serializeArray();
        Editchannels = $('select[name=EditPackagesChannels]').serializeArray();
            if(EditPackagesName[0]['value'] !== null && EditPackagesDescription[0]['value'] !== null && Editchannels[0]['value'] > 0){
                $('#EditChannelPackageList').puidatatable({
                    editMode: 'cell',
                    resizableColumns: true,
                    columnResizeMode: 'expand',
                    scrollable: true,
                    scrollHeight: '250',
                    emptyMessage: '[@LabelEmptyMessage]',
                    columns: [
                        { field: 'src', headerText: 'Multicast', sortable: true },
                        { field: 'nombre_estacion', headerText: 'Nombre  del canal',sortable: true },
                        { field: 'numero_canal', headerText: 'Canal a sintonizar',sortable: true, editor: 'input',
                            content: function(response) {
                                var X = 0;
                                devuelveCanal(response.id_canal, EditPackageId[0]['value'], function(channel){ X = channel; });
                                return X;
                            }
                        }
                    ],
                    datasource: function(callback) {
                        $.ajax({
                            type: "POST",
                            url: '../Querys/Packages.php',
                            dataType: "json",
                            data: { Option: "FirstStepEditPackages", Channels: Editchannels, PackageId: EditPackageId[0]['value'] },
                            context: this,
                            success: function(response) {
                                callback.call(this, response);
                                //console.log(response);
                            }
                        });
                    }
                });

                $('.Tabs').puitabview('select', 5);
            } else {
                addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
            }
        event.preventDefault();
    });

    function devuelveCanal(canal, paquete, callback){
        var c = "";
        $.ajax({
            async: false,
            type: "POST",
            url: "../Querys/Packages.php",
            data: { Option: "ChannelNumber", Channel: canal, PackageId: paquete },
            dataType: "json",
            success: function(response) {
                if(response == 'undefined' || response == ''){
                   c = response[0]['numero_canal'];
                }else{
                   c = response[0]['numero_canal'];
                }
                if(callback)
                    callback(c);
            }
        });
    }

    $('#EditCancelPackageChannels').click(function(){
        $('form').form('clear');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('#PackagesList').puidatatable('reload');
        $('.Tabs').puitabview('select', 0);
    });

    var ok = true;
    
    function compareChannels(channel){
        var c=0;
        var chanOk = 0;
        $("#ChannelPackageList tbody tr").each(function () {
            $(this).children("td").each(function () {
                    c = $(this).text();
            });
            //alert(c +' == '+ channel);
            if(c == channel && chanOk == 0){
                chanOk=1;
            }else if(c == channel) { ok = false; }
        });
        /*if(chanOk == 0){
            chanOk = channel;
        }else{
            if(chanOk == channel && ok == true){
                ok = false;
            }else { }
        }
        chanOk = channel;*/
        //alert(ok);
    }
    
    function compareChannelsEdit(channel){
        var c=0;
        var chanOk = 0;
        $("#EditChannelPackageList tbody tr").each(function () {
            $(this).children("td").each(function () {
                    c = $(this).text();
            });
            //alert(c +' == '+ channel);
            if(c == channel && chanOk == 0){
                chanOk=1;
            }else if(c == channel) { ok = false; }
        });
        /*if(chanOk == 0){
            chanOk = channel;
        }else{
            if(chanOk == channel && ok == true){
                ok = false;
            }else { }
        }
        chanOk = channel;*/
        //alert(ok);
    }

    $('#EditSavePackageChannels').click(function(){
        var Bean = $('input[name=Bean]').serializeArray();
        var seed = parseInt(Bean[0]['value']);
        var channel;
        var Item;
        $("#EditChannelPackageList tbody tr").each(function () {
            $(this).children("td").each(function () {
                    channel = $(this).text();
            });
            compareChannelsEdit(channel);
        });
        //alert('OK: '+ok);
        if(Bean[0]['value'] === "" && channel > 0 && ok == true){
            Item = 0;
            $.ajax({
                type: "POST",
                url: '../Querys/Packages.php?Option=UpdatePackages',
                data: { Name: EditPackagesName[0]['value'], Description: EditPackagesDescription[0]['value'], IdPackage: EditPackageId[0]['value'] },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    //console.log(data_array['idPackage']);
                    if(data_array['idPackage'] > 0){
                        $("#EditChannelPackageList tbody tr").each(function () {
                            Item++;
                            $(this).children("td").each(function () {
                                    channel = $(this).text();
                            });
                            $.ajax({
                                type: "POST",
                                url: '../Querys/Packages.php?Option=InsertPackagesRelation',
                                data: { Number: channel, Channel: Editchannels[Item-1]['value'], IdPackage: EditPackageId[0]['value'] },
                                success: function(response) {
                                    var data_array = $.parseJSON(response);
                                    if(Item-1 === Editchannels.length){
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }else{
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }
                                    var MessageOption  = data_array['MessageOption'];
                                    var MessageSummary = data_array['MessageSummary'];
                                    var MessageDetail  = data_array['MessageDetail'];
                                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                }
                            });
                        });
                    }else{
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                }
            });
            $('#PackagesList').puidatatable('reload');
            setTimeout(function(){
                acceptForm();
            }, 3000);
            $('.Tabs').puitabview('disable', 3);
            $('#EditBean').val("");
            ok = true;
            $('#EPG').addClass('disabled');
            $('#EPG_view').addClass('disabled');
        }else if (seed > 0 && ok == true){
            $.ajax({
                type: "POST",
                url: '../Querys/Packages.php?Option=UpdatePackages',
                data: { Name: EditPackagesName[0]['value'], Description: EditPackagesDescription[0]['value'], IdPackage: EditPackageId[0]['value'] },
                success: function(response) {
                    //var data_array = $.parseJSON(response);
                    if(response > 0){
                        for(Item = 0; Item < Editchannels.length; Item++){
                            $.ajax({
                                type: "POST",
                                url: '../Querys/Packages.php?Option=InsertPackagesRelation',
                                data: { Number: (Item+seed), Channel: Editchannels[Item]['value'], IdPackage: EditPackageId[0]['value'] },
                                success: function(response) {
                                    data_array = $.parseJSON(response);
                                    if(data_array['Value'] > 0){
                                        seed++;
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }else{
                                        var MessageOption  = data_array['MessageOption'];
                                        var MessageSummary = data_array['MessageSummary'];
                                        var MessageDetail  = data_array['MessageDetail'];
                                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                    }
                                }
                            });
                        }
                    }else{
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                }
            });
            $('#PackagesList').puidatatable('reload');
            setTimeout(function(){
                acceptForm();
            }, 3000);
            $('#Bean').val("");
            $('.Tabs').puitabview('disable', 3);
            ok = true;
            $('#EPG').addClass('disabled');
            $('#EPG_view').addClass('disabled');
        }else{
            ok = true;
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageBeanPackages]' });
        }

    });

    $('#EditPackageChannelsBean').click(function(){
        var Bean = $('input[name=EditBean]').serializeArray();
        var seed = parseInt(Bean[0]['value']);
        /*seed > 99 && */
        if(seed > 0 && Bean !== ""){
            $("#EditChannelPackageList tbody tr").each(function () {
                var td = 0;
                $(this).children("td").each(function () {
                    if(td == 2){
                        $(this).text(seed);
                    }
                    td++;
                });
                seed++;
            });
        }else{
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageBeanPackages]' });
        }
    });

    /*else if(seed < 100){
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: 'Indique un numero mayor a 100' });
        }*/

    /* TAB 4: ELIMINAR REGISTRO SELECCIONADO */
    $('#DeleteForm').submit(function (event) {
        var data = $('#DeleteForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "../Querys/Packages.php?Option=DeletePackages",
                data: data,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    $('.ui.modal').modal('hide');
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    $('#PackagesList').puidatatable('reload');
                    $('.Tabs').puitabview('disable', 3);
                    setTimeout(function(){
                        acceptForm();
                    }, 2000);
                    $('#EPG').addClass('disabled');
                    $('#EPG_view').addClass('disabled');
                }
            });
        event.preventDefault();
    });

    $('#DeletePackages').click(function () {
        var selection = $('#PackagesList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $('.ui.modal')
                    .modal('setting', 'closable', false)
                    .modal('show');
                $("input[name='DeletePackagesId']").val(selection[0].id_paquete);
                $("input[name='DeletePackagesName']").val(selection[0].nombre_paquete);
                $("input[name='DeletePackagesDescription']").val(selection[0].descripcion_paquete);
            }
        } else {
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageSelectPackages]' });
        }
    });
    
    $('#EPG').click(function (event){
        var selection = $('#PackagesList').puidatatable('getSelection');
        $('#EPG').addClass('disabled');
        if (selection.length === 1) {
            if (selection[0]) {
                $.ajax({
                    type: "POST",
                    url: "../Querys/Packages.php?Option=CreateEPGPackage",
                    data: { id_paquete: selection[0].id_paquete },
                    success: function (response) {
                        var data_array = $.parseJSON(response);
                        var MessageOption  = data_array['MessageOption'];
                        var MessageSummary = data_array['MessageSummary'];
                        var MessageDetail  = data_array['MessageDetail'];
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        $('#PackagesList').puidatatable('reload');
                        $('.Tabs').puitabview('disable', 3);
                    }
                });
            
            }
        } else {
            addMessage('[@OptionSelectPackages]', { summary: '[@SummarySelectPackages]', detail: '[@MessageSelectPackages]' });
        }
        event.preventDefault();
    });
    
    $('#EPG_view').click(function (event){
        var selection = $('#PackagesList').puidatatable('getSelection');
        var id_paquete = selection[0]['id_paquete'];
        var fechaActual = new Date();
        var fecha = fechaActual.yyyymmdd();
        if (window.XMLHttpRequest){

                // Objeto para IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp=new XMLHttpRequest();

        }else{

                // Objeto para IE6, IE5

                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }
        
        // Abrimos el archivo que esta alojado en el servidor epg_etc.xml

        xmlhttp.open("GET","../../../FRONT_TV/Core/Modules/EPG/epg_"+fecha+"_"+id_paquete+".xml",false);

        xmlhttp.send();
        // Obtenemos un objeto XMLDocument con el contenido del archivo xml del servidor

        xmlDoc=xmlhttp.responseXML;
                
        for(var i=0; i<5; i++){
            document.getElementById('hour'+i).innerHTML = "HORA";
        }
        
        $('.Tabs').puitabview('select', 6);
        $('#PackageEPG').slideToggle('show');
        
        event.preventDefault();
    });
    
    $('#GoBack').click(function (event){
        $('.Tabs').puitabview('select', 0);
        $('#li7').hide();
        event.preventDefault();
    });
    
    /*Dar formato a la fecha*/
    Date.prototype.yyyymmdd = function () {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();
        return [this.getFullYear(),
            (mm > 9 ? '' : '0') + mm,
            (dd > 9 ? '' : '0') + dd
        ].join('');
    };
    
</script>
