                    </div>
                </div>
                <!--<div id="content">
                    <a id="panel help open" class="open-close" href="javascript:void(0)" onclick="display()">[@LabelHelpUser]<i class="help circle icon"></i></a>
                    <a id="panel help close" class="open-close" href="javascript:void(0)" onclick="hide()"></a>
                </div>-->
                </div>
            <div id="Message"></div>
        </div>

    </body>
</html>

<script>
  function display() {
      document.getElementById("sidebar").style.width = "400px";
      document.getElementById("content").style.marginLeft = "400px";
      document.getElementById("panel help open").style.display = "none";
      document.getElementById("panel help close").style.display = "inline";
  }

  function hide() {
      document.getElementById("sidebar").style.width = "0";
      document.getElementById("content").style.marginLeft = "0";
      document.getElementById("panel help open").style.display = "inline";
      document.getElementById("panel help close").style.display = "none";
  }    
</script>