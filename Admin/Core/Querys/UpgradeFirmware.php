<?php
/* *****************************************************************************
 * OBJETIVO: Actualizar dispositivos con el firmware seleccionado
 * PARAMETROS RECIBIDOS: IP del dispositivo
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
    require '../../General/Languages/es.php';
    require '../Models/Config.php';
    require '../DAO/DevicesDAO.php';

    if(isset($_POST['ArrayIp']) && isset($_POST['Firmware'])){//&& isset($_POST['IdMember'])
        $ArrayIp = $_POST['ArrayIp'];
        $Firmware = $_POST['Firmware'];
        $Option = $Firmware[0];
        $Member = $_POST['IdMember'];
        $CommandLineUpGrade='';
        $DAODevices = new DevicesDAO($DirectoryLog);
        //echo $Option;
        $Response='';
        foreach ($ArrayIp as $Key=>$Ip):
            if($Option == 0 || $Option == 2 && $Ip != ""){
                $Response .= '1.- Obteniendo dirección MAC.<br>';
                $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                           "./STBremoteconf $Ip STATS";
                $CommandLine = shell_exec($Command);
                $Response .= '2.- Comando ejecutado!!<br>';
                $mac = strrpos($CommandLine, "MACADDRESS:");
                $MacAddress = substr($CommandLine, ($mac+12),17);
                $Response .= '3.- Validando MacAddress: <b>'.$MacAddress.'</b><br>';
                if(preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $MacAddress)){
                    $Response .= '4.- La MacAddress: <b>'.$MacAddress.'</b> es valida.<br>';
                    $Response .= '5.- Registrando dispositivo...<br>';
                    $Package = $DAODevices->getPackageId($Member);
                    if($Package[0] > 0){
                    $Device = array('mac_address'    =>$MacAddress,
                                    'ip'             =>$Ip,
                                    'id_paquete'     =>$Package[0]['id_paquete']);
                    $NewDevice = $DAODevices->setDevices($Device);
                    if($NewDevice[0] > 0){
                        $Response .= '6.- Obteniendo parametros de Miembro: <b>'.$Member.'</b> ..... <br>';
                        $Response .= 'Paquete: <b>'.$Package[0]['id_paquete'].' - '.$Package[0]['nombre_paquete'].'</b><br>';
                        $IdNewDevice = $DAODevices->getLastDeviceId();
                        $IdLocation = $DAODevices->getLocationId($Member);
                        $Response .= 'Locacion : <b>'.$IdLocation[0]['id_locacion'].' Device: '.$IdNewDevice[0]['id'].'</b><br>';
                        if($IdLocation[0]['id_locacion'] > 0 && $IdNewDevice[0]['id'] > 0){
                            $DAODevices->setDevicesParentalControl(array('id_dispositivo'=>$IdNewDevice[0]['id']));
                            $Response .= '7.- <b>El dispositivo se registro correctamente. </b><br> 8.- <b>Agregando dispositivo a cuenta de: <big>'.$Member.'</big></b><br>';
                            $Relation = array('id_dispositivo'  => $IdNewDevice[0]['id'],
                                              'id_locacion'     => $IdLocation[0]['id_locacion']
                            );
                            $RelationResponse = $DAODevices->setDevicesLocation($Relation);
                            if($RelationResponse > 0){
                                $Response .= '9.- <b>El dispositivo con la IP: <big>'.$Ip.'</big> Se asigno correctamente al Miembro: <big>'.$Member.'</big> </b><br>';
                                $Response .= '<b><big>************************************</big></b> <br>';
                                $Command2 = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                                "./STBremoteconf $Ip UPGRADE $FirmwareURL$mcfs[$Option]";

                                $CommandLineUpgrade = shell_exec($Command2);
                                $res = strrpos($CommandLineUpgrade, "Connected");
                                $Return = mb_substr($CommandLineUpgrade,$res);
                                $Response .= json_encode($Return);
                                $Response .= "<br>";
                                $Response .= '<b><big>************************************</big> <br>ACTUALIZANDO........<br></b>';
                                $Response .= '<big><b>************************************</b></big> <br>';

                                $Response2 = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                       'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                       'MessageDetail'   => $Language['MessageInsertCorrect'],);
                            }
                        }else{
                            $Response .= '6.- Error al registrar el dispositivo: '.$Ip.' A nombre de: '.$Member.' <br> ಠ_ಠ  <br>';
                            $Response2 = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                   'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                   'MessageDetail'   => $Language['MessageInsertIncorrect']);
                        }
                    }else{
                        $Response .= '6.- Omitiendo Registro.....  <br>';
                        $Response .= '7.- Relizando actializacion.....  <br>';

                        $Response .= '<b><big>************************************</big></b> <br>';
                        $Command2 = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                        "./STBremoteconf $Ip UPGRADE $FirmwareURL$mcfs[$Option]";

                        $CommandLineUpgrade = shell_exec($Command2);
                        $res = strrpos($CommandLineUpgrade, "Connected");
                        $Return = mb_substr($CommandLineUpgrade,$res);
                        $Response .= json_encode($Return);
                        $Response .= "<br>";
                        $Response .= '<b><big>************************************</big> <br>ACTUALIZANDO........<br></b>';
                        $Response .= '<big><b>************************************</b></big> <br>';

                        $Response2 = array('MessageOption'   => $Language['OptionMessageType'][0],
                                               'MessageSummary'  => $Language['SummaryMessageType'][0],
                                               'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }
                  }else{
                    $Response .= '6.- No es posible obtener parametros de programación... <br>Omitiendo Registro.....  <br>';
                    $Response .= '7.- Relizando actializacion.....  <br>';

                    $Response .= '<b><big>************************************</big></b> <br>';
                    $Command2 = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                    "./STBremoteconf $Ip UPGRADE $FirmwareURL$mcfs[$Option]";
                    //echo $Command2.'<br>';
                    $CommandLineUpgrade = shell_exec($Command2);
                    $res = strrpos($CommandLineUpgrade, "Connected");
                    $Return = mb_substr($CommandLineUpgrade,$res);
                    $Response .= json_encode($Return);
                    $Response .= "<br>";
                    $Response .= '<b><big>************************************</big> <br>ACTUALIZANDO........<br></b>';
                    $Response .= '<big><b>************************************</b></big> <br>';

                    $Response2 = array('MessageOption'   => $Language['OptionMessageType'][0],
                                           'MessageSummary'  => $Language['SummaryMessageType'][0],
                                           'MessageDetail'   => $Language['MessageInsertCorrect']);
                  }
                }else{
                  $Response .= '4.- No se pudo obtener la MacAddress... <br>Omitiendo Registro.....  <br>';
                  $Response .= '5.- Relizando actializacion.....  <br>';

                  $Response .= '<b><big>************************************</big></b> <br>';
                  $Command2 = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                  "./STBremoteconf $Ip UPGRADE $FirmwareURL$mcfs[$Option]";
                  //echo $Command2.'<br>';
                  $CommandLineUpgrade = shell_exec($Command2);
                  $res = strrpos($CommandLineUpgrade, "Connected");
                  $Return = mb_substr($CommandLineUpgrade,$res);
                  $Response .= json_encode($Return);
                  $Response .= "<br>";
                  $Response .= '<b><big>************************************</big> <br>ACTUALIZANDO........<br></b>';
                  $Response .= '<big><b>************************************</b></big> <br>';

                  $Response2 = array('MessageOption'   => $Language['OptionMessageType'][0],
                                         'MessageSummary'  => $Language['SummaryMessageType'][0],
                                         'MessageDetail'   => $Language['MessageInsertCorrect']);
                }

            }else if ($Option == 1 || $Option == 3 && $Ip != ""){
                $Response .= '1.- Eliminando rastro del dispositivo en la BD...<br>';
                $ID = $DAODevices->getDeviceID($Ip);
                if($ID[0] > 0){
                    $PC = $DAODevices->deleteDevicePC($ID[0]['id_dispositivo']);
                    $DL = $DAODevices->deleteDeviceDL($ID[0]['id_dispositivo']);
                    $D = $DAODevices->deleteDevice($ID[0]['id_dispositivo']);
                    if($D[0] > 0){
                        $Response .= '2.- Realizando la actualización....<br>';
                        $Response .= '<b><big>************************************</big></b> <br>';
                        $Command2 = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                        "./STBremoteconf $Ip UPGRADE $FirmwareURL$mcfs[$Option]";

                        $CommandLineUpgrade = shell_exec($Command2);
                        $res = strrpos($CommandLineUpgrade, "Connected");
                        $Return = mb_substr($CommandLineUpgrade,$res);
                        $Response .= json_encode($Return);
                        $Response .= "<br>";
                        $Response .= '<b><big>************************************</big> <br>ACTUALIZANDO........<br></b>';
                        $Response .= '<big><b>************************************</b></big> <br>';

                        $Response2 = array('MessageOption'   => $Language['OptionMessageType'][0],
                                           'MessageSummary'  => $Language['SummaryMessageType'][0],
                                           'MessageDetail'   => $Language['MessageInsertCorrect']);

                    }
                }else{
                    $Response .= '2.- El dispositivo no esta registrado...<br>Omitiendo...<br>';
                    $Response .= '3.- Realizando la actualización....<br>';
                    $Response .= '<b><big>************************************</big></b> <br>';
                    $Command2 = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                    "./STBremoteconf $Ip UPGRADE $FirmwareURL$mcfs[$Option]";

                    $CommandLineUpgrade = shell_exec($Command2);
                    $res = strrpos($CommandLineUpgrade, "Connected");
                    $Return = mb_substr($CommandLineUpgrade,$res);
                    $Response .= json_encode($Return);
                    $Response .= "<br>";
                    $Response .= '<b><big>************************************</big> <br>ACTUALIZANDO........<br></b>';
                    $Response .= '<big><b>************************************</b></big> <br>';

                }
            }else{
              $Response2 = array('MessageOption'   => $Language['OptionMessageType'][2],
                                 'MessageSummary'  => $Language['SummaryMessageType'][2],
                                 'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
        endforeach;
    } else{
        $Response2 = array('MessageOption'   => $Language['OptionMessageType'][2],
                           'MessageSummary'  => $Language['SummaryMessageType'][2],
                           'MessageDetail'   => $Language['MessageInsertIncorrect']);
    }

    echo json_encode(array('response'   =>  $Response,
                           'response2'  =>  $Response2));
