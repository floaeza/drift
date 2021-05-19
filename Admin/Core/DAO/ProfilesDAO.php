<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_perfil
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Profiles extends Database{
    private $ProfileList;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    function getProfileList() {
        try {
            $this->connect();
            $this->select("cat_perfil","id_perfil, nombre_perfil","","","","","","","", "id_perfil DESC");
            $this->ProfileList = $this->getResult();
            $this->disconnect();
            return $this->ProfileList;

        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setProfileList($ProfileList) {
        $this->ProfileList = $ProfileList;
    }
}
