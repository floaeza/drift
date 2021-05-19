<?php
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista MessagesGroup.tpl y sus modelos
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Mauricio Bailón
 * FECHA: Abril 2017
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
    require $Directory.'/Core/DAO/MembersGroupDAO.php';
    require $Directory.'/Core/DAO/MessagesDAO.php';
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
        $DAOGroups = new MembersGroupDAO($DirectoryLog);
        $GroupList = $DAOGroups->getGroupList();
        
        // Tipos de mensaje
        $DAOMessages = new Messages($DirectoryLog);
        $MessageTypeList = $DAOMessages->getMessagesType();

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

        $Content = new Templates($Directory.'/Views/Templates/MessageGroup.tpl');
        $Content->set('AvatarsURL', $AvatarsURL);
        //Opciones destinatario
        $GroupOptionList = "";
        foreach ($GroupList as $Group):
        $GroupOptionList .= "<option value='".$Group['id_grupo']."'>".$Group['nombre_grupo']."</option>";
        endforeach;
        $GroupOptionList .= "";
        $Content->set('GroupOptionList', $GroupOptionList);
        
        $MessageOptionList = "";
        foreach ($MessageTypeList as $Type):
        $MessageOptionList .= "<option value='".$Type['id_tipo_mensaje']."'>".$Type['descripcion_tipo']."</option>";
        endforeach;
        $MessageOptionList .= "";
        $Content->set('MessageOptionList', $MessageOptionList);
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('UserId', $UserId);
        $Content->set('LabelTitleSubmenuMessagesGroup', $Language['LabelTitleSubmenuMessagesGroup']);
        $Content->set('LabelSubTitleSubmenuMessagesGroup', $Language['LabelSubTitleSubmenuMessagesGroup']);
        $Content->set('LabelTabMessagesGroupList', $Language['LabelTabMessagesGroupList']);
        $Content->set('LabelTabCreateMessagesGroup', $Language['LabelTabCreateMessagesGroup']);
        $Content->set('LabelTabEditMessagesGroup', $Language['LabelTabEditMessagesGroup']);
        $Content->set('LabelTabDeleteMessagesGroup', $Language['LabelTabDeleteMessagesGroup']);
        $Content->set('LabelSubListMessagesGroup', $Language['LabelSubListMessagesGroup']);
        $Content->set('LabelSubCreateMessagesGroup', $Language['LabelSubCreateMessagesGroup']);
        $Content->set('LabelSubEditMessagesGroup', $Language['LabelSubEditMessagesGroup']);
        $Content->set('LabelSubDeleteMessagesGroup', $Language['LabelSubDeleteMessagesGroup']);
        //$Content->set('LabelEmptyMessageGroup', $Language['LabelEmptyMessageGroup']);
        $Content->set('LabelHeaderFormMessagesGroup', $Language['LabelHeaderFormMessagesGroup']);
        $Content->set('LabelHeaderFormEditMessagesGroup', $Language['LabelHeaderFormEditMessagesGroup']);
        $Content->set('LabelMessagesGroupAddressee', $Language['LabelMessagesGroupAddressee']);
        $Content->set('LabelMessagesGroupSubject', $Language['LabelMessagesGroupSubject']);
        $Content->set('LabelMessagesGroupContent', $Language['LabelMessagesGroupContent']);
        $Content->set('LabelMessagesGroupDate', $Language['LabelMessagesGroupDate']);
        $Content->set('LabelMessagesGroupType', $Language['LabelMessagesGroupType']);
        $Content->set('LabelSelectMessagesGroupType', $Language['LabelSelectMessagesGroupType']);
        $Content->set('LabelMessagesGroupAddresseeOptionList', $Language['LabelMessagesGroupAddresseeOptionList']);
        $Content->set('LabelMessagesGroupSubjectPlace', $Language['LabelMessagesGroupSubjectPlace']);
        $Content->set('LabelMessagesGroupContentPlace', $Language['LabelMessagesGroupContentPlace']);
        $Content->set('LabelMessagesGroupDestinationData', $Language['LabelMessagesGroupDestinationData']);
        $Content->set('LabelMemberCode', $Language['LabelMemberCode']);
        $Content->set('LabelEditMailMermber', $Language['LabelEditMailMermber']);
        $Content->set('LabelEditStatusLocation', $Language['LabelEditStatusLocation']);
        $Content->set('LabelEditModule', $Language['LabelEditModule']);
        
        /* MENSAJES VALIDACION INPUTS */
        $Content->set('MessageInputMessagesGroupAddressee', $Language['MessageInputMessagesGroupAddressee']);
        $Content->set('MessageInputMessagesGroupSubject', $Language['MessageInputMessagesGroupSubject']);
        $Content->set('MessageInputMessagesGroupContent', $Language['MessageInputMessagesGroupContent']);
        $Content->set('MessageInputMessagesGroupDate', $Language['MessageInputMessagesGroupDate']);
        /* BUTTONS */
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonSend', $Language['LabelButtonSend']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        //MENSAJES DE INPUTS AGREGAR USUARIO
        //$Content->set('LabelModuleOptionListNameMessages', $Language['LabelModuleOptionListNameMessages']); NO EXISTE EN ES.PHP
        //$Content->set('LabelModuleOptionListLastNameMessages', $Language['LabelModuleOptionListLastNameMessages']); NO EXISTE EN ES.PHP
        //$Content->set('LabelModuleOptionListFirstNameMessages', $Language['LabelModuleOptionListFirstNameMessages']); NO EXISTE EN ES.PHP
        
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectMessagesGroup', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectMessagesGroup', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectMessagesGroup', $Language['MessageSelectMessages']); // Detalle
        /* MENSAJE USUARIO INHABILITADO */
        $Content->set('OptionDisableMessagesGroup', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryDisableMessagesGroup', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageDisableMessagesGroup', $Language['MessageDisableMessages']); // Detalle
        echo $Content->output();
      
        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
