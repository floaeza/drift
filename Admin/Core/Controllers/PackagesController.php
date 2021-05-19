<?php 
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Packages.tpl y sus modelos 
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Mauricio Bailón
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    //Carga de directorios principales
    $Directory        = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/DAO/ProfilesDAO.php';
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    require $Directory.'/Core/DAO/ChannelDAO.php';
    require $Directory.'/Core/DAO/PackagesDAO.php';
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
        
        // Carga lista de perfiles
        $DAOProfile = new Profiles($DirectoryLog);
        $ProfileList = $DAOProfile->getProfileList();
        
        // Carga lista de paquetes
        $DAOPackage = new Packages($DirectoryLog);
        $PackageList = $DAOPackage->getChannelsDescriptionAll();
        
        // Carga lista de canales
        $DAOChannel = new Channel($DirectoryLog);
        $ChannelList = $DAOChannel->getChannelList();

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
        
        $Content = new Templates($Directory.'/Views/Templates/Packages.tpl');
        /* OPCIONES DE CANALES NUEVO PAQUETE */
        $ChannelsOptionList = "";
        foreach ($ChannelList as $Channel):
            $ChannelsOptionList .= "<option value='$Channel[id_canal]'>$Channel[nombre_estacion]</option>";
        endforeach;
        $ChannelsOptionList .= "";   
        $Content->set('ChannelsOptionList', $ChannelsOptionList);
        
        $EditChannelsOptionList = "";
        foreach ($ChannelList as $ChannelE):
            $EditChannelsOptionList .= "<option value='$ChannelE[id_canal]'>$ChannelE[nombre_estacion]</option>";
        endforeach;
        $EditChannelsOptionList .= "";   
        $Content->set('EditChannelsOptionList', $EditChannelsOptionList);
        $array = json_encode($PackageList);
        $Content->set('Channels', $array);        
        
        /* TEXTO DE LAS ETIQUETAS */
        
        $Content->set('LabelTextChannelList', $Language['LabelTextChannelList']);
        $Content->set('LabelSubTitleSubmenuPackages', $Language['LabelSubTitleSubmenuPackages']);
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelCaptionDatatable', $Language['LabelCaptionDatatable']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelTitleSubmenu', $Language['LabelTitleSubmenu']);
        $Content->set('LabelTitleSubmenuChannel', $Language['LabelTitleSubmenuChannel']);
        
        $Content->set('LabelHeaderFormEditPackages', $Language['LabelHeaderFormEditPackages']);
        $Content->set('LabelHeaderFormEditPackages2', $Language['LabelHeaderFormEditPackages2']);
        
        $Content->set('LabelTabDeletePackages', $Language['LabelTabDeletePackages']);
        $Content->set('LabelTabChannelsPackages', $Language['LabelTabChannelsPackages']);
        
        $Content->set('LabelSubListPackages', $Language['LabelSubListPackages']);
        $Content->set('LabelSubEditPackages', $Language['LabelSubEditPackages']);
        $Content->set('LabelSubCreatePackages', $Language['LabelSubCreatePackages']);
        $Content->set('LabelSubDeletPackages', $Language['LabelSubDeletPackages']);
        $Content->set('LabelSubChannelsPackages', $Language['LabelSubChannelsPackages']);
        
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelHeaderFormPackages1', $Language['LabelHeaderFormPackages1']);
        $Content->set('LabelHeaderFormPackages2', $Language['LabelHeaderFormPackages2']);
        $Content->set('LabelHeaderFormPackagesStep2', $Language['LabelHeaderFormPackagesStep2']);
        $Content->set('LabelHeaderFormPackagesT', $Language['LabelHeaderFormPackagesT']);
        $Content->set('LabelPackagesName', $Language['LabelPackagesName']);
        $Content->set('LabelPackagesDescription', $Language['LabelPackagesDescription']);
        $Content->set('LabelPackagesChannels', $Language['LabelPackagesChannels']);
        $Content->set('LabelPackagesChannelsBeans', $Language['LabelPackagesChannelsBeans']);
        $Content->set('FindChannels', $Language['FindChannels']);
        
        $Content->set('LabelTitleMenu', $Language['LabelTitleMenu']);
        $Content->set('LabelButtonNext', $Language['LabelButtonNext']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCreateEPG', $Language['LabelButtonCreateEPG']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonAddChannels', $Language['LabelButtonAddChannels']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelHeaderFormListPackages', $Language['LabelHeaderFormListPackages']);
        /* MENSAJES VALIDACION INPUTS */
        $Content->set('MessageInputPackagesName', $Language['MessageInputPackagesName']);
        $Content->set('MessageInputPackagesDescription', $Language['MessageInputPackagesDescription']);
        $Content->set('MessageInputPackagesChannels', $Language['MessageInputPackagesChannels']);
        $Content->set('MessageInputPackagesChannelsBeans', $Language['MessageInputPackagesChannelsBeans']);
        /* MENSAJE VALIDACION INPUTS VACIOS */
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectPackages', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectPackages', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectPackages', $Language['MessageSelectPackage']); // Detalle
        $Content->set('MessageBeanPackages', $Language['MessageBeanPackage']); // Detalle
        echo $Content->output();
        //ENVIAR LISTA DE CANALES
        $Content->set('ChannelList', $ChannelList);
        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();       
          
} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
      
   