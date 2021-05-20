<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_locacion
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Locations extends Database{

    private $LocationsList;
    private $Location;
    private $LocationDispList;


    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    function setRelationLocationDev($values){
        try{
            $this->connect();
            $this->insert("dispositivo_locacion",$values);
            $this->LocationDispList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->LocationDispList;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    

    
    /*************** Getters ***************/
    function getLocationsList() {
        try {
            $this->connect();
            $this->select("locaciones");
            $this->LocationsList = $this->getResult();
            $this->disconnect();
            return $this->LocationsList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getLocationsMemberList($MemberCode) {
        try {
            $this->connect();
            $this->select("cat_miembro",
                        "*",
                        "cat_locacion ON cat_miembro.codigo_miembro = cat_locacion.codigo_miembro",
                        "cat_estatus_locacion ON cat_locacion.id_estatus_locacion = cat_estatus_locacion.id_estatus_locacion",
                        "cat_modulo ON cat_locacion.id_modulo = cat_modulo.id_modulo",
                        "","cat_locacion.codigo_miembro='".$MemberCode."';");
            $this->LocationsList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->LocationsList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getLocationsId($Member) {
        try {
            $this->connect();
            $this->select("cat_locacion", "id_locacion", "", "", "", "" ,"codigo_miembro='".$Member."'");
            $this->LocationsList = $this->getResult();
            $this->disconnect();
            return $this->LocationsList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getLocationIdByName($LocationCode) {
        try {
            $this->connect();
            $this->select("cat_locacion","*","","","","","codigo_locacion = '$LocationCode'");
            $this->LocationById = $this->getResult();
            $this->disconnect();
            return $this->LocationById;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getDevicesLocationsList($idLocation) {
        try {
            $this->connect();
            $this->select("dispositivos","*",
                          "dispositivo_locacion ON dispositivos.id_dispositivo = dispositivo_locacion.id_dispositivo",
                          "",
                          "",
                          "",
                          "dispositivo_locacion.id_locacion=".$idLocation);
            $this->LocationsList = $this->getResult();
            $this->disconnect();
            return $this->LocationsList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

/*    function getLocationService($id){
        try{
            $this->connect();
            $this->select("servicios_locacion","*","","","","","id_locacion=".$id);
            $this->LocationsList = $this->getResult();
            $this->disconnect();
            return $this->LocationsList;
        } catch (Exception $e) {
            $MessageExeption = chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' .  $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }*/
    
//    function DeleteDevice($id) {
//        try {
//            $this->connect();
//            $this->delete("dispositivo_locacion","id_dispositivo=".$id);
//            $this->LocationsList = $this->getResult();
//            //echo $this->getSql();
//            $this->disconnect();
//            return $this->LocationsList;
//        } catch (Exception $e){
//            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
//            error_log($MessageExeption, 3, $this->DirectoryLog);
//        }
//    }

    function getDevicesLimboList() {
        try {
            $this->connect();
            $this->select("dispositivo_locacion","*",
                          "dispositivos ON dispositivo_locacion.id_dispositivo = dispositivos.id_dispositivo",
                          "",
                          "",
                          "",
                          "id_locacion = 1");
            $this->LocationsList = $this->getResult();
            $this->disconnect();
            return $this->LocationsList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    /*************** Setters ***************/
    function setLocation($Location) {
        try {
            $this->connect();
            $this->insert("cat_locacion",$Location);
            $this->Location = $this->getResult();
            //$this->getSQL();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        $this->Location = $Location;
    }

/**/
    function setServiceLocation($IdLocation) {
        try {
            $this->connect();
            $this->insert("servicios_locacion",$IdLocation);
            $this->Location = $this->getResult();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function EditLocation($Location, $IdLocation) {
        try {
            $this->connect();
            $this->update("locaciones",$Location,"id_locacion=".$IdLocation);
            $this->Location = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        $this->Location = $Location;
    }
    
/*    function EditLocationServices($id, $service){
        try {
            $this->connect();
            $this->update("servicios_locacion",$service,"id_locacion=".$id);
            $this-> Location = $this->getResult();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }*/

    function getLocationDispList($IdPackage) {
        try {
            $this->connect();
            $this->select("dispositivo_locacion","*",
                    "cat_dispositivo ON dispositivo_locacion.id_dispositivo  = cat_dispositivo.id_dispositivo",
                    "cat_estatus_energia ON cat_dispositivo.id_estatus_energia = cat_estatus_energia.id_estatus_energia",
                    "","","cat_dispositivo.id_dispositivo =".$IdPackage);
            //echo $this->getSql();
            $this->DevicesList = $this->getResult();
            $this->disconnect();
            return $this->DevicesList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

     function ChangeStatusDispDev($Disp, $id){
         try {
            $this->connect();
            $this->update("cat_dispositivo",$Disp,"id_dispositivo =".$id);
            //echo $this->getSql();
            $this->DevicesList = $this->getResult();
            $this->disconnect();
            return $this->DevicesList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
     }

     function getLocationPackage() {
        try{
            $this->connect();
            $this->select("cat_miembro","cat_miembro.id_paquete, cat_locacion.id_locacion","cat_locacion ON cat_miembro.codigo_miembro = cat_locacion.codigo_miembro",
                    "","","","cat_locacion.codigo_locacion='DEFAULT';");
            $this->Member = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Member;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    function getLastLocationId() {
        try {
            $this->connect();
            $this->selectMax("cat_locacion","id_locacion");
            $this->Location = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
}
