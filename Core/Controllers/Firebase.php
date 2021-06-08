<?php
/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: Controlador
 */

    require_once './../Models/Database.php';
    require_once './../DataAccess/Config.php';
    require_once './../DataAccess/Devices.php';
    require_once './../DataAccess/Locations.php';
    require_once './../DataAccess/Modules.php';
    require_once './../DataAccess/DiskInfo.php';
    
    $CurrentController = 'DeviceController';
    
    $ArrayDeviceInfo = array();
    $Option = !empty($_POST['Option']) ? $_POST['Option'] : 'GetDeviceByMac';
    $MacAddress = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '00:02:02:4f:9b:af';
    
    $ConfigData   = new Config($MacAddress, $CurrentController);
    $DevicesData  = new Devices($MacAddress, $CurrentController);
    $LocationData = new Locations($MacAddress, $CurrentController);
    $ModulesData  = new Modules($MacAddress, $CurrentController);
    $DiskData     = new DiskInfo($MacAddress, $CurrentController);

    switch ($Option) {
        case 'GetDeviceByMac':
            $Device = $DevicesData->getDevice($MacAddress);
            array_push($ArrayDeviceInfo, array('MAC' => $Device['mac_address'],
            'IP' => $Device['ip'],
            'MARK' => $Device['marca'],
            'MDL' => $Device['modelo'],
            'SWV' => $Device['version_software'],
            'LEC' => $Device['ultima_ejecucion']
            ));
            echo json_encode($ArrayDeviceInfo);
            break;
        
        default:
            # code...
            break;
    }

   