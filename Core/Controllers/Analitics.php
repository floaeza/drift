<?php
    require_once './../Models/Database.php';
    require_once './../Models/Utilities.php';
    require_once './../DataAccess/Config.php';
    require_once './../DataAccess/AnaliticsTrends.php';

     $Option        = !empty($_POST['Option']) ? $_POST['Option'] : 'getChannelsTimeByDate';
     $Year          = !empty($_POST['Year']) ? $_POST['Year'] : '2021';
     $Month         = !empty($_POST['Month']) ? $_POST['Month'] : '3';
     $startDate     = !empty($_POST['Month']) ? $_POST['Month'] : '2020-01-01';
     $endDate       = !empty($_POST['Month']) ? $_POST['Month'] : '2021-10-01';



    $AnaliticsTrends = new AnaliticsTrends($DirectoryLog);

switch ($Option) {
    case 'getChannelsTimeByYear':
        $ArrayChannelList = array();
        $ChannelTime = $AnaliticsTrends->getTimeOfViewChannelsByYear($Year);
        $ArrayChannelList = $ChannelTime;
        echo json_encode($ArrayChannelList);
        break;
    case 'getChannelsTimeByYear_Month':
        $ArrayChannelList = array();
        $ChannelTime = $AnaliticsTrends->getTimeOfViewChannelsByMonth($Month, $Year);
        $ArrayChannelList = $ChannelTime;
        echo json_encode($ArrayChannelList);
        break;
    case 'getChannelsTimeByDate':
        $ArrayChannelList = array();
        $ChannelTime = $AnaliticsTrends->getTimeOfViewChannelsByDate($startDate, $endDate);
        $ArrayChannelList = $ChannelTime;
        echo json_encode($ArrayChannelList);
        break;
}