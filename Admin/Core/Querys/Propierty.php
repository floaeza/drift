<?php
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de miembro(propietarios) la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../DAO/PropiertyDAO.php';
    require '../../General/Languages/es.php';
    require '../DAO/UsersDAO.php';
    $DAOPropierty = new Propierty($DirectoryLog);

    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

    switch ($Option){

        case SelectPropiertys:
            $PropiertyList = $DAOPropierty->getPropiertyList();
            echo json_encode($PropiertyList);
        break;

        case InsertPropierty:
            $Propierty = array('codigo_miembro'    =>$_POST['MemberCode'],
                               'titulo'            =>$_POST['MemberTitle'],
                               'nombre_miembro'    =>$_POST['MemberName'],
                               'paterno_miembro'   =>$_POST['LastNameF'],
                               'correo_miembro'    =>$_POST['MemberEmail']);
            if(isset($_POST['EditMemberCode']) && isset($_POST['EditMemberEmail'])){
                
                $NewPropierty = $DAOPropierty->setPropierty($Propierty);

                if($NewPropierty[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);

                    // Log creacion Miembro correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogCreateMemberA']." ".$_POST['MemberCode']." ".$_POST['MemberName']." ".$_POST['LastNameF'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                }
                else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    // Log creacion miembro incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogCreateMemberB']." ".$_POST['MemberCode']." ".$_POST['MemberName']." ".$_POST['LastNameF'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
                
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            
            echo json_encode($Response);
        break;

        case UpdatePropierty:
            $PropiertyId = $_POST['EditMemberId'];
            
            $Propierty = array('codigo_miembro'    =>$_POST['EditMemberCode'],
                               'titulo'            =>$_POST['EditMemberTitle'],
                               'nombre_miembro'    =>$_POST['EditMemberName'],
                               'paterno_miembro'   =>$_POST['EditLastNameF'],
                               'correo_miembro'    =>$_POST['EditMemberEmail']);
            if(isset($_POST['EditMemberCode']) && isset($_POST['EditMemberEmail'])){
                $EditPropierty = $DAOPropierty->updatePropierty($Propierty, $PropiertyId);
                
                if($EditPropierty[0] > 0){
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

        case DeletePropierty:
            $PropiertyId = $_POST['DeleteMemberId'];
            
            $DeletePropierty = $DAOPropierty->deletePropierty($PropiertyId);

            if($DeletePropierty[0] > 0){
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);
            }
            else {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;
    }
