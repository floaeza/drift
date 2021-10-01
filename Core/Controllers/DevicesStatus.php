<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

    $CurrentController = 'DeviceDashboard';

    $Option         = !empty($_POST['Option']) ? $_POST['Option'] : 'GetAminosToReboot';
    $MacAddress     = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '00:02:02:6c:64:1e';
    $DeviceArray    = !empty($_POST['DeviceArray']) ? $_POST['DeviceArray'] : '{"id_dispositivo":"7","mac_address":"00:00:00:00:00:01","ip":"0.0.0.1","marca":"Amino","modelo":"A50","version_software":"5.7.1-Ax5x-opera12","fecha_activacion":"2021-08-18","ubicacion_dispositivo":"asdsfbdgnfhj","id_tema":"1","control_remoto":"0","ultima_ejecucion":"2021-08-23 03:17:42","mensaje_evento":"POWER_OFF","ultimo_modulo":null,"ultimo_canal":null,"channel_pos":null,"hdmi":"0","netman":"","grabador":"0","asignado":"0","activo":"1","reiniciar":"0","kill_process":"1","debug":"0","id_dispositivo_locacion":"7","id_locacion":"3"},{"id_dispositivo":"8","mac_address":"00:00:00:00:00:02","ip":"0.0.0.2","marca":"Amino","modelo":"A50","version_software":"5.7.1-Ax5x-opera12","fecha_activacion":"2021-08-18","ubicacion_dispositivo":"test","id_tema":"1","control_remoto":"0","ultima_ejecucion":"2021-08-23 03:17:42","mensaje_evento":"POWER_OFF","ultimo_modulo":null,"ultimo_canal":null,"channel_pos":null,"hdmi":"0","netman":"","grabador":"0","asignado":"0","activo":"1","reiniciar":"0","kill_process":"1","debug":"0","id_dispositivo_locacion":"8","id_locacion":"3"}  ';
    


$DevicesData   = new Devices('System', $CurrentController);

$Response = '';
//$Option = 'RebootDevices';
switch ($Option){
    case 'GetDevicesByStatus':
        $Status = array();

        // DEVICES ON
            $OffDevices = $DevicesData->getDevicesByStatus('POWER_ON');
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
            $DataDevices  = json_decode($DeviceArray);
            $DevicesUpdateData = array('reiniciar'=>1);
            foreach ($DataDevices as $DataDevice):    
                $DeviceID = $DataDevice->id_dispositivo; 
                $DevicesData->updateDevice($DeviceID, $DevicesUpdateData);
            endforeach;
        break;
        case 'GetRemoteControl':
            $Response = $DevicesData->getRemoteControl($MacAddress);
            break;
        case 'GetKillProcess':
            $Response = $DevicesData->getKillProcess($MacAddress);
            break;
        case 'SetKillProcess':
            $Kill = !empty($_POST['Kill']) ? $_POST['Kill'] : 0;
            
            $DevicesUpdateData = array('kill_process'=>$Kill);

            $Response = $DevicesData->updateDeviceModule($MacAddress, $DevicesUpdateData);
            break;
        case 'updateDataModules':

            $LastModule = !empty($_POST['LastModule']) ? $_POST['LastModule'] : 2;
            
            $DevicesUpdateData = array('ultimo_modulo'=>$LastModule);

            $Response = $DevicesData->updateDeviceModule($MacAddress, $DevicesUpdateData);
            break;
        case 'updateDataChannels':
            $LastChannel = !empty($_POST['LastChannel']) ? $_POST['LastChannel'] : '';
            $ChannelPos = !empty($_POST['ChannelPos']) ? $_POST['ChannelPos'] : 0;
            $DevicesUpdateData = array('ultimo_canal'=>$LastChannel,'channel_pos' => $ChannelPos);
            $Response = $DevicesData->updateDeviceModule($MacAddress, $DevicesUpdateData);
            break;
        case 'AllDevices':
            $DeviceListResult = $DevicesData->GetDeviceLocationList();
            $Response = $DeviceListResult; 
            break;

        case 'GetAminos':
            $DeviceListResult = $DevicesData->GetDeviceAminos();
            $Response = $DeviceListResult; 
            break;
        case 'GetAminosToReboot':
            $DeviceListResult = $DevicesData->GetDeviceByReboot();
            $Response = $DeviceListResult; 
            break;
        case 'RebootDevices':
            $DataDevices  = json_decode($DeviceArray);
            $DevicesUpdateData = array('reiniciar'=>1);
            foreach ($DataDevices as $DataDevice):    
                $DeviceID = $DataDevice->id_dispositivo; 
                $DevicesData->updateDevice($DeviceID, $DevicesUpdateData);
            endforeach;
            sleep(20);
            $command = escapeshellcmd('/var/www/html/BBINCO/TV/Core/Controllers/RebootTelnet.py');
            $output = shell_exec($command);
            $Result = $output;
            $Response = $output;
            break;
}

//
echo json_encode($Response);
