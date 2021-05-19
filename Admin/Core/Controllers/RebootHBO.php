<?php

    $TelnetPort         = '23';
    $TelnetTimeout      = '10';
    $BytesLenght        = '1000';
    $BytesLenghtMax     = '50000';
    $BytesLenghtSmall   = '32';
    $TelnetClose        = 'exit';
    $TelnetUser         = 'root';
    
    $Telnet = fsockopen('189.170.15.159', $TelnetPort, $errno, $errstr, $TelnetTimeout);

    if(!$Telnet){ 
        // Error al hacer la conexion
        $Response = "Error al tratar de reiniciar";
    } else {
        // Hizo la conexion correctamente
        fgets($Telnet, $BytesLenght);  

        fwrite($Telnet, $TelnetUser."\n", $BytesLenght); 
        fgets($Telnet, $BytesLenght); 

        fwrite($Telnet, $TelnetPass."\n", $BytesLenght);
        fgets($Telnet, $BytesLenght); 

        fgets($Telnet, $BytesLenghtSmall); 

        $CommandA = "ls";
        fwrite($Telnet, $CommandA."\n",$BytesLenght);
        fgets($Telnet, $BytesLenght);

        fwrite($Telnet, $TelnetClose."\n", $BytesLenght); 
        fgets($Telnet, $BytesLenght);

        while (!feof($Telnet)){
            echo $String = fgets($Telnet); echo "<br>";
        }

        fclose($Telnet);

        echo "Amino HBO reniciado"; 

    }