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


    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../DAO/LocationsDAO.php';
    require '../DAO/MembersGroupDAO.php';
    require '../../General/Languages/es.php';
    $DAOGroups = new MembersGroupDAO($DirectoryLog);
    $LogModel = new Log($DirectoryLog);
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

    switch ($Option){

        case "SelectGroups":
            $LocationList = $DAOGroups->getGroupList();
            echo json_encode($LocationList);
        break;

        case "SetNewGroup":
            if(isset($_POST['NameGroup']) && isset($_POST['DescriptionGroup']) && isset($_POST['ValidityGroup']) && isset($_POST['MembersGroup'])){
                $MembersArray = $_POST['MembersGroup'];
                $Grupo = array('nombre_grupo'       => $_POST['NameGroup'],
                               'descripcion_grupo'  => $_POST['DescriptionGroup'],
                               'vigencia'           => $_POST['ValidityGroup']);
                $Group = $DAOGroups->setGroup($Grupo);
                if($Group[0] > 0){
                    $LastGruop = $DAOGroups->getLastGroup();
                    if($LastGruop[0] > 0){
                        foreach ($MembersArray as $location):
                            $GroupLocation = array('id_grupo'       => $LastGruop[0]['id'],
                                                   'id_locacion'    => $location['value']);
                            $DAOGroups->setGroupLocation($GroupLocation);
                        endforeach;
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);

                        // Log creacion usuario correctamente
                        
                        $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                        $Log = array ('descripcion_log' =>$Description,
                                      'id_usuario'      =>$_SESSION['UserId'],
                                      'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                        $NewLog = $LogModel->setLog($Log);
                    }else {
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);

                        // Log creacion usuario correctamente
                        
                        $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                        $Log = array ('descripcion_log' =>$Description,
                                      'id_usuario'      =>$_SESSION['UserId'],
                                      'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                        $NewLog = $LogModel->setLog($Log);
                    }
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);

                    // Log creacion usuario correctamente
                    
                    $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
                    
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);

                // Log creacion usuario correctamente
                
                $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;
        
        case "SelectGroupMembers":
            if(isset($_POST['IDGroup'])){
                $Response = $DAOGroups->getMembersGroupList($_POST['IDGroup']);
                
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;
        
        case "SetEditGroup":
            if(isset($_POST['IdGroup']) && isset($_POST['NameGroup']) && isset($_POST['DescriptionGroup']) && isset($_POST['ValidityGroup']) && isset($_POST['MembersGroup'])){
                $MembersArray = $_POST['MembersGroup'];
                $idGroup = $_POST['IdGroup'];
                $Grupo = array('nombre_grupo'       => $_POST['NameGroup'],
                               'descripcion_grupo'  => $_POST['DescriptionGroup'],
                               'vigencia'           => $_POST['ValidityGroup']);
                $Group = $DAOGroups->updateGroup($Grupo, $idGroup);
                if($Group){
                    $DeleteRelationsGruop = $DAOGroups->deleteRelations($idGroup);
                    if($DeleteRelationsGruop[0] > 0){
                        foreach ($MembersArray as $location):
                            $GroupLocation = array('id_grupo'       => $idGroup,
                                                   'id_locacion'    => $location['value']);
                            $DAOGroups->setGroupLocation($GroupLocation);
                        endforeach;
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);

                        // Log creacion usuario correctamente

                        $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                        $Log = array ('descripcion_log' =>$Description,
                                      'id_usuario'      =>$_SESSION['UserId'],
                                      'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                        $NewLog = $LogModel->setLog($Log);
                    }else {
                        echo 'eci';
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);

                        // Log creacion usuario correctamente
                        
                        $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                        $Log = array ('descripcion_log' =>$Description,
                                      'id_usuario'      =>$_SESSION['UserId'],
                                      'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                        $NewLog = $LogModel->setLog($Log);
                    }
                }else{
                    echo 'ece';
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);

                    // Log creacion usuario correctamente
                    
                    $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
                    
            }else{
                echo 'aca';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);

                // Log creacion usuario correctamente
                
                $Description = $Language['LabelAccountsLogCreateA']." ".$_POST['NameGroup']." ".$_POST['DescriptionGroup'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;
        
        case "DeleteGroup":
            if(isset($_POST['DeleteIdGroup'])){
                $idGrupo = $_POST['DeleteIdGroup'];
                $relations = $DAOGroups->deleteRelations($idGrupo);
                if($relations[0] > 0){
                    $group = $DAOGroups->deleteGroup($idGrupo);
                    if($group[0] > 0){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }else{
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
        
    }