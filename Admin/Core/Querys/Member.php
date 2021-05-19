<?php
session_start();
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de locaciones la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
//modificar los casos use of undefined constant se le agrego "" a todos

    require '../Models/Log.php';
    require '../DAO/LocationsDAO.php';
    require '../DAO/MembersDAO.php';
    require '../../General/Languages/es.php';
    require '../DAO/DevicesDAO.php';
    require '../DAO/UsersDAO.php';
    // Obtenemos el identificador de la locacion seleccionada en el registro
    $LocationCode = "DEFAULT";
    $DCode = 1;
    $DAOLocations = new Locations($DirectoryLog);
    $DAOMembers = new MembersDAO($DirectoryLog);
    $DAODevices = new DevicesDAO($DirectoryLog);

$LocationList = $DAOLocations->getLocationsList();
print_r($LocationList);

    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

	switch ($Option){

        case "SelectLocations":
            $LocationList = $DAOLocations->getLocationsList();
            echo json_encode($LocationList);
        break;


        case "SelectLocationsDisp":
           // if(isset($_POST['IDPackage'])){
                $Response = $DAOLocations->getLocationDispList($_POST['IDPackage']);

            /*}else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }*/
            $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
        break;

        case "InsertLocation":
            if(isset($_POST['CodeLocation']) && isset($_POST['StatusLocation']) && isset($_POST['KeyLocation']) && isset($_POST['IdModuleLocation'])){
                //$MemberId = $DAOMembers->getLastMemberId();
                $Location = array
                           ('codigo_locacion'       =>strtoupper($_POST['CodeLocation']),
                            'id_estatus_locacion'   =>$_POST['StatusLocation'],
                            'clave_locacion'        => base64_encode($_POST['KeyLocation']),
                            'direccion_locacion'    =>$_POST['DirectionLocation'],
                            'descripcion_locacion'  =>$_POST['DescriptionLocation'],
                            'id_modulo'             =>$_POST['IdModuleLocation'],
                            'codigo_miembro'        =>$_POST['MemberId']);

                $NewLocation = $DAOLocations->setLocation($Location);

                if($NewLocation[0] > 0){

                    $LastLocationID = $DAOLocations->getLastLocationId();

                    if($LastLocationID[0] > 0){

                        $Services = array('id_locacion' => $LastLocationID[0]['id']);

                        $NewLocationServices = $DAOLocations->setServiceLocation($Services);

                        if($NewLocationServices[0] > 0){

                           $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);

                        }else{
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                        }
                    }else{
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }

                }
                else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }


            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

            }
            echo json_encode($Response);
        break;

        case "InsertMember":
            if(isset($_POST['CodeLocation'])){
              $MemberArray = array('codigo_locacion'          =>strtoupper($_POST['CodeLocation']),
				'codigo_miembro'=> strtoupper($_POST['CodeLocation']),
                                'descripcion_locacion'             =>$_POST['DescriptionLocation'],
                                'id_paquete'             =>$_POST['ProgrammingMember']);
                $Member = $DAOMembers->setMember($MemberArray);
                if($Member[0] > 0){
                    $Response = array('Response'   => 1);
                    // Log creacion usuario correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description ='';
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
//                    $NewLog = $LogModel->setLog($Log);
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                    'MessageSummary'  => $Language['SummaryMessageType'][1],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                     // Log creacion usuario correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogCreateMemberB']." ".$_POST['NameMemberLocation']." ".$_POST['LastNameLocation'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
//                    $NewLog = $LogModel->setLog($Log);

                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log creacion usuario correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogCreateMemberC']." ".$_POST['NameMemberLocation']." ".$_POST['LastNameLocation'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
//                    $NewLog = $LogModel->setLog($Log);

            }
            echo json_encode($Response);
        break;


        case "EditMember":
            if(isset($_POST['EditCodeMemberLocation']) &&
              isset($_POST['EditTitleMemberLocation']) &&
              isset($_POST['EditNameMemberLocation']) &&
              isset($_POST['EditLastNameLocation']) &&
              isset($_POST['EditMailMemberLocation']) && isset($_POST['EditProgrammingMember'])){
                $MemberArray = array(
                                'codigo_miembro'             =>$_POST['EditCodeMemberLocation'],
                                'titulo_miembro'             =>$_POST['EditTitleMemberLocation'],
                                'nombre_miembro'             =>$_POST['EditNameMemberLocation'],
                                'apellido_miembro'           =>$_POST['EditLastNameLocation'],
                                'correo_miembro'             =>$_POST['EditMailMemberLocation'],
                                'id_paquete'                 =>$_POST['EditProgrammingMember']);
                $Member = $DAOMembers->EditMember($MemberArray, $_POST['IdMember']);
                if($Member[0] >= 0){
                    $Response = array('Response'   => 1);
                    // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogEditMemberA']." ".$_POST['EditNameMemberLocation']." ".$_POST['EditLastNameLocation'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                    'MessageSummary'  => $Language['SummaryMessageType'][1],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogEditMemberB']." ".$_POST['EditNameMemberLocation']." ".$_POST['EditLastNameLocation'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
                    $NewLog = $LogModel->setLog($Log);
                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                 // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogEditMemberC']." ".$_POST['EditNameMemberLocation']." ".$_POST['EditLastNameLocation'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;

        case "EditLocation":
            if(isset($_POST['EditCodeLocation']) && isset($_POST['EditStatusLocation']) && isset($_POST['EditKeyLocation']) && isset($_POST['EditDirectionLocation']) && isset($_POST['EditDescriptionLocation']) && isset($_POST['EditIdModuleLocation'])){
                //$MemberId = $DAOMembers->getLastMemberId();
                $Location = array
                           ('codigo_locacion'       =>$_POST['EditCodeLocation'],
                            'id_estatus_locacion'   =>$_POST['EditStatusLocation'],
                            'clave_locacion'        => base64_encode($_POST['EditKeyLocation']),
                            'direccion_locacion'    =>$_POST['EditDirectionLocation'],
                            'descripcion_locacion'  =>$_POST['EditDescriptionLocation'],
                            'id_modulo'             =>$_POST['EditIdModuleLocation'],
                            'codigo_miembro'        =>$_POST['EditMemberId']);

                $NewLocation = $DAOLocations->EditLocation($Location, $_POST['IdLocation']);

                if($NewLocation[0] >= 0){

                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);


                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

            }
            echo json_encode($Response);
        break;

        case "EditMemberOfLocation":
            if(isset($_POST['IdLocation']) && isset($_POST['EditMemberId'])){
                //$MemberId = $DAOMembers->getLastMemberId();
                $Location = array
                           ('codigo_miembro'        =>$_POST['EditMemberId']);

                $NewLocation = $DAOLocations->EditLocation($Location, $_POST['IdLocation']);

                if($NewLocation[0] >= 0){

                    $Response = array('Response'   => 1);


                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

            }
            echo json_encode($Response);
        break;

        case "UpdateLocation":
            $LocationId = $_POST['EditLocationId'];
                $Pass1 = base64_encode($_POST['EditLocationPassword']);
                $Location = array
                         ('codigo_miembro'             =>$_POST['EditCodeMember'],
                          'titulo_miembro'             =>$_POST['EditTitleMember'],
                          'nombre_miembro'             =>$_POST['EditNameMember'],
                          'apellido_miembro'           =>$_POST['EditLastName'],
                          'correo_miembro'             =>$_POST['EditMailMember'],
                          'codigo_locacion'            =>$_POST['EditCodeLocation'],
                          'id_estatus_locacion'        =>$_POST['EditStatusLocation'],
                          'clave_locacion'             =>$_POST['EditKeyLocation'],
                          'direccion_locacion'         =>$_POST['EditDirectionLocation'],
                          'descripcion_locacion'       =>$_POST['EditDescriptionLocation'],
                          'id_modulo'                  =>$_POST['EditModule'],
                          'grabador'                   =>$_POST['EditEngraver']);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

                if(isset($_POST['EditLocationCode']) && isset($_POST['EditLocationStatusId']) && isset($Pass1) && isset($_POST['EditLocationModule']) && isset($_POST['EditLocationType']) && isset($_POST['EditLocationMember']) && isset($_POST['EditLocationTypeDescription'])){
                    $EditLocation = $DAOLocations->updateLocation($Location, $LocationId);

                    if($EditLocation[0] > 0){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }
                    else {
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                          'MessageSummary'  => $Language['SummaryMessageType'][2],
                                          'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                          'MessageSummary'  => $Language['SummaryMessageType'][2],
                                          'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            echo json_encode($Response);
        break;


        case "SelectDevicesLocations":
            if(isset($_POST['idLocation'])){
                $Response = $DAOLocations->getDevicesLocationsList($_POST['idLocation']);
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;

        case "SelectLimboDevices":
            $Response = $DAOLocations->getDevicesLimboList();

            echo json_encode($Response);
        break;

        case "UpdatePackage":
            if(isset($_POST['EditPackageLocationId']) && isset($_POST['EditPackageList'])){
                $idLocation=$_POST['EditPackageLocationId'];
                $idPackage=$_POST['EditPackageList'];

                $Dispositivos=$DAOLocations->getDevicesLocationsList($idLocation);
                if($Dispositivos[0] > 0){
                    foreach ($Dispositivos as $d){
                    }
                }



            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;

        case "RestartDevice":
            if(isset($_POST['ip'])){
                $Ip = $_POST['ip'];
               $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                             "./STBremoteconf $Ip REBOOT";
                //echo $Command.' Comando ejecutado... Reiniciando'.$Ip.'..';
                $CommandLine = shell_exec($Command);
                //echo $Command. 'Comando ejecutado... Reiniciando'.$Ip.'..';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => 'Comando ejecutado... <b>Reiniciando: <br>'.$Ip.'</b>..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceA']." ".$_POST['ip'];
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
                    $Description = $Language['LabelAccountsLogRestartDeviceB']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                //echo 'Error al ejecutar el comando... Cancelando..';
            }
            echo json_encode($Response);
        break;

        case "RestartAllDevices":
            if(isset($_POST['ip'])){
                $Ip = substr($_POST['ip'], 2);
                $Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&".
                             "./STBremoteconf $Ip REBOOT";
                $CommandLine = shell_exec($Command);
                //echo 'Comando ejecutado... Reiniciando: '.$Ip.'..';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => 'Comando ejecutado... <b>Reiniciando: <br>'.$Ip.'</b>..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceA']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => 'Error al ejecutar el comando... Cancelando..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceB']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                //echo 'Error al ejecutar el comando... Cancelando..';
            }
            echo json_encode($Response);
        break;

        case "DeleteDevice":
            if(isset($_POST['id'])){
//                $LocationIdArray = $DAOLocations->getLocationPackage();
//                //echo json_encode($LocationIdArray[0][id_locacion]);
//                $Package = $LocationIdArray[0]['id_paquete'];
//                $IDLocation = $LocationIdArray[0]['id_locacion'];
                $locationUP = array('id_locacion' => '1');
                $Dispositivos = $DAODevices->updateDeviceLocation($locationUP, $_POST['id']);
                //$Dispositivos=$DAOLocations->DeleteDevice($_POST['id']);
                if($Dispositivos[0] > 0){

//                    $DispArray = array('id_estatus_disponibilidad'  => $DCode,
//                                       'id_paquete'  => $Package);
//                    $Dispositivos=$DAOLocations->ChangeStatusDispDev($DispArray, $_POST['id']);
//                    if($Dispositivos[0] > 0){
//                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
//                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
//                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
//
//                    // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogRemoveDeviceA']." ".$_POST['id'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }else{
//                      //echo 'error change status';
//                        $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
//                                'MessageSummary'  => $Language['SummaryMessageType'][1],
//                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
//                        // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogRemoveDeviceB']." ".$_POST['id_estatus_disponibilidad']." ".$_POST['id_paquete'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }
                }else{
                  //echo 'error update location';
                  $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                  //Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRemoveDeviceB']." ".$_POST['id_estatus_disponibilidad']." ".$_POST['id_paquete'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
            }else{
              //echo 'error post';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
                //Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRemoveDeviceB']." ".$_POST['id_estatus_disponibilidad']." ".$_POST['id_paquete'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;

        case "ADDDevice":
            if(isset($_POST['id']) && isset($_POST['IdLocation'])){
              $LocationIdArray = $DAODevices->getPackageIdLocation($_POST['IdLocation']);
              //echo json_encode($LocationIdArray[0][id_locacion]);
              $Package = $LocationIdArray[0]['id_paquete'];
              //echo $Package.' == '.$LocationIdArray[0].'<br>';
                //$DevLoc = array('id_locacion'         =>$_POST['IdLocation']);
                //$Relation = $DAOLocations->setRelationLocationDev($DevLoc);
                $locationUP = array('id_locacion' => $_POST['IdLocation']);
                $Relation = $DAODevices->updateDeviceLocation($locationUP, $_POST['id']);
                if($Relation[0] > 0){
//                    $DispArray = array('id_estatus_disponibilidad'   => 2,
//                                       'id_paquete'                  =>$Package);
//                    $Dispositivos=$DAOLocations->ChangeStatusDispDev($DispArray, $_POST['id']);
//                    if($Dispositivos[0] > 0){
//                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
//                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
//                                        'MessageDetail'   => $Language['MessageInsertCorrect']);
//                      // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogAssignedDeviceA']." ".$_POST['id'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }else{
//                     //echo 'ajaja';
//                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
//                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
//                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
//                      // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogAssignedDeviceB']." ".$_POST['IdLocation']." ".$_POST['id'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }

                }else{
                  //echo 'ejeje';
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                     // Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogAssignedDeviceB']." ".$_POST['IdLocation']." ".$_POST['id'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
            }else{
              //echo 'ijiji';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
                 // Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogAssignedDeviceB']." ".$_POST['IdLocation']." ".$_POST['id'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;

        case "ParentalControlDevice":
            if(isset($_POST['id'])){
                $Response = $DAODevices->getParentalControlDevice($_POST['id']);
            }else{

            }
            echo json_encode($Response);
        break;

        case "ParentalControlUpdate":
            if(isset($_POST['id']) || isset($_POST['est']) || isset($_POST['leng']) || isset($_POST['des']) || isset($_POST['vio']) || isset($_POST['cf']) || isset($_POST['sa']) || isset($_POST['m18']) || isset($_POST['m13']) || isset($_POST['sc'])){
                $dispositivo = $_POST['id'];
                $estado = $_POST['est'];
                $lenguaje = $_POST['leng'];
                $desnudos = $_POST['des'];
                $violencia = $_POST['vio'];
                $contenido_fuerte = $_POST['cf'];
                $situaciones_adultas = $_POST['sa'];
                $mayores_dieciocho = $_POST['m18'];
                $mayores_trece = $_POST['m13'];
                $sin_clasificacion = $_POST['sc'];
                if($estado == 1){
                    $PC = array('estado'                => $estado,
                                'lenguaje'              => $lenguaje,
                                'desnudos'              => $desnudos,
                                'violencia'             => $violencia,
                                'contenido_fuerte'      => $contenido_fuerte,
                                'mayores_dieciocho'     => $mayores_dieciocho,
                                'mayores_trece'         => $mayores_trece,
                                'situaciones_adultas'   => $situaciones_adultas,
                                'sin_clasificacion'     => $sin_clasificacion);
                    $ParentalC = $DAODevices->updateParentalControlDevice($dispositivo, $PC);
                    if($ParentalC[0] > 0){
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrectPC']);
                    }else{
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                } else {
                    $PC = array('estado'                => $estado,
                                'lenguaje'              => $lenguaje,
                                'desnudos'              => $desnudos,
                                'violencia'             => $violencia,
                                'contenido_fuerte'      => $contenido_fuerte,
                                'mayores_dieciocho'     => $mayores_dieciocho,
                                'mayores_trece'         => $mayores_trece,
                                'situaciones_adultas'   => $situaciones_adultas,
                                'sin_clasificacion'     => $sin_clasificacion);
                    $ParentalC = $DAODevices->updateParentalControlDevice($dispositivo, $PC);
                    if($ParentalC[0] > 0){
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrectPC']);
                    }else{
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;

        case "ChangeDeviceLocation":
            if(isset($_POST['EditDeviceId']) && isset($_POST['EditDeviceLocation'])){
                $locationUP = array('ubicacion_dispositivo' => $_POST['EditDeviceLocation']);
                $Dispositivos = $DAODevices->updateDevices($_POST['EditDeviceId'], $locationUP);
                if($Dispositivos[0] > 0){
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'].' Insert Error');
                    }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'].' Post Error');
            }
            echo json_encode($Response);
        break;
    }
