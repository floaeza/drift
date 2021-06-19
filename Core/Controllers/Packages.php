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
    
    $Option = !empty($_POST['Option']) ? $_POST['Option'] : 'GetAllPackages';
    $PackageId = !empty($_POST['PackageId']) ? $_POST['PackageId'] : '1';
    
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
            $PackageList = $PackagesData->getPackagesId($PackageId);
            $Result = $PackageList;
            break;
    }
    
    echo json_encode($Result);