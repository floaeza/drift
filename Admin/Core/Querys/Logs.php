<?php
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de usuarios la opcion a ejecutar [Select] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Guillermo Arce
 * FECHA: junio 2017
 * ****************************************************************************/
session_start();
    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../DAO/LogsDAO.php';
    require '../../General/Languages/es.php';
    $DAOLogs = new Users($DirectoryLog);

    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    switch ($Option){

        case "SelectLogs":
            $LogsList = $DAOLogs->getLogsList();
            echo json_encode($LogsList);
        break;   
    }
