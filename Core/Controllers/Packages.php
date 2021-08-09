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
    $PackageId = !empty($_POST['PackageId']) ? $_POST['PackageId'] : '';
    $Package_name = !empty($_POST['Package_name']) ? $_POST['Package_name'] : '';
    $Package_description = !empty($_POST['Package_description']) ? $_POST['Package_description'] : '';

    $Channels = !empty($_POST['Channels']) ? $_POST['Channels'] : '';
    
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
    }
    
    echo json_encode($Result);