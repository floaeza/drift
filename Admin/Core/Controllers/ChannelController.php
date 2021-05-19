<?php 
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Channel.tpl y sus modelos 
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Mauricio Bailón
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
    require $Directory.'/Core/DAO/ChannelDAO.php';
    
    
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
        
        $Content = new Templates($Directory.'/Views/Templates/Channel.tpl');
        $Content->set('ChannelsLogosURL', $ChannelsLogosURL);
        
        /* OPCIONES DE PERFILES NUEVO USUARIO */
        $LocationTypeOptionStation = "";
        foreach ($StationList as $Profile): 
            $LocationTypeOptionStation.= "<option value='$Profile[id_estacion]'>$Profile[numero_estacion] - $Profile[indicativo] </option>";
        endforeach;
          $LocationTypeOptionStation.= ""; 
        $Content->set('LocationTypeOptionStation', $LocationTypeOptionStation);
        
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelCaptionDatatable', $Language['LabelCaptionDatatable']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelTitleSubmenu', $Language['LabelTitleSubmenu']);
        $Content->set('LabelTitleSubmenuChannel', $Language['LabelTitleSubmenuChannel']);
        
        $Content->set('LabelTabUserList', $Language['LabelTabUserList']);
        $Content->set('LabelTabCreateUser', $Language['LabelTabCreateUser']);
        $Content->set('LabelTabEditUser', $Language['LabelTabEditUser']);
        $Content->set('LabelHeaderFormSubChannel', $Language['LabelHeaderFormSubChannel']);
        $Content->set('LabelTabDeleteChannel', $Language['LabelTabDeleteChannel']);
        
        $Content->set('LabelHeaderFormEditChannel', $Language['LabelHeaderFormEditChannel']);
        $Content->set('LabelTabDeleteUser', $Language['LabelTabDeleteUser']);
        $Content->set('LabelSubListUsers', $Language['LabelSubListUsers']);
        $Content->set('LabelSubListChannel', $Language['LabelSubListChannel']);
        $Content->set('LabelSubCreateChannel', $Language['LabelSubCreateChannel']);
        $Content->set('LabelSubEditChannel', $Language['LabelSubEditChannel']);
        //Etiquetas editar canales
        $Content->set('LabelSubDeleteChannel', $Language['LabelSubDeleteChannel']);
        $Content->set('MessageSelectStation', $Language['MessageSelectStation']);
        $Content->set('MessageSelectChannel', $Language['MessageSelectChannel']);
        
        $Content->set('LabelSubTitleSubmenuChannel', $Language['LabelSubTitleSubmenuChannel']);

        $Content->set('LabelSubCreateUser', $Language['LabelSubCreateUser']);
        $Content->set('LabelSubEditUser', $Language['LabelSubEditUser']);
        $Content->set('LabelSubDeleteUser', $Language['LabelSubDeleteUser']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelHeaderFormChannel', $Language['LabelHeaderFormChannel']);
        $Content->set('LabelHeaderFormEditUser', $Language['LabelHeaderFormEditUser']);
        $Content->set('LabelTitleMenu', $Language['LabelTitleMenu']);
        $Content->set('LabelChannelName', $Language['LabelChannelName']);
        $Content->set('LabelChannelPuert', $Language['LabelChannelPuert']);
        $Content->set('LabelChannelStation', $Language['LabelChannelStation']);
        //EDITAR CANALES
        $Content->set('LabelEditDirectionMulti', $Language['LabelEditDirectionMulti']);
        $Content->set('LabelEditPort', $Language['LabelEditPort']);
        $Content->set('LabelEditStation', $Language['LabelEditStation']);
        
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelHeaderFormListChannel', $Language['LabelHeaderFormListChannel']);
        $Content->set('LabelHeaderFormChannel', $Language['LabelHeaderFormChannel']);
        /* MENSAJES VALIDACION INPUTS */
        $Content->set('MessageInputMulticast', $Language['MessageInputMulticast']);
        $Content->set('MessageInputPort', $Language['MessageInputPort']);
        $Content->set('MessageInputStation', $Language['MessageInputStation']);
       
        /* MENSAJE VALIDACION INPUTS VACIOS */
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectUser', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectUser', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectChannel', $Language['MessageSelectChannel']); // Detalle
        /* MENSAJE USUARIO INHABILITADO */
        $Content->set('OptionDisableUser', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryDisableUser', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageDisableUser', $Language['MessageDisableUser']); // Detalle
        echo $Content->output();
        
        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();       
          
} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
      
   