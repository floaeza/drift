<?php
/* *****************************************************************************
 * OBJETIVO: Permite validar si un usuario puede iniciar sesion
 * PARAMETROS RECIBIDOS: Correo y contrasena del usuario
 * CREADO POR: Tania Maldonado
 * FECHA: Marzo 2017
 * ****************************************************************************/
date_default_timezone_set("America/Mazatlan");
require __DIR__.'/Database.php';
class Login extends Database {    
    
    private $UserLogin;
    
    public function __construct($DirectoryLog) {
        $this->DirectoryLog = $DirectoryLog;
    } 
    
    function getUserLogin($UserEmail, $UserPass) {
        try {
            
            $this->connect();
            $PassEncode = base64_encode($UserPass);
            $this->select("usuarios", "*",
                          "cat_perfil ON usuarios.id_perfil = cat_perfil.id_perfil",
                          "cat_estatus_usuario ON usuarios.id_estatus_usuario = cat_estatus_usuario.id_estatus_usuario","","",
                          "correo_usuario='$UserEmail' AND clave='$PassEncode'");
            $this->UserLogin = $this->getResult();
            $this->disconnect();
            return $this->UserLogin;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3,"/var/www/html/Dropbox/BBINCOTV/BACK_TV/General/Log/Log.txt");
        }
    }

    function setUserLogin($UserLogin) {
        $this->UserLogin = $UserLogin;
    }

}
