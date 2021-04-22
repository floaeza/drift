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

$SchedulesResponse = array();

    foreach ($Schedules as $schedule):

        $ScheduleTime = intval($schedule['utc_inicio']);

        if($ScheduleTime < $CurrentTime){
            // ya paso el tiempo de inicio, borrar la grabacion
            echo 'ya paso el tiempo de inicio, borrar la grabacion';echo '<br>';
            $Response = $ProgramsData->DeleteProgram($schedule['id_programa']);
            print_r($Response); echo '<br>';
        } else if(($CurrentTime > ($ScheduleTime - 90)) && ($CurrentTime  < $ScheduleTime)){
            // graba
            echo 'graba y actualiza el estatus de la grabación';echo '<br>';

//            $SchRow = array('id_programa' => $schedule['id_programa'],
//                            'titulo_programa' => $schedule['titulo_programa'],
//                            'url_canal' => $schedule['url_canal'],
//                            'utc_inicio' => $schedule['utc_inicio'],
//                            'utc_final' => $schedule['utc_final']);
//
//            print_r($SchRow); echo "<br>";
            array_push($SchedulesResponse, $schedule);
        } else {
            // do nothing
            echo 'do nothing';echo '<br>';
        }

    endforeach;

        echo json_encode($SchedulesResponse);
