<?php
/* *****************************************************************************
 * OBJETIVO: Permite validar si un usuario puede iniciar sesion
 * PARAMETROS RECIBIDOS: Correo y contrasena del usuario
 * CREADO POR: Tania Maldonado
 * FECHA: Marzo 2017
 * ****************************************************************************/
require_once __DIR__ . '/Database.php';
class Log extends Database{    
    private $Log;
    
    public function __construct($DirectoryLog) {
        $this->DirectoryLog = $DirectoryLog;
    }
    function getLog() {
        try {
            
            $this->connect();
            $this->select("log");
            $this->Log = $this->getResult();
            $this->disconnect();
            return $this->Log;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        
    }
   

    function setLog($Log) {
        try {
            $this->connect();
            $this->insert("log",$Log);
            $this->Log = $this->getResult();
            $this->disconnect();
            return $this->Log;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
}
