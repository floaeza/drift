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
    require '../DAO/LocationsDAO.php';
    require '../../General/Languages/es.php';
    $DAOMessages = new Messages($DirectoryLog);
    $DAOLocations = new Locations($DirectoryLog);
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

    switch ($Option){

        case "SelectMessages":
            $MessagesList = $DAOMessages->getMessagesList();
            echo json_encode($MessagesList);
        break;

        case "InsertMessages":
            if(isset($_POST['destino']) && isset($_POST['asunto']) && isset($_POST['contenido']) && isset($_POST['tipo']) && isset($_POST['fecha']) && isset($_POST['usuario'])){
                
                $values = array(
                                'destinatario'      => $_POST['destino'],
                                'asunto'            => $_POST['asunto'],
                                'cuerpo_mensaje'    => $_POST['contenido'],
                                'fecha_fin_envio'   => $_POST['fecha'],
                                'id_tipo_mensaje'   => $_POST['tipo'],
                                'id_usuario'        => $_POST['usuario']
                                );
                
                $NewMessage = $DAOMessages->setMessage($values);
                
                if($NewMessage[0] > 0){
                    $cont = 0;
                    $Location = $DAOLocations->getLocationsId($_POST['destino']);
                    if($Location[0] > 0){
                        $idMessage = $DAOMessages->getLastMessageId();
                        foreach ($Location as $Loc):
                            $values = array('id_locacion'       => $Loc['id_locacion'],
                                            'id_mensaje'        => $idMessage[0]['id']);
                            $Message = $DAOMessages->setMessageLocationRelation($values);
                            if($Message[0] > 0){
                                $cont++;
                            }else{
                                echo 'Error insert Relation';
                            }
                        endforeach;
                        if(count($Location) == $cont){
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                'MessageDetail'   => $Language['MessageInsertCorrect']);
                        }else{
                            echo 'Error Foreach';
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

        case "DeleteMessages":
            if(isset($_POST['DeleteMessagesId'])){
                $Relation = $DAOMessages->deleteMessageRelation($_POST['DeleteMessagesId']);
                if ($Relation[0] > 0){
                    $Message = $DAOMessages->deleteMessage($_POST['DeleteMessagesId']);
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
        
        case "UpdateMessages":
            if(isset($_POST['IdMensaje']) && isset($_POST['asunto']) && isset($_POST['contenido']) && isset($_POST['tipo']) && isset($_POST['fecha']) && isset($_POST['usuario'])){
                
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
        
    }
