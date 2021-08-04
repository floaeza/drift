<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2020
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../Models/Utilities.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Devices.php';

$CurrentController = 'TestController';
$MacAddress = '';

$LocationId     = !empty($_POST['LocationId']) ? $_POST['LocationId'] : '190';

$DevicesData = new Devices($MacAddress, $CurrentController);

$Response = $DevicesData->getDeviceRecorderInfomir($LocationId);

echo json_encode($Response);
