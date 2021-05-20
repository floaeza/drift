
<div class="Container thirteen wide column ContainerLayout" id="ReloadAll">
            <div class="ui segment">
            <h2 class="ui header">
                <i class="fa-user-circle grey icon"></i>
                <div class="content">
                  [@LabelTitleSubmenu2]
                  <div class="sub header">[@LabelSubTitleSubmenuMember]</div>
                </div>
            </h2>

            <div class="Tabs">
                <ul>
                    <li>
                        <a class="ui card" href="#Tab1" id="principal">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="blue user circle icon"></i>
                                    <i class="blue corner list icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabLocationList]
                                <div class="sub header">[@LabelSubListLocations]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="teal user circle icon"></i>
                                    <i class="teal corner add icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabChargeLocations]
                                <div class="sub header">[@LabelSubChargeLocations]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="EditLocation">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="green user circle icon"></i>
                                    <i class="green corner pencil icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabEditLocation]
                                <div class="sub header">[@LabelSubEditLocation]</div>
                                </div>
                            </h5>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab5" id="ShowDevicesLocation">
                            <h5 class="ui header">
                                <i class="big icons">
                                    <i class="grey user circle icon"></i>
                                    <i class="grey corner disk outline icon"></i>
                                </i>
                                <div class="content">
                                [@LabelTabViewDevices]
                                <div class="sub header">[@LabelTabSubViewDevices]</div>
                                </div>
                            </h5>
                        </a>
                    </li>

                </ul>

                <div>
                    <div id="Tab1" >
                        <div class="Filter ui icon input" id="ButtonClear">
                            <div class="ui icon input">
                            <input class="Inputs" id="GlobalFilter" type="text" placeholder="[@LabelPlaceHolderFilter]">
                            <i class="search icon"></i>
                            </div>
                        <div id="buttonClearMargen">
                            <button class="circular ui icon button" type="button" id="ButtonFilterClear">
                                    <i class="icon trash"></i>
                            </button>
                        </div>
                        </div>

                       <div class="ui clearing divider"></div>
                        <div class="TableList" id="LocationList"></div>
                    </div>

                    <div id="Tab2">
                        <div class="ui form">

                            <div class="ui centered grid">
                               
                                <div class="six wide column" id="Panel2">

                                    <h4 class="ui horizontal divider header">
                                        <i class="location arrow icon"></i>
                                    </h4>
                                        <form id="NewForm2">
                                            <div class="fields">
                                               <div class=" six wide field">
                                                   <label>Codigo</label>
                                               </div>
                                               <div class="ten wide field">
                                                   <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListCodeLocation]" name="CodeLocation"/></div>
                                               </div>
                                           </div>

                                           <div class="fields">
                                               <div class=" six wide field">
                                                   <label>Descripción</label>
                                               </div>
                                               <div class="ten wide field">
                                                   <div class="ui input"><input type="text" placeholder="[@LabelModuleOptionListDescriptionLocation]" name="DescriptionLocation"/></div>
                                               </div>
                                           </div>
                                           <div class="fields">
                                                    <div class="six wide field">
                                                        <label>[@LabelPackageMember]</label>
                                                    </div>
                                                    <div class="ten wide field">
                                                        <select class="ui search dropdown" name="ProgrammingMember">
                                                            <option value="">[@LabelPackageOptionList]</option>
                                                            [@PackageMemberOptionList]
                                                        </select>
                                                    </div>
                                                </div>
                                            <!--div class="fields">
                                                <div class="six wide field">
                                                    <label>Servicios:</label>
                                                </div>
                                                <div class="ten wide field">
                                                    <div class="ui toggle checkbox" style="right: 53%">
                                                        <input type="checkbox" name="service1">
                                                        <label><b>TV</b></label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="ui toggle checkbox" style="right: 31%">
                                                        <input type="checkbox" name="service2">
                                                        <label><b>Mensajes</b></label>
                                                    </div>
                                                </div>
                                            </div-->  
                                        </form>
                                </div>
                            </div>
                            <div class="ButtonBox">
                                <button type="submit" class="SubmitAccept small primary ui button" id="SaveMemberLocation">[@LabelButtonAccept]</button>
                                <button type="button" class="SubmitCancel small grey ui button" id="Cancel">[@LabelButtonCancel]</button>
                                <button type="button" class="SubmitClear small ui button">[@LabelButtonClear]</button>
                            </div>

                        </div>
                    </div>

                    <div id="Tab3">
                        <div class="ui form">
                            <h4 class="ui dividing header">[@LabelHeaderFormEditMember]</h4>
                            <div class="ui centered grid" style="height: 500px;">
                                
                                <div class="six wide column" id="EditPanel2">
                                    <h4 class="ui horizontal divider header">
                                        <i class="location arrow icon"></i>
                                        [@LabelLocation]
                                    </h4>
                                        <form id="EditNewForm2">

                                            <input type="text" hidden name="IdLocation"/>

                                            <div class="fields">
                                               <div class=" six wide field">
                                                   <label>[@LabelEditCodeLocation]</label>
                                               </div>
                                               <div class="field">
                                                   <div class="ui disabled input"><input type="text" name="EditCodeLocation"/></div>
                                               </div>
                                           </div>

                                           <div class="fields">
                                               <div class=" six wide field">
                                                   <label>Descripción</label>
                                               </div>
                                               <div class="field">
                                                   <div class="ui input"><input type="text" name="EditDescriptionLocation"/></div>
                                               </div>
                                           </div>

                                            <div class="field">
                                                <select class="ui search dropdown" name="EditProgrammingMember">
                                                    <option value="">[@LabelPackageOptionList]</option>
                                                    [@PackageMemberOptionList]
                                                </select>
                                            </div>
                                            <!--div class="fields">
                                                <div class="six wide field">
                                                    <label>Servicios:</label>
                                                </div>
                                                <div class="ten wide field">
                                                    <div class="ui toggle checkbox" style="right: 53%">
                                                        <input type="checkbox" name="service1">
                                                        <label><b>TV</b></label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="ui toggle checkbox" style="right: 31%">
                                                        <input type="checkbox" name="service2">
                                                        <label><b>Mensajes</b></label>
                                                    </div>
                                                </div>
                                            </div-->
                                            </div>
                                        </form>
                                </div>
                            </div>
                 
                            <div class="ButtonBox">
                                <button type="submit" class="SubmitAccept small primary ui button" id="EditSaveMemberLocation">[@LabelButtonAccept]</button>
                                <button type="button" class="SubmitCancel small grey ui button" id="SaveMemberLocationCancel">[@LabelButtonCancel]</button>
                            </div>

                        </div>
                    </div>
                    <!-- ventana emergente de miembros para agregar tarjeta-->
                    <div id="Tab5">
                        <div class="PanelStep" title="[@LabelTitleDevicesPanel]" id="PrincipalPanel">
                            <!-- div que contiene los dos -->
                            <div class="ButtonPanel" id="DivPadre">
                                <h4 class="ui header">
                                    <div class="content">
                                      <div class="sub header">[@LabelInstructionsPrincipalPanel]</div>
                                    </div>
                                  </h4>

                                <div class="BoxEditionSimple">
                                    <div class="ui card teal MemberCard">
                                        <div class="content">
                                            <!--<label class="header">[@LabelLocationCode]</label>-->
                                            
                                             <a class="ui teal huge ribbon label" id="CodeMemberAdmin"></a>

                                            <div class="description HeaderMemberCard">
                                                
                                                <label class="header">[@LabelDescriptionMember]</label>
                                                <span class="meta" id="NameAdmin"></span>
                                                <span class="meta" id="LastNameAdmin"></span>
                                                <br>
                                                <label class="header">[@LabelDescriptionLocation]</label>
                                                <span class="meta" id="DescriptionAdmin"></span>
                                                <span class="meta" id="LocationCodeAdmin"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui mini modal">
                                    <div class="ui form">
                                        <form id="EditFormLocationDevice" method="post" name="EditForm" action="">
                                            <input type="text" hidden name="EditDeviceId"/>
                                            <h2 class="ui center aligned icon header">
                                                <i class="marker green icon"></i>
                                                <div class="content">
                                                    Especifique la ubicacion del dispositivo para localizarlo con mayor facilidad.
                                                    <div class="sub header">
                                                        <div class="fields">
                                                            <div class="four wide field">
                                                                <label style="float: right;">[@LabelDescriptionLocation]</label>
                                                            </div>
                                                            <div class="ten wide field">
                                                                <div class="ui input"><input type="text" name="EditDeviceLocation"/></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </h2>
                                            
                                            <div class="ButtonBox">
                                                <button type="button" class="SubmitAccept small primary ui button" id="SaveEditLocationDevice">[@LabelButtonAccept]</button>
                                                <button type="button" class="SubmitCancelEditLocationDevice small grey ui button" id="CancelEditLocationDevice">[@LabelButtonCancel]</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <div id="DivButtons">
                                    <div class="ui massive basic icon buttons" >
                                        <button type="button" class="ui button" id="ADDevice" data-tooltip="[@LabelButtonAdd]"><i class="plus icon"></i></button>
                                        <button type="button" class="ui button" id="DeleteDevice" data-tooltip="[@LabelButtonQuit]"><i class="minus icon"></i></button>
                                        <button type="button" class="ui button" id="ChangeDeviceLocation" data-tooltip="[@LabelButtonChangeLocation]"><i class="marker icon"></i></button>
                                        <!--button type="button" class="ui button" id="RestartAll" data-tooltip="[@LabelButtonRT]"><i class="retweet icon"></i></button>
                                        <button type="button" class="ui button" id="RestartDevice" data-tooltip="[@LabelButtonRestart]"><i class="repeat icon"></i></button>
                                        <button type="button" class="ui button" id="ParentalControl" data-tooltip="[@LabelButtonPC]" ><i class="child icon"></i></button-->
                                        <button type="button" class="ui button" id="CancelDevicesPanel"  data-tooltip="[@LabelButtonCancel]"><i class="cancel icon"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- div que contiene los dos -->
                            <div class="ui clearing divider"></div>
                            <!-- tercer div -->
                            <div id="DivTable">
                                <div id="DevicesList" ></div>
                            </div>
                            <!-- tercer div -->
                        </div>
                        <!-- Aqui termina e primer div-->
                        <div class="PanelStep" title="[@LabelInstructionsLimboPanel]" id="LimboPanel">
                            <div>
                                <div id="DevicesListLimbo" ></div>
                            </div>
                            <br><br>
                            <div class="ButtonBox">
                                <button type="button" class="SubmitAccept small primary ui button" id="ADD">[@LabelButtonAdd]</button>
                                <button type="button" class="SubmitCancel small grey ui button" id="Cancel2">[@LabelButtonCancel]</button>
                            </div>
                        </div>

                        <div class="PanelStep" title="Control parental" id="ParentalPanel">

                            <div id="parental_box">
                                <form name="form1" id="form1">
                                    <input type="text" hidden name="idDispositivo"/>
                                    <div id="program_advisory">
                                        <h3 class="ui horizontal divider header">
                                            <i class="unhide blue icon"></i>
                                            [@Advisory]
                                        </h3>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check1">
                                            <label><b><i class="announcement red icon"></i>[@Language]</b></label>
                                        </div>
                                        <br><br>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check2">
                                            <label><b><i class="heterosexual red icon"></i>[@Nudity]</b></label>
                                        </div>
                                        <br><br>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check3">
                                            <label><b><i class="warning circle red icon"></i>[@Violence]</b></label>
                                        </div>
                                        <br><br>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check4">
                                            <label><b><i class="hotel red icon"></i>[@StrongContent]</b></label>
                                        </div>
                                        <br><br>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check5">
                                            <label><b><i class="male red icon"></i>[@AdultSituations]</b></label>
                                        </div>
                                        <br><br>
                                    </div>

                                    <div id="tv_ratings">
                                        <h3 class="ui horizontal divider header">
                                            <i class="star half empty blue icon"></i>
                                            [@TV&MovieRatings]
                                        </h3>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check6">
                                            <label><b><i class="hand paper red icon"></i>[@M18]</b></label>
                                        </div>
                                        <br><br>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check7">
                                            <label><b><i class="hand paper red icon"></i>[@M13]</b></label>
                                        </div>
                                        <br><br>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="check8">
                                            <label><b><i class="empty star red icon"></i>[@NotRated]</b></label>
                                        </div>
                                    </div>

                                </form>

                                <div class="ButtonBox">
                                    <button type="button" class="SubmitAccept small primary ui button" id="SavePC">[@LabelButtonAccept]</button>
                                    <button type="button" class="Cancel small grey ui button" id="CancelPC">[@LabelButtonCancel]</button>
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
    var advanced = 0;
    var form;
    $("#ButtonFilterClear").click(function() {
        $("#GlobalFilter").val("");
        $('#GlobalFilter').keyup();
    });
    
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });

    $('#EditCodeMemberAdvanced').click(function(){
        advanced = 1;
        form = $('#EditNewForm1').serializeArray();
        $('#EditCodeMemberLocation').removeClass('disabled');
        $('#EditMailMemberLocation').val('info@vdm.com');
        $(this).addClass('disabled');
        $('#EditCodeMemberCancelAdvanced').removeClass('disabled');
    });

    $('#EditCodeMemberCancelAdvanced').click(function(){
        advanced = 0;
        $("input[name='IdMember']").val(form[0]['value']);
        $("input[name='EditCodeMemberLocation']").val(form[1]['value']);
        $("input[name='EditTitleMemberLocation']").val(form[2]['value']);
        $("input[name='EditNameMemberLocation']").val(form[3]['value']);
        $("input[name='EditLastNameLocation']").val(form[4]['value']);
        $("input[name='EditMailMemberLocation']").val(form[5]['value']);
        $("select[name='EditProgrammingMember']").dropdown("refresh");
        $("select[name='EditProgrammingMember']").dropdown("set selected", form[6]['value']);
        $('#EditCodeMemberLocation').addClass('disabled');
        $(this).addClass('disabled');
        $('#EditCodeMemberAdvanced').removeClass('disabled');
    });

    $('#ParentalPanel').slideToggle('hide');
    $('#LimboPanel').slideToggle('hide');
    $('#RestartDevicd').attr("disabled","disabled");
    $('#ParentalControl').attr("disabled","disabled");
    $('#ADD').attr("disabled","disabled");
    $('#DeleteDevice').attr("disabled","disabled");
    $('#ChangeDeviceLocation').attr("disabled","disabled");
    $('#LocationList').puidatatable({
            selectionMode: 'single',
            resizableColumns: true,
            columnResizeMode: 'expand',
            paginator: {
                rows: 10
            },
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [

                { field: 'codigo_locacion', headerText: 'Código',sortable: true, filter: true },
                { field: 'descripcion_locacion', headerText: 'Descripción',sortable: true, filter: true },
                { field: 'epg', headerText: 'EPG',sortable: true, filter: true,
                    content: function(response) {
                        if(response.epg === '1') {
                             var color = 'green';
                             var epgtext = 'ON';
                        }
                        else if(response.epg === '0') {
                             var color = 'grey';
                             var epgtext = 'OFF';
                        }
                        return $('<span style="color:'+ color +'; text-transform: uppercase; ">'+ epgtext +'</span>');
                    }
                }


            ],
            globalFilter: '#GlobalFilter',
        datasource: function(callback) {
            $.ajax({
                type: "GET",
                url: '../Querys/Member.php?Option=SelectLocations',
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
            CodeMemberLocation: {
                identifier : 'CodeMemberLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageCodeMemberLocation]' } ]
            },
            MailMemberLocation: {
                identifier : 'MailMemberLocation',
                rules: [ { type   : 'email', prompt : '[@MessageMailMemberLocation]' } ]
            },
            ProgrammingMember: {
                identifier : 'ProgrammingMember',
                rules: [ { type   : 'empty', prompt : '[@MessageProgramingMember]' } ]
            },
            CodeLocation: {
                identifier : 'CodeLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageCodeLocation]' } ]
            },
            StatusLocation: {
                identifier : 'StatusLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationStatusId]' } ]
            },
            KeyLocation: {
                identifier : 'KeyLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationKey]' },
                { type   : 'minLength[4]', prompt : '[@MessageInputLenghtPass]' } ]
            },
            IdModuleLocation: {
                identifier : 'IdModuleLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationModule]' } ]
            },
            TitleMemberLocation: {
                identifier : 'TitleMemberLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputTitleMember]' } ]
            },
            NameMemberLocation: {
                identifier : 'NameMemberLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageNameMemberLocation]' } ]
            },
            LastNameLocation: {
                identifier : 'LastNameLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageLastNameLocation]' } ]
            },
            DirectionLocation: {
                identifier : 'DirectionLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationDirection]' } ]
            },
            EditCodeMemberLocation: {
                identifier : 'EditCodeMemberLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageCodeMemberLocation]' } ]
            },
            EditMailMemberLocation: {
                identifier : 'EditMailMemberLocation',
                rules: [ { type   : 'email', prompt : '[@MessageMailMemberLocation]' } ]
            },
            EditProgramingMember: {
                identifier : 'EditProgramingMember',
                rules: [ { type   : 'empty', prompt : '[@MessageProgramingMember]' } ]
            },
            EditCodeLocation: {
                identifier : 'EditCodeLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationCode]' } ]
            },
            EditStatusLocation: {
                identifier : 'EditStatusLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationCode]' } ]
            },
            EditKeyLocation: {
                identifier : 'EditKeyLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationKey]' },
                { type   : 'minLength[4]', prompt : '[@MessageInputLenghtPass]' } ]
            },
            EditIdModuleLocation: {
                identifier : 'EditIdModuleLocation',
                rules: [ { type   : 'empty', prompt : '[@MessageInputLocationType]' } ]
            }
            
          },
          inline : true,
          on     : 'blur'

        })
      ;

      $('#principal').on('click', function(event){
            $('#LocationList').puidatatable('reload');
            $('.Tabs').puitabview('disable', 2);
            $('.Tabs').puitabview('disable', 3);
            event.preventDefault();
      });

     $('#SaveMemberLocation').click(function (event) {
         var datas = $('#NewForm2').serializeArray();
         console.log(datas);
         if(datas[0]['value']!==""){
            $.ajax({
                type: "POST",
                url: "../Querys/Member.php?Option=InsertMember",
                data: datas,
                success: function (response) {

                    var data_array = $.parseJSON(response);
                    console.log(data_array);
                    if(data_array['Response'] > 0){
                        addMessage('info', { summary: 'info', detail: 'Se han guardado correctamente sus datos' });
                        $('#LocationList').puidatatable('reload');
                        $('.Tabs').puitabview('select', 0);
                        setTimeout(function(){
                            acceptForm();
                        }, 3000);
                    }else{
                      console.log("1");
                        addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                    }
                }
            });
        }else{
          console.log("2");
            addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail })
        }
        event.preventDefault();
    });

    /* TAB 3: EDITAR REGISTRO SELECCIONADO */
    $('#EditSaveMemberLocation').click(function (event) {
        var Editdata = $('#EditNewForm1').serializeArray();
        var Editdatas = $('#EditNewForm2').serializeArray();
        if(Editdata[0]['value']!=="" && Editdata[4]['value']!=="" && Editdata[5]['value']!=="" && Editdatas[0]['value']!=="" && Editdatas[1]['value']!=="" && Editdatas[2]['value']!=="" && Editdatas[5]['value']!=="" && advanced === 0){
            $.ajax({
                type: "POST",
                url: "../Querys/Member.php?Option=EditMember",
                data: Editdata,
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    if(data_array['Response'] >= 0){
                        if(Editdatas[0]['value']!=="" && Editdatas[1]['value']!=="" && Editdatas[2]['value']!=="" && Editdatas[5]['value']!==""){
                            $.ajax({
                                type: "POST",
                                url: "../Querys/Member.php?Option=EditLocation",
                                data: { IdLocation: Editdatas[0]['value'], EditCodeLocation: Editdatas[1]['value'], EditStatusLocation: Editdatas[2]['value'], EditKeyLocation: Editdatas[3]['value'], EditDirectionLocation: Editdatas[4]['value'], EditDescriptionLocation: Editdatas[5]['value'], EditIdModuleLocation: Editdatas[6]['value'], EditMemberId: Editdata[1]['value'] },
                                success: function (response) {
                                    var data_array = $.parseJSON(response);
                                    var MessageOption  = data_array['MessageOption'];
                                    var MessageSummary = data_array['MessageSummary'];
                                    var MessageDetail  = data_array['MessageDetail'];
                                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });

                                }
                            });
                        } else {
                            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                        }
                    }else{
                        addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                    }

                }
            });
        }else if(advanced === 1){
            var Editdata = $('#EditNewForm1').serializeArray();
            var Editdatas = $('#EditNewForm2').serializeArray();
            //console.log(Editdata);
            //console.log(Editdatas);
            $.ajax({
                type: "POST",
                url: "../Querys/Member.php?Option=EditMemberOfLocation",
                data: { IdLocation: Editdatas[0]['value'], EditMemberId: 'DEFAULT' }, /* HARDCORE DETECTED !!! */
                success: function (response) {
                    var data_array = $.parseJSON(response);
                    if(Editdata[0]['value']!=="" && Editdata[4]['value']!=="" && Editdata[5]['value']!=="" && Editdatas[0]['value']!=="" && Editdatas[1]['value']!=="" && Editdatas[2]['value']!=="" && Editdatas[5]['value']!=="" && data_array['Response']===1){
                        $.ajax({
                            type: "POST",
                            url: "../Querys/Member.php?Option=EditMember",
                            data: Editdata,
                            success: function (response) {
                                var data_array = $.parseJSON(response);
                                if(data_array['Response'] >= 0){
                                    if(Editdatas[0]['value']!=="" && Editdatas[1]['value']!=="" && Editdatas[2]['value']!=="" && Editdatas[5]['value']!==""){
                                        $.ajax({
                                            type: "POST",
                                            url: "../Querys/Member.php?Option=EditLocation",
                                            data: { IdLocation: Editdatas[0]['value'], EditCodeLocation: Editdatas[1]['value'], EditStatusLocation: Editdatas[2]['value'], EditKeyLocation: Editdatas[3]['value'], EditDirectionLocation: Editdatas[4]['value'], EditDescriptionLocation: Editdatas[5]['value'], EditIdModuleLocation: Editdatas[6]['value'], EditMemberId: Editdata[1]['value'] },
                                            success: function (response) {
                                                var data_array = $.parseJSON(response);
                                                var MessageOption  = data_array['MessageOption'];
                                                var MessageSummary = data_array['MessageSummary'];
                                                var MessageDetail  = data_array['MessageDetail'];
                                                addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                                                advanced = 0;
                                            }
                                        });
                                    } else {
                                        addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                                    }
                                }else{
                                    addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                                }

                            }
                        });
                    }else{
                        addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                    }
                }
            });
        }else{
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
        $('.Tabs').form('clear');
        $('#LocationList').puidatatable('reload');
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        event.preventDefault();
        $('.Tabs').puitabview('select', 0);
    });
    var AvatarsURL = "[@AvatarsURL]";
     $('#EditLocation').click(function (event) {
        var selection = $('#LocationList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $("input[name='IdMember']").val(selection[0].id_miembro);
                $("input[name='EditCodeMemberLocation']").val(selection[0].codigo_miembro);
                $("input[name='EditTitleMemberLocation']").val(selection[0].titulo_miembro);
                $("input[name='EditNameMemberLocation']").val(selection[0].nombre_miembro);
                $("input[name='EditLastNameLocation']").val(selection[0].apellido_miembro);
                $("input[name='EditMailMemberLocation']").val(selection[0].correo_miembro);

                $("select[name='EditProgrammingMember']").dropdown("refresh");
                $("select[name='EditProgrammingMember']").dropdown("set selected", selection[0].id_paquete);

                //Locación
                $("input[name='IdLocation']").val(selection[0].id_locacion);
                $("input[name='EditCodeLocation']").val(selection[0].codigo_locacion);

                $("select[name='EditStatusLocation']").dropdown("refresh");
                $("select[name='EditStatusLocation']").dropdown("set selected",selection[0].id_estatus_locacion);

                $("input[name='EditKeyLocation']").val(Base64.decode(selection[0].clave_locacion));
                $("input[name='EditDirectionLocation']").val(selection[0].direccion_locacion);
                $("input[name='EditDescriptionLocation']").val(selection[0].descripcion_locacion);

                $("select[name='EditIdModuleLocation']").dropdown("refresh");
                $("select[name='EditIdModuleLocation']").dropdown("set selected", selection[0].id_modulo);

                $("#CodeMember").text(selection[0].codigo_miembro);
                $("#Title").text(selection[0].titulo_miembro);
                $("#Name").text(selection[0].nombre_miembro);
                $("#LastName").text(selection[0].apellido_miembro);
                $("#Description").text(selection[0].descripcion_locacion);
                $("#LocationCode").text(selection[0].codigo_locacion);
                $("#Mail").text(selection[0].correo_miembro);
                $("#Status").text(selection[0].descripcion_estatus_locacion);
                $("#Module").text(selection[0].nombre_modulo);
                $("#UsersAvatar").attr('src', AvatarsURL + 'default.png');

            }
        } else {
            addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectMember]' });
        }
        event.preventDefault();
    });

//Tab4

    var Location = 0;

    $('#ShowDevicesLocation').click(function(event){
        var selection = $('#LocationList').puidatatable('getSelection');
        //console.log(selection);
        Location = selection[0].id_locacion;
        //console.log(Location);
        if (selection.length === 1) {
            if (selection[0]) {
                $("#CodeMemberAdmin").text(selection[0].codigo_miembro);
                $("#TitleAdmin").text(selection[0].titulo_miembro);
                $("#NameAdmin").text(selection[0].nombre_miembro);
                $("#LastNameAdmin").text(selection[0].apellido_miembro);
                $("#DescriptionAdmin").text(selection[0].descripcion_locacion);
                $("#LocationCodeAdmin").text(selection[0].codigo_locacion);
                $("#MailAdmin").text(selection[0].correo_miembro);
                $("#StatusAdmin").text(selection[0].descripcion_estatus_locacion);
                $("#ModuleAdmin").text(selection[0].nombre_modulo);
                $("#UsersAvatarAdmin").attr('src', AvatarsURL + 'default.png');
                $('#DevicesList').puidatatable({
                    selectionMode: 'single',
                    resizableColumns: true,
                    columnResizeMode: 'expand',
                    paginator: {
                        rows: 8
                    },
                    responsive: true,
                    emptyMessage: '[@LabelEmptyMessage]',
                    columns: [
                        { field: 'mac_address', headerText: 'MAC', sortable: true, filter: true },
                        { field: 'ip', headerText: 'IP',sortable: true, filter: true },
                        { field: 'ubicacion_dispositivo', headerText: 'Ubicación',sortable: true, filter: true },
                        { field: 'version_software', headerText: 'Software',sortable: true, filter: true },
                        { field: 'modelo', headerText: 'Modelo',sortable: true, filter: true }

                    ],
                    globalFilter: '#GlobalFilter',
                    datasource: function(callback) {
                        $.ajax({
                            type: "POST",
                            url: '../Querys/Member.php?Option=SelectDevicesLocations',
                            data: { idLocation: selection[0].id_locacion },
                            dataType: "json",
                            context: this,
                            success: function(response) {
                                callback.call(this, response);
                            }
                        });
                    },
                    rowSelect: function(event) {

                        $('form').form('clear');
                        $('#RestartDevice').removeAttr('disabled');
                        $('#DeleteDevice').removeAttr('disabled');
                        $('#ChangeDeviceLocation').removeAttr('disabled');
                        $('#ParentalControl').removeAttr('disabled');
                        $("#CodeMember").text(selection[0].codigo_miembro);

                        //$('#RD').slideToggle('slow');
                        //$('#ED').slideToggle('slow');
                        //$('#CP').slideToggle('slow');
                        event.preventDefault();
                    }
                });
            }
        } else {
            addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectDispositive]' });
        }
        event.preventDefault();
    });

    $('#RestartDevice').click(function (event) {
        var selection = $('#DevicesList').puidatatable('getSelection');
        if (selection[0]) {
            $.ajax({
                type: "POST",
                url: '../Querys/Member.php?Option=RestartDevice',
                data: { ip: selection[0].ip },
                success: function(response) {
                    var data_array = $.parseJSON(response);
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    //$('.Tabs').form('clear');
                    //$('#LocationList').puidatatable('reload');
                    $('#DevicesList').puidatatable('reload');
                    //$('.Tabs').puitabview('select', 0);
                    //$('.Tabs').puitabview('disable', 2);
                    //$('.Tabs').puitabview('disable', 3);
                }
            });
        }else{
            addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectDispositive]' });
        }
        event.preventDefault();
    });

    $('#RestartAll').click(function (event) {
        $("#DevicesList tbody tr").each(function () {
            var td = 0;
            $(this).children("td").each(function () {
                if(td === 1){
                    var IP = $(this).text();
                    $.ajax({
                        type: "POST",
                        url: '../Querys/Member.php?Option=RestartAllDevices',
                        data: { ip: IP },
                        success: function(response) {
                          var data_array = $.parseJSON(response);
                          var MessageOption  = data_array['MessageOption'];
                          var MessageSummary = data_array['MessageSummary'];
                          var MessageDetail  = data_array['MessageDetail'];
                          addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                          //$('.Tabs').form('clear');
                          //$('#LocationList').puidatatable('reload');
                          $('#DevicesList').puidatatable('reload');
                          //$('.Tabs').puitabview('select', 0);
                          //$('.Tabs').puitabview('disable', 2);
                          //$('.Tabs').puitabview('disable', 3);
                        }
                    });
                }else{ }
                td++;
            });
        });
        event.preventDefault();
    });

    $('#ADDevice').click(function (event) {

        $('#PrincipalPanel').slideToggle('hide');
        $('#LimboPanel').slideToggle('slow');

        $('#DevicesListLimbo').puidatatable({

            selectionMode: 'multiple',
            paginator: {
                rows: 8
            },
            responsive: true,
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                        { field: 'mac_address', headerText: 'MAC', sortable: true, filter: true },
                        { field: 'ip', headerText: 'IP',sortable: true, filter: true },
                        { field: 'ubicacion_dispositivo', headerText: 'Ubicación',sortable: true, filter: true },
                        { field: 'version_software', headerText: 'Software',sortable: true, filter: true },
                        { field: 'modelo', headerText: 'Modelo',sortable: true, filter: true },
                        { field: 'nombre_paquete', headerText: 'Paquete',sortable: true, filter: true }

                    ],
            globalFilter: '#GlobalFilter',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: '../Querys/Member.php?Option=SelectLimboDevices',
                    dataType: "json",
                    context: this,
                    success: function(response) {
                        callback.call(this, response);
                    }
                });
            },
            rowSelect: function(event) {
                $('#ADD').removeAttr('disabled');
                $('#ADD').removeClass('ui-state-disabled');
                event.preventDefault();
            }
        });
        event.preventDefault();
    });

    $('#ADD').click(function (event) {
        var selection = $('#DevicesListLimbo').puidatatable('getSelection');
        if (selection[0]) {
            for(var i=0; i<selection.length; i++){
                $.ajax({
                    type: "POST",
                    url: '../Querys/Member.php?Option=ADDDevice',
                    data: { id: selection[i].id_dispositivo, IdLocation: Location },
                    success: function(response) {
                      var data_array = $.parseJSON(response);
                      var MessageOption  = data_array['MessageOption'];
                      var MessageSummary = data_array['MessageSummary'];
                      var MessageDetail  = data_array['MessageDetail'];
                      addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                });
            }

        }else{
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageDevicesValidate]' });
        }
        $('.Tabs').form('clear');
        //$('#LocationList').puidatatable('reload');
        $('#DevicesList').puidatatable('reload');
        //$('.Tabs').puitabview('select', 0);
        //$('.Tabs').puitabview('disable', 2);
        //$('.Tabs').puitabview('disable', 3);
        $('#PrincipalPanel').slideToggle('slow');
        $('#LimboPanel').slideToggle('hide');
        event.preventDefault();
    });

    $('#DeleteDevice').click(function (event) {
        var selection = $('#DevicesList').puidatatable('getSelection');

        console.log(selection[0].id_dispositivo);
        if (selection[0]) {
            $.ajax({
                type: "POST",
                url: '../Querys/Member.php?Option=DeleteDevice',
                data: { id: selection[0].id_dispositivo },
                success: function(response) {
                  var data_array = $.parseJSON(response);
                  var MessageOption  = data_array['MessageOption'];
                  var MessageSummary = data_array['MessageSummary'];
                  var MessageDetail  = data_array['MessageDetail'];
                  addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                }
            });
        }else{
            addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectDispositive]' });
        }
        //$('#LimboPanel').slideToggle('hide');
        //$('#LocationList').puidatatable('reload');
        $('#DevicesList').puidatatable('reload');
        //$('.Tabs').puitabview('select', 0);
        //$('.Tabs').puitabview('disable', 2);
        //$('.Tabs').puitabview('disable', 3);
        event.preventDefault();
    });

    $('#ParentalControl').click(function (event) {
        var selection = $('#DevicesList').puidatatable('getSelection');
        if (selection.length === 1) {
            if (selection[0]) {
                $("input[name='idDispositivo']").val(selection[0].id_dispositivo);
                $.ajax({
                    type: "POST",
                    url: '../Querys/Member.php?Option=ParentalControlDevice',
                    data: { id: selection[0].id_dispositivo },
                    success: function(response) {
                        var data_array = $.parseJSON(response);
                      $("input[name='check1']").prop("checked", Number(data_array[0]['lenguaje']));
                      $("input[name='check2']").prop("checked", Number(data_array[0]['desnudos']));
                      $("input[name='check3']").prop("checked", Number(data_array[0]['violencia']));
                      $("input[name='check4']").prop("checked", Number(data_array[0]['contenido_fuerte']));
                      $("input[name='check5']").prop("checked", Number(data_array[0]['situaciones_adultas']));
                      $("input[name='check6']").prop("checked", Number(data_array[0]['mayores_dieciocho']));
                      $("input[name='check7']").prop("checked", Number(data_array[0]['mayores_trece']));
                      $("input[name='check8']").prop("checked", Number(data_array[0]['sin_clasificacion']));
                    }
                });
            }else {
                addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectMember]' });
            }
        }else {
            addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectMember]' });
        }
        $('#PrincipalPanel').slideToggle('hide');
        $('#ParentalPanel').slideToggle('slow');
        event.preventDefault();
    });

    $('#Cancel').click(function (event) {
        cancelForm();
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('#LocationList').puidatatable('reload');
        event.preventDefault();
    });

    $('#CancelDevicesPanel').click(function (event) {
        cancelForm();
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('#LocationList').puidatatable('reload');
        event.preventDefault();
    });

    $('#Cancel2').click(function (event) {
        $('#PrincipalPanel').slideToggle('slow');
        $('#LimboPanel').slideToggle('hide');
        $('#RestartDevice').attr("disabled","disabled");
        $('#ParentalControl').attr("disabled","disabled");
        $('#ADD').attr("disabled","disabled");
        $('#DeleteDevice').attr("disabled","disabled");
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        event.preventDefault();
    });

    $('#CancelPC').click(function (event) {
        $('#PrincipalPanel').slideToggle('slow');
        $('#ParentalPanel').slideToggle('hide');
        $('#DevicesList').puidatatable('reload');
        $('#RestartDevice').attr("disabled","disabled");
        $('#ParentalControl').attr("disabled","disabled");
        $('#ADD').attr("disabled","disabled");
        $('#DeleteDevice').attr("disabled","disabled");
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        event.preventDefault();
    });

    $('#SavePC').click(function (event) {
        var dispositivo = 0;
        var estado = 0;
        var lenguaje = 0;
        var desnudos = 0;
        var violencia = 0;
        var contenido_fuerte = 0;
        var situaciones_adultas = 0;
        var mayores_dieciocho = 0;
        var mayores_trece = 0;
        var sin_clasificacion = 0;

        dispositivo = $("input[name='idDispositivo']").val();
        if($("input[name='check1']:checked").val()){
            lenguaje = 1;
            estado = 1;
        }else{ lenguaje = 0; }
        if($("input[name='check2']:checked").val()){
            desnudos = 1;
            estado = 1;
        }else{ desnudos = 0; }
        if($("input[name='check3']:checked").val()){
            violencia = 1;
            estado = 1;
        }else{ violencia = 0; }
        if($("input[name='check4']:checked").val()){
            contenido_fuerte = 1;
            estado = 1;
        }else{ contenido_fuerte = 0; }
        if($("input[name='check5']:checked").val()){
            situaciones_adultas = 1;
            estado = 1;
        }else{ situaciones_adultas = 0; }
        if($("input[name='check6']:checked").val()){
            mayores_dieciocho = 1;
            estado = 1;
        }else{ mayores_dieciocho = 0; }
        if($("input[name='check7']:checked").val()){
            mayores_trece = 1;
            estado = 1;
        }else{ mayores_trece = 0; }
        if($("input[name='check8']:checked").val()){
            sin_clasificacion = 1;
            estado = 1;
        }else{ sin_clasificacion = 0; }

        $.ajax({
            type: "POST",
            url: '../Querys/Member.php?Option=ParentalControlUpdate',
            data: { id: dispositivo, est: estado, leng: lenguaje, des: desnudos, vio: violencia, cf: contenido_fuerte, sa: situaciones_adultas, m18: mayores_dieciocho, m13: mayores_trece, sc: sin_clasificacion },
            success: function(response) {
                var data_array = $.parseJSON(response);
                var MessageOption  = data_array['MessageOption'];
                var MessageSummary = data_array['MessageSummary'];
                var MessageDetail  = data_array['MessageDetail'];
                $('#PrincipalPanel').slideToggle('slow');
                $('#ParentalPanel').slideToggle('hide');
                $('#DevicesList').puidatatable('reload');
                $('#RestartDevice').attr("disabled","disabled");
                $('#ParentalControl').attr("disabled","disabled");
                $('#ADD').attr("disabled","disabled");
                $('#DeleteDevice').attr("disabled","disabled");
                $('.Tabs').puitabview('disable', 2);
                $('.Tabs').puitabview('disable', 3);
                addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
            }
        });
        event.preventDefault();
    });

    $('#SaveMemberLocationCancel').click(function (event) {
        cancelForm();
        $('.Tabs').puitabview('disable', 2);
        $('.Tabs').puitabview('disable', 3);
        $('#LimboPanel').puitabview('reload');
        event.preventDefault();
    });

    $('#ChangeDeviceLocation').click(function(){
        var selection = $('#DevicesList').puidatatable('getSelection');
        $('.ui.mini.modal')
            .modal('setting', 'closable', false)
            .modal('show');
        $("input[name='EditDeviceId']").val(selection[0].id_dispositivo);
        $("input[name='EditDeviceLocation']").val(selection[0].ubicacion_dispositivo);
    });
    
    $('#CancelEditLocationDevice').click(function(){
        $('.ui.mini.modal')
            .modal('setting', 'closable', false)
            .modal('hide');
    });
    
    $('#SaveEditLocationDevice').click(function(event){
        var data = $('#EditFormLocationDevice').serializeArray();
        //console.log(data);
        if(data.length > 0){
            $.ajax({
                type: "POST",
                url: '../Querys/Member.php?Option=ChangeDeviceLocation',
                data: data,
                success: function(response) {
                  var data_array = $.parseJSON(response);
                  var MessageOption  = data_array['MessageOption'];
                  var MessageSummary = data_array['MessageSummary'];
                  var MessageDetail  = data_array['MessageDetail'];
                  $('.ui.mini.modal').modal('hide');
                  addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                  $('#DevicesList').puidatatable('reload');
                }
            });
        }else{
            addMessage('[@OptionSelectLocation]', { summary: '[@SummarySelectLocation]', detail: '[@MessageSelectMember]' });
        }
        event.preventDefault();
    });

</script>
