<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_modulo
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class ModulesDAO extends Database{    
    private $ModulesList;
    
    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    function getModulesList() {
        try {
            $this->connect();
            $this->select("cat_modulo", "*", "", "", "", "", "nivel_modulo = 0 AND nombre_modulo != 'Chits'");
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getModulesListBack() {
        try {
            $this->connect();
            $this->select("cat_modulo", "*", "cat_template ON cat_modulo.id_template = cat_template.id_template", "", "", "", 
                          "nombre_modulo != 'TV' AND nombre_modulo != 'Chits' AND nombre_modulo != 'PVR' AND nombre_modulo != 'MOODS'", "", "", "cat_modulo.id_modulo");
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getModuleType($IdModule) {
        try {
            $this->connect();
            $this->select("cat_modulo","*","","","","","id_modulo=".$IdModule);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getTemplateType($IdTemplate) {
        try {
            $this->connect();
            $this->select("cat_template","nombre_template","","","","","id_template=".$IdTemplate);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getAllFromModule($idModule) {
        try {
            $this->connect();
            $this->select("modulo_contenido","*","","","","","id_modulo=".$idModule);
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getAllFromFatherModule($idModule) {
        try {
            $this->connect();
            $this->select("cat_modulo","*","","","","","padre_modulo=".$idModule);
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getModulesTemplatesList($Step) {
        try {
            $this->connect();
            if($Step === true){
                $this->select("cat_template","*","","","","","template_principal = 0");
            } 
            else if($Step === false){
                $this->select("cat_template","*","","","","","template_principal = 0 AND id_template != 12");
            }
            else {
                $this->select("cat_template","*","","","","","template_principal = 0");
            }
            
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getModulesTemplatesName($idTemplate) {
        try {
            $this->connect();
            $this->select("cat_template","nombre_template","","","","","id_template=".$idTemplate);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getModulesTemplatesVariableCount($idTemplate) {
        try {
            $this->connect();
            $this->select("template_variable","count(*)","cat_variable ON template_variable.id_variable = cat_variable.id_variable",
                                                         "","","","id_template=".$idTemplate);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getModulesTemplatesVariable($idTemplate) {
        try {
            $this->connect();
            $this->select("template_variable","*","cat_variable ON template_variable.id_variable = cat_variable.id_variable","","","","id_template=".$idTemplate);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getLastModuleId() {
        try {
            $this->connect();
            $this->selectMax("cat_modulo","id_modulo");
//            echo $this->getSql();
            $this->LastPackage = $this->getResult();
            $this->disconnect();
            return $this->LastPackage;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setModule($newModule) {
        try {
            $this->connect();
            $this->insert("cat_modulo", $newModule);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setModuleContent($newModule) {
        try {
            $this->connect();
            $this->insert("modulo_contenido", $newModule);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteModuleContent($idModule) {
        try {
            $this->connect();
            $this->delete('modulo_contenido', 'id_modulo='.$idModule);
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deleteModule($idModule) {
        try {
            $this->connect();
            $this->delete('cat_modulo', 'id_modulo='.$idModule);
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function updateModule($idModule, $values) {
        try {
            $this->connect();
            $this->update('cat_modulo', $values, 'id_modulo='.$idModule);
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function updateModuleValues($idVarTemplate, $values) {
        try {
            $this->connect();
            $this->update('modulo_contenido', $values, 'id_modulo_contenido='.$idVarTemplate);
            $this->ModulesList = $this->getResult();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function updateModuleChildValues($idMod, $idTempVar, $values) {
        try {
            $this->connect();
            $this->update('modulo_contenido', $values, 'id_modulo='.$idMod.' AND id_template_variable='.$idTempVar);
            $this->ModulesList = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->ModulesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
}
