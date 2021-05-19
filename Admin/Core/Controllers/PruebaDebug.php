<?php

    require '../Models/Config.php';
    require '../Models/Database.php';
    //require '../DAO/StatisticsDAO.php';
    

/***********************************************************ejemplo de extraccion de datos****************************************************/
    $Position = 0;
    $Month = 11;
    $Year = 2017;
    $BD = new Database();
    $BD->connect();
    $BD->select("cat_estadistica_canal","id_canal, COUNT(id_canal) AS TotalViews","","","","","","","id_canal","TotalViews DESC","5");
    $CountResult = $BD->getResult();
    
    if(empty($CountResult)){
        $MostViewedChannel = array("ViewsCount"   => "0",
                                         "StationName"  => "-",
                                         "StationImage" => "NoChannel.png",
                                         "AvarageTime"  => "00:00:00");

    } else {
        
        echo $ChannelId = $CountResult[$Position]['id_canal']; echo "<br>";
        
        $BD->select("cat_estadistica_canal","fecha_inicio, fecha_fin","","","","","id_canal = '$ChannelId' AND fecha_inicio","'$Year-$Month%'");
        $SumResult = $BD->getResult();
        
        echo $ViewsCount = count($SumResult); echo "<br>"; echo "<br>";
        
        $TotalSum = 0;
        $Row = 1;
        foreach ($SumResult as $RowSum):
                echo "ROW: ".$Row; echo "<br>";
                echo $StartTime = $RowSum['fecha_inicio'];echo "<br>";
                echo $EndTime = $RowSum['fecha_fin'];echo "<br>";
                echo $SecondsSum = strtotime($EndTime) - strtotime($StartTime);echo "<br>";

                echo $TotalSum += $SecondsSum; echo "<br>"; echo "<br>";
                $Row ++;
        endforeach;
        
        $AvarageTime = $TotalSum;
        
        echo "TS: ".$TotalSum;echo "<br>";
        
        $BD->select("cat_canal","*","cat_estacion ON cat_canal.id_estacion = cat_estacion.id_estacion","","","","id_canal = '$ChannelId'");
        $ChannelResult = $BD->getResult();
        
        $StationName = $ChannelResult[0]['indicativo'];
        $StationImage = $ChannelResult[0]['logo'];

        $MostViewedChannel = array("ViewsCount"   => $ViewsCount,
                                             "StationName"  => $StationName,
                                             "StationImage" => $StationImage,
                                             "AvarageTime"  => $AvarageTime);
        
        print_r($MostViewedChannel);
    }
    
    