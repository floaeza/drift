<?php
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de usuarios la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../DAO/UsersDAO.php';
    require '../../General/Languages/es.php';
    $DAOUsers = new Users($DirectoryLog);

    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

    switch ($Option){

        case "SelectUsers":
            $UserList = $DAOUsers->getUserList();
            echo json_encode($UserList);
        break;

        case "InsertUser":
            $Pass = base64_encode($_POST['UserPass']);
            $DefaultStatus = 1; // activo
//            if($_SESSION['UserId'] != $UserId){
            $User = array('correo_usuario'      => $_POST['UserEmail'],
                          'nombre_usuario'      => $_POST['UserName'],
                          'apellido_paterno'    => $_POST['LastNameF'],
                          'apellido_materno'    => $_POST['LastNameM'],
                          'clave'               => $Pass,
                          'id_perfil'           => $_POST['ProfileId'],
                          'id_estatus_usuario'  => $DefaultStatus,
                          'imagen_usuario'      => $_POST['UserImage']);
            $NewUser = $DAOUsers->setUser($User);
            //echo $NewUser;
            if($NewUser[0] > 0){
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);

                // Log creacion usuario correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['UserName']." ".$_POST['LastNameF'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
            }
            else {
                //echo 'jaja';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                  'MessageSummary'  => $Language['SummaryMessageType'][1],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogCreateB']." ".$_POST['UserName']." ".$_POST['LastNameF'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][1]);
                $NewLog = $LogModel->setLog($Log);
            }
            
//            } COMENTADO PARA CORREGIR INSERCION DE LOG DE USUARIOS
//            else {
//                    //echo 'jaja';
//                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
//                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
//                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
//                // Log creacion usuario incorrectamente correctamente
//                $LogModel = new Log($DirectoryLog);
//                $Description = $Language['LabelAccountsLogDeleteA']." ".$_POST['UserName']." ".$_POST['LastNameF'];
//                $Log = array ('descripcion_log' =>$Description,
//                              'id_usuario'      =>$_SESSION['UserId'],
//                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
//                $NewLog = $LogModel->setLog($Log);
//
//            }
            echo json_encode($Response);
        break;

        case "UpdateUser":
            $UserId = $_POST['EditUserId'];
            if(isset($_SESSION['UserId'])){
                $User = array('correo_usuario'      =>$_POST['EditUserEmail'],
                              'nombre_usuario'      =>$_POST['EditUserName'],
                              'apellido_paterno'    =>$_POST['EditLastNameF'],
                              'apellido_materno'    =>$_POST['EditLastNameM'],
                              'clave'               => base64_encode($_POST['EditUserPass']),
                              'id_perfil'           =>$_POST['EditProfileId'],
                              'id_estatus_usuario'  =>$_POST['EditStatusId'],
                              'imagen_usuario'      =>$_POST['UserImage']);

                $EditUser = $DAOUsers->updateUser($User, $UserId);

                if($EditUser[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);
                     // Log creacion usuario correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogEditA']." ".$_POST['EditUserName']." ".$_POST['EditLastNameF'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
                }
                else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                     // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogEditB']." ".$_POST['EditUserName']." ".$_POST['EditLastNameF'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][1]);
                $NewLog = $LogModel->setLog($Log);
                }

            } else {
                    //echo 'jaja';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogEditC']." ".$_POST['EditUserName']." ".$_POST['EditUserName'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                $NewLog = $LogModel->setLog($Log);

            }
            /*if($EditUser[0] > 0){
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);

               
            }
            else {
                //echo 'jaja';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogEditB']." ".$_POST['UserName']." ".$_POST['LastNameF'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                $NewLog = $LogModel->setLog($Log);
            }*/
            echo json_encode($Response);

        break;

        case "DeleteUser":
            $UserId = $_POST['DeleteUserId'];
            $deletedname = $_POST['DeleteUserName'];
            $deletedLastName = $_POST['DeleteUserLastName'];
            $StatusDisable = "3";
            if($_SESSION['UserId'] != $UserId){
                $UserStatusId = array('id_estatus_usuario' =>$StatusDisable);
                $DeleteUser = $DAOUsers->deleteUser($UserStatusId, $UserId);

                if($DeleteUser[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);
                    // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteA']." ".$_POST['DeleteUserName']." ".$_POST['DeleteUserLastName'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
                    
                }
                else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteB']." ".$_POST['DeleteUserName']." ".$_POST['DeleteUserLastName'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][1]);
                $NewLog = $LogModel->setLog($Log);
                }

            } else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageEditActiveUser']);
                    // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteC']." ".$_POST['DeleteUserName']." ".$_POST['DeleteUserLastName'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                $NewLog = $LogModel->setLog($Log);

            }

                
            
            
            echo json_encode($Response);
        break;
    }
