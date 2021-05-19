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
    require '../DAO/ChannelDAO.php';
    require '../../General/Languages/es.php';
    require '../DAO/StationDAO.php';
    require '../DAO/UsersDAO.php';
    $DAOChannel = new Channel($DirectoryLog);
    
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    
    switch ($Option){
        //caso para consultar y pasamos los datos a getChannelList que sera la variable que se utilizo en ChannelDAO.php
        case "SelectChannel":
            $ChannelList = $DAOChannel->getChannelList();
            echo json_encode($ChannelList);
        break;
    
       case "InsertChannel":
          
            $Channel = array('src'         =>$_POST['DirectionMultiCast'],
                             'puerto'      =>$_POST['NamePort'], 
                             'id_estacion' =>$_POST['NameStation']);
           
           
               $NewChannel = $DAOChannel->setChannel($Channel);
               
                if($NewChannel[0] > 0){
                         $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                           'MessageSummary'  => $Language['SummaryMessageType'][0],
                                           'MessageDetail'   => $Language['MessageInsertCorrect']);
                         //se compila correctamente
                         $LogModel = new Log($DirectoryLog);
                         $Description = $Language['LabelAccountsLogCreateChannelA']." ".$_POST['DirectionMultiCast']." ".$_POST['NamePort'];
                         $Log = array ('descripcion_log' =>$Description,
                                       'id_usuario'      =>$_SESSION['UserId'],
                                       'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                         $NewLog = $LogModel->setLog($Log);
                     }
                     else {
                         $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                           'MessageSummary'  => $Language['SummaryMessageType'][1],
                                           'MessageDetail'   => $Language['MessageInsertIncorrect']);
                         // Log warning tipo de error al no guardarse los datos
                         $LogModel = new Log($DirectoryLog);
                         $Description = $Language['LabelAccountsLogCreateChannelB']." ".$_POST['ChannelName']." ".$_POST['NamePort'];
                         $Log = array ('descripcion_log' =>$Description,
                                       'id_usuario'      =>$_SESSION['UserId'],
                                       'tipo_aviso'      =>$Language['OptionMessageType'][1]);
                         $NewLog = $LogModel->setLog($Log);
                     }
           
           
            
            echo json_encode($Response);
        break;
    
        case "setChannelEdit":

            $Channelid = $_POST['EditChannelId'];
            
            $ChannelEdit = array('src'      =>$_POST['EditDirectionMultiCast'],
                                'puerto'          =>$_POST['EditNamePort'], 
                                'id_estacion'     =>$_POST['EditNameStation'],
                              );
                if(isset($_POST['EditDirectionMultiCast']) && isset($_POST['EditNamePort']) && isset($_POST['EditNameStation'])){
                    $EditChannel = $DAOChannel->setChannelEdit($ChannelEdit, $Channelid);

                    if($EditChannel[0] > 0){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
                        // Log creacion usuario incorrectamente correctamente
                        $LogModel = new Log($DirectoryLog);
                        $Description = $Language['LabelAccountsLogEditChannelA']." ".$_POST['EditDirectionMultiCast']." ".$_POST['EditNamePort'];
                        $Log = array ('descripcion_log' =>$Description,
                                      'id_usuario'      =>$_SESSION['UserId'],
                                      'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                        $NewLog = $LogModel->setLog($Log);
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
    
        case "DeleteChannel":
            
            $ChannelId = $_POST['DeleteChannelId'];
            $ChannelName = $_POST['DeleteChannelName'];
            $ChannelCast = $_POST['DeleteChannelMultiCast'];
            $StatusDisable = "3";
            $UserStatusId = array('id_canal' =>$StatusDisable);
            $DeleteChannel = $DAOChannel->deleteChannel($ChannelId);

            if($DeleteChannel[0] > 0){
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);
                // Log de eliminacion de canal correcto
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteChannelA']." ".$_POST['DeleteChannelName']." ".$_POST['DeleteChannelMultiCast'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
            }
            else {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log eliminacion  de canal
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteChannelB']." ".$_POST['DeleteChannelName']." ".$_POST['DeleteChannelMultiCast'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                $NewLog = $LogModel->setLog($Log);
            }

            
            echo json_encode($Response);
        break;
    }
    
    