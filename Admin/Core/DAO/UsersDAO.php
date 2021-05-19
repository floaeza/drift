<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla usuarioss
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Users extends Database{

    private $UserStates;
    private $UserList;
    private $User;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    /*************** Getters ***************/
    function getUserList() {
        try {
            $this->connect();
            $this->select("usuarios","*","cat_perfil ON usuarios.id_perfil = cat_perfil.id_perfil",
                                            "cat_estatus_usuario ON usuarios.id_estatus_usuario = cat_estatus_usuario.id_estatus_usuario");
            $this->UserList = $this->getResult();
            $this->disconnect();
            return $this->UserList;
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

    function setUser($User) {
        try {
            $this->connect();
            $this->insert("usuarios",$User);
            $this->User = $this->getResult();
            //$this->getSql();
            $this->disconnect();
            return $this->User;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine() ;
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setUserStates($States) {
        $this->UserStates = $States;
    }

    function updateUser($User, $UserId) {
        try {
            $this->connect();
            $this->update("usuarios",$User, "id_usuario = $UserId");
            $this->User = $this->getResult();
            $this->disconnect();
            return $this->User;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function deleteUser($UserStatusId, $UserId) {
        try {
            $this->connect();
            $this->update("usuarios",$UserStatusId, "id_usuario = $UserId");
            $this->User = $this->getResult();
            $this->disconnect();
            return $this->User;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    

}
