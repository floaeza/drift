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
        
        case "UploadMultimedia":
            
            $cantidad= count($_FILES["image"]["tmp_name"]);
            // Array POST 
            //print_r($_POST);
//            echo " $ImagesURLRoot <br/> $cantidad <br/>";
//            // Array de los archivos:
//            print_r($_FILES);

            function redim($ruta1,$ruta2,$ancho,$alto){
                $datos=getimagesize ($ruta1);
                $ancho_orig = $datos[0];
                $alto_orig = $datos[1];
                $tipo = $datos[2];

                if ($tipo==1){ # GIF
                    if (function_exists("imagecreatefromgif"))
                        $img = imagecreatefromgif($ruta1);
                    else
                        return false;
                }
                else if ($tipo==2){ # JPG
                    if (function_exists("imagecreatefromjpeg"))
                        $img = imagecreatefromjpeg($ruta1);
                    else
                        return false;
                }
                else if ($tipo==3){ # PNG
                    if (function_exists("imagecreatefrompng"))
                        $img = imagecreatefrompng($ruta1);
                    else
                        return false;
                }

                if ($ancho_orig>$alto_orig){
                    $ancho_dest=$ancho;
                    $alto_dest=($ancho_dest/$ancho_orig)*$alto_orig;
                }else{
                    $alto_dest=$alto;
                    $ancho_dest=($alto_dest/$alto_orig)*$ancho_orig;
                }

            $img2=@imagecreatetruecolor($ancho_dest,$alto_dest) or $img2=imagecreate($ancho_dest,$alto_dest);

            @imagecopyresampled($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig) or imagecopyresized($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig);

                if ($tipo==1){ // GIF
                    if (function_exists("imagegif")){
                        imagegif($img2, $ruta2);
                    }else{
                        return false;
                    }
                }
                if ($tipo==2){ // JPG
                    if (function_exists("imagejpeg")){
                        imagejpeg($img2, $ruta2);
                    }else{
                        return false;
                    }
                }
                if ($tipo==3){  // PNG
                    if (function_exists("imagepng")){
                        imagepng($img2, $ruta2);
                    }else{
                        return false;
                    }
                }
                return true;
            } 
            
            for ($i=0; $i<$cantidad; $i++){
                $fichero_subido =  '/var/www/html/MULTIMEDIA_VDM/Module1/Wednesday/' . basename(str_replace(' ', '_',$_FILES['image']['name'][$i]));
                //echo $fichero_subido.'<br>';
                $imagen=$_FILES["image"]["tmp_name"][$i];
                $imagen_final=$_FILES["image"]["tmp_name"][$i];
                $ancho_nuevo=1280;
                $alto_nuevo=720;

                redim ($imagen,$imagen_final,$ancho_nuevo,$alto_nuevo);
                
                if (move_uploaded_file($imagen_final, $fichero_subido)) {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrect']);
                } else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                        'MessageSummary'  => $Language['SummaryMessageType'][2],
                                        'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }
            echo json_encode($Response);
        break;
        
         case "UploadVideo":
            // Array POST 
//            echo $_POST['data'];
            //echo "<br/><br/>";
            // Array de los archivos:
//            echo $_FILES['video']['name'];
            
            $fichero_subido = $VideosURLRoot . basename(str_replace(' ', '_',$_FILES['video']['name']));

            if (move_uploaded_file($_FILES['video']['tmp_name'], $fichero_subido)) {
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
        
        case "DeleteMultimedia":
            if(isset($_POST['ImageArray'])){
                $Array = $_POST['ImageArray'];
                foreach ($Array as $img):
                    //echo $BackupRootDirectory . $img;
                    unlink('/var/www/html' . $img);
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
        
        case "DeleteMultimediaVideos":
            if(isset($_POST['VideosArray'])){
                $Array = $_POST['VideosArray'];
                foreach ($Array as $vid):
                    //echo $BackupRootDirectory . $vid;
                    unlink($BackupRootDirectory . $vid);
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