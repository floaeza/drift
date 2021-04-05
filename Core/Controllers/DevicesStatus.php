<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

    $CurrentController = 'DeviceDashboard';

    $Option         = !empty($_POST['Option']) ? $_POST['Option'] : 'GetDevicesByStatus';

$DevicesData   = new Devices('System', $CurrentController);

$Response = '';
$FirstElement = 0;

switch ($Option){
    case 'GetDevicesByStatus':
        echo $Status   = !empty($_POST['Status']) ? $_POST['Status'] : 'POWER_ON';
echo "<br>";
        if($Status === 'POWER_ON'){
            echo $OffDevices = $DevicesData->getDevicesByStatus('POWER_OFF');echo "<br>";
           echo  $DevicesCount = $DevicesData->getOperatingDevices();echo "<br>";

            $Response = $DevicesCount - $OffDevices;
        } else {
            $Response = $DevicesData->getDevicesByStatus($Status);
        }

        break;
}


echo json_encode($Response);
