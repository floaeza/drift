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

        // DEVICES OFF
            $DevicesCount = $DevicesData->getDevicesByStatus('POWER_OFF');

        // HDMI CONNECTED
            $HdmiConnected = $DevicesData->getDevicesHdmi('1');

        // HDMI CONNECTED
            $HdmiDisconnected = $DevicesData->getDevicesHdmi('0');

            array_push($Status,[
                'DevicesOn' => $DevicesCount,
                'HdmiDisconnected' => $HdmiDisconnected,
                'DevicesOff' => $DevicesCount,
                'HdmiConnected' => $HdmiConnected,
                'UpdatedTime'=>date('M j, h:i A')
            ]);

        $Response = $Status;
        break;

        case 'DeviceList':

            $DeviceListResult = $DevicesData->GetDeviceList();

            $DeviceList = array();
            foreach ($DeviceListResult as $Row):
                array_push($DeviceList, $Row['id_dispositivo']);
                array_push($DeviceList, $Row['ip']);
                array_push($DeviceList, $Row['mac_address']);
                array_push($DeviceList, $Row['modelo']);

                if($Row['ultima_actualizacion'] === 'POWER_OFF'){
                    array_push($DeviceList, $Row['ultima_actualizacion']);
                    array_push($DeviceList, '');
                    array_push($DeviceList, 'off');
                    array_push($DeviceList, 'off');
                } else {
                    array_push($DeviceList, $Row['ultima_actualizacion']);
                    array_push($DeviceList, $Row['mensaje_evento']);
                    array_push($DeviceList, 'on');

                    if($Row['hdmi'] === '0'){
                        array_push($DeviceList, 'off');
                    } else {
                        array_push($DeviceList, 'on');
                    }
                }
            endforeach;

            $Response = array_chunk($DeviceList, 8);

        break;
}

//
echo json_encode($Response);
