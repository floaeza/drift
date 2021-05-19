<?php


require_once('../Models/Database.php');
class Dispositives extends Database
{  
    private $ListDispositives;
    private $restartDivices;




    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    function updateUser($User, $UserId) {
        try {
            $this->connect();
            $this->update("cat_dispositivo",$User, "id_dispositivo = $UserId");
            $this->User = $this->getResult();
            $this->disconnect();
            return $this->User;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    

    
//Ejemplo para mandar a llamar un dato de un campo y se muerte en la caja anteror getChannelList
    function getListDispositives() {
        try {
            $this->connect();
            $this->select("cat_dispositivo","*","cat_estatus_energia ON cat_dispositivo.id_estatus_energia = cat_estatus_energia.id_estatus_energia","","","","","","","");
            $this->ListDispositives = $this->getResult();
            
            $this->disconnect();
            return $this->ListDispositives;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        
    }
    

    
   
    //put your code here
}
