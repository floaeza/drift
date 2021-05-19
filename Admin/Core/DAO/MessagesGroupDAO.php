<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla mensajes
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class MessagesGroup extends Database{

    private $MessagesGroupList;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    /*************** Getters ***************/
    function getMessagesGroupList() {
        try {
            $this->connect();
            $this->select("mensaje","*","cat_usuario ON mensaje.id_usuario = cat_usuario.id_usuario",
                                        "cat_estatus_lectura ON mensaje.id_estatus_lectura = cat_estatus_lectura.id_estatus_lectura",
                                        "mensaje_grupo ON mensaje.id_mensaje = mensaje_grupo.id_mensaje",
                                        "cat_grupo ON mensaje_grupo.id_grupo = cat_grupo.id_grupo");
            $this->MessagesGroupList = $this->getResult();
            $this->disconnect();
            return $this->MessagesGroupList;
        } catch (Exception $e){
            $MessagesGroupExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessagesGroup() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessagesGroupExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setMessageGroupRelation($values) {
        try {
            $this->connect();
            $this->insert('mensaje_grupo', $values);
            $this->MessagesGroupList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->MessagesGroupList;
        } catch (Exception $e){
            $MessagesGroupExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessagesGroup() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessagesGroupExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteMessageGroupRelation($idMensaje) {
        try {
            $this->connect();
            $this->delete('mensaje_grupo', 'id_mensaje='.$idMensaje);
            $this->LastPackage = $this->getResult();
            $this->disconnect();
            return $this->LastPackage;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
        
}
