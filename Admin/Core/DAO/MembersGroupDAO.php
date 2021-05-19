<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_miembro
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class MembersGroupDAO extends Database{    
    private $GroupList;
    private $Group;
    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    function getGroupList() {
        try {
            $this->connect();
            $this->select("cat_grupo");
            $this->GroupList = $this->getResult();
            $this->disconnect();
            return $this->GroupList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getMembersGroupList($IdGrupo) {
        try {
            $this->connect();
            $this->select("grupo_locacion","*","cat_locacion ON grupo_locacion.id_locacion = cat_locacion.id_locacion",
                                               "cat_miembro ON cat_locacion.codigo_miembro = cat_miembro.codigo_miembro",
                                               "cat_grupo ON grupo_locacion.id_grupo = cat_grupo.id_grupo","","grupo_locacion.id_grupo=".$IdGrupo);
            $this->GroupList = $this->getResult();
            $this->disconnect();
            return $this->GroupList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getLastGroup() {
        try {
            $this->connect();
            $this->selectMax('cat_grupo', 'id_grupo');
            $this->Group = $this->getResult();
            $this->disconnect();
            return $this->Group;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    
    function setGroup($Grupo){
        try {
            $this->connect();
            $this->insert("cat_grupo", $Grupo);
            $this->Group = $this->getResult();
            $this->disconnect();
            return $this->Group;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setGroupLocation($Relation){
        try {
            $this->connect();
            $this->insert("grupo_locacion", $Relation);
            $this->Group = $this->getResult();
            $this->disconnect();
            return $this->Group;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function updateGroup($Grupo, $IdGrupo){
        try {
            $this->connect();
            $this->update("cat_grupo", $Grupo, "id_grupo=".$IdGrupo);
            //echo $this->getSql();
            $this->Group = $this->getResult();
            $this->disconnect();
            return $this->Group;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteGroup($IdGrupo){
        try {
            $this->connect();
            $this->delete("cat_grupo", "id_grupo=".$IdGrupo);
            $this->Group = $this->getResult();
            $this->disconnect();
            return $this->Group;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteRelations($IdGrupo){
        try {
            $this->connect();
            $this->delete("grupo_locacion", "id_grupo=".$IdGrupo);
            $this->Group = $this->getResult();
            $this->disconnect();
            return $this->Group;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
}
