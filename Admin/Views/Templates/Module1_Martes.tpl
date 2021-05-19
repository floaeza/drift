<div class="Container thirteen wide column ContainerLayout">
    <div class="ui segment">
        <h2 class="ui header">
            <i class="fa-image grey icon"></i>
            <div class="content">
              [@LabelHeaderMultimedia]
              <div class="sub header">[@LabelSubHeaderMultimedia]</div>
            </div>
        </h2>

        <div class="TabsS">
            <div>
                <div id="Tab1">
                    <div id="Consola" class="PanelStepM BackgroundMedia">
                        <!--div class="ui six doubling cards">
                            [@ListImages]
                        </div-->
                        <div class="ui small images">
                            [@ListImages]
                        </div>
                    </div>
                    <form enctype="multipart/form-data" id="FormUploadAjax" method="post">
                        <!--input type="file" name="image"/-->
                        <div class="ButtonBox">
                            <div class="small primary ui input">
                                <input type="file" name="image[]" multiple>
                            </div>
                            <button type="submit" class="SubmitAccept small primary ui button"/>[@LabelButtonAccept]</button>
                            <button type="button" class="SubmitCancel Cancel small grey ui button">[@LabelButtonCancel]</button>
                            <button type="button" class="SubmitCancelSend small red ui button disabled" id="Delete">[@LabelButtonDelete]</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div style='color: #2185d0; margin: 1%; font-size: 23px;'>Vista preliminar del dia<div/>
        <iframe src='http://10.0.3.10/BBTV/IPTV/content.php?MacAddress=00:00:00:00:00:00&Option=Video' style='width:384px;height:216px; margin: 2%;'></iframe>
        
        <div class="ui inverted active dimmer" id="preloader">
            <div class="ui indeterminate text centered inline loader" id="loader"></div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });

$("#FormUploadAjax").on("submit", function(e){
    var formData = new FormData(document.getElementById("FormUploadAjax"));
    //console.log(formData);
    $.ajax({
        url: "../Querys/Module1_Martes.php?Option=UploadMultimedia",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){
            var MessageOption  = response['MessageOption'];
            var MessageSummary = response['MessageSummary'];
            var MessageDetail  = response['MessageDetail'];
            addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
            location.reload();
        }
    });
    e.preventDefault();
});

var ArrayImages = [];
function Selection(){
    var id = document.activeElement.id;
    var cls = $('#'+id+'').attr('class');
    //alert('id: '+id+' cls: '+cls);
    if(cls === "ui rounded image disabled"){
        //$('#'+id+'').removeClass('disabled');
        var indice = ArrayImages.indexOf($('#'+id+'').attr('src'));
        $('#'+id+'').removeClass('disabled');
        ArrayImages.splice(indice, 1);
    }else{
        $('#'+id+'').addClass('disabled');
        ArrayImages.push($('#'+id+'').attr('src'));
    }
    //alert(ArrayImages.length);
    if(ArrayImages.length > 0){
        $('#Delete').removeClass('disabled');
    }else{ 
        $('#Delete').addClass('disabled'); 
    }
}

$('.Cancel').puibutton({ icon: 'fa-close' }).click(function () {
    location.reload();
});

$('#cancel').click(function(){
    $('.TabsS').puitabview('select', 0);
    $('.TabsS').puitabview('disable', 1);
    $('.TabsS').puitabview('disable', 2);
});

$('#Delete').click(function(){
    $.ajax({
        url: "../Querys/Module1_Martes.php?Option=DeleteMultimedia",
        type: "post",
        dataType: "json",
        data: { ImageArray: ArrayImages },
        success: function(response){
            var MessageOption  = response['MessageOption'];
            var MessageSummary = response['MessageSummary'];
            var MessageDetail  = response['MessageDetail'];
            addMessage(MessageOption, { summary: MessageSummary, detail: MessageDetail });
            location.reload();
        }
    });
});

</script>