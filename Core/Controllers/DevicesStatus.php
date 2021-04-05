<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

    $CurrentController = 'DeviceDashboard';

    $Option         = !empty($_POST['Option']) ? $_POST['Option'] : 'DeviceList';

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

            $DeviceListResult = $DevicesData->GetDeviceLocationList();

            $DeviceList = array();
            $DeviceInfoList = array();
            foreach ($DeviceListResult as $Row):
                array_push($DeviceList, $Row['id_dispositivo']);
                array_push($DeviceList, $Row['codigo_locacion']);
                array_push($DeviceList, $Row['mac_address']);
                array_push($DeviceList, $Row['modelo']);

                if($Row['mensaje_evento'] === 'POWER_OFF'){
                    array_push($DeviceList, $Row['ultima_ejecucion']);
                    array_push($DeviceList, '');
                    array_push($DeviceList, '<i class="material-icons StatusOff">power_off</i>');
                    array_push($DeviceList, '<i class="material-icons StatusOff">tv_off</i>');
                } else {
                    array_push($DeviceList, $Row['ultima_ejecucion']);
                    array_push($DeviceList, $Row['mensaje_evento']);
                    array_push($DeviceList, '<i class="material-icons StatusOn">power</i>');

                    if($Row['hdmi'] === '0'){
                        array_push($DeviceList, '<i class="material-icons StatusOff">tv_off</i>');
                    } else {
                        array_push($DeviceList, '<i class="material-icons StatusOn">tv</i>');
                    }
                }

                array_push($DeviceInfoList, $Row['id_dispositivo']);
                array_push($DeviceInfoList, $Row['ip']);
                array_push($DeviceInfoList, $Row['modelo']);
                array_push($DeviceInfoList, $Row['version_software']);
                array_push($DeviceInfoList, $Row['fecha_activacion']);

            endforeach;


            $Response = array('DeviceList'=>array_chunk($DeviceList, 9), 'DeviceInfoList'=>array_chunk($DeviceInfoList, 6));

        break;
}

//
echo json_encode($Response);
