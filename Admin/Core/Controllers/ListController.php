<?php 
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Users.tpl y sus modelos 
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    $Directory        = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/DAO/ProfilesDAO.php';
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    require $Directory.'/Core/DAO/StationDAO.php';
    require $Directory.'/Core/DAO/DevicesListDAO.php';
    
    
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
        
         // Carga lista de estaciones
        $DAOListStation = new Station($DirectoryLog);
        $StationList = $DAOListStation->getStationList();


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
        
        $Content = new Templates($Directory.'/Views/Templates/DevicesList.tpl');
        $Content->set('ChannelsLogosURL', $ChannelsLogosURL);
        /*
         Opciones de modulos a mostrar
          
        $MembersOptionList = "";
        foreach ($MembersList as $mem):
        $MembersOptionList .= "<div class='item' name='$mem[id_miembro]'>$mem[codigo_miembro]</div>";
        endforeach;
        $MembersOptionList .= "";
        $Content->set('MembersOptionList', $MembersOptionList);
          
         */
        /* OPCIONES DE PERFILES NUEVO USUARIO */
        foreach ($StationList as $Profile):
            $LocationTypeOptionStation.= "<option value='$Profile[id_estacion]'>$Profile[numero_estacion] - $Profile[indicativo] </option>";
        endforeach;
        $LocationTypeOptionStation .= "";   
        $Content->set('LocationTypeOptionStation', $LocationTypeOptionStation);
        
        
       
   
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelHeaderFormDispositives', $Language['LabelHeaderFormDispositives']);
        $Content->set('LabelHeaderFormListDispositives', $Language['LabelHeaderFormListDispositives']);
        $Content->set('LabelSubListDispositives', $Language['LabelSubListDispositives']);
        $Content->set('LabelHeaderFormListDispositivesRestart', $Language['LabelHeaderFormListDispositivesRestart']);
        $Content->set('LabelSubListDispositivesRestart', $Language['LabelSubListDispositivesRestart']);
        $Content->set('LabelHeaderFormDispositivesR', $Language['LabelHeaderFormDispositivesR']);
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
       
       
        echo $Content->output();
        
        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();       
          
} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
      
   