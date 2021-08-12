<?php
/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Controlador
 */

    require_once './../Models/Database.php';
    require_once './../DataAccess/Config.php';
    require_once './../DataAccess/Packages.php';
    
    $CurrentController = 'PackagesController';
    
    $ConfigData   = new Config('system', $CurrentController);
    $PackagesData = new Packages('system', $CurrentController);
    
    $Option = !empty($_POST['Option']) ? $_POST['Option'] : '';
    $PackageId = !empty($_POST['PackageId']) ? $_POST['PackageId'] : '10';
    $Package_name = !empty($_POST['Package_name']) ? $_POST['Package_name'] : '';
    $Package_description = !empty($_POST['Package_description']) ? $_POST['Package_description'] : '';

    $ChannelId = !empty($_POST['ChannelId']) ? $_POST['ChannelId'] : '';
    $multicast = !empty($_POST['multicast']) ? $_POST['multicast'] : '';
    $puerto = !empty($_POST['puerto']) ? $_POST['puerto'] : '';

    $Channels = !empty($_POST['Channels']) ? $_POST['Channels'] : '';

    // $Option = 'UpdateGuide';
    
    switch ($Option){
        case 'GetChannels':
            $PackageList = $PackagesData->getPackageListById($PackageId);
            $ModulesList = $PackagesData->getModulesPackageListById($PackageId);
            
            $ChannelsList = array();
            foreach ($PackageList as $Row):
                $Calidad = ($Row['id_calidad'] === '1') ? 'HD' : '';
                
                array_push($ChannelsList, array('SRCE' => $Row['src'],
                                                'PORT' => $Row['puerto'],
                                                'CHNL' => $Row['numero_canal'],
                                                'STTN' => $Row['numero_estacion'],
                                                'NAME' => $Row['nombre_estacion'],
                                                'QLTY' => $Calidad,
                                                'INDC' => $Row['indicativo'],
                                                'LOGO' => $Row['logo']));
            endforeach;
            
            foreach ($ModulesList as $Row):
                $Calidad = ($Row['id_calidad'] === '1') ? 'HD' : '';
                
                array_push($ChannelsList, array('SRCE' => $Row['url_modulo'],
                                                'PORT' => $Row['id_modulo'],
                                                'CHNL' => $Row['numero_canal'],
                                                'STTN' => 'CONTENT',
                                                'NAME' => $Row['descripcion_modulo'],
                                                'QLTY' => $Calidad,
                                                'INDC' => $Row['nombre_modulo'],
                                                'LOGO' => $Row['nombre_icono']));
            endforeach;

            
            foreach ($ChannelsList as $clave => $fila) {
                $chan[$clave] = $fila['CHNL'];
            }
            array_multisort($chan, SORT_ASC, $ChannelsList);
        
            $Result = $ChannelsList;
        break;
        case 'GetAllPackages':
            $PackageList = $PackagesData->getPackagesId();
            $Result = $PackageList;
            break;
        case 'CreatePackage':
            $NewPackage = array(
                'nombre_paquete' => $Package_name,
                'descripcion_paquete' => $Package_description,    
                ); 
            $PackagesData->InsertPackage($NewPackage);
            break;
        case 'CreateChannelinPackage':
            $DataChannels = json_decode($Channels);
            
            foreach ($DataChannels as $DataChannel):    
                $ChannelsToInsert = array(
                    'id_canal' => $DataChannel[0],
                    'id_paquete' => $PackageId, 
                    'numero_canal' => $DataChannel[0]+5000,
                     'canal_activo' => '1',  
                    ); 
                    $PackagesData->InsertChannelInPackage($ChannelsToInsert);
            endforeach;
            break;
        case 'DeletePackages':
            $DataChannels = json_decode($Channels);
            foreach ($DataChannels as $DataChannel):    
                    $ChannelID = $DataChannel[0];
                    $PackageID = $PackageId; 
                    $PackagesData->deleteChannelInPackage($ChannelID, $PackageID);
            endforeach;
            break;
        case 'UpdatePackage':
            $NewPackage = array(
                'nombre_paquete' => $Package_name,
                'descripcion_paquete' => $Package_description,    
                ); 
            $PackagesData->updatePackage($PackageId, $NewPackage);
            break;
        case 'UpdateGuide':
            $NewPackage = array(
                'valor_parametro' => $PackageId,   
                ); 
            $PackagesData->updateParameter($NewPackage);
        //    $resultado = shell_exec('cd /var/www/html/BBINCO/TV/Core/Controllers && python3 DebugTr.py');   
        //    $Result= "$resultado\n"; 
            /* Añade redirección, por lo que podemos obtener stderr. */
            $gestor = popen('cd /var/www/html/BBINCO/TV/Core/Controllers && python3 DebugTr.py', 'r');
            $leer = fread($gestor, 2096);
            $Result = $leer;
            pclose($gestor);
            break;
        case 'UpdateChannel':
            $infoChannel = array(
                'src' => $multicast,
                'puerto' => $puerto,    
                ); 
            
            UpdateChannel($ChannelId, $infoChannel);
            break;
    }
    
    echo json_encode($Result);