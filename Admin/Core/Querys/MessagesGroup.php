<?php
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de mensajes la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../DAO/MessagesDAO.php';
    require '../DAO/MessagesGroupDAO.php';
    require '../DAO/MembersGroupDAO.php';
    require '../../General/Languages/es.php';
    $DAOMessages = new Messages($DirectoryLog);
    $DAOMessagesGroup = new MessagesGroup($DirectoryLog);
    $DAOGroup = new MembersGroupDAO($DirectoryLog);
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

    switch ($Option){

        case "SelectMessagesGroup":
            $MessagesGroupList = $DAOMessagesGroup->getMessagesGroupList();
            echo json_encode($MessagesGroupList);
        break;

        case "InsertMessagesGroup":
            if(isset($_POST['destino']) && isset($_POST['asunto']) && isset($_POST['contenido']) && isset($_POST['tipo']) && isset($_POST['fecha']) && isset($_POST['usuario'])){
                
                $values = array(
                                'destinatario'      => $_POST['destino'],
                                'asunto'            => $_POST['asunto'],
                                'cuerpo_mensaje'    => $_POST['contenido'],
                                'fecha_fin_envio'   => $_POST['fecha'],
                                'id_usuario'        => $_POST['usuario'],
                                'id_tipo_mensaje'   => $_POST['tipo']
                                );
                
                $NewMessage = $DAOMessages->setMessage($values);
                
                if($NewMessage[0] > 0){
                    $cont = 0;
                    //$Group = $DAOGroup->getMembersGroupList($_POST['destino']);
                    if(isset($_POST['destino'])){
                        $idMessage = $DAOMessages->getLastMessageId();
                        $values = array('id_grupo'          => $_POST['destino'],
                                        'id_mensaje'        => $idMessage[0]['id']);
                        $Message = $DAOMessagesGroup->setMessageGroupRelation($values);
                        if($Message[0] > 0){
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                'MessageDetail'   => $Language['MessageInsertCorrect']);
                        }else{
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                        }
                    }
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }else{
                echo 'error POST';
            }
            echo json_encode($Response);
        break;

        case "DeleteMessagesGroup":
            if(isset($_POST['DeleteMessagesGroupId'])){
                $Relation = $DAOMessagesGroup->deleteMessageGroupRelation($_POST['DeleteMessagesGroupId']);
                if ($Relation[0] > 0){
                    $Message = $DAOMessages->deleteMessage($_POST['DeleteMessagesGroupId']);
                    if($Message[0] > 0){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }else{
                    echo 'Error Delete Relation';
                }
            }else{
                echo 'Error POST';
            }
            echo json_encode($Response);
        break;
        
        case "UpdateMessagesGroup":
            if(isset($_POST['IdMensaje']) && isset($_POST['asunto']) && isset($_POST['contenido']) && isset($_POST['fecha']) && isset($_POST['usuario'])){
                
                $values = array(
                                'asunto'            => $_POST['asunto'],
                                'cuerpo_mensaje'    => $_POST['contenido'],
                                'fecha_fin_envio'   => $_POST['fecha'],
                                'id_usuario'        => $_POST['usuario'],
                                'id_tipo_mensaje'   => $_POST['tipo']
                                );
                
                $NewMessage = $DAOMessages->updateMessage($values, $_POST['IdMensaje']);
                
                if($NewMessage[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrect']);
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }else{
                echo 'error POST';
            }
            echo json_encode($Response);
        break;
        
        case "getMemberData":
            $Response = $DAOLocations->getLocationsMemberList($_POST['data']);
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
        
    }
