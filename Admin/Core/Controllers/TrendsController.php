<?php

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
        

        
        // Obtiene el contenido del controlador controlador atraves de la URL
        $Content = new Templates($Directory.'/Views/Templates/Trends.tpl');
        $Content->set('ProyectURL', $ProyectURL);


    $ServerIp = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';

    if(empty($ServerIp)){
        $ServerIp = !empty($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
    }

        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('ServerIp', $ServerIp);

        $Content->set('TitleMemberList', $Language['TitleMemberList']);
        $Content->set('TitleCodeList', $Language['TitleCodeList']);
        $Content->set('TitleLastActivity', $Language['TitleLastActivity']);
        $Content->set('TitleModuleList', $Language['TitleModuleList']);
        $Content->set('LabelTitleTopMembersInactive', $Language['LabelTitleTopMembersInactive']);
        $Content->set('LabelsubtitleStadisticsMemberInactive', $Language['LabelsubtitleStadisticsMemberInactive']);
        $Content->set('LabelTitleTopMembersActive', $Language['LabelTitleTopMembersActive']);
        $Content->set('LabelSubTitleStadisticsMemberActive', $Language['LabelSubTitleStadisticsMemberActive']);
        $Content->set('LabelTitleTopTenChannels', $Language['LabelTitleTopTenChannels']);
        $Content->set('LabelSubtitleTopTenChannels', $Language['LabelSubtitleTopTenChannels']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        echo $Content->output();
        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();
} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}

//NO BORRAR COMENTARIO
/*
 * AGREGAR CAMPO ICONO EN CAT MENU Y CAT SUBMENU EN SQL Y EER
 */
   