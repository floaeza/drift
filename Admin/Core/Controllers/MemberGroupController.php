<?php
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista MemberGroup.tpl y sus modelos
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Mauricio Bailón
 * FECHA: Abril 2017
 * ****************************************************************************/
/* *****************************************************************************
 * OBJETIVO: Modificaciones error_log
 * Linea 78 '' en id_menu
 * Se agregaron = ""; antes de cada foreach
 * ****************************************************************************/


session_start();
if(isset($_SESSION['UserId'])){
    //Carga de directorios principales
    $Directory        = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/DAO/LocationsDAO.php';
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    //Asignacion de variables de sesion
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

        // Carga lista de Members
        $DAOLocation = new Locations($DirectoryLog);
        $MembersList = $DAOLocation->getLocationsList();
        
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

        $Content = new Templates($Directory.'/Views/Templates/MemberGroup.tpl');
        $Content->set('AvatarsURL', $AvatarsURL);        

        /* OPCIONES MIEMBROS DE LOCACIONES */
        $MembersOptionList = "";
        foreach ($MembersList as $mem):
            $MembersOptionList .= "<option value='".$mem['id_locacion']."'>".$mem['codigo_miembro']."</option>";
        endforeach;
        $MembersOptionList .= "";
        $Content->set('MembersList', $MembersOptionList);
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelTitleGroup', $Language['LabelTitleGroup']);
        $Content->set('LabelSubTitleGroup', $Language['LabelSubTitleGroup']);
        $Content->set('LabelTabGroupList', $Language['LabelTabGroupList']);
        $Content->set('LabelSubTabGroupList', $Language['LabelSubTabGroupList']);
        $Content->set('LabelTabGroupNew', $Language['LabelTabGroupNew']);
        $Content->set('LabelSubTabGroupNew', $Language['LabelSubTabGroupNew']);
        $Content->set('LabelTabGroupEdit', $Language['LabelTabGroupEdit']);
        $Content->set('LabelSubTabGroupEdit', $Language['LabelSubTabGroupEdit']);
        $Content->set('LabelTabGroupDelete', $Language['LabelTabGroupDelete']);
        $Content->set('LabelSubTabGroupDelete', $Language['LabelSubTabGroupDelete']);
        $Content->set('LabelHeaderFormCreateGroup', $Language['LabelHeaderFormCreateGroup']);
        $Content->set('LabelNameGroup', $Language['LabelNameGroup']);
        $Content->set('LabelDescriptionGroup', $Language['LabelDescriptionGroup']);
        $Content->set('LabelValidityGroup', $Language['LabelValidityGroup']);
        $Content->set('LabelMembersGroup', $Language['LabelMembersGroup']);
        $Content->set('LabelValidateNameGroup', $Language['LabelValidateNameGroup']);
        $Content->set('LabelValidateDescriptionGroup', $Language['LabelValidateDescriptionGroup']);
        $Content->set('LabelValidateValidityGroup', $Language['LabelValidateValidityGroup']);
        $Content->set('LabelValidateMembersGroup', $Language['LabelValidateMembersGroup']);
        $Content->set('LabelHeaderFormEditGroup', $Language['LabelHeaderFormEditGroup']);
        
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        
        echo $Content->output();

        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
