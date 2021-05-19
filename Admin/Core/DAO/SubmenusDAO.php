<?php
/* *****************************************************************************
 * OBJETIVO: Administracion tabla cat_submenu
 * PARAMETROS RECIBIDOS: DirectoryLog [Para guardar log en caso de error]
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
require_once('../Models/Database.php');
class Submenus extends Database{
    private $SubmenuList;

    public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }

    function getSubmenuListByMenu($MenuId) {
        try {
            $this->connect();
            $this->select("cat_submenu","*","","","","","id_menu = $MenuId");
            $this->SubmenuList = $this->getResult();
            $this->disconnect();
            return $this->SubmenuList;

        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }

    function setSubmenuListByMenu($MenuList) {
        $this->SubmenuList = $MenuList;
    }



}
