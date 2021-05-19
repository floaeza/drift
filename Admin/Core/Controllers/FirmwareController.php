<?php
/* *****************************************************************************
 * OBJETIVO: Actualiza los dispositivos a BBINCOTV o MINERVA
 * PARAMETROS RECIBIDOS: IP
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    //Carga de directorios principales
    $Directory        = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    require $Directory.'/Core/DAO/PropiertyDAO.php';
    //Asignacion de variables de sesion
    $UserId         = $_SESSION['UserId'];
    $UserName       = $_SESSION['UserName'];
    $ProfileId      = $_SESSION['ProfileId'];
    $UserImage      = $_SESSION['UserImage'];
    $ProfileName    = $_SESSION['ProfileName'];


        // Obtiene lista de menus relaciones con el perfil que encuentre en la variable de sesion
        $DAOMenus = new Menus($DirectoryLog);
        $MenusProfileList = $DAOMenus->getMenuProfileList($ProfileId);
        // Obtiene datos de la lista de menus y submenus asignados al perfil en sesion
        $DAOSubmenus = new Submenus($DirectoryLog);
        // Integramos los submenus con su respectivo menu

        // Obtiene lista de menus relaciones con el perfil que encuentre en la variable de sesion
        $DAOMemberId = new Propierty($DirectoryLog);
        $MemberIdList = $DAOMemberId->getPropiertyList();

        // Carga librerias y complementos generales
        $Header = new Templates($Directory.'/Views/Layouts/Header.tpl');
        $Header->set('ProyectURL', $ProyectURL);
        $Header->set('IconTitle', $MediaURL.$IconTitle);
        echo $Header->output();

        // Carga cabecera tipo barra a lo ancho de toda la pagina
        $SubHeader = new Templates($Directory.'/Views/Layouts/SubHeader.tpl');
        $SubHeader->set('UserName', $UserName);
        $SubHeader->set('ProfileName', $ProfileName);
        $SubHeader->set('SubHeaderImage', $MediaURL.$PrimaryBackground);
        $SubHeader->set('ProyectImage', $MediaURL.$ProyectImage);
        $SubHeader->set('UserImage', $MediaURL.$Avatars.$UserImage);
        echo $SubHeader->output();

        // Carga menu lateral
        $Lateral = new Templates($Directory.'/Views/Layouts/Lateral.tpl');
        $List = "";
        foreach ($MenusProfileList as $Key =>$Menu):
            if($Menu[nombre_menu] == 'Multimedia'){
                $List .= "<div class='item'><a class='title' onclick='SetSelectedMediaProyect();' id='Mmedia'><i class='dropdown icon'></i> <i class='$Menu[icono]' icon'></i> $Menu[nombre_menu]</a>";
            }else{
                $List .= "<div class='item'><a class='title'><i class='dropdown icon'></i> <i class='$Menu[icono]' icon'></i> $Menu[nombre_menu]</a>";
            }
            $List .= "<div id='M$Key' class='content'>";
            $SubmenuList = $DAOSubmenus->getSubmenuListByMenu($Menu['id_menu']);
            foreach ($SubmenuList as $KeyB=>$Submenu):
                $List .= "<a id='$Key"."S"."$KeyB' class='item transition hidden' href='$Proyect$Submenu[url_submenu]' onclick='UpdateActiveElements($Key, $KeyB);'><i class='$Submenu[icono]'></i> $Submenu[nombre_submenu]</a>";
            endforeach;
            $List .= "</div></div>";
        endforeach;
        $List .= "";
        $Lateral->set('MenuList', $List);
        echo $Lateral->output();

        $Content = new Templates($Directory.'/Views/Templates/Firmware.tpl');

        /* OPCIONES MIEMBROS */
        $MembersOptionList = "";
        foreach ($MemberIdList as $mem):
            $MembersOptionList .= "<option value='$mem[codigo_miembro]'>$mem[codigo_miembro]</option>";
        endforeach;
        $MembersOptionList .= "";
        $Content->set('MembersOptionList', $MembersOptionList);

        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelSubTitleSubmenuFirmware', $Language['LabelSubTitleSubmenuFirmware']);
        $Content->set('LabelHeaderFirmware', $Language['LabelHeaderFirmware']);
        $Content->set('LabelStepOne', $Language['LabelStepOne']);
        $Content->set('LabelInstructionsOne', $Language['LabelInstructionsOne']);
        $Content->set('LabelIpDirection', $Language['LabelIpDirection']);
        $Content->set('LabelMiddlewareOption', $Language['LabelMiddlewareOption']);

        $Content->set('LabelButtonAdd', $Language['LabelButtonAdd']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelStepTwo', $Language['LabelStepTwo']);
        $Content->set('LabelInstructionsTwo', $Language['LabelInstructionsTwo']);
        $Content->set('LabelButtonUpgrade', $Language['LabelButtonUpgrade']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelButtonNext', $Language['LabelButtonNext']);
        $Content->set('LabelFirmwareMember', $Language['LabelFirmwareMember']);
        $Content->set('MessageInputIpDeviceValid', $Language['MessageInputIpDeviceValid']);
        $Content->set('MessageInputIDMember', $Language['MessageInputIDMember']);
        $Content->set('MessageProgramingMember', $Language['MessageProgramingMember']);
        
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        
        /* MENSAJE VALIDACION INPUTS VACIOS */
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        
         $Content->set('MessageListDeviceValidate', $Language['MessageListDeviceValidate']);
        
        $Content->set('OptionSelectIP', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectIP', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectIP', $Language['MessageSelectIP']);

        echo $Content->output();


        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
