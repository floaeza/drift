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
    $Option = !empty($_POST['Option']) ? $_POST['Option'] : 'InsertControl';
    $MacAddress = !empty($_POST['mac_address']) ? $_POST['mac_address'] : '00:00:00:00:00:01';
    $IDGuest = !empty($_POST['IDGuest']) ? $_POST['IDGuest'] : 'CHUY';
    $guest = !empty($_POST['guest']) ? $_POST['guest'] : '16';
    $orden = !empty($_POST['orden']) ? $_POST['orden'] : 'PLATA';


    
    $ConfigData   = new Config($MacAddress, $CurrentController);
    $DevicesData  = new Devices('system', $CurrentController);
    $LocationData = new Locations($MacAddress, $CurrentController);
    $ModulesData  = new Modules($MacAddress, $CurrentController);
    $DiskData     = new DiskInfo($MacAddress, $CurrentController);

    switch ($Option) {
        case 'GetDeviceByMac':
            $Device = $DevicesData->getDevice($MacAddress);
            foreach ($Device as $DeviceInfo):
                array_push($ArrayDeviceInfo, array('MAC' => $DeviceInfo['mac_address'],
                'IP' => $DeviceInfo['ip'],
                'MARK' => $DeviceInfo['marca'],
                'MDL' => $DeviceInfo['modelo'],
                'SWV' => $DeviceInfo['version_software'],
                'LEC' => $DeviceInfo['ultima_ejecucion']
                ));
            endforeach;
            echo json_encode($ArrayDeviceInfo);
            break;

        case 'GetControllByMac':
            $Device = $DevicesData->getControl($MacAddress);
            foreach ($Device as $DeviceInfo):
                array_push($ArrayDeviceInfo, array('IDGuest' => $DeviceInfo['IDGuest'],
                'guest' => $DeviceInfo['guest'],
                'MAC' => $DeviceInfo['mac_address'],
                'orden' => $DeviceInfo['orden'],
                ));
            endforeach;
            echo json_encode($ArrayDeviceInfo);
            break;
        
        case 'GetAllControl':
            $Device = $DevicesData->GetControlList();
            foreach ($Device as $DeviceInfo):
                array_push($ArrayDeviceInfo, array('IDGuest' => $DeviceInfo['IDGuest'],
                'guest' => $DeviceInfo['guest'],
                'MAC' => $DeviceInfo['mac_address'],
                'orden' => $DeviceInfo['orden'],
                ));
            endforeach;
            echo json_encode($ArrayDeviceInfo);
            break;
        
        case 'InsertControl':
            $NewDevice = array('IDGuest' => $IDGuest,
            'guest'                      => $guest,
            'mac_address'                => $MacAddress,
            'orden'                      => $orden
            );
           $DevicesData->setControl($NewDevice);
           echo json_encode($NewDevice);
            break;
        case 'UpdateControlByMac':
            $NewDevice = array('guest'  => $guest,
            'orden'                      => $orden,
            );
           $DevicesData->updateControl($MacAddress, $NewDevice);
           echo json_encode($NewDevice);
            break;
        case 'DeleteControlbyMac':
            $DevicesData->deleteControl($MacAddress);
            echo json_encode($MacAddress);
            break;
    }

   