<?php

require_once './../Models/Database.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Modules.php';
require_once './../DataAccess/Locations.php';
require_once './../DataAccess/Devices.php';

$CurrentController = 'LocationController';

$MacAddress = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '';
$Option = !empty($_POST['Option']) ? $_POST['Option'] : 'InsertLocation';

$LocationId = !empty($_POST['LocationId']) ? $_POST['LocationId'] : '129';
$codigo_locacion = !empty($_POST['codigo_locacion']) ? $_POST['codigo_locacion'] : 'MANCOS';
$descripcion_locacion = !empty($_POST['descripcion_locacion']) ? $_POST['descripcion_locacion'] : '';
$codigo_miembro = !empty($_POST['codigo_miembro']) ? $_POST['codigo_miembro'] : 'SISTEMAS';
$epg            = !empty($_POST['epg']) ? $_POST['epg'] : '0';
$menu = !empty($_POST['menu']) ? $_POST['menu'] : '0';
$mensajes = !empty($_POST['mensajes']) ? $_POST['mensajes'] : '0';
$id_paquete = !empty($_POST['id_paquete']) ? $_POST['id_paquete'] : '1';
$id_proyecto = !empty($_POST['id_proyecto']) ? $_POST['id_proyecto'] : '1';
$id_modulo = !empty($_POST['id_modulo']) ? $_POST['id_modulo'] : '2';
$id_device = !empty($_POST['id_device']) ? $_POST['id_device'] : '8';

$LocationDevice = !empty($_POST['LocationDevice']) ? $_POST['LocationDevice'] : 'DART';


$LocationsData = new Locations($MacAddress, $CurrentController);
$DeviceData = new Devices('system', 'Power');

switch ($Option) {
    case 'UpdateLocation':
        
        $LocationInfo = array('codigo_miembro' => $codigo_miembro,
        'epg' =>  $epg,
        'menu' => $menu,
        'mensajes' => $mensajes,
        'id_paquete' => $id_paquete,
        'id_modulo' => $id_modulo
        ); 
        $LocationsData->updateLocation($LocationId, $LocationInfo);
        echo json_encode($LocationInfo);
        break;

    case 'InsertLocation':
        $LocationInfo = array(
        'codigo_locacion' => $codigo_locacion,
        'descripcion_locacion' => $descripcion_locacion,    
        'codigo_miembro' => $codigo_miembro,
        'epg' =>  $epg,
        'menu' => $menu,
        'mensajes' => $mensajes,
        'id_paquete' => $id_paquete,
        'id_proyecto'=> $id_proyecto,
        'id_modulo' => $id_modulo
        ); 
        $LocationsData->InsertLocation($LocationInfo);
        break;
    case 'UpdateDeviceLocation':
        $LocationInfo = array(
            'id_locacion' => $LocationId,
        );
        $LocationsData->UpdateDevice_Location($id_device, $LocationInfo);
        echo json_encode($LocationInfo);
        break;
    case 'UpdateDeviceDescriptionLocation':
        $DeviceInfo = array(
            'ubicacion_dispositivo' => $LocationDevice,
        );
        $DeviceData->updateDevice($id_device, $DeviceInfo);
        echo json_encode($DeviceInfo);
        break;
    case 'DeleteDevice':
        $DeviceData->deleteDeviceInLocation($id_device);
        break;
    
}