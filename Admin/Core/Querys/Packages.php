<?php 
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de paquetes la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../DAO/PackagesDAO.php';
    require '../../General/Languages/es.php';
    require '../DAO/UsersDAO.php';
    $DAOPackages = new Packages($DirectoryLog);
    
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    
    switch ($Option){
        
        case "SelectPackages":
            $PackagesList = $DAOPackages->getPackagesList();            
            echo json_encode($PackagesList);
        break;
    
        case "SelectPackagesChannelsList":

            if(isset($_GET['PackageId'])){
                $PackageId = $_GET['PackageId'];
            } else {
                $PackageId = $_GET['PackageId'];
            }
            
            $PackageChannelList = $DAOPackages->getPackagesChannelList($PackageId);
           /* 

                        <div class="teal card">
                          <div class="content">
                              <img class="ui avatar image" src="/images/avatar/small/matt.jpg">
                              <div class="header">100</div>
                              <div class="header">ABC</div>
                          <div class="meta">
                              <span class="category">igmp:225.1.1.64</span>
                              <br>
                              <span class="category">2001</span>
                          </div>

                          </div>
                      </div>
                */
            $Response = "";
                foreach ($PackageChannelList as $Row):
                    
                    $Response .= "<div class='PacketCardSize teal card'>";
                    $Response .= "<div class='content'>";
                    //$Response .= "<img class='ui avatar image' src='$ChannelsLogosURL$Row[logo]'>";
                    $Response .= "<div class='header'>$Row[numero_canal]</div>";
                    //$Response .= "<div class='header'>$Row[numero_estacion]</div>";
                    $Response .= "<div class='header'>$Row[nombre_estacion]</div>";
                    $Response .= "<div class='meta'>";
                    $Response .= "<span class='category TextSrc'>$Row[src]</span>";
                    $Response .= "</div>";
                    $Response .= "</div>";
                    $Response .= "</div>";
                endforeach; 
            
            
            echo json_encode($Response);
            break;
        
        case "FirstStepInsertPackages":
            if(isset($_POST['Channels'])){
                $NewPackages = $DAOPackages->getChannelsDescription($_POST['Channels']);
                echo json_encode($NewPackages);
            }
        break;
        
        case "FirstStepEditPackages":
            if(isset($_POST['Channels']) && isset($_POST['PackageId'])){
                $NewPackages = $DAOPackages->getChannelsDescription($_POST['Channels']);
                echo json_encode($NewPackages);
            }
        break;
        
        case "ChannelNumber":
            if(isset($_POST['Channel']) && isset($_POST['PackageId'])){
                $NewPackages = $DAOPackages->getChannel($_POST['Channel'], $_POST['PackageId']);
                echo json_encode($NewPackages);
            }
        break;
    
        case "InsertPackages":
            $name=$_POST['Name'];
            $description=$_POST['Description'];
            
            $Packages = array('nombre_paquete'         =>$name,
                              'descripcion_paquete'    =>$description);
            
            if(isset($_POST['Name']) && isset($_POST['Description'])){
                $NewPackages = $DAOPackages->setPackages($Packages);
            
                if($NewPackages[0] > 0){
                    $idPackage = $DAOPackages->getLastPackageId();
                    $Response = array('idPackage'       => $idPackage[0]['id']);

                      // Log creacion usuario correctamente
                      $LogModel = new Log($DirectoryLog);
                      $Description = $Language['LabelAccountsLogCreatePackagesA']." ".$_POST['Name']." ".$_POST['Description'];
                      $Log = array ('descripcion_log' =>$Description,
                                    'id_usuario'      =>$_SESSION['UserId'],
                                    'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                      $NewLog = $LogModel->setLog($Log);
                    
                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    // Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogCreatePackagesB']." ".$_POST['Name']." ".$_POST['Description'];
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
        
        case "UpdatePackages":
            if(isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['IdPackage'])){
                $name=$_POST['Name'];
                $description=$_POST['Description'];
                $idPackage=$_POST['IdPackage'];

                $Packages = array('nombre_paquete'         =>$name,
                                  'descripcion_paquete'    =>$description);
                
                $NewPackages = $DAOPackages->UpdatePackages($Packages, $idPackage);
                if($NewPackages[0] >= 0){
                    $IdPackage = $DAOPackages->deletePackageRelation($idPackage);
                    if($IdPackage[0] > 0){
                        $Response = array('idPackage'       => $idPackage[0]);

                          // Log creacion usuario correctamente
                          $LogModel = new Log($DirectoryLog);
                          $Description = $Language['LabelAccountsLogEditPackagesA']." ".$_POST['Name']." ".$_POST['Description'];
                          $Log = array ('descripcion_log' =>$Description,
                                        'id_usuario'      =>$_SESSION['UserId'],
                                        'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                          $NewLog = $LogModel->setLog($Log);

                    }else {
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                          'MessageSummary'  => $Language['SummaryMessageType'][2],
                                          'MessageDetail'   => $Language['MessageInsertIncorrect']);
                        // Log creacion usuario incorrectamente correctamente
                        $LogModel = new Log($DirectoryLog);
                        $Description = $Language['LabelAccountsLogEditPackagesB']." ".$_POST['Name']." ".$_POST['Description'];
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
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            
            echo json_encode($Response);
        break;
        
        case "InsertPackagesRelation":
            $IdChannel=$_POST['Channel'];
            $ChannelNumber=$_POST['Number'];
            $IdPackage=$_POST['IdPackage'];

            $PackagesRelation = array('id_canal'      => $IdChannel,
                              'id_paquete'    => $IdPackage,
                              'numero_canal'  => $ChannelNumber);
            
            if(isset($_POST['Channel']) && isset($_POST['Number']) && isset($_POST['IdPackage'])){           
                
                $NewPackages = $DAOPackages->setPackagesRelation($PackagesRelation);
                if($NewPackages[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect'],
                                      'Value' => 1);
                    
                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'],
                                      'Value' => 0);
                    
                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect'],
                                  'Value' => 0);
            }
            
            echo json_encode($Response);
        break;
        
        case "SelectChannelPackages":
            if(isset($_POST['IDPackage'])){
                $Response = $DAOPackages->getPackagesChannelList($_POST['IDPackage']);
                
            }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    
                }
            echo json_encode($Response);
        break;
        
        case "DeletePackages":
                $name=$_POST['DeletePackagesName'];
                $description=$_POST['DeletePackagesDescription'];
                
            
            if(isset($_POST['DeletePackagesId'])){
                $CheckPackageMemberRelation = $DAOPackages->checkPackageMemberRelation($_POST['DeletePackagesId']);
                if($CheckPackageMemberRelation[0] <= 0){
                    $DeletePackagesRelation = $DAOPackages->deletePackageRelation($_POST['DeletePackagesId']);
                    if($DeletePackagesRelation[0] > 0){
                        $DeletePackages = $DAOPackages->deletePackage($_POST['DeletePackagesId']);
                        if($DeletePackages[0] > 0){
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);
                            // Log creacion usuario incorrectamente correctamente
                $LogModel = new Log($DirectoryLog);
                $Description = $Language['LabelAccountsLogDeletePackagesA']." ".$_POST['DeletePackagesName']." ".$_POST['DeletePackagesDescription'];
                $Log = array ('descripcion_log' =>$Description,
                              'id_usuario'      =>$_SESSION['UserId'],
                              'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                $NewLog = $LogModel->setLog($Log);
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
                                  'MessageDetail'   => $Language['MessageInsertIncorrectDeletePackage']);
                }
                echo json_encode($Response);
            }
            
        break;
        
        case "CreateEPGPackage":
            if(isset($_POST['id_paquete'])){
                $archivo = $ServerURL.$URL_EPG."/Core/Controllers/EpgFilesController.php?id_paquete=".$_POST['id_paquete'];
                $cmd = "curl -i ".$archivo;
                $Correct = exec($cmd);
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                'MessageSummary'  => $Language['SummaryMessageType'][0],
                                'MessageDetail'   => $Correct);
            }else {
                $idPackage = $DAOPackages->getLastPackageId();
                
                if($idPackage[0] > 0){
                    $archivo = $ServerURL.$URL_EPG."/Core/Controllers/EpgFilesController.php?id_paquete=".$idPackage[0]['id'];
                    $cmd = "curl -i ".$archivo;
                    $Correct = exec($cmd);
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                    'MessageSummary'  => $Language['SummaryMessageType'][0],
                                    'MessageDetail'   => $Correct);
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }
            echo json_encode($Response);
        break;
        
    }
    
    