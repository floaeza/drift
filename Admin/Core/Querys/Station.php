<?php 
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de estaciones la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Guillermo Arce
 * FECHA: junio 2017
 * ****************************************************************************/
session_start();
    require '../Models/Config.php';
    require '../Models/Log.php';
   require '../DAO/ChannelDAO.php';
    require '../../General/Languages/es.php';
    require '../DAO/StationDAO.php';
    
    $DAOStation = new Station($DirectoryLog);
    
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    
    switch ($Option){
        case "UploadMultimediaIcon":
//            // Array POST 
//            print_r($_POST);
//            echo "<br/><br/>";
//            // Array de los archivos:
//            print_r($_FILES);
            
            $fichero_subido = $ChannelsLogosURLRoot. basename(str_replace(' ', '_',$_FILES['image']['name']));

            if (move_uploaded_file($_FILES['image']['tmp_name'], $fichero_subido)) {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                    'MessageSummary'  => $Language['SummaryMessageType'][0],
                                    'MessageDetail'   => $Language['MessageInsertCorrect']);
            } else {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                
            }
            echo json_encode($Response);
        break;
        case "UploadMultimediaIcon2":
//            // Array POST 
//            print_r($_POST);
//            echo "<br/><br/>";
//            // Array de los archivos:
//            print_r($_FILES);
            
            $fichero_subido = $ChannelsLogosURLRoot. basename(str_replace(' ', '_',$_FILES['image']['name']));

            if (move_uploaded_file($_FILES['image']['tmp_name'], $fichero_subido)) {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                    'MessageSummary'  => $Language['SummaryMessageType'][0],
                                    'MessageDetail'   => $Language['MessageInsertCorrect']);
            } else {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;
        //metodo para visualisar la tabla cat_Estaciones
        case "SelectStation":
            $StationList = $DAOStation->getStationList();
            echo json_encode($StationList);
        break;
    //metodo para insertar estaciones en la base de datos
       case "InsertStation":
          
            $Station = array('numero_estacion'         =>$_POST['NumStation'],
                             'nombre_estacion'         =>$_POST['NameStation'], 
                             'indicativo'              =>$_POST['IndicativeStation'],
                             'logo'                    => $UserImage,
                             'logo'                    => $_POST['UserImage']
                             //'logo'                    =>$_POST['LogoStation']
               );
           
            $NewStation = $DAOStation->setStation($Station);

           
       if($NewStation[0] > 0){
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);
                
        // Log creacion usuario correctamente
        $LogModel = new Log($DirectoryLog);
        $Description = $Language['LabelAccountsLogCreateStationA']." ".$_POST['NumStation']." ".$_POST['NameStation'];
        $Log = array ('descripcion_log' =>$Description,
                      'id_usuario'      =>$_SESSION['UserId'],
                      'tipo_aviso'      =>$Language['OptionMessageType'][0]);
        $NewLog = $LogModel->setLog($Log);
    }
    else {
        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                          'MessageSummary'  => $Language['SummaryMessageType'][2],
                          'MessageDetail'   => $Language['MessageInsertIncorrect']);
        // Log creacion usuario incorrectamente correctamente
        $LogModel = new Log($DirectoryLog);
        $Description = $Language['LabelAccountsLogCreateStationB']." ".$_POST['NumStation']." ".$_POST['NameStation'];
        $Log = array ('descripcion_log' =>$Description,
                      'id_usuario'      =>$_SESSION['UserId'],
                      'tipo_aviso'      =>$Language['OptionMessageType'][2]);
        $NewLog = $LogModel->setLog($Log);
    }
    echo json_encode($Response);
break;
    // metodo para editar estaciones
        case "setStationEdit":

            $Stationid = $_POST['EditStationId'];
            
                $StationEdit = array('numero_estacion'      =>$_POST['EditNumStation'],
                                     'nombre_estacion'      =>$_POST['EditNameStation'], 
                                     'indicativo'           =>$_POST['EditIndicativeStation'],
                                     'logo'                 =>$_POST['UserImage']
                                     
                    
                              );
                
                $EditStation = $DAOStation->setStationEdit($StationEdit, $Stationid);

                if($EditStation[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);
                    // Log creacion usuario incorrectamente correctamente
                        $LogModel = new Log($DirectoryLog);
                        $Description = $Language['LabelAccountsLogEditStationA']." ".$_POST['EditNumStation']." ".$_POST['EditNameStation'];
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

            
            echo json_encode($Response);
        break;
    //metodo para eliminar estaciones 
        case "StationDelet":
            $StatusDisable="";
            $StationId = $_POST['DeleteStationId'];
            $StationName = $_POST['DeleteNameStation'];
            $StationIndicative = $_POST['DeleteIndicativeStation'];
            
            
            $UserStatusId = array('id_estacion' =>$StatusDisable);
            $StationDelet = $DAOStation->StationDelet($StationId);

            if($StationDelet[0] > 0){
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => $Language['MessageInsertCorrect']);
                // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteStationA']." ".$_POST['DeleteIndicativeStation']." ".$_POST['DeleteNameStation'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
            }
            else {
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeleteStationB']." ".$_POST['DeleteIndicativeStation']." ".$_POST['DeleteNameStation'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
            }

            
            echo json_encode($Response);
        break;
        
        
        
        
    }
    
    