<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_paquete
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Packages extends Database{    
    private $PackagesList;
    private $Packages;
    private $LastPackage;
    
    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    function setPackages($Package){
        try {
            $this->connect();
            $this->insert("cat_paquete",$Package);
            $this->Packages = $this->getResult();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function setPackagesRelation($Package){
        try {
            $this->connect();
            $this->insert("paquete_canal",$Package);
            $this->Packages = $this->getResult();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getChannelsDescription($Channels){
        try {
            $where="";
            $this->connect();
            for($i=0; $i < count($Channels); $i++){
                if($i < count($Channels)-1){
                    $where .= "cat_canal.id_canal=".$Channels[$i]['value']." OR ";
                }else{
                    $where .= "cat_canal.id_canal=".$Channels[$i]['value'];
                }
            }
            $this->select("cat_canal", "*", "cat_estacion ON cat_canal.id_estacion = cat_estacion.id_estacion",
                                            "","","",$where);
            $this->Packages = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getChannel($Channel, $Package){
        try {
            $this->connect();
            $this->select("paquete_canal","numero_canal","","","","","id_canal=".$Channel." AND id_paquete=".$Package);
            $this->Packages = $this->getResult();
//            echo $this->getSql();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getChannelsDescriptionEdit($Channels, $Package){
        try {
            $this->connect();
            $where .= "id_paquete=".$Package[0]['value']." AND (";
            
            for($i=0; $i < count($Channels); $i++){
                if($i < count($Channels)-1){
                    $where .= "cat_canal.id_canal=".$Channels[$i]['value']." OR ";
                }else{
                    $where .= "cat_canal.id_canal=".$Channels[$i]['value'];
                }   
            }
            $where .=" )";
            $this->select("paquete_canal", "*", "cat_canal ON paquete_canal.id_canal = cat_canal.id_canal",
                                            "cat_estacion ON cat_canal.id_estacion = cat_estacion.id_estacion","","",$where,"","","numero_canal ASC");
            $this->Packages = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getChannelsDescriptionAll(){
        try {
            $this->connect();
            $this->select("paquete_canal", "*", "cat_canal ON paquete_canal.id_canal = cat_canal.id_canal",
                                                "cat_estacion ON cat_canal.id_estacion = cat_estacion.id_estacion","","","","","","id_paquete ASC");
            $this->Packages = $this->getResult();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getPackagesList() {
        try {
            $this->connect();
            $this->select("cat_paquete");
            $this->PackagesList = $this->getResult();
            $this->disconnect();
            return $this->PackagesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function getPackagesChannelList($IdPackage) {
        try {
            $this->connect();
            $this->select("cat_paquete","*","paquete_canal ON cat_paquete.id_paquete = paquete_canal.id_paquete",
                                            "canales ON paquete_canal.id_canal = canales.id_canal",
                                            "estaciones ON canales.id_estacion = estaciones.id_estacion","",
                                            "cat_paquete.id_paquete = ".$IdPackage,"","","numero_canal");
            $this->PackagesList = $this->getResult();
            //echo $this->PackagesList;
            $this->disconnect();
            return $this->PackagesList;
            
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function getLastPackageId() {
        try {
            $this->connect();
            $this->selectMax("cat_paquete","id_paquete");
            $this->LastPackage = $this->getResult();
            $this->disconnect();
            return $this->LastPackage;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deletePackage($DeletePackagesId){
        try {
            $this->connect();
            $this->delete("cat_paquete", "id_paquete = $DeletePackagesId");
            $this->Packages = $this->getResult();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function UpdatePackages($DataPackage, $PackageId){
        try {
            $this->connect();
            $this->update("cat_paquete",$DataPackage ,"id_paquete = $PackageId");
            $this->Packages = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function deletePackageRelation($DeletePackagesId){
        try {
            $this->connect();
            $this->delete("paquete_canal", "id_paquete = $DeletePackagesId");
            $this->Packages = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
    
    function checkPackageMemberRelation($PackageId){
        try {
            $this->connect();
            $this->select("cat_miembro","id_miembro","","","","", "id_paquete = $PackageId");
            $this->Packages = $this->getResult();
            //echo $this->getSql();
            $this->disconnect();
            return $this->Packages;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }
}
