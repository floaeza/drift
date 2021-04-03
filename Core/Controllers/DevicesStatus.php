<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../Models/Utilities.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

$CurrentController = 'DeviceDashboard';

$Option         = !empty($_POST['Option']) ? $_POST['Option'] : 'GetDevicesByStatus';

$DevicesData   = new Series('System', $CurrentController);
$Utilities    = new Utilities();

$Response = '';
$FirstElement = 0;

switch ($Option){
    case 'GetDevicesByStatus':
        $Status   = !empty($_POST['Status']) ? $_POST['Status'] : 'POWER_OFF';

        $Response = $DevicesData->getDevicesByStatus($Status);

        break;
}


echo json_encode($Response);
