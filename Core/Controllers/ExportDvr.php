<?php
/* Creado por: Tania Maldonado
 * Fecha: Enero 2020
 * Tipo: Controlador
 * @@@@@@@@@@@@@@@@@@@ IMPORTANTE @@@@@@@@@@@@@@@@@@@
 * Actualizar la ubicacion del dispositivo antes de cambiarlo de lugar
 */

    require_once '../Models/Utilities.php';
    require_once '../Models/Database.php';
    require_once '../DataAccess/Devices.php';
    require_once '../DataAccess/Programs.php';
    
    $UtilitiesModel = new Utilities();
    $DevicesData    = new Devices('system', 'ExportDvr');
    $ProgramsData   = new Programs('system', 'ExportDvr');
    $FirstElement   = 0;
    
   
    $MacAddress  = '00:02:02:4f:9b:af';
    
    $Device   = $DevicesData->getDevice($MacAddress);
    $Location = $DevicesData->getDeviceLocation($Device[$FirstElement]['id_dispositivo']);
    
    $Ip = $Device[$FirstElement]['ip'];
    $Id = $Location[$FirstElement]['id_locacion'];
    
    //8079
    //8080
    
    $RecordsInfo = 'http://'.$Ip.':8080/PVRRecordsInfo.txt';
    $PathRecordings = 'http://'.$Ip.':8080';
    
    $Result = $UtilitiesModel->GetDataFromUrl($RecordsInfo);
    
    $RecordInfoArray = explode(': src', $Result);
    
    $ArrayRecordsList = array();
    
    array_shift($RecordInfoArray);

        foreach ($RecordInfoArray as $Row=>$RecordRow):

            $EpochRecordDate = intval($UtilitiesModel->getBetween($RecordRow, 'start=', ' metadata'));
            $RecordDate = date('l jS \of F Y h:i:s A', $EpochRecordDate);

            $AssetZerosId = $UtilitiesModel->getBetween($RecordRow, "assetname='", "'");

           $Databasekey = $UtilitiesModel->getBetween($RecordRow, '#', '=');

            $Duration = $UtilitiesModel->getBetween($RecordRow, 'duration=', ' reclength');

            // title='Amino-PLT' url=
            $RecordPLT = $UtilitiesModel->getBetween($RecordRow, "title='", "' url=");
            if($RecordPLT !== 'Amino-PLT'){
                $RecordNameReplace = $UtilitiesModel->getBetween($RecordRow, '%', '@');
                
                $RecordName = str_replace("'", "", $RecordNameReplace);

                if(empty($RecordName)){
                    $UrlVad = $PathRecordings.'/'.$AssetZerosId.'/meta/';

                    $UrlVadData = $UtilitiesModel->GetDataFromUrl($UrlVad);

                    $VadParsed = $UtilitiesModel->ParseVad($UrlVadData, $AssetZerosId);

                    $Vad = $UtilitiesModel->getBetween($VadParsed,'Name', '/');

                    $VadNumber = substr($Vad, -13);

                    $UrlVadM3 = $UrlVad.$VadNumber.'/meta/MDT0,3';
                    
                    //$VadNumber.'/meta/MDT0,3';

                    $MDT0Exist = $UtilitiesModel->RemoteFileExists($UrlVadM3);

                    if($MDT0Exist === true){

                        $DataMDT0 = $UtilitiesModel->GetDataFromUrl($UrlVadM3);
                        //print_r($DataMDT0);
                    } else {
                        $UrlVadM5 = $UrlVad.$VadNumber."/meta/MDT0,5";
                        $DataMDT0 = $UtilitiesModel->GetDataFromUrl($UrlVadM5);
                    }

                    $RecordNameSubs = substr($DataMDT0,110); 
                    $RecordNameClean =  $UtilitiesModel->Clean($RecordNameSubs);

                    $Title  = explode("-", $RecordNameClean);
                    
                    
                    if(strlen($Title[0]) > 150){
                        $Title  = explode(" ", $RecordNameSubs);
                    }
                    
                    
                    $RecordNamePre =  $Title[0];
                    
                    $arr = str_split($RecordNamePre);
                    array_shift($arr);
                    $RecordName   = implode('', $arr);
                    
                    
                    $RecordDescriptionReplace = $UtilitiesModel->getBetween($RecordNameSubs, "-", ";");
                    
                    $PreDatabasekey = substr($RecordNameClean, -25);
                    $Databasekey = substr($PreDatabasekey, 0, 14);
                                    
                    if(strlen($RecordDescriptionReplace) === 0){
                        $DescriptionReplaceA  = explode(".", $RecordNameSubs);
                        
                        $RecordDescriptionReplace = $DescriptionReplaceA[0];
                        
                        $Databasekey = substr($RecordNameClean, -15);
                    } else if(strlen($RecordDescriptionReplace) > 300){
                        $DescriptionReplace1  = explode(",", $RecordDescriptionReplace);
                        
                        $RecordDescription = $DescriptionReplace1[0];
                    }
                    
                    $RecordDescription = str_replace("'", "", $RecordDescriptionReplace);

                } else {
                    $RecordDescriptionReplace = $UtilitiesModel->getBetween($RecordRow, "@", "#");
                    $RecordDescription = str_replace("'", "", $RecordDescriptionReplace);
                }

                $AssetId = ltrim($AssetZerosId, "0"); 
                $AssetDate = date('Ymd', $EpochRecordDate);

                if(empty($RecordDescription)){
                    $RecordDescription = 'No description';
                }
   
                $StartTime= "01:00";
                $dateinsec=strtotime($StartTime);
                $newdate=$dateinsec+$Duration;
                $EndTime = date('H:i',$newdate);
                    
                
                if(strlen($RecordName > 1)){
                $ProgramInfo = array('id_locacion'          => $Id,
                                    'id_operacion'          => '4',
                                    'id_asset'              => $AssetId,
                                    'mac_address_pvr'       => $MacAddress,
                                    'databasekey'           => $Databasekey,
                                    'titulo_programa'       => $RecordName,
                                    'descripcion_programa'  => $RecordDescription,
                                    'fecha_programa'        => $AssetDate,
                                    'hora_inicio'           => $StartTime,
                                    'hora_final'            => $EndTime,
                                    'utc_inicio'            => '0',
                                    'utc_final'             => '0',
                                    'url_canal'             => 'igmp://');
                
                $Response = ' ';                
                $AddProgram = $ProgramsData->setProgram($ProgramInfo);

                if(intval($AddProgram) >= 1){
                    $Response = ' === Program added';
                } else {
                    $Response = ' === There was a problem, try again later';
                }

                echo $Row. $Response.'<br><br>';
                print_r($ProgramInfo); echo "<br>"; echo "<br>";
                echo '____________________________________________________<br><br>';
                }
            }
        endforeach;