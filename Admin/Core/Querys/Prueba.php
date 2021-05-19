<?php

/* 
 */
    require '../Models/Config.php';
    require '../Models/Database.php';
    
//    $Month = "04";
//    $Year = "2018";
//    $BD = new Database();
//    $BD->connect();
//    $BD->select("cat_estadistica_canal",
//                "SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND, fecha_inicio, fecha_fin))) as tiempo_visto, cat_estadistica_canal.id_miembro, cat_miembro.codigo_miembro, cat_miembro.nombre_miembro, cat_miembro.apellido_miembro",
//                "cat_miembro ON cat_estadistica_canal.id_miembro = cat_miembro.id_miembro",
//                "","","",
//                "date_format(fecha_inicio, '%m-%Y') = '04-2018' && date_format(fecha_fin, '%m-%Y') = '04-2018' && TIMESTAMPDIFF(SECOND, fecha_inicio, fecha_fin) > 180 && TIMESTAMPDIFF(SECOND, fecha_inicio, fecha_fin) < 28800 && cat_miembro.codigo_miembro != 'VDMSITE_01' ","",
//                "id_miembro");
//    /*$BD->select("cat_estadistica_canal",
//                "SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND, fecha_inicio, fecha_fin))) as tiempo_visto, cat_estacion.indicativo",
//                "cat_canal ON cat_estadistica_canal.id_canal = cat_canal.id_canal",
//                "cat_estacion ON cat_canal.id_estacion = cat_estacion.id_estacion","","",
//                "date_format(fecha_inicio, '%m-%Y') = '04-2018' && date_format(fecha_fin, '%m-%Y') = '04-2018' && TIMESTAMPDIFF(SECOND, fecha_inicio, fecha_fin) > 180 && TIMESTAMPDIFF(SECOND, fecha_inicio, fecha_fin) < 28800","",
//                "indicativo");*/
//    $Result = $BD->getResult();
//
//    foreach ($Result as $row):
//        echo $row['tiempo_visto']; echo ", ";
//        echo $row['codigo_miembro'];echo ", ";
//        echo $row['apellido_miembro']." ".$row['nombre_miembro'];echo "<br>";
//    endforeach;


    $value = 0;
                $comando2   = "GETCONFIG";
                $parametro2 = "SETTINGS";
                $valor2     = "BROWSER_PRESERVECOOKIES";
                $ip         = "10.0.3.16";
                $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                             "./STBremoteconf $ip GETCONFIG SETTINGS BROWSER_PRESERVECOOKIES";
                $cmd = shell_exec($Command);
                //echo $cmd;
                $res = strrpos($cmd, "FAIL");
                $gL = substr($cmd, $res, 4);
                //$gL = substr($cmd, -3);
                echo $gL.'== FAIL'; ECHO"<BR>";
                if($gL == "FAIL"){
                    $value = 1;
                }else {
                    $value = 2;
                }
                echo $value;

    
    
//    $Ip = '10.30.9.129';
//    $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&./STBremoteconf $Ip STATS";
//    $CommandLine = shell_exec($Command);
//     
//    print_r($CommandLine);