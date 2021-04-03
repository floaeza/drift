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
        $Status   = !empty($_POST['Status']) ? $_POST['Status'] : '';

        if($Status === 'POWER_ON'){
            $OffDevices = $DevicesData->getDevicesByStatus($Status);
            $DevicesCount = $DevicesData->getOperatingDevices();

            $Response = $DevicesCount - $OffDevices;
        } else {
            $Response = $DevicesData->getDevicesByStatus($Status);
        }

        break;
}


echo json_encode($Response);
