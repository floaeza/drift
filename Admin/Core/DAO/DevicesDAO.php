<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DevicesDAO
 *
 * @author tmaldonado
 */
require_once('../Models/Database.php');
class DevicesDAO extends Database {

    private $Devices;
    private $Location;
    private $LastDeviceId;
    private $PackageId;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    function getAvailableDevices(){
        try {
            $this->connect();
            $this->select("cat_dispositivo","*","dispositivo_locacion ON cat_dispositivo.id_dispositivo = dispositivo_locacion.id_dispositivo",
                                                "cat_locacion ON dispositivo_locacion.id_locacion = cat_locacion.id_locacion",
                                                "cat_estatus_disponibilidad ON cat_dispositivo.id_estatus_disponibilidad = cat_estatus_disponibilidad.id_estatus_disponibilidad",
                                                "cat_paquete ON cat_dispositivo.id_paquete = cat_paquete.id_paquete");
            $this->Devices = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getParentalControlDevice($id){
        try {
            $this->connect();
            $this->select("control_parental","*","","","","","id_dispositivo=".$id);
            $this->Devices = $this->getResult();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setDevices($Device) {
        try {
            $this->connect();
            $this->insert("cat_dispositivo",$Device);
            $this->Devices = $this->getResult();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setDevicesParentalControl($IdDevice) {
        try {
            $this->connect();
            $this->insert("control_parental",$IdDevice);
            $this->Devices = $this->getResult();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setDevicesLocation($LocationDevice) {
        try {
            $this->connect();
            $this->insert("dispositivo_locacion",$LocationDevice);
            $this->Devices = $this->getResult();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getDeviceID($IP){
        try{
            $this->connect();
            $this->select("cat_dispositivo","id_dispositivo","","","","","ip='".$IP."';");
            $this->Location = $this->getResult();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getLocationId($idMember){
        try{
            $this->connect();
            $this->select("cat_locacion","id_locacion","","","","","codigo_miembro='".$idMember."';");
            $this->Location = $this->getResult();
            $this->disconnect();
            return $this->Location;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getLastDeviceId() {
        try {
            $this->connect();
            $this->selectMax("cat_dispositivo","id_dispositivo");
            $this->LastDeviceId = $this->getResult();
            $this->disconnect();
            return $this->LastDeviceId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getPackageId($IdMember) {
        try {
            $this->connect();
            $this->select("cat_paquete","cat_miembro.id_paquete, cat_paquete.nombre_paquete",
                          "cat_miembro ON cat_paquete.id_paquete = cat_miembro.id_paquete","","","","codigo_miembro='".$IdMember."'");
            $this->PackageId = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getDetailsDevice($IP){
        try {
            $this->connect();
            $this->select("cat_dispositivo","*","dispositivo_locacion ON cat_dispositivo.id_dispositivo = dispositivo_locacion.id_dispositivo",
                                                "cat_locacion ON dispositivo_locacion.id_locacion = cat_locacion.id_locacion",
                                                "cat_miembro ON cat_locacion.codigo_miembro = cat_miembro.codigo_miembro","",
                                                "cat_dispositivo.ip='".$IP."';");
            $this->PackageId = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getPackageIdLocation($IdLocation) {
        try {
            $this->connect();
            $this->select("cat_miembro","cat_miembro.id_paquete",
                          "cat_locacion ON cat_miembro.codigo_miembro = cat_locacion.codigo_miembro","","","",
                          "cat_locacion.id_locacion=".$IdLocation);
            $this->PackageId = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function deleteDevicePC($ID) {
        try {
            $this->connect();
            $this->delete("control_parental","id_dispositivo=".$ID);
            $this->PackageId = $this->getResult();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function deleteDeviceDL($ID) {
        try {
            $this->connect();
            $this->delete("dispositivo_locacion","id_dispositivo=".$ID);
            $this->PackageId = $this->getResult();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function deleteDevice($ID) {
        try {
            $this->connect();
            $this->delete("cat_dispositivo","id_dispositivo=".$ID);
            $this->PackageId = $this->getResult();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function updateDeviceLocation($Location,$Device) {
        try {
            $this->connect();
            $this->update("dispositivo_locacion",$Location,"id_dispositivo= ".$Device);
            $this->PackageId = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->PackageId;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function updateDevices($Device,$Status) {
        try {
            $this->connect();
            $this->update("dispositivos",$Status,"id_dispositivo='".$Device."';");
            $this->Devices = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function updateParentalControlDevice($id, $pc){
        try {
            $this->connect();
            $this->update("control_parental",$pc,"id_dispositivo=".$id);
            $this->Devices = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Devices;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

}
