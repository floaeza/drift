<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_miembro
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class MembersDAO extends Database{    
    private $MembersList;
    private $Member;
    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    function getMembersList() {
        try {
            $this->connect();
            $this->select("locaciones");
            $this->MembersList = $this->getResult();
            $this->disconnect();
            return $this->MembersList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getMemberDetail($memberCode) {
        try {
            $this->connect();
            $this->select("cat_miembro", "*", "", "", "", "", "codigo_miembro=".$memberCode);
            $this->MembersList = $this->getResult();
            $this->disconnect();
            return $this->MembersList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setMember($Locaciones, $Miembros) {
        try{
            $this->connect();
            $this->insert("miembros",$Miembros);
            $res = $this->getResult();
            $this->insert("locaciones",$Locaciones);
            $this->Member = $this->getResult();
            $this->disconnect();
            return $this->Member;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getLastMemberId() {
        try {
            $this->connect();
            $this->selectMaxCode("cat_miembro","codigo_miembro");
            $this->Member = $this->getResult();
            $this->disconnect();
            return $this->Member;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getMemberPackage($CMiembro) {
        try{
            $this->connect();
            $this->select("cat_miembro","id_paquete","","","","","codigo_miembro='".$CMiembro."'");
            $this->Member = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Member;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function EditMember($Miembro,$IdMiembro) {
        try{
            $this->connect();
            $this->update("cat_miembro",$Miembro,"id_miembro=".$IdMiembro);
            $this->Member = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Member;
        } catch (Exception $e) {
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    
}
