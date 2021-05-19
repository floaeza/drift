<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_locacion
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class LocationType extends Database{    
    private $LocationList;
    
    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    function getLocationTypeList() {
        try {
            $this->connect();
            $this->select("cat_tipo_locacion");
            $this->LocationList = $this->getResult();
            $this->disconnect();
            return $this->LocationList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

//    function setProfileList($ProfileList) {
//        $this->ProfileList = $ProfileList;
//    }
}
