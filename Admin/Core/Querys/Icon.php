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
    require '../../General/Languages/es.php';
    
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    
    switch ($Option){
        
        case "UploadIcon":
//            // Array POST 
//            print_r($_POST);
//            echo "<br/><br/>";
//            // Array de los archivos:
//            print_r($_FILES);
            
            $fichero_subido = $IconsURLRoot . basename(str_replace(' ', '_',$_FILES['image']['name']));

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
        
        case "DeleteIcon":
            if(isset($_POST['ImageArray'])){
                $Array = $_POST['ImageArray'];
                foreach ($Array as $img):
                    //echo $BackupRootDirectory . $img;
                    unlink($BackupRootDirectory . $img);
                endforeach;
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                    'MessageSummary'  => $Language['SummaryMessageType'][0],
                                    'MessageDetail'   => $Language['MessageInsertCorrect']);
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;
    }