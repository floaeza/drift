<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla Logs
 * PARAMETROS RECIBIDOS: Hace la consulta ala base de datos 
 * CREADO POR: Guillermo Arce
 * FECHA: Junio 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Users extends Database{
    private $UserStates;
    private $User;
    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    /*************** Getters ***************/
    function getLogsList() {
        try {
            $this->connect();
            $this->select("cat_usuario","*","log ON cat_usuario.id_usuario = log.id_usuario","cat_estatus_usuario ON cat_usuario.id_estatus_usuario = cat_estatus_usuario.id_estatus_usuario","cat_perfil ON cat_usuario.id_perfil = cat_perfil.id_perfil");
            $this->LogsList = $this->getResult();
            $this->disconnect();
            return $this->LogsList;
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
}
