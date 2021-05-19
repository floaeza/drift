    <div class="Container thirteen wide column ContainerLayout">
        <div class="ui segment">
            <h2 class="ui header">
                <i class="fa-upload grey icon"></i>
                <div class="content">
                  [@LabelHeaderFirmware]
                  <div class="sub header">[@LabelSubTitleSubmenuFirmware]</div>
                </div>
            </h2>
            <div class="ui clearing divider"></div>

            <div class="ui centered grid">
                <div class="six wide column">
                    <div class="PanelStep" title="[@LabelStepOne] [@LabelInstructionsOne]">
                        <div class="header"></div>
                        <div class="ui form">
                            <form id="DevicesForm" action="">
                                <br>
                                <div class="fields">
                                    <div class="eight wide field">
                                        <label>[@LabelIpDirection]</label>
                                    </div>
                                    <div class="sixteen wide field">
                                        <div class="ui input"><input id="IpDevice" type="text" name="IpDevice" placeholder="000.000.000.000"/></div>
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="eight wide field">
                                        <label>[@LabelMiddlewareOption]</label>
                                    </div>
                                    <div class="sixteen wide field">
                                        <select class="ui dropdown" id="VersionFirmware" name="VersionFirmware">
                                            <option value="">Version firmware</option>
                                            <option value="0">BBINCOTV</option>
                                            <option value="1">BBINCOTV-26</option>
                                            <option value="2">Minerva</option>
                                            <option value="3">BBINCOTV x5x</option>
                                            <option value="4">Minerva x5x</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="fields"id="IDMemberAll">
                                    <div class="eight wide field">
                                        <label>[@LabelFirmwareMember]</label>
                                    </div>
                                    <div class="sixteen wide field">
                                        <select class="ui search dropdown disabled" name="IDMember" id="IDMember">
                                            <option value="">IDMember</option>
                                            [@MembersOptionList]
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="ButtonBox">
                                    <button type="submit" class="SubmitAdd small positive ui button" id="add">[@LabelButtonAdd]</button>
                                    <button type="button" class="SubmitNext small blue ui button" id="next">[@LabelButtonNext]</button>
                                </div>
                            </form>
                            <br>
                            <div class="ListAppend">
                                <div class="ui celled horizontal list"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="six wide column">
                    <div class="PanelStep" title="[@LabelStepTwo] [@LabelInstructionsTwo]">
                        <div id="Consola" class="PanelStepM" title="Salida de consola:"></div>
                        <br>
                        <div class="ButtonBox">
                            <button type="submit" class="SubmitUpgrade positive large ui button" id="upgrade"><i class="upload icon"></i>[@LabelButtonUpgrade]</button>
                            <button type="button" class="clear SubmitClear blue small ui button" id="clear">[@LabelButtonClear]</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Seleccion de contenido -->    
            <div class="ui mini modal" id="SelectMediaProyect">
                <div class="header">Administración de contenido multimedia</div><!-- OJO AQUI ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="content">
                    <div class="ui form">
                        <div class="grouped fields">
                            <label>Seleccione el contenido a mostrar en el administrador</label><!-- OJO AQUI ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <div class="field">
                                <div class="ui slider checkbox">
                                    <input name="throughput" id="VDM" checked="checked" type="radio">
                                    <label>Villas Del Mar</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui slider checkbox">
                                    <input name="throughput" id="VPL" type="radio">
                                    <label>Villa del Palmar Loreto</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui slider checkbox">
                                    <input name="throughput" id="GDL" type="radio">
                                    <label>Guacalito De La Isla</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui slider checkbox checked">
                                    <input name="throughput" id="MRV" type="radio">
                                    <label>Maravilla</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <button type="button" class="SubmitAccept small primary ui button" id="AceptContentSelected" onclick="ChangeURLS5();">[@LabelButtonAccept]</button>
                    <button type="button" class="SubmitCancelModal small grey ui button" id="CancelContentSelected">[@LabelButtonCancel]</button>
                </div>
            </div>
            
            <div class="ui inverted active dimmer" id="preloader">
                <div class="ui indeterminate text centered inline loader" id="loader"></div>
            </div>
        </div>
    </div>
<script>
    //Loader de la pagina
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');    
    });
    
    //Evento que habilita la seleccion de miembro dependiendo de la seleccion de firmware
    $('#VersionFirmware').change(function(){
        if ($(this).val() == 0 || $(this).val() == 1 || $(this).val() == 3) {
            $('.ui.search.dropdown.disabled.selection').removeClass('disabled');
        }else{
            $('.ui.search.dropdown').addClass('disabled');
        }
        
    });

    //Deshabilitamos el boton de Actualizacion
    $('#upgrade').attr("disabled", "disabled");
    
    //Validamos la ip ingresada
    $('.ui.form')
        .form({
            fields: {
                IpDevice: {
                    identifier : 'IpDevice',
                    rules: [
                        {
                        //validacion para una direccion IP
                        type   : 'regExp[/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/]',
                        prompt : '[@MessageInputIpDeviceValid]'
                        }
                    ]
                },
                VersionFirmware: { 
                    identifier : 'VersionFirmware',
                    rules: [ { type   : 'empty', prompt : '[@MessageProgramingMember]' } ]
                }
            },
            inline : true,
            on     : 'blur'
        });
        
    //Variables que almacenaran los datos del formulario
    var Version   = [];
    var ArrayList = [];
    var Member = 0;
    
    //Carga de la lista de dispositivos a actualizar
    $('#DevicesForm').submit(function(event){
        Member = $('#IDMember').val();
        var list = $(this).find('#IpDevice').val();
        var Ver = $(this).find('#VersionFirmware').val();
        if(list !== "" && Ver != ""){
            if(list && ArrayList.length > 0){
                for(var i=0; i<ArrayList.length; i++){
                    console.log(list +' === '+ ArrayList[i]);
                    if(list !== ArrayList[i]){
                        ArrayList.push(list);
                        Version.push(Ver);
                        $('div.ui.celled.horizontal.list').append('<div class="item"><i class="upload green icon"></i><b>' + list + '</b></div>');
                        i=ArrayList.length;
                    }else{
                        addMessage('[@OptionSelectIP]', { summary: '[@SummarySelectIP]', detail: '[@MessageSelectIP]' });
                    }
                  }
            } else if(list && ArrayList.length === 0) {
                ArrayList.push(list);
                Version.push(Ver);
                $('div.ui.celled.horizontal.list').append('<div class="item"><i class="upload green icon"></i><b>' + list + '</b></div>');
            }else{ }
        }else{
          //nothing
        }
        event.preventDefault();
    });
    
    //Paso de parametros con el boton siguiente
    $('#next').click(function () {
        if(ArrayList.length > 0 && Version.length > 0){
          $('#upgrade').removeAttr("disabled");
          $('#add').attr("disabled", true);
          $(this).attr("disabled", true);
        }else{
          addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageListDeviceValidate]' });
        }
    });

    //Envio de datos al servidor para ejecucion de STBremoteconf
    $('.SubmitUpgrade').click(function () {
        //var jsonString = JSON.stringify(ArrayList);
        $(this).attr("disabled", true);
        if(ArrayList !== "" && Version !== ""){
            $.ajax({
                type: "POST",
                url: "../Querys/UpgradeFirmware.php",
                data: { ArrayIp : ArrayList, Firmware : Version, IdMember: Member },
                success: function (r) {
                    var data_array = $.parseJSON(r);
                    
                    var response = data_array['response'];
                                    
                    var container = $(document.createElement('div'));
                    container.attr('class', 'ui-panel-content ui-widget-content remover');
                    container.html(response);
                    $('#Consola').append(container);
                    clearForm();
                    $('div.ui.celled.horizontal.list').html("");
                    Version   = [];
                    ArrayList = [];
                    Member = 0;
                    $('#clear').removeAttr("disabled");
                    
                    var MessageOption  = data_array['response2']['MessageOption'];
                    var MessageSummary = data_array['response2']['MessageSummary'];
                    var MessageDetail  = data_array['response2']['MessageDetail'];                    
                    addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                }
            });
        }else{
            addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
        }
    });

    //Boton limpiar
    $('#clear').puibutton({ icon: 'fa-refresh' }).click(function () {
        $('.ui-panel-content.ui-widget-content.remover').remove();
        Version   = [];
        ArrayList = [];
        Member = 0;
        $('#add').removeAttr("disabled");
        $('#next').removeAttr("disabled");
        $('#upgrade').attr("disabled", "disabled");
        $('div.ui.celled.horizontal.list').html("");
    });

</script>
