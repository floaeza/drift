<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla mensajes
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Messages extends Database{

    private $MessageList;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    /*************** Getters ***************/
    function getMessagesList() {
        try {
            $this->connect();
            $this->select("mensaje_locacion","*","mensaje ON mensaje_locacion.id_mensaje = mensaje.id_mensaje",
                                                 "cat_usuario ON mensaje.id_usuario = cat_usuario.id_usuario",
                                                 "cat_estatus_lectura ON mensaje.id_estatus_lectura = cat_estatus_lectura.id_estatus_lectura",
                                                 "cat_tipo_mensaje ON mensaje.id_tipo_mensaje = cat_tipo_mensaje.id_tipo_mensaje");
            $this->MessageList = $this->getResult();
            $this->disconnect();
            return $this->MessageList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getMessagesType() {
        try {
            $this->connect();
            $this->select("cat_tipo_mensaje");
            $this->MessageList = $this->getResult();
            $this->disconnect();
            return $this->MessageList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setMessage($values) {
        try {
            $this->connect();
            $this->insert('mensaje', $values);
            $this->MessageList = $this->getResult();
            $this->disconnect();
            return $this->MessageList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setMessageLocationRelation($values) {
        try {
            $this->connect();
            $this->insert('mensaje_locacion', $values);
            $this->MessageList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->MessageList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getLastMessageId() {
        try {
            $this->connect();
            $this->selectMax("mensaje","id_mensaje");
            $this->LastPackage = $this->getResult();
            $this->disconnect();
            return $this->LastPackage;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteMessageRelation($idMensaje) {
        try {
            $this->connect();
            $this->delete('mensaje_locacion', 'id_mensaje='.$idMensaje);
            $this->LastPackage = $this->getResult();
            $this->disconnect();
            return $this->LastPackage;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteMessage($idMensaje) {
        try {
            $this->connect();
            $this->delete('mensaje', 'id_mensaje='.$idMensaje);
            $this->LastPackage = $this->getResult();
            $this->disconnect();
            return $this->LastPackage;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function updateMessage($values, $IdMensaje) {
        try {
            $this->connect();
            $this->update('mensaje', $values, 'id_mensaje='.$IdMensaje);
            $this->MessageList = $this->getResult();
            $this->disconnect();
            return $this->MessageList;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
}
