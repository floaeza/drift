<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

    $CurrentController = 'DeviceDashboard';

    $Option         = !empty($_POST['Option']) ? $_POST['Option'] : '';

$DevicesData   = new Devices('System', $CurrentController);

$Response = '';
$FirstElement = 0;

switch ($Option){
    case 'GetDevicesByStatus':
        $Status = array();

        // DEVICES ON
            $OffDevices = $DevicesData->getDevicesByStatus('POWER_OFF');
            $DevicesCount = $DevicesData->getOperatingDevices();
            array_push($Status,array('DevicesOn' => $DevicesCount));

        // DEVICES OFF
            $DevicesCount = $DevicesData->getDevicesByStatus('POWER_OFF');
            array_push($Status,array('DevicesOff' => $DevicesCount));

        // HDMI CONNECTED
            $HdmiConnected = $DevicesData->getDevicesHdmi('1');
            array_push($Status,array('HdmiConnected' => $HdmiConnected));

        // HDMI CONNECTED
            $HdmiDisconnected = $DevicesData->getDevicesHdmi('0');
            array_push($Status,array('HdmiDisconnected' => $HdmiDisconnected));

        $Response = $Status;
        break;
}


echo json_encode($Response);
