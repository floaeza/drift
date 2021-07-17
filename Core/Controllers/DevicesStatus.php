<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

    $CurrentController = 'DeviceDashboard';

    $Option         = !empty($_POST['Option']) ? $_POST['Option'] : 'UpdateRebootDevice';

$DevicesData   = new Devices('System', $CurrentController);

$Response = '';

switch ($Option){
    case 'GetDevicesByStatus':
        $Status = array();

        // DEVICES ON
            $OffDevices = $DevicesData->getDevicesByStatus('POWER_OFF');
            $DevicesCount = $DevicesData->getOperatingDevices();

        // DEVICES OFF
            $DevicesCountOff = $DevicesData->getDevicesByStatus('POWER_OFF');

        // HDMI CONNECTED
            $HdmiConnected = $DevicesData->getDevicesHdmi('1');

        // HDMI CONNECTED
            $HdmiDisconnected = $DevicesData->getDevicesHdmi('0') - 1;

            array_push($Status,[
                'DevicesOn' => $DevicesCount-$OffDevices,
                'HdmiDisconnected' => $HdmiDisconnected,
                'DevicesOff' => $DevicesCountOff,
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
                if($Row['mac_address'] !== '00:00:00:00:00:00') {
                    array_push($DeviceList, $Row['id_dispositivo']);
                    array_push($DeviceList, $Row['codigo_locacion']);
                    array_push($DeviceList, $Row['mac_address']);
                    array_push($DeviceList, $Row['modelo']);
                    array_push($DeviceList, $Row['ultimo_canal']);

                    if ($Row['mensaje_evento'] === 'POWER_OFF') {
                        array_push($DeviceList, $Row['ultima_ejecucion']);
                        array_push($DeviceList, '');
                        array_push($DeviceList, '<i class="material-icons StatusOff">power_off</i>');
                        array_push($DeviceList, '<i class="material-icons StatusOff">tv_off</i>');
                    } else {
                        array_push($DeviceList, $Row['ultima_ejecucion']);
                        array_push($DeviceList, $Row['mensaje_evento']);
                        array_push($DeviceList, '<i class="material-icons StatusOn">power</i>');

                        if ($Row['hdmi'] === '0') {
                            array_push($DeviceList, '<i class="material-icons StatusOff">tv_off</i>');
                        } else {
                            array_push($DeviceList, '<i class="material-icons StatusOn">tv</i>');
                        }
                    }

                    array_push($DeviceInfoList, $Row['ip']);
                    array_push($DeviceInfoList, $Row['version_software']);
                    array_push($DeviceInfoList, $Row['fecha_activacion']);
                    array_push($DeviceInfoList, $Row['marca']);
                }
            endforeach;

            $Response = array('DeviceList'=>array_chunk($DeviceList, 9), 'DeviceInfoList'=>array_chunk($DeviceInfoList, 3));
        break;

        case 'UpdateRebootDevice':
            $DeviceId = !empty($_POST['DeviceId']) ? $_POST['DeviceId'] : '2';

            $DevicesUpdateData = array('reiniciar'=>1);

            $Response = $DevicesData->updateDevice($DeviceId, $DevicesUpdateData);
        break;
}

//
echo json_encode($Response);
