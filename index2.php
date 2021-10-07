<?php

    echo "<script type='text/javascript'>
    
    if(typeof(ASTB) !== 'undefined'){
        var big_mac = ASTB.GetMacAddress();
    }else{
        var big_mac = '00:00:00:00:00'
    }    
    
    //var big_mac = 'ASTB.GetMacAddress()';
    
    </script>";
    
    echo "<iframe id='maind' src='index.php' height='100%' frameborder=0 marginwidth=0 marginheight=0 onload='this.contentWindow.focus()' style= 'margin:0; padding:0; display:block; width:100%; border:none;'></iframe>";
    //echo "<frameset>";
    //echo "<frame name='main' src='index.php'>";
    //echo "</frameset>";
    