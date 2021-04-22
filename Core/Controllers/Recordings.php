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

        $ScheduleTime = intval($schedule['utc_inicio']);

        echo 'ScheduleTime: ';
        print_r($ScheduleTime); echo '<br>';

        echo 'CurrentTime: ';
        print_r($CurrentTime); echo '<br>';

        echo 'ScheduleTime - 80: ';
        echo $ScheduleTime - 80; echo '<br>';

        echo 'CurrentTime + 80: ';
        echo $CurrentTime + 80; echo '<br>';

        if($ScheduleTime < $CurrentTime){
            // ya paso el tiempo de inicio, borrar la grabacion
            echo 'ya paso el tiempo de inicio, borrar la grabacion';
        } else if(($CurrentTime > ($ScheduleTime - 80)) && (($CurrentTime + 80) < $ScheduleTime)){
            // graba
            echo 'graba';
        } else {
            // do nothing
            echo 'dp nothing';
        }
    endforeach;