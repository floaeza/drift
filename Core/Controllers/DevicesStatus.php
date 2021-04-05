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
            $ON = ['DevicesOn' => $DevicesCount];
            array_push($Status,$ON);

        // DEVICES OFF
            $DevicesCount = $DevicesData->getDevicesByStatus('POWER_OFF');
            $OFF = ['DevicesOff' => $DevicesCount];
            array_push($Status,$OFF);

        // HDMI CONNECTED
            $HdmiConnected = $DevicesData->getDevicesHdmi('1');
            $CONNECTED = ['HdmiConnected' => $HdmiConnected];
            array_push($Status,$CONNECTED);

        // HDMI CONNECTED
            $HdmiDisconnected = $DevicesData->getDevicesHdmi('0');
            $DISCONNECTED = ['HdmiDisconnected' => $HdmiDisconnected];
            array_push($Status,$DISCONNECTED);

        $Response = $Status;
        break;
}


echo json_encode($Response);
