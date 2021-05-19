<?php
/* *****************************************************************************
 * OBJETIVO: Construye formulario para iniciar sesion en el sistema de
 * adminstracion de BBINCOTV
 * PARAMETROS RECIBIDOS: Correo electronico y contrasena
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    //Existe una sesion y redirecciona al controlador principal
    header("Location: ./Core/Controllers/PrincipalController.php");
} else {
    require 'Core/Models/Config.php';
    require 'Core/Models/Templates.php';
    require 'General/Languages/'.$PrimaryLanguage;
    $_SESSION['Lenguage'];

        // Carga librerias y complementos generales
        $Header = new Templates('Views/Layouts/Header.tpl');
            $Header->set('ProyectURL', $ProyectURL);
            $Header->set('IconTitle', $MediaURL.$IconTitle);
            echo $Header->output();
        // Carga el contenido de la pagina
        $Content = new Templates('Views/Templates/Index.tpl');
            $Content->set('UserImage', $MediaDirectory.$UserImage);
            $Content->set('SystemImage', $MediaDirectory.$SystemImage);
            $Content->set('PrimaryBackground', $MediaDirectory.$SecondaryBackground);
            $Content->set('ProyectURL', $ProyectURL);
            /* TEXTO DE LAS ETIQUETAS*/
            $Content->set('LabelInputEmail', $Language['LabelInputEmail']);
            $Content->set('LabelInputPass', $Language['LabelInputPass']);
            $Content->set('LabelButtonLogin', $Language['LabelButtonLogin']);
            /* MENSAJE VALIDACION GENERAL DE INPUTS*/
            $Content->set("OptionMessageType", $Language['OptionMessageType'][2]); // error
            $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
            $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
            $Content->set('MessageInputPass', $Language['MessageInputPass']);
            $Content->set('MessageInputEmail', $Language['MessageInputEmail']);
            echo $Content->output();

}


//// EJEMPLO PARA VALIDAR LOGIN
//require 'Core/Models/Login.php';
//        $UserEmail = "tmaldonado@bbinco.com";
//        $UserPass  = "snoqw";
//        $LoginClass = new Login($DirectoryLog);
//        $Login = $LoginClass->getUserLogin($UserEmail, $UserPass);
//        print_r($Login);
