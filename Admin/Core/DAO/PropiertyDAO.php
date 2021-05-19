<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_miembro
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Propierty extends Database{

    //private $UserStates;
    private $PropiertyList;
    private $Propierty;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    /*************** Getters ***************/
    function getPropiertyList() {
        try {
            $this->connect();
            $this->select("cat_miembro");
            $this->PropiertyList = $this->getResult();
            $this->disconnect();
            return $this->PropiertyList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getUser() {
        return $this->User;
    }

    function getUserStates() {
        try {
            $this->connect();
            $this->select("cat_estatus_usuario");
            $this->UserStates = $this->getResult();
            $this->disconnect();
            return $this->UserStates;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    /*************** Setters ***************/

    function setUserList($UserList) {
        $this->UserList = $UserList;
    }

    function setPropierty($Propierty) {
        try {
            $this->connect();
            $this->insert("cat_miembro",$Propierty);
            $this->Propierty = $this->getResult();
            $this->disconnect();
            return $this->Propierty;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setUserStates($States) {
        $this->UserStates = $States;
    }

    function updatePropierty($Propierty, $PropiertyId) {
        try {
            $this->connect();
            $this->update("cat_miembro",$Propierty, "id_miembro = $PropiertyId");
            $this->Propierty = $this->getResult();
            $this->disconnect();
            return $this->Propierty;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function deletePropierty($PropiertyId) {
        try {
            $this->connect();
            $this->delete("cat_miembro", "id_miembro = $PropiertyId");
            $this->User = $this->getResult();
            $this->disconnect();
            return $this->User;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

}
