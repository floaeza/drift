<?php
/* ************************************************************************************
 * OBJETIVO: Crear un enlace entre la vista Devices.tpl y sus modelos correspondientes
 * PARAMETROS RECIBIDOS: UserId de usuario en sesion
 * CREADO POR: Mauricio Bailón
 * FECHA: Abril 2017
 * ************************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    //Carga de directorios principales
    $Directory = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    require $Directory.'/Core/DAO/MembersDAO.php';
    require $Directory.'/Core/DAO/DevicesDAO.php';
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
        
        // Carga lista de Members
        $DAOMembers = new MembersDAO($DirectoryLog);
        $MembersList = $DAOMembers->getMembersList();
        
        // Carga lista de Dispositivos
        $DAODevices = new DevicesDAO($DirectoryLog);
        $DevicesList = $DAODevices->getAvailableDevices();

        $Content = new Templates($Directory.'/Views/Templates/Devices.tpl');
        
        /* OPCIONES MIEMBROS */
        $MemberOptionList = "";
        foreach ($MembersList as $mem):
            $MemberOptionList .= "<option value='$mem[codigo_miembro]'>$mem[codigo_miembro]</option>";
        endforeach;
        $MemberOptionList .= "";
        $Content->set('MemberOptionList', $MemberOptionList);
        
        /* OPCIONES DISPOSITIVOS */
        $DevicesOptionList = "";
        foreach ($DevicesList as $dev):
            $DevicesOptionList .= "<option value='".$dev['id_dispositivo']."'>".$dev['mac_address']."</option>";
        endforeach;
        $DevicesOptionList .= "";
        $Content->set('DevicesOptionList', $DevicesOptionList);

    $ServerIp = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '-';

    if(empty($ServerIp)){
        $ServerIp = !empty($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '-';
    }

    /* TEXTO DE LAS ETIQUETAS */
    $Content->set('ServerIp', $ServerIp);
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelHeaderDevices', $Language['LabelHeaderDevices']);
        $Content->set('LabelSubHeaderDevices', $Language['LabelSubHeaderDevices']);
        $Content->set('LabelTabDevicesList', $Language['LabelTabDevicesList']);
        $Content->set('LabelTabSubDevicesList', $Language['LabelTabSubDevicesList']);
        $Content->set('LabelTabAssingDevices', $Language['LabelTabAssingDevices']);
        $Content->set('LabelSubTabAssingDevices', $Language['LabelSubTabAssingDevices']);
        $Content->set('LabelTabDetailDevices', $Language['LabelTabDetailDevices']);
        $Content->set('LabelSubTabDetailDevices', $Language['LabelSubTabDetailDevices']);
        $Content->set('LabelTabRestartDevices', $Language['LabelTabRestartDevices']);
        $Content->set('LabelSubTabRestartDevices', $Language['LabelSubTabRestartDevices']);
        $Content->set('LabelMemberCode', $Language['LabelMemberCode']);
        $Content->set('LabelMemberOptionList', $Language['LabelMemberOptionList']);
        $Content->set('LabelHeaderFormSelectDevice', $Language['LabelHeaderFormSelectDevice']);
        $Content->set('LabelHeaderFormAssingDevice', $Language['LabelHeaderFormAssingDevice']);
        $Content->set('LabelListSelectedDevices', $Language['LabelListSelectedDevices']);
        
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonNext', $Language['LabelButtonNext']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelButtonClose', $Language['LabelButtonClose']);
        $Content->set('SearchMember', $Language['SearchMember']);
        
        $Content->set('LabelMemberCodeModal', $Language['LabelMemberCodeModal']);
        $Content->set('LabelMemberModal', $Language['LabelMemberModal']);
        $Content->set('LabelMailModal', $Language['LabelMailModal']);
        $Content->set('LabelContentModal', $Language['LabelContentModal']);
        $Content->set('LabelIpModal', $Language['LabelIpModal']);
        $Content->set('LabelLocationModal', $Language['LabelLocationModal']);
        $Content->set('LabelStatusModal', $Language['LabelStatusModal']);
        
        $Content->set('OptionSelectDevices', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectDevices', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectDevices', $Language['MessageSelectDevices']); 
        $Content->set('MessageSelectDeviceAvailable', $Language['MessageSelectDeviceAvailable']);
        $Content->set('LabelWaitAMoment', $Language['LabelWaitAMoment']);
        
        echo $Content->output();


        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
