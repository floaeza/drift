<?php
/* *****************************************************************************
 * OBJETIVO: Destruye la sesion
 * PARAMETROS RECIBIDOS: SESSION ARRAY
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
//Inicia la sesion
session_start();
// Destruir todas las variables de sesión.
$_SESSION = array();
// Validacion eliminacion de cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Destruye la sesion
session_destroy();
//Redirecciona a la pagina principa;
header("Location: ../../index.php");