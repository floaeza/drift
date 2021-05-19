<?php
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Logs.tpl y sus modelos
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR Francisco Guillermo Arce 
 * FECHA:  junio 2017
 * ****************************************************************************/
//se modifico ProfileOptionList = null
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
    require $Directory.'/Core/DAO/LogsDAO.php';
    //Asignacion de variables de sesion
    $UserId     = $_SESSION['UserId'];
    $UserName   = $_SESSION['UserName'];
    $ProfileId  = $_SESSION['ProfileId'];
    $UserImage  = $_SESSION['UserImage'];
    $ProfileName = $_SESSION['ProfileName'];
    $ProfileOptionList = NULL;

        // Obtiene lista de menus relaciones con el perfil que encuentre en la variable de sesion
        $DAOMenus = new Menus($DirectoryLog);
        $MenusProfileList = $DAOMenus->getMenuProfileList($ProfileId);
        // Obtiene datos de la lista de menus y submenus asignados al perfil en sesion
        $DAOSubmenus = new Submenus($DirectoryLog);

        // Carga lista de perfiles
        $DAOProfile = new Profiles($DirectoryLog);
        $ProfileList = $DAOProfile->getProfileList();
        
        // Carga lista de estados
        $DAOStatus = new Users($DirectoryLog);
        $StatusList = $DAOStatus->getUserStates();

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

        $Content = new Templates($Directory.'/Views/Templates/Logs.tpl');
        $Content->set('LoadingGif', $MediaURL.$LoaderGif);
        $Content->set('AvatarsURL', $AvatarsURL);
        /* OPCIONES DE PERFILES NUEVO USUARIO */
        foreach ($ProfileList as $Profile):
        $ProfileOptionList .= "<option value='$Profile[id_perfil]'>$Profile[nombre_perfil]</option>";
        endforeach;
        $ProfileOptionList .= "";
        $Content->set('ProfileOptionList', $ProfileOptionList);

        /* OPCIONES DE PERFILES NUEVO USUARIO */
        $ProfileEditOptionList = "";
        foreach ($ProfileList as $Profile):
            $ProfileEditOptionList .= "<option value='$Profile[id_perfil]'>$Profile[nombre_perfil]</option>";
        endforeach;
        $ProfileEditOptionList .= "";
        $Content->set('ProfileEditOptionList', $ProfileEditOptionList);
        
        /* OPCIONES DE ESTADOS USUARIO */
        $StatusEditOptionList = "";
        foreach ($StatusList as $Status):
            $StatusEditOptionList .= "<option value='$Status[id_estatus_usuario]'>$Status[estatus_usuario]</option>";
        endforeach;
        $StatusEditOptionList .= "";
        $Content->set('StatusEditOptionList', $StatusEditOptionList);

        
        //TEXTOS DE LOGS DEL SISTEMA
        $Content->set('LabelTitleSubmenuLogs', $Language['LabelTitleSubmenuLogs']);
        $Content->set('LabelSubTitleSubmenuLogs', $Language['LabelSubTitleSubmenuLogs']);
        
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelCaptionDatatable', $Language['LabelCaptionDatatable']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelButtonCleanFilter', $Language['LabelButtonCleanFilter']);
        
        
        
        $Content->set('LabelTabUserList', $Language['LabelTabUserList']);
  
       
        /* MENSAJE VALIDACION INPUTS VACIOS */
        
        //MENSAJES DE INPUTS AGREGAR USUARIO
        $Content->set('LabelModuleOptionListNameUser', $Language['LabelModuleOptionListNameUser']);
        $Content->set('LabelModuleOptionListLastNameUser', $Language['LabelModuleOptionListLastNameUser']);
        $Content->set('LabelModuleOptionListFirstNameUser', $Language['LabelModuleOptionListFirstNameUser']);
        
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectUser', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectUser', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectUser', $Language['MessageSelectUser']); // Detalle
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
