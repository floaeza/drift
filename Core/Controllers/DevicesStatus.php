<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2021
 * Tipo: Controlador
 */

require_once './../Models/Database.php';
require_once './../Models/Utilities.php';
require_once './../DataAccess/Config.php';


$CurrentController = 'Device';

$Option         = !empty($_POST['Option']) ? $_POST['Option'] : '';
$MacAddress     = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '';
$OperationId    = !empty($_POST['OperationId']) ? $_POST['OperationId'] : '';
$LocationId     = !empty($_POST['LocationId']) ? $_POST['LocationId'] : '';
$MacAddressPvr  = !empty($_POST['MacAddressPvr']) ? $_POST['MacAddressPvr'] : '';

$SeriesData   = new Series($MacAddress, $CurrentController);
$ProgramsData = new Programs($MacAddress, $CurrentController);
$DiskData     = new DiskInfo($MacAddress, $CurrentController);
$Utilities    = new Utilities();

$Response = '';
$FirstElement = 0;

switch ($Option){
    case 'AddSerie':
        $TitleSerie = !empty($_POST['TitleSerie']) ? $_POST['TitleSerie'] : '';
        $Channel    = !empty($_POST['Channel']) ? $_POST['Channel'] : '';
        $Position   = !empty($_POST['Position']) ? $_POST['Position'] : '';

        // Revisa si ya existe una serie igual grabandose en la misma locacion
        $CheckSerie = $SeriesData->getSerieByLocation($LocationId, $TitleSerie);

        if(empty($CheckSerie)){
            $SerieInfo =  array ('id_locacion' => $LocationId,
                'id_operacion' => $OperationId,
                'titulo_serie' => $TitleSerie,
                'canal' => $Channel,
                'posicion' => intval($Position),
                'mac_address_pvr' => $MacAddressPvr,
                'fecha_adicion' => date('Ymd'));

            $AddSerie = $SeriesData->setSerie($SerieInfo);

            if(intval($AddSerie) > 1){
                $Response = 'Serie added';
            } else {
                $Response = 'There was a problem, try again later';
            }
        } else {
            $Response = 'Serie already being recorded';
        }
        break;

    case 'RecordingsToRecord':
        $Result = $ProgramsData->getProgramsToRecord($LocationId);

        $Records = array();

        foreach ($Result as $Row):
            array_push($Records, array('databasekey' => $Row['databasekey'],
                'utc_start' => $Row['utc_inicio'],
                'utc_final' => $Row['utc_final']
            ));
        endforeach;

        $Response = $Records;
        break;

    case 'AddRecord':

        $Title          = !empty($_POST['Title']) ? $_POST['Title'] : '';
        $Episode        = !empty($_POST['Episode']) ? $_POST['Episode'] : '';
        $Databasekey    = !empty($_POST['Databasekey']) ? $_POST['Databasekey'] : '';
        $Description    = !empty($_POST['Description']) ? $_POST['Description'] : '';
        $Rating         = !empty($_POST['Rating']) ? $_POST['Rating'] : '';
        $Date           = !empty($_POST['Date']) ? $_POST['Date'] : '';
        $StarTime       = !empty($_POST['StarTime']) ? $_POST['StarTime'] : '';
        $EndTime        = !empty($_POST['EndTime']) ? $_POST['EndTime'] : '';
        $UtcStart       = !empty($_POST['UtcStart']) ? $_POST['UtcStart'] : '';
        $UtcEnd         = !empty($_POST['UtcEnd']) ? $_POST['UtcEnd'] : '';
        $ChannelSource  = !empty($_POST['ChannelSource']) ? $_POST['ChannelSource'] : '';

        $ProgramInfo =  array  ('id_locacion' => $LocationId,
            'id_operacion' => $OperationId,
            'mac_address_pvr' => $MacAddressPvr,
            'titulo_programa' => $Title,
            'titulo_episodio' => $Episode,
            'databasekey' => $Databasekey,
            'descripcion_programa' => $Description,
            'estrellas_rating' => $Rating,
            'fecha_programa' => $Date,
            'hora_inicio' => $StarTime,
            'hora_final' => $EndTime,
            'utc_inicio' => $UtcStart,
            'utc_final' => $UtcEnd,
            'url_canal' => $ChannelSource);

        $AddProgram = $ProgramsData->setProgram($ProgramInfo);

        if(intval($AddProgram) >= 1){
            $Response = 'Program added';
        } else {
            $Response = 'There was a problem, try again later';
        }
        break;

    case 'RecordingsList':
        $ProgramsRecorded = $ProgramsData->getProgramsRecorded($LocationId);

        $NewArray =  array();

        $List = array();
        $Folders = array();

        foreach ($ProgramsRecorded as $Program):
            $List[$Program['titulo_programa']] = $Program['titulo_programa'];
        endforeach;

        foreach ($List as $ListRow):
            array_push($NewArray, array($ListRow));
        endforeach;

        for ($j = 0; $j < count($NewArray); $j++) {

            for ($i = 0; $i < count($ProgramsRecorded); $i++) {
                if ($NewArray[$j][0]  === $ProgramsRecorded[$i]['titulo_programa']) {

                    $MinutesDuration = $Utilities->GetDurationHours($ProgramsRecorded[$i]['hora_inicio'], $ProgramsRecorded[$i]['hora_final']);
                    //0000000002
                    //$RecorderDevice['RecordsSource'].'/'.$AssetZerosId;
                    // $RecordsSource      = 'pvr:/';
                    //'rtsp://'.$Recorder['ip'].$Config['PortRtsp'];

                    if($MacAddress === $ProgramsRecorded[$i]['mac_address_pvr']){
                        $Url = 'pvr://'.str_pad($ProgramsRecorded[$i]['id_asset'],10,'0', STR_PAD_LEFT);
                    } else {
                        $Url = 'rtsp://'.$ProgramsRecorded[$i]['ip'].':554/'.str_pad($ProgramsRecorded[$i]['id_asset'],10,'0', STR_PAD_LEFT);
                    }
                    array_push($NewArray[$j], array(
                        'id' => $ProgramsRecorded[$i]['id_programa'],
                        'url' => $Url,
                        'description' => $Utilities->CleanString($ProgramsRecorded[$i]['descripcion_programa']),
                        'episode' => $Utilities->CleanString($ProgramsRecorded[$i]['titulo_episodio']),
                        'rating' => $ProgramsRecorded[$i]['estrellas_rating'],
                        'date' => $ProgramsRecorded[$i]['fecha_programa'],
                        'duration' => round($MinutesDuration)
                    ));
                }
            }
        }

        $Response = $NewArray;
        break;

    case 'SetDeleteProgram':
        $ProgramId = !empty($_POST['ProgramId']) ? $_POST['ProgramId'] : '';
        $OperationId = !empty($_POST['OperationId']) ? $_POST['OperationId'] : '';

        $ProgramUpdate =  array ('id_operacion' => $OperationId);

        $UpdateOperation = $ProgramsData->setDeleteProgram($ProgramId, $ProgramUpdate);

        $Result = $UpdateOperation[$FirstElement];

        if(intval($Result) >= 1){
            $Response = array('Update' => true, 'Message' => 'Program deleted');
        } else {
            $Response = array('Update' => false, 'Message' => 'There was a problem, try again later');
        }
        break;

    case 'SchedulesList':
        $ProgramsSchedule = $ProgramsData->getProgramsSchedule($LocationId);

        $NewArray =  array();

        $List = array();
        $Folders = array();

        foreach ($ProgramsSchedule as $Program):
            $List[$Program['titulo_programa']] = $Program['titulo_programa'];
        endforeach;

        foreach ($List as $ListRow):
            array_push($NewArray, array($ListRow));
        endforeach;

        for ($j = 0; $j < count($NewArray); $j++) {

            for ($i = 0; $i < count($ProgramsSchedule); $i++) {
                if ($NewArray[$j][0]  === $ProgramsSchedule[$i]['titulo_programa']) {

                    $Recording = ($ProgramsSchedule[$i]['grabacion_activa'] === '1') ? '  (recording)' : '';

                    array_push($NewArray[$j], array(
                        'id' => $ProgramsSchedule[$i]['id_programa'],
                        'description' => $ProgramsSchedule[$i]['descripcion_programa'],
                        'episode' => $ProgramsSchedule[$i]['titulo_episodio'].$Recording,
                        'active' => $ProgramsSchedule[$i]['grabacion_activa'],
                        'date' => $ProgramsSchedule[$i]['fecha_programa'],
                        'start' => $ProgramsSchedule[$i]['hora_inicio'],
                        'final' => $ProgramsSchedule[$i]['hora_final'],
                    ));
                }
            }
        }

        $Response = $NewArray;
        break;

    case 'SeriesList':

        $Result = $SeriesData->getSeries($LocationId);

        $Records = array();

        foreach ($Result as $Row):
            array_push($Records, array('id_serie' => $Row['id_serie'],
                'titulo' => $Row['titulo_serie'],
                'fecha_adicion' => $Row['fecha_adicion'],
                'canal' => $Row['canal'],
                'posicion' => $Row['posicion']
            ));
        endforeach;

        $Response = $Records;

        break;

    case 'DeleteSerie':
        $SerieId = !empty($_POST['SerieId']) ? $_POST['SerieId'] : '';

        $Result = $SeriesData->deleteSerie($SerieId);

        if(intval($Result) >= 1){
            $Response = array('Delete' => true, 'Message' => 'Serie deleted');
        } else {
            $Response = array('Delete' => false, 'Message' => 'There was a problem, try again later');
        }
        break;

    case 'GetPvrInfo':
        $Response = $DiskData->getPvrInfo($LocationId, $MacAddress);
        break;

    case 'SetPvrInfo':
        $TotalSize = !empty($_POST['TotalSize']) ? $_POST['TotalSize'] : '';
        $AvailableSize = !empty($_POST['AvailableSize']) ? $_POST['AvailableSize'] : '';

        $CheckInfo = $DiskData->checkPvrInfo($MacAddress);

        if(empty($CheckInfo)){
            $InfoDevice =  array ('id_locacion' => $LocationId,
                'mac_address' => $MacAddress,
                'espacio_total' => $TotalSize,
                'espacio_disponible' => $AvailableSize);

            $Response = $DiskData->setPvrInfo($InfoDevice);
        } else {
            $InfoUpdate =  array ('espacio_disponible' => $AvailableSize);

            $Response = $DiskData->updatePvrInfo($InfoUpdate, $MacAddress);
        }
        break;

    case 'CheckProgramsToSchedule':
        $Response = $ProgramsData->getProgramsToSchedule($MacAddress);
        break;

    case 'UpdateProgramStatus':

        $ProgramId   = !empty($_POST['ProgramId']) ? $_POST['ProgramId'] : '';
        $OperationId = !empty($_POST['OperationId']) ? $_POST['OperationId'] : '';
        $StreamId    = !empty($_POST['StreamId']) ? $_POST['StreamId'] : '';
        $AssetId     = !empty($_POST['AssetId']) ? $_POST['AssetId'] : '';
        $ActiveRec   = !empty($_POST['ActiveRecording']) ? $_POST['ActiveRecording'] : '';

        if($AssetId === ''){
            $InfoUpdate =  array ('id_stream' => $StreamId, 'id_operacion' => $OperationId);
        } else {

            $StatusProgram = $ProgramsData->getStatusProgram($ProgramId);

            if($StatusProgram['grabacion_activa'] === '1' &&  $ActiveRec === 'false'){
                $InfoUpdate =  array ('id_stream' => '0', 'id_operacion' => $OperationId, 'grabacion_activa' =>'0');
            } else {
                $grabacion = ($ActiveRec === 'true') ? '1' : '0';
                $InfoUpdate =  array ('id_asset' => $AssetId, 'grabacion_activa' =>$grabacion);
            }
        }

        $Response = $ProgramsData->updateProgram($ProgramId, $InfoUpdate);
        break;

    case 'CheckSchedulesToDelete':
        $Response = $ProgramsData->getSchedulesToDelete($MacAddress);
        break;

    case 'DeleteProgram':
        $ProgramId = !empty($_POST['ProgramId']) ? $_POST['ProgramId'] : '';

        $Response = $ProgramsData->DeleteProgram($ProgramId);
        break;
}


echo json_encode($Response);
