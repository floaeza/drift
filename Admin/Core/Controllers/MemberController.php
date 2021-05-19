<?php
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Member.tpl y sus modelos
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Mauricio Bailon
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
    require $Directory.'/Core/DAO/LocationType.php';
    require $Directory.'/Core/DAO/LocationTypeJONAS.php';
    require $Directory.'/Core/DAO/LocationEstatusDAO.php';
    require $Directory.'/Core/DAO/PackagesDAO.php';
    require $Directory.'/Core/DAO/MembersDAO.php';
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    require $Directory.'/Core/DAO/ModulesDAO.php';
    //Asignacion de variables de sesiom
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
        $DAOMembers = new MembersDAO($DirectoryLog);
        $MembersList = $DAOMembers->getMembersList();
        
        // Carga lista de Modules
        $DAOModules = new ModulesDAO($DirectoryLog);
        $ModuleList = $DAOModules->getModulesList();

        // Carga lista de tipo de locaciones
//        $DAOLocationType = new LocationType($DirectoryLog);
//        $LocationTypeList = $DAOLocationType->getLocationTypeList();

//        // Carga lista de tipo de locaciones JONAS
//        $DAOLocationTypeJONAS = new LocationTypeJONAS($DirectoryLog);
//        $LocationTypeListJONAS = $DAOLocationTypeJONAS->getLocationTypeListJONAS();
//
//        // Carga lista de estados de locaciones
//        $DAOLocationStatus = new LocationEstatus($DirectoryLog);
//        $DescriptionStatusLocationList = $DAOLocationStatus->getLocationStatusList();

        // Cargar lista de paquetes 
        $PackageDAO = new Packages($DirectoryLog);
        $PackageList = $PackageDAO->getPackagesList();        
        
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

        $Content = new Templates($Directory.'/Views/Templates/Member.tpl');
        $Content->set('AvatarsURL', $AvatarsURL);
//        /* OPCIONES TIPO DE LOCACIONES */
//        $ProfileOptionList = "";
//        foreach ($LocationTypeList as $loc):
//            $ProfileOptionList .= "<option value='$loc[id_tipo_locacion]'>$loc[nombre_tipo_locacion]</option>";
//        endforeach;
//        $ProfileOptionList.= "";
//        $Content->set('$ProfileOptionList', $ProfileOptionList);
//
//        /* OPCIONES TIPO DE LOCACIONES */
//        $LocationTypeOptionList = "";
//        foreach ($LocationTypeList as $type):
//            $LocationTypeOptionList .= "<option value='$type[id_tipo_locacion]'>$type[nombre_tipo_locacion]</option>";
//        endforeach;
//        $LocationTypeOptionList .= "";
//        $Content->set('LocTypeOptionList', $LocationTypeOptionList);
//
//        /* OPCIONES TIPO DE LOCACIONES JONAS */
//        $LocTypeOptionListJONAS = "";
//        foreach ($LocationTypeListJONAS as $locJ):
//            $LocTypeOptionListJONAS .= "<option value='$locJ[id_descripcion_tipo_locacion]'>$locJ[codigo_tipo_locacion]</option>";
//        endforeach;
//        $LocTypeOptionListJONAS .="";
//        $Content->set('DescriptionTypeLocationOptionList', $LocTypeOptionListJONAS);
//
//        $LocationTypeOptionListJONAS = "";
//        foreach ($LocationTypeListJONAS as $typeJ):
//            $LocationTypeOptionListJONAS .= "<option value='$typeJ[id_descripcion_tipo_locacion]'>$typeJ[codigo_tipo_locacion]</option>";
//        endforeach;
//        $LocationTypeOptionList .= "";
//        $Content->set('DescTypeLocationOptionList', $LocationTypeOptionListJONAS);

//        /* OPCIONES ESTATUS DE LOCACIONES */
//        $DescriptionStatusLocationOptionList = "";
//        foreach ($DescriptionStatusLocationList as $des):
//            $DescriptionStatusLocationOptionList .= "<option value='$des[id_estatus_locacion]'>$des[codigo_estatus_locacion]</option>";
//        endforeach;
//        $DescriptionStatusLocationOptionList .= "";
//        $Content->set('OptionLocationStatus', $DescriptionStatusLocationOptionList);

        

        /* OPCIONES MIEMBROS DE LOCACIONES */
//        $MembersOptionList = "";
//        foreach ($MembersList as $mem):
//            $MembersOptionList .= "<option value='$mem[id_miembro]'>$mem[codigo_miembro]</option>";
//        endforeach;
//        $MembersOptionList .= "";
//        $Content->set('MembersOptionList', $MembersOptionList);
//
//        
//        foreach ($MembersList as $memL):
//            $MemOptionList = "";
//            $MemOptionList .= "<div class='item' data-value='$memL[id_miembro]'>$memL[codigo_miembro]</div>";
//        endforeach;
//        $MemOptionList .= "";
//        $Content->set('MemOptionList', $MemOptionList);
//        
        /*OPCIONES DE MODULOS A MOSTRAR*/
        $ModuleOptionList = "";
        foreach ($ModuleList as $module):
            $ModuleOptionList .= "<option value='$module[id_modulo]'>$module[nombre_modulo]</option>";
        endforeach;
        $ModuleOptionList .="";
        $Content->set('OptionModuleLocation', $ModuleOptionList);
        
        /*LISTA DE PAQUETES ADMINISTRAR*/
        $PackageOptionList =""; 
        foreach ($PackageList as $Package):
        
        $PackageOptionList .= "<option value='$Package[id_paquete]'>$Package[nombre_paquete]</option>";
        endforeach;
        $PackageOptionList .=""; 
        $Content->set('PackageMemberOptionList', $PackageOptionList);
        
        /*LISTA DE SERVICIOS A MOSTRAR*/
        
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelDescriptionMember', $Language['LabelDescriptionMember']);
        $Content->set('MessageInputLocationModule', $Language['MessageInputLocationModule']);
        $Content->set('MessageInputLocationStatusId', $Language['MessageInputLocationStatusId']);
        $Content->set('MessageInputTitleMember', $Language['MessageInputTitleMember']);
        $Content->set('LabelSubHeaderLocation', $Language['LabelSubHeaderLocation']);
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelCaptionDatatable', $Language['LabelCaptionDatatable']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelTitleSubmenu2', $Language['LabelTitleSubmenu2']);
        $Content->set('LabelTabLocationList', $Language['LabelTabLocationList']);
        $Content->set('LabelTabChargeLocations', $Language['LabelTabChargeLocations']);
        $Content->set('LabelTabEditLocation', $Language['LabelTabEditLocation']);
        $Content->set('LabelSubListLocations', $Language['LabelSubListLocations']);
        $Content->set('LabelSubChargeLocations', $Language['LabelSubChargeLocations']);
        $Content->set('LabelSubEditLocation', $Language['LabelSubEditLocation']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelHeaderFormLocation', $Language['LabelHeaderFormLocation']);
        $Content->set('LabelHeaderFormEditLocation', $Language['LabelHeaderFormEditLocation']);
        $Content->set('LabelTitleMenu', $Language['LabelTitleMenu']);
        $Content->set('LabelTitleDevicesPanel', $Language['LabelTitleDevicesPanel']);
        $Content->set('LabelLocationCode', $Language['LabelLocationCode']);
        $Content->set('LabelLocationStatus', $Language['LabelLocationStatus']);
        $Content->set('LabelLocationPassword', $Language['LabelLocationPassword']);
        $Content->set('LabelLocationDirection', $Language['LabelLocationDirection']);
        $Content->set('LabelLocationDescription', $Language['LabelLocationDescription']);
        $Content->set('LabelLocationModule', $Language['LabelLocationModule']);
        $Content->set('LabelPackageOptionList', $Language['LabelPackageOptionList']);
        $Content->set('LabelPackageOptionList', $Language['LabelPackageOptionList']);
        $Content->set('LabelStatusOptionList', $Language['LabelStatusOptionList']);
        $Content->set('MessageInputLenghtPass', $Language['MessageInputLenghtPass']);
        //MENSAJES DENTRO DE INPUT PROPIETARIOS
        $Content->set('LabelModuleOptionListCodeMember', $Language['LabelModuleOptionListCodeMember']);
        $Content->set('LabelModuleOptionListTitle', $Language['LabelModuleOptionListTitle']);
        $Content->set('LabelModuleOptionListName', $Language['LabelModuleOptionListName']);
        $Content->set('LabelModuleOptionListLastName', $Language['LabelModuleOptionListLastName']);
        $Content->set('LabelModuleOptionListMail', $Language['LabelModuleOptionListMail']);
        //MENSAJES DENTRO DE INPUT PROPIETARIOS LOCACION
        $Content->set('LabelModuleOptionListCodeLocation', $Language['LabelModuleOptionListCodeLocation']);
        $Content->set('LabelModuleOptionListKeyLocation', $Language['LabelModuleOptionListKeyLocation']);
        $Content->set('LabelModuleOptionListDirectionLocation', $Language['LabelModuleOptionListDirectionLocation']);
        $Content->set('LabelModuleOptionListDescriptionLocation', $Language['LabelModuleOptionListDescriptionLocation']);
        $Content->set('LabelHeaderFormEditMember', $Language['LabelHeaderFormEditMember']);
        $Content->set('LabelModuleOptionList', $Language['LabelModuleOptionList']);
        $Content->set('MessageSelectDispositive', $Language['MessageSelectDispositive']);
        
        $Content->set('LabelLocationType', $Language['LabelLocationType']);
        $Content->set('LabelLocationPropierty', $Language['LabelLocationPropierty']);
        $Content->set('LabelLocationTypeDescription', $Language['LabelLocationTypeDescription']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonAdvanced', $Language['LabelButtonAdvanced']);
        $Content->set('LabelButtonAdvancedDescribe', $Language['LabelButtonAdvancedDescribe']);
        $Content->set('LabelButtonAdvancedCancelDescribe', $Language['LabelButtonAdvancedCancelDescribe']);
        $Content->set('LabelButtonNext', $Language['LabelButtonNext']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelButtonAdd', $Language['LabelButtonAdd']);
        $Content->set('LabelButtonRestart', $Language['LabelButtonRestart']);
        $Content->set('LabelButtonRT', $Language['LabelButtonRT']);
        $Content->set('LabelButtonQuit', $Language['LabelButtonQuit']);
        $Content->set('LabelButtonChangeLocation', $Language['LabelButtonChangeLocation']);
        $Content->set('LabelButtonPC', $Language['LabelButtonPC']);
        $Content->set('SearchMember', $Language['SearchMember']);
       //NUEVO FORMULARIO
        $Content->set('LabelEditTitleMember', $Language['LabelEditTitleMember']);
        $Content->set('LabelEditNameMember', $Language['LabelEditNameMember']);
        $Content->set('LabelLastName', $Language['LabelLastName']);
        $Content->set('LabelEditMailMermber', $Language['LabelEditMailMermber']);
        $Content->set('LabelPackageMember', $Language['LabelPackageMember']);
        $Content->set('LabelEditCodeLocation', $Language['LabelEditCodeLocation']);
        $Content->set('LabelEditStatusLocation', $Language['LabelEditStatusLocation']);
        $Content->set('LabelKeyLocation', $Language['LabelKeyLocation']);
        $Content->set('LabelDirectionLocation', $Language['LabelDirectionLocation']);
        $Content->set('LabelDescriptionLocation', $Language['LabelDescriptionLocation']);
        $Content->set('LabelEditModule', $Language['LabelEditModule']);
//        $Content->set('LabelEditService', $Language['LabelEditService']);
        $Content->set('LabelEditEngraver', $Language['LabelEditEngraver']);
        $Content->set('LabelSubTitleSubmenuMember', $Language['LabelSubTitleSubmenuMember']);
        $Content->set('LabelMemberInstructions', $Language['LabelMemberInstructions']);
        $Content->set('LabelLocationInstructions', $Language['LabelLocationInstructions']);
        $Content->set('LabelTabViewDevices', $Language['LabelTabViewDevices']);
        $Content->set('LabelTabSubViewDevices', $Language['LabelTabSubViewDevices']);
        $Content->set('LabelInstructionsPrincipalPanel', $Language['LabelInstructionsPrincipalPanel']);
        $Content->set('LabelInstructionsLimboPanel', $Language['LabelInstructionsLimboPanel']);
        $Content->set('LabelMember', $Language['LabelMember']);
        $Content->set('LabelLocation', $Language['LabelLocation']);
        
        /* MENSAJES VALIDACION INPUTS */
        $Content->set('MessageInputLocationCode', $Language['MessageInputLocationCode']);
        $Content->set('MessageInputLocationKey', $Language['MessageInputLocationKey']);
        $Content->set('MessageInputLocationDirection', $Language['MessageInputLocationDirection']);
        $Content->set('MessageInputLocationDescription', $Language['MessageInputLocationDescription']);
        $Content->set('MessageInputLocationDescription', $Language['MessageInputLocationDescription']);
        $Content->set('MessageInputLocationType', $Language['MessageInputLocationType']);
        $Content->set('MessageInputLocationMember', $Language['MessageInputLocationPropierty']);
        $Content->set('MessageInputLocationTypeDescription', $Language['MessageInputLocationTypeDescription']);
        
        //MENSAJES VALIDACION PROPIETARIOS
        $Content->set('MessageCodeLocation', $Language['MessageCodeLocation']);
        $Content->set('MessageCodeMemberLocation', $Language['MessageCodeMemberLocation']);
        $Content->set('MessageTitleMemberLocation', $Language['MessageTitleMemberLocation']);
        $Content->set('MessageNameMemberLocation', $Language['MessageNameMemberLocation']);
        $Content->set('MessageLastNameLocation', $Language['MessageLastNameLocation']);
        $Content->set('MessageMailMemberLocation', $Language['MessageMailMemberLocation']);
        $Content->set('MessageProgramingMember', $Language['MessageProgramingMember']);
        
        /* MENSAJE VALIDACION INPUTS VACIOS */
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        $Content->set('MessageDevicesValidate', $Language['MessageDevicesValidate']); // Detalle
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectLocation', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectLocation', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectMember', $Language['MessageSelectMember']); // Detalle
        $Content->set('MessageRestartDevice', $Language['MessageRestartDevice']); // Detalle
        //CONTROL PARENTAL
        $Content->set('Advisory', $Language['Advisory']);
        $Content->set('Language', $Language['Language']);
        $Content->set('Nudity', $Language['Nudity']);
        $Content->set('Violence', $Language['Violence']);
        $Content->set('StrongContent', $Language['StrongContent']);
        $Content->set('AdultSituations', $Language['AdultSituations']);
        $Content->set('TV&MovieRatings', $Language['TV&MovieRatings']);
        $Content->set('M18', $Language['M18']);
        $Content->set('M13', $Language['M13']);
        $Content->set('NotRated', $Language['NotRated']);
        
        echo $Content->output();

        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
