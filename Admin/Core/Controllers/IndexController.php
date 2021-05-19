<?php
/* *****************************************************************************
 * OBJETIVO: Valida los datos que el usuario ingreso para iniciar sesion
 * PARAMETROS RECIBIDOS: Email y  Pass
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
//Insertar '' dentro de corchetes antes estatus_usuario despues 'estatus_usuario'
// == por ===
session_start();
// Valida si existe una sesion para cargar el directorio del proyecto
if(empty($ResponseUser)){
                $ResponseUser = '';
                
            }

if (isset($_SESSION['DirectoryProyect'])){

    $Directory          = $_SESSION['DirectoryProyect'];
    $LanguageSelected   = $_POST["Language"];
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Login.php';
    require $Directory.'/Core/DAO/UsersDAO.php';
    require $Directory.'/General/Languages/'.$LanguageSelected;

    if (isset($_POST["Email"])){
        $UserEmail = $_POST["Email"];
        $UserPass  = $_POST["Pass"];
        $LoginClass = new Login($DirectoryLog);
        $Login = $LoginClass->getUserLogin($UserEmail, $UserPass);

        if (empty($Login)) {
            $ResponseUser = array('Session'         => false,
                                  'MessageOption'   => $Language['OptionMessageType'][1],
                                  'MessageSummary'  => $Language['SummaryMessageType'][1],
                                  'MessageDetail'   => $Language['MessageLoginIncorrect']);
        } else {
            // Obtiene lista de estatus de usuarios en el sistema
            $DAOUser = new Users($DirectoryLog);
            $UserStates = $DAOUser->getUserStates();
            foreach ($UserStates as $State):
                if($State['estatus_usuario'] === "habilitado" && $State['estatus_usuario'] === $Login[0]['estatus_usuario']){
                    $ResponseUser = array('Session'         => true,
                                          'MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageLoginEnable']);
                                          //'UserId'          => $Login[0][id_usuario],
                                          //'PerfilId'        => $Login[0][id_perfil]
                    $_SESSION['UserId']    = $Login[0]['id_usuario'];
                    $_SESSION['ProfileId'] = $Login[0]['id_perfil'];
                    $_SESSION['ProfileName'] = $Login[0]['nombre_perfil'];
                    $_SESSION['UserName']  = $Login[0]['nombre_usuario']." ".$Login[0]['apellido_paterno'];
                      if(empty($Login[0]['imagen_usuario'])){
                        $_SESSION['UserImage'] = $UserImage;
                      } else {
                        $_SESSION['UserImage'] = $Login[0]['imagen_usuario'];
                      }
                    $_SESSION['Language']  = $LanguageSelected;
                }
                elseif($State['estatus_usuario'] === "inhabilitado" && $State['estatus_usuario'] === $Login[0]['estatus_usuario']){
                   $ResponseUser = array('Session'         => false,
                                         'MessageOption'   => $Language['OptionMessageType'][2],
                                         'MessageSummary'  => $Language['SummaryMessageType'][2],
                                         'MessageDetail'   => $Language['MessageLoginDisable']);
                }
                elseif($State['estatus_usuario'] === "suspendido" && $State['estatus_usuario'] === $Login[0]['estatus_usuario']){
                    $ResponseUser = array('Session'        => false,
                                         'MessageOption'   => $Language['OptionMessageType'][2],
                                         'MessageSummary'  => $Language['SummaryMessageType'][2],
                                         'MessageDetail'   => $Language['MessageLoginSuspend']);
                }
            endforeach;
        }
            
        echo $Response = json_encode($ResponseUser);

    } else {
        // No recibio datos para procesar

    }
} else {
    // No existe una sesion, redirecciona a index
    header("Location: ../../index.php");
}

//tcpdump -i eno16780032 -lenx -s 1500 port bootps or port bootpc | dhcpdump
