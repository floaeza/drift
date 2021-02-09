<?php
/* Creado por: Tania Maldonado
 * Fecha: Enero 2020
 * Tipo: Controlador
 */

    date_default_timezone_set('America/Mazatlan');
    
    require_once '../Models/Utilities.php';
    require_once '../Models/Database.php';
    require_once '../DataAccess/Channels.php';
    
/* Para crea un dia de programacion es necesario descargar AYER y HOY. */

    $CurrentController = 'EpgWebDataController';
    
    $Utilities    = new Utilities();
    $ChannelsData = new Channels('system', $CurrentController);
    
    $Channels   = $ChannelsData->getGatoChannelsList('1');
    
    $Today      = date('Y-m-d');
    $Yesterday  = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $Today) ) ));
    
    $Symbols    = array('>', '<', '/', '=', '"', '-');

    
    $Programacion = array();
    
    $EpgFolder = 'http://172.22.22.10/EpgChannels/';
    
    
    foreach ($Channels as $Channel):
        print_r($Channel); echo '<br>';
    endforeach;
    
    
    foreach ($Channels as $Channel):
        $StationName = $Channel['numero_estacion'];
        $ChannelName = preg_replace('/\s+/', '', $Channel['nombre_canal']);

    /* HOY */

        $UrlToday = $EpgFolder.$ChannelName.'/'.$Today.'.txt';

        
        $GetTxtToday1 = $Utilities->GetDataFromUrl($UrlToday);
        $GetTxtToday  = str_replace('"', '', $GetTxtToday1);
        
        $Table = explode('<h2>Horarios de Programación</h2>',$GetTxtToday);
        
        $DataToday = htmlspecialchars($Table[1]);


        $SlicesToday = explode('tbl_EPG_row', $DataToday);

        
        $RemoveFirst = true;
  echo $StationName. ' - '.$ChannelName.'<br>@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>';      
        foreach($SlicesToday as $SliceToday):  

            $SubSlice = explode('div class=', $SliceToday);

            $StartTimeA = $Utilities->getBetween($SubSlice[1], 'datetime=', '>');
            $EndTimeA = $Utilities->getBetween($SubSlice[2], 'datetime=', '>');
            
            $TitleA = $Utilities->getBetween($SubSlice[4], 'span', '/span');
            $TitleB  = str_replace($Symbols, '', $TitleA);
            $TitleC   = substr($TitleB, 0, -4);
            
            $DescA = $Utilities->getBetween($SubSlice[4], '/div', '/div');
            $DescB   = substr($DescA, 0, -4);
            
            
            $StartTime = substr($StartTimeA,0,5);
            $FinalTime = substr($EndTimeA,0,5);
            $Title = substr($TitleC, 4);
            $Description = substr($DescB, 4);

            $NewStartTime = $Utilities->SubstractHour($StartTime);
            $NewFinalTime = $Utilities->SubstractHour($FinalTime);
            
            
            
           if($Title && $RemoveFirst === true){
                $Hour = substr($NewStartTime, 0, 2);
               
                if($Hour !== '23'){
                    $RemoveFirst = false;
                }
           }
            
            if($Title && $RemoveFirst === false){
                
                echo $Title.  '<br>';
                ECHO $StartTime .' - '.$FinalTime.' <br>';

                ECHO $NewStartTime .' - '.$NewFinalTime.' <br>';

                ECHO $Duration = $Utilities->GetDurationHours($StartTime, $FinalTime); echo '<br>';
                echo(intval($Duration) / 60);echo '<br>';echo '<br>';
            
            
            array_push($Programacion, array('STTN' => '', //STATION
                                            'DBKY' => '', //DATABASEKEY
                                            'TTLE' => $Title, //TITLE
                                            'DSCR' => $Description, //DESCRIPTION
                                            'DRTN' => '', //DURATION
                                            'MNTS' => '', //DURACION MINUTES
                                            'DATE' => '', //DATE (EPOCH) 
                                            'STRH' => $NewStartTime, // START HOUR
                                            'FNLH' => $NewFinalTime, // FINAL HOUR
                                            'TVRT' => '', //TV RATING
                                            'STRS' => '', //STARS
                                            'EPSD' => '' //EPISODE
                                            ));  
            }
            
        endforeach;
echo '<br>#################################################################################<br>';
    endforeach;
    
    
//    foreach ($Programacion as $Programs):
//        foreach ($Programs as $row):
//            print_r($row); echo '<br>';
//        endforeach;
//    endforeach;
     
function Time12to24($time12h){
    $time     = explode(' ', $time12h);
    $modifier = $time[1];
    $times    = explode(':', $time[0]);
    $hours    = $times[0];
    $minutes  = $times[1];
    
    if ($hours == '12') {
        $hours = '00';
    }
    
    if ($modifier === 'PM') {
        $hours = intval($hours) + 12;
    } else {
        $hours = intval($hours);
    }
    return $hours.':'.$minutes;
}

function ReplaceXtrainChar($Str){
    $EncodedString = json_encode(utf8ize($Str),  JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
    //Caracteres a reemplazar y el caracter que lo sustituye
    $CharToReplace = array('"', '""', "''", "/", "¨", "´", "``", "\\");
    $CharToSet     = array('',  '',   "'",  "",  "",  "",  "'",  "/");
    $ReplacedString = str_replace($CharToReplace, $CharToSet ,$EncodedString);
    //Codigos a reemplazar y el caracter que lo sustituye
    //                       á         é        í           ó       ú           ü       ñ
    $ReplacedCodes  = array("/u00a0", "/u0082", "/u00a1", "/u00a2", "/u00a3", "/u0081", "/u00a4", "/u00ad", "/u00b5", "/u0090", "/u00b5", 
    "/u00b5", "/u00e9", "/u0088", "/u0085", "/u0083", "/u00a8","/u0089","/u008a","/u0094", "/u008c","/u0092","/u0084","/u0086");
    //Caracteres especiales comentados para futuras referencias
    $ReplaceChar    = array("a"     ,"e"      ,"i"      ,"o"      ,"u"      ,"u"      ,"n"      , "¡"     , "a"/*�?*/, "e"/*É*/, "i"/*�?*/,
    "o"/*Ó*/,"u"/*Ú*/, "e"/*ê*/,  "a"/*à*/, "a"/*à*/, "¿",     "e",     "e"/*è*/,  "o",   "i"/*î*/, "AE"/*Æ*/,"a"/*ä*/,"a"/*å*/);
    $ReplacedString = str_replace($ReplacedCodes, $ReplaceChar ,$ReplacedString);
    $nEnd = $ReplacedString;    
    return $nEnd;
}

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string($d)) {
        return utf8_encode($d);
    }
    return $d;
}