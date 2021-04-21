<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../Models/Utilities.php';
require_once './../DataAccess/Config.php';
require_once './../DataAccess/Series.php';
require_once './../DataAccess/Programs.php';
require_once './../DataAccess/DiskInfo.php';

$CurrentController = 'RecordingsController';

$MacAddress     = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '00:03:e6:eb:a1:9c';
$OperationId     = !empty($_POST['OperationId']) ? $_POST['OperationId'] : '';
$LocationId     = !empty($_POST['LocationId']) ? $_POST['LocationId'] : '';
$MacAddressPvr  = !empty($_POST['MacAddressPvr']) ? $_POST['MacAddressPvr'] : '';

$ProgramsData = new Programs($MacAddress, $CurrentController);

$Response = '';
$FirstElement = 0;

$Schedules = $ProgramsData->getProgramsToSchedule($MacAddress);

$CurrentTime = time();

    foreach ($Schedules as $schedule):
        var_dump($schedule['utc_inicio']); echo '<br>';
        var_dump($CurrentTime); echo '<br>';
    endforeach;