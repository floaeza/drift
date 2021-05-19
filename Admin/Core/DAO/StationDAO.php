<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_perfil
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Guillermo Arce
 * FECHA: Junio 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Station extends Database
{    

    private $StationList;
    private $Station;
    private $StationEdit;
    private $StationDelet;
    
public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
} 
// FUNCIONES GET para mostrar las estaciones en ASC para tener un mejor orden de los datos
function getStationList() {
        try {
            $this->connect();
            $this->select("cat_estacion","*","","","","","","","","numero_estacion ASC");
            $this->StationList = $this->getResult();
            $this->disconnect();
            return $this->StationList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    
    function getStationListDrop() {
        try {
            $this->connect();
            $this->select("cat_estacion","numero_estacion,nombre_estacion,indicativo","","","","","","","","numero_estacion ASC");
            $this->StationList = $this->getResult();
            $this->disconnect();
            return $this->StationList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getStationEdit() {
        return $this->StationEdit;
    }

    function getStationDelet() {
        return $this->StationDelet;
    }
//FUNCIONES SET metodo para insertar en nuestra tabla cat_estacion
    function setStation($Station) {
        try {
            $this->connect();
            $this->insert("cat_estacion",$Station);
            $this->Station = $this->getResult();
            $this->disconnect();
            return $this->Station;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        $this->Station = $Station;
    }
    
    
    function setStationList($StationList) {
        $this->StationList = $StationList;
    }
    
    
    // metodo para editar estaciones 
function setStationEdit($StationEdit , $Stationid) {
        try {
            $this->connect();
            $this->update("cat_estacion",$StationEdit, "id_estacion= $Stationid");
            $this->StationEdit = $this->getResult();
            $this->disconnect();
            return $this->StationEdit;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        
    }
          
// Metodo para eliminar estaciones
    function StationDelet($StationId) {
        try {
            $this->connect();
            $this->delete("cat_estacion", "id_estacion=$StationId");
            $this->Station = $this->getResult();
            $this->disconnect();
            return $this->Station;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
   
    //CODIGO EJEMPLO PARA LLAMAR TXT
   
 /*write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER: 
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI'],"INFO"); */
    
    
    
    


    function setProfileList($ProfileList) {
        $this->StationList = $ProfileList;
}}
