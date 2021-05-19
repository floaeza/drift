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
                            <div class="ui small images">
                                [@ListVideos]
                            </div>
                        </div>
                        <form enctype="multipart/form-data" id="FormUploadVideo" method="post">
                            <!--input type="file" name="image"/-->
                            <div class="ButtonBox">
                                <div class="small primary ui input">
                                    <input type="file" name="video">
                                </div>
                                <button type="submit" class="SubmitAccept small primary ui button"/>[@LabelButtonAccept]</button>
                                <button type="button" class="SubmitCancel Cancel small grey ui button">[@LabelButtonCancel]</button>
                                <button type="button" class="SubmitCancelSend small red ui button disabled" id="Delete">[@LabelButtonDelete]</button>
                            </div>
                        </form>
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
        //document.getElementById('wait').style.display='block';
    });

    $("#FormUploadVideo").on("submit", function(e){
        var formData = new FormData(document.getElementById("FormUploadVideo"));
        //console.log(formData);
        $.ajax({
            url: "../Querys/Multimedia.php?Option=UploadVideo",
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

    var ArrayVideos = [];
    function Selection(){
        var id = document.activeElement.id;
        var cls = $('#'+id+'').attr('class');
        //alert($('#'+id+'').attr('src'));
        if(cls === "disabled"){
            //$('#'+id+'').removeClass('disabled');
            var indice = ArrayVideos.indexOf($('#'+id+'').attr('src'));
            $('#'+id+'').removeClass('disabled');
            //$('#'+id+'').removeClass('tiny');
            //$('#'+id+'').addClass('small');
            $('#'+id+'div').attr('style', 'width:230px; height:150px; background-color: #B4B4B4;');
            //$('#'+id+'').attr('height', '140');
            //$('#'+id+'').attr('border-radius', '0px;');
            ArrayVideos.splice(indice, 1);
        }else{
            $('#'+id+'').addClass('disabled');
            //$('#'+id+'').removeClass('small');
            //$('#'+id+'').addClass('tiny');
            $('#'+id+'div').attr('style', 'width:230px; height:150px; background-color: #db3232;');
            //$('#'+id+'').attr('height', '240');
            //$('#'+id+'').attr('border-radius', '5px;');
            ArrayVideos.push($('#'+id+'').attr('src'));
        }
        //alert(ArrayImages.length);
        if(ArrayVideos.length > 0){
            $('#Delete').removeClass('disabled');
        }else{
            $('#Delete').addClass('disabled'); 
        }
    }
   
    $('.Cancel').puibutton({ icon: 'fa-close' }).click(function () {
        location.reload();
    });
    
    $('#Delete').click(function(){
        $.ajax({
            url: "../Querys/Multimedia.php?Option=DeleteMultimediaVideos",
            type: "post",
            dataType: "json",
            data: { VideosArray: ArrayVideos },
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
