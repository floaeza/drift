<?php

    require_once './../Models/Database.php';
    require_once './../Models/Utilities.php';
    require_once './../DataAccess/Config.php';
    require_once './../DataAccess/Stations.php';

    $MacAddress     = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '';
    $CurrentController = 'ChartsController'; 
    $Stations  = new Stations($MacAddress, $CurrentController);

    $all = $Stations->getChannelsName();



    echo json_encode($all);

    