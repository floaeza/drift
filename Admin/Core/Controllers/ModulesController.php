<?php
/* *********************************************************************************
 * OBJETIVO: Crear un enlace con la vista Modules.tpl y sus modelos correspondientes
 * PARAMETROS RECIBIDOS: UserId de usuario en sesion
 * CREADO POR: Mauricio Bailón
 * FECHA: Abril 2017
 * ********************************************************************************/
session_start();
if(isset($_SESSION['UserId'])){
    //Carga de directorios principales
    $Directory = $_SESSION['DirectoryProyect'];
    $LanguageSelected = $_SESSION['Language'];
    require $Directory.'/General/Languages/'.$LanguageSelected;
    require $Directory.'/Core/Models/Config.php';
    require $Directory.'/Core/Models/Templates.php';
    require $Directory.'/Core/DAO/SubmenusDAO.php';
    require $Directory.'/Core/DAO/MenusDAO.php';
    require $Directory.'/Core/DAO/ModulesDAO.php';
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

        // Carga lista de templates
        $DAOModules = new ModulesDAO($DirectoryLog);
        
        

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
                
        //Obtenemos las imagenes del directorio
        $list1 = array();
        $ImagesList="";
        $i=1;
        $filehandle1 = opendir($ImagesURLRoot); // Abrir archivos
        while ($file1 = readdir($filehandle1)) {
            if ($file1 != "." && $file1 != "..") {
                $list1[$file1] = $file1;
            }else{ }
            
        } 
        closedir($filehandle1); // Fin lectura archivos
        natcasesort($list1);
        
        foreach ($list1 as $fileName1) {
            $ImagesList.= '<div class="item" title="'.$fileName1.'"><img id="'.$i.'" style="max-height:90px;" name="'.$fileName1.'" class="ui rounded small image" src="'.$ImagesURL.$fileName1.'" onclick="Selection();" tabindex="1"></div>';
            $i++;
        }        
        
        //Obtenemos los videos del directorio
        $Videolist1 = array();
        $VideoList="";
        $Vi=1;
        $FileVideoHandle1 = opendir($VideosURLRoot); // Abrir archivos
        while ($fileVideo1 = readdir($FileVideoHandle1)) {
            if ($fileVideo1 != "." && $fileVideo1 != "..") {
                $Videolist1[$fileVideo1] = $fileVideo1;
            }else{ }
            
        } 
        closedir($FileVideoHandle1); // Fin lectura archivos
        natcasesort($Videolist1);
        
        foreach ($Videolist1 as $fileVideoName1) {
            $VideoList.= '<div class="ui rounded image" title="'.$fileVideoName1.'" style="width:230px; height:150px;"><video class="ui rounded small image" id="V'.$Vi.'" name="'.$fileVideoName1.'" onclick="Selection();" width="220" height="140"  style="margin:2%;" onclick="Selection();" src="'.$VideosURL.$fileVideoName1.'" muted></video></div>';
            $Vi++;
        }              
        
        //Obtenemos los videos del directorio *Editar        
        $Evideolist1 = array();
        $EditVideosList="";
        $EVi=1;
        $EditVideofilehandle1 = opendir($VideosURLRoot); // Abrir archivos
        while ($EVideofile1 = readdir($EditVideofilehandle1)) {
            if ($EVideofile1 != "." && $EVideofile1 != "..") {
                $Evideolist1[$EVideofile1] = $EVideofile1;
            }else{ }
            
        } 
        closedir($EditVideofilehandle1); // Fin lectura archivos
        natcasesort($Evideolist1);
        
        foreach ($Evideolist1 as $EvideofileName1) {
            $EditVideosList.= '<div class="item" title="'.$EvideofileName1.'"><video id="V'.$EVi.'" name="'.$EvideofileName1.'" class="ui rounded small image" src="'.$VideosURL.$EvideofileName1.'" width="220" height="140" onclick="changeVideo();" style="margin:2%;" tabindex="1" muted></video></div>';
            $EVi++;
        }
        
        //Obtenemos las imagenes del directorio *Editar        
        $Elist1 = array();
        $EditImagesList="";
        $Ei=1;
        $Editfilehandle1 = opendir($ImagesURLRoot); // Abrir archivos
        while ($Efile1 = readdir($Editfilehandle1)) {
            if ($Efile1 != "." && $Efile1 != "..") {
                $Elist1[$Efile1] = $Efile1;
            }else{ }
            
        } 
        closedir($Editfilehandle1); // Fin lectura archivos
        natcasesort($Elist1);
        
        foreach ($Elist1 as $EfileName1) {
            $EditImagesList.= '<div class="item" title="'.$EfileName1.'"><img id="'.$Ei.'" style="max-height:90px;" name="'.$EfileName1.'" class="ui rounded small image" src="'.$ImagesURL.$EfileName1.'" onclick="change();" tabindex="1"></div>';
            $Ei++;
        }        
        
        
        //Obtenemos las imagenes del directorio
        $IconsList="";
        $id = 0;
        $filehandle = opendir($IconsURLRoot); // Abrir archivos
        while ($file = readdir($filehandle)) {
            if ($file != "." && $file != "..") {
                $IconsList.= '<div class="item" data-value="'.$file.'"><img style="background-color: #565353; border-radius: 5px;" class="ui mini right spaced image" src="'.$IconsURL.$file.'">'.$file.'</div>';
            }else{ }
        }
        closedir($filehandle); // Fin lectura archivos *Editar
        
        $Content = new Templates($Directory.'/Views/Templates/Modules.tpl');
        $Content->set('IconsURL', $IconsURL);
        $Content->set('ModulesURL', $Prev);
        $Content->set('ModulesURLGeneral', $Preview);
        $Content->set('ListImages', $ImagesList);
        $Content->set('EditListImages', $EditImagesList);
        $Content->set('ListVideos', $VideoList);
        $Content->set('EditListVideos', $EditVideosList);
        $Content->set('ImagesURL', $ImagesURL);
        $Content->set('VideosURL', $VideosURL);
        /* OPCIONES DE TEMPLATE NUEVO MODULO */
        $Step2 = true; // TODOS LOS TEMPLATES
        $TemplateList = $DAOModules->getModulesTemplatesList($Step2);
        $TemplateOptionList = "";
        foreach ($TemplateList as $List):
            $TemplateOptionList .= "<option value='".$List['id_template']."'>".$List['nombre_template']."</option>";
        endforeach;
        /* OPCIONES DE TEMPLATES PARA EL SUBMENU */
        $Step3 = false; //SIN TEMPLATE SUBMENUANDIMAGE
        $TemplateListStep3 = $DAOModules->getModulesTemplatesList($Step3);
        $TemplateOptionListSubmenu = "";
        foreach ($TemplateListStep3 as $List):
            //if($List['nombre_template'] != 'Submenu'){
                $TemplateOptionListSubmenu .= "<option value='".$List['id_template']."'>".$List['nombre_template']."</option>";
            //}else {
                
            //}
        endforeach;
        $TemplateOptionListSubmenu .= "";
        $Content->set('TemplateOptionList', $TemplateOptionList);
        $Content->set('TemplateOptionListSubmenu', $TemplateOptionListSubmenu);
        $Content->set('IconsList', $IconsList);
        $Content->set('EditIconsList', $IconsList);
		$Content->set('PreviewsURL',$PreviewsURL);
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelHeaderModules', $Language['LabelHeaderModules']);
        $Content->set('LabelSubHeaderModules', $Language['LabelSubHeaderModules']);
        $Content->set('StepOne', $Language['StepOne']);
        $Content->set('StepOneDescription', $Language['StepOneDescription']);
        $Content->set('StepOneLong', $Language['StepOneLong']);
        $Content->set('StepOneDescriptionLong', $Language['StepOneDescriptionLong']);
        $Content->set('StepTwo', $Language['StepTwo']);
        $Content->set('StepTwoDescription', $Language['StepTwoDescription']);
        $Content->set('StepThree', $Language['StepThree']);
        $Content->set('StepThreeDescription', $Language['StepThreeDescription']);
        /*
        $Content->set('StepFour', $Language['StepFour']);
        $Content->set('StepFourDescription', $Language['StepFourDescription']);
        $Content->set('StepFive', $Language['StepFive']);
        $Content->set('StepFiveDescription', $Language['StepFiveDescription']);
         */
        
        
        
        $Content->set('LabelTabModuleList', $Language['LabelTabModuleList']);
        $Content->set('LabelSubTabModuleList', $Language['LabelSubTabModuleList']);
        $Content->set('LabelTabCreateModule', $Language['LabelTabCreateModule']);
        $Content->set('LabelSubCreateModule', $Language['LabelSubTabCreateModule']);
        $Content->set('LabelTabEditModule', $Language['LabelTabEditModule']);
        $Content->set('LabelSubEditModule', $Language['LabelSubTabEditModule']);
        $Content->set('LabelTabDeleteModule', $Language['LabelTabDeleteModule']);
        $Content->set('LabelSubDeleteModule', $Language['LabelSubTabDeleteModule']);
        $Content->set('LabelAdvisoryPreview', $Language['LabelAdvisoryPreview']);
        $Content->set('LabelTabShowModule', $Language['LabelTabShowModule']);
        $Content->set('LabelSubShowModule', $Language['LabelSubTabShowModule']);
        
        $Content->set('LabelModuleName', $Language['LabelModuleName']);
        $Content->set('LabelModuleIco', $Language['LabelModuleIco']);
        $Content->set('LabelModuleNamePlace', $Language['LabelModuleNamePlace']);
        $Content->set('LabelModuleIcoPlace', $Language['LabelModuleIcoPlace']);
        $Content->set('LabelModuleDescription', $Language['LabelModuleDescription']);
        $Content->set('LabelModuleTemplate', $Language['LabelModuleTemplate']);
        $Content->set('LabelModuleDescriptionPlace', $Language['LabelModuleDescriptionPlace']);
        $Content->set('LabelModuleTemplatePlace', $Language['LabelModuleTemplatePlace']);
        
        $Content->set('MessageInputModuleName', $Language['MessageInputModuleName']);
        $Content->set('MessageInputModuleIcon', $Language['MessageInputModuleIcon']);
        $Content->set('MessageInputModuleTemplate', $Language['MessageInputModuleTemplate']);
        
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonNext', $Language['LabelButtonNext']);
        $Content->set('LabelButtonReturn', $Language['LabelButtonReturn']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelButtonClose', $Language['LabelButtonClose']);
        
        $Content->set('OptionSelectVariable', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectVariable', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageMaximumVar', $Language['MessageMaximumVar']); // Detalle
        
        $Content->set('OptionSelectModule', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectModule', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectModule', $Language['MessageSelectModule']); // Detalle
        
        $Content->set('OptionPrincipalModule', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummaryPrincipalModule', $Language['SummaryPrincipalModule']);
        $Content->set('MessagePrincipalModule', $Language['MessagePrincipalModule']); // Detalle
        
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        
        $Content->set('MessageInputsValidateNumber', $Language['MessageMaximumVarNumber']);
        $Content->set('MessageInputsValidateNumberType', $Language['MessageMaximumVarNumberImg']);        
        echo $Content->output();


        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();

} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}
