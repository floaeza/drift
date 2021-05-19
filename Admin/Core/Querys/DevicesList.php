<?php
session_start();

/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de usuarios la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/

    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../../General/Languages/es.php';
    require '../DAO/DevicesDAO.php';
    require '../DAO/MembersDAO.php';
    require '../DAO/LocationsDAO.php';
    
    $DAODevices = new DevicesDAO($DirectoryLog);
    $DAOMembers = new MembersDAO($DirectoryLog);
    $DAOLocations = new Locations($DirectoryLog);
            
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    
    switch ($Option){
        
        case "SelectListDevice":
            $Devices = $DAODevices->getAvailableDevices();
            echo json_encode($Devices);
        break;
    
        case "TagDevice":
            if(isset($_POST['OptionMember']) && isset($_POST['SelectedDevices'])){
                $MemberCode = $_POST['OptionMember'];
                $DevicesSelected = $_POST['SelectedDevices'];
                $Package = $DAOMembers->getMemberPackage($MemberCode[0]['value']);
                if($Package[0] > 0){
                    $Location = $DAOLocations->getLocationsId($MemberCode[0]['value']);
                    if($Location[0] > 0){
                        foreach ($DevicesSelected as $device):
                            $locationUP = array('id_locacion' => $Location[0]['id_locacion']);
                            $DeviceLocation = $DAODevices->updateDeviceLocation($locationUP, $device['value']);
                            if($DeviceLocation[0] > 0){
                                $status = array(
                                    'id_estatus_disponibilidad' => 2,
                                    'id_paquete'                =>$Package[0]['id_paquete']
                                );
                                $Update = $DAODevices->updateDevices($device['value'], $status);
                                if($Update[0] > 0){
                                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);
                                    //echo 'Error update';
                                    $LogModel = new Log($DirectoryLog);
                                    $Description = $Language['LabelAccountsLogCreatePackagesA']." ".$_POST['Name']." ".$_POST['Description'];
                                    $Log = array ('descripcion_log' =>$Description,
                                                  'id_usuario'      =>$_SESSION['UserId'],
                                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                                    $NewLog = $LogModel->setLog($Log);
                                }else{
                                    //echo 'Error UpdateDisp';
                                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                                }
                            }else{
                                //echo 'Error Locacion';
                                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                            }
                        endforeach;
                    }else{
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }else{
                    //echo 'Error paquete';
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }else{
                //echo 'Error post';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;
        
        case "StatusDevice":
            if(isset($_POST['ip'])){
                $value = 0;
                $comando2   = "GETCONFIG";
                $parametro2 = "SETTINGS";
                $valor2     = "BROWSER_PRESERVECOOKIES";
                $ip = $_POST['ip'];
                $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                             "./STBremoteconf $ip GETCONFIG SETTINGS BROWSER_PRESERVECOOKIES";
                $cmd = shell_exec($Command);
                //echo $cmd;
                $res = strrpos($cmd, "FAIL");
                $gL = substr($cmd, $res, 4);
                //$gL = substr($cmd, -3);
                echo $gL.'== FAIL';
                if($gL == "FAIL"){
                    $value = 1;
                }else {
                    $value = 2;
                }
                echo $value;
            }else{}
            
        break;
        
        case "SelectListDeviceDetail":
            if(isset($_POST['ip']) && isset($_POST['Stat'])){
                $ip = $_POST['ip'];
                $Devices = $DAODevices->getDetailsDevice($ip);
                
                if($_POST['Stat'] === '1'){
                    $status = 'Encendido';
                }else{
                    $status = 'Apagado';
                }
                //$Devices .= array('status' => $status);
            }else{}
            echo json_encode(array('response'   =>  $Devices,
                                   'response2'  =>  $status));
        break;
    
        case "RestartDevice":
            if(isset($_POST['RestartDeviceIP'])){
                $Ip = $_POST['RestartDeviceIP'];
               $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                             "./STBremoteconf $Ip REBOOT";
                $CommandLine = shell_exec($Command);
                //echo 'Comando ejecutado... Reiniciando'.$Ip.'..';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => 'Comando ejecutado... <b>Reiniciando: <br>'.$Ip.'</b>..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceA']." ".$_POST['RestartDeviceIP'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
            
                
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => 'Error al ejecutar el comando... <br>Cancelando..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceB']." ".$_POST['RestartDeviceIP'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                //echo 'Error al ejecutar el comando... Cancelando..';
            }
            echo json_encode($Response);
        break;
        
    }