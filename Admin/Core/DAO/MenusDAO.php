<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_menu
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Menus extends Database{
    private $MenuList;
    private $MenuProfileList;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    function getMenuList() {
        try {
            $this->connect();
            $this->select("cat_menu");
            $this->MenuList = $this->getResult();
            $this->disconnect();
            return $this->MenuList;

        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setMenuList($MenuList) {
        $this->MenuList = $MenuList;
    }

    function getMenuProfileList($ProfileId) {
        try {
            $this->connect();
            $this->select("perfil_menu","*","cat_menu ON perfil_menu.id_menu = cat_menu.id_menu","","","","id_perfil = $ProfileId","","","cat_menu.id_menu ASC");
            $this->MenuProfileList = $this->getResult();
            $this->disconnect();
            return $this->MenuProfileList;

        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setMenuProfileList($MenuList) {
        $this->MenuProfileList = $MenuList;
    }
}
