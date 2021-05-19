<?php
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Propierty.tpl y sus modelos
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    $Directory        = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';

    $UserId     = $_SESSION['UserId'];
    $UserName   = $_SESSION['UserName'];
    $ProfileId  = $_SESSION['ProfileId'];
    $UserImage  = $_SESSION['UserImage'];
    $ProfileName = $_SESSION['ProfileName'];


        // Obtiene lista de menus relaciones con el perfil que encuentre en la variable de sesion
        $DAOMenus = new Menus($DirectoryLog);
        $MenusProfileList = $DAOMenus->getMenuProfileList($ProfileId);
        // Obtiene datos de la lista de menus y submenus asignados al perfil en sesion
        $DAOSubmenus = new Submenus($DirectoryLog);

        // Carga librerias y complementos generales
        $Header = new Templates($Directory.'/Views/Layouts/Header.tpl');
        $Header->set('ProyectURL', $ProyectURL);
        $Header->set('IconTitle', $MediaURL.$IconTitle);;
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
            $List .= "<div class='item'><a class='title'><i class='dropdown icon'></i> <i class='$Menu[icono]' icon'></i> $Menu[nombre_menu]</a>";
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

        $Content = new Templates($Directory.'/Views/Templates/Propierty.tpl');

        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelCaptionDatatable', $Language['LabelCaptionDatatable']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelTitleSubmenu3', $Language['LabelTitleSubmenu3']);
        $Content->set('LabelTabMemberList', $Language['LabelTabMemberList']);
        $Content->set('LabelTabCreateMember', $Language['LabelTabCreateMember']);
        $Content->set('LabelTabEditMember', $Language['LabelTabEditMember']);
        $Content->set('LabelTabDeleteMember', $Language['LabelTabDeleteMember']);
        $Content->set('LabelSubListMember', $Language['LabelSubListMember']);
        $Content->set('LabelSubCreateMember', $Language['LabelSubCreateMember']);
        $Content->set('LabelSubEditMember', $Language['LabelSubEditMember']);
        $Content->set('LabelSubDeleteMember', $Language['LabelSubDeleteMember']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelHeaderFormMember', $Language['LabelHeaderFormMember']);
        $Content->set('LabelHeaderFormEditMember', $Language['LabelHeaderFormEditMember']);
        $Content->set('LabelTitleMenu', $Language['LabelTitleMenu']);
        $Content->set('LabelMemberTitle', $Language['LabelMemberTitle']);
        $Content->set('LabelMemberName', $Language['LabelMemberName']);
        $Content->set('LabelMemberLastNameF', $Language['LabelMemberLastNameF']);
        $Content->set('LabelMemberLastNameM', $Language['LabelMemberLastNameM']);
        $Content->set('LabelMemberEmail', $Language['LabelMemberEmail']);
        $Content->set('LabelMemberPass', $Language['LabelMemberPass']);
        $Content->set('LabelMemberCode', $Language['LabelMemberCode']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        /* MENSAJES VALIDACION INPUTS */
        $Content->set('MessageInputMemberTitle', $Language['MessageInputMemberTitle']);
        $Content->set('MessageInputMemberName', $Language['MessageInputMemberName']);
        $Content->set('MessageInputMemberLastNameF', $Language['MessageInputMemberLastNameF']);
        $Content->set('MessageInputMemberLastNameM', $Language['MessageInputMemberLastNameM']);
        $Content->set('MessageInputMemberEmail', $Language['MessageInputMemberEmail']);
        $Content->set('MessageInputMemberCode', $Language['MessageInputMemberCode']);
        /* MENSAJE VALIDACION INPUTS VACIOS */
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectMember', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectMember', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectMember', $Language['MessageSelectMember']); // Detalle
        echo $Content->output();

        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
