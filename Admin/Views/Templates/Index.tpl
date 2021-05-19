<body onload="nobackbutton();" style="background-image: url('.[@PrimaryBackground]'); background-size: cover;">
    <div class="ui middle aligned center aligned grid">
        <div class="column" style="min-width:450px; background-color:white">
            <h2 class="ui image header">
                <img id="LoginImage" src=".[@SystemImage]"/>
            </h2>
            <form class="ui large form" id="Login" method="post" name="Login" action="">
                <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" class="Inputs" placeholder="[@LabelInputEmail]" name="Email" title="[@LabelInputEmail]">
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="password" class="Inputs" placeholder="[@LabelInputPass]" name="Pass" title="[@LabelInputPass]">
                    </div>
                </div>
                <button type="submit" class="SubmitLogin ui fluid large teal button" title="[@LabelButtonLogin]">[@LabelButtonLogin]</button>
                    <!--<div class="ui horizontal divider"><i class="grey large world icon"></i></div>-->
                    <div class="field " style="visibility: hidden">
                        <select class="ui dropdown" name="Language" >
                            <option value="es.php">Español</option>
                            <option value="es.php">English</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div id="Message"></div>
    </div>
</body>
</html>
<script>
    $('#Login').submit(function (event) {
        var MinInputs = 2;
        var ValidateInputs = 0;
            var data = $('#Login').serializeArray();
            console.log(data);
            $.each(data, function(i, field){
                if(!field.value[i]){
                    addMessage('[@OptionMessageType]', { summary: '[@SummaryMessageType]', detail: '[@MessageInputsValidate]' });
                } else {
                    ValidateInputs ++;
                }
            });
        if(ValidateInputs >= MinInputs){
            $.ajax({
                type: "POST",
                url: "./Core/Controllers/IndexController.php",
                data: data,
                success: function (response) {
                    console.log(response);
                    var data_array = $.parseJSON(response);

                    var Session        = data_array['Session'];
                    var MessageOption  = data_array['MessageOption'];
                    var MessageSummary = data_array['MessageSummary'];
                    var MessageDetail  = data_array['MessageDetail'];
                    if (Session === true){
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                        setTimeout(function(){
                            window.location.href = "./Core/Controllers/PrincipalController.php";
                        }, 1000);
                    } else {
                        addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
                    }
                }
            });
        } else {
                // Do nothing
            }
            event.preventDefault();
    });

    $('.ui.form')
        .form({
          fields: {
            Email: {
                identifier : 'Email',
                rules: [ { type   : 'email', prompt : '[@MessageInputEmail]' } ]
            },
            Pass: {
                identifier : 'Pass',
                rules: [ { type   : 'empty', prompt : '[@MessageInputPass]' } ]
            }
          },
          inline : true,
          on     : 'blur'

        })
      ;
</script>
