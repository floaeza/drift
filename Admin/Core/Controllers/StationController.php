<?php 
/* *****************************************************************************
 * OBJETIVO: Crear un enlace con la vista Station.tpl y sus modelos 
 * correspondientes
 * PARAMETROS RECIBIDOS:  UserId en sesion
 * CREADO POR: Guillermo Arce
 * FECHA: Junio 2017
 * ****************************************************************************/
/* *****************************************************************************
 * Se modifico foreach 
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
    require $Directory.'/Core/DAO/StationDAO.php';
    require $Directory.'/Core/DAO/ChannelDAO.php';
    //Asignacion de variables de sesion
    $UserId     = $_SESSION['UserId'];
    $UserName   = $_SESSION['UserName'];
    $ProfileId  = $_SESSION['ProfileId'];
    $UserImage  = $_SESSION['UserImage'];
    $ProfileName = $_SESSION['ProfileName'];
    
    //Obtenemos la lista de estaciones de tribune
    $StationArray = array();
    $i =0;
    $StationRecord = fopen($RootDirectory.$TribuneDirectory.'statrec.txt','r') or exit($Language['ErrorTribuneDirectory']."$RootDirectory.$TribuneDirectory.'statrec.txt'");
    while (!feof($StationRecord)) { 
        $Station = explode("|", fgets($StationRecord));
        if(empty($Station[2])){
            $Station[2] = "EMPTY";
        }        
        if(empty($Station[3])){
            $Station[3] = "EMPTY";
        }       
        $i++;
         array_push($StationArray, array('numero_estacion' => $Station[0],
                                         'nombre_estacion' => $Station[2],
                                         'indicativo'      => $Station[3]));
         
    }
    
    fclose($StationRecord);
    
        // Obtiene lista de tribune registradas en la base de datos
        $DAOStations = new Station($DirectoryLog);
        $StationsList = $DAOStations->getStationListDrop();
    
        // Obtiene lista de menus relaciones con el perfil que encuentre en la variable de sesion
        $DAOMenus = new Menus($DirectoryLog);
        $MenusProfileList = $DAOMenus->getMenuProfileList($ProfileId);
        // Obtiene datos de la lista de menus y submenus asignados al perfil en sesion
        $DAOSubmenus = new Submenus($DirectoryLog);
        
        // Carga lista de perfiles
        $DAOProfile = new Profiles($DirectoryLog);
        $ProfileList = $DAOProfile->getProfileList();

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
        
        /*OPCIONES DE ESTACIONES  StationArray=>TRIBUNE StationList=>BD*/
        $TribuneParse = array();
        foreach ($StationArray as $value1) {
            $encontrado=false;
            foreach ($StationsList as $value2) {
                if ($value1['numero_estacion'] == $value2['numero_estacion']){
                    $encontrado=true;
                }else{}
            }
            if ($encontrado == false){
                   array_push($TribuneParse, $value1);
            }
        }
//        echo json_encode($TribuneParse);
        
        $Content = new Templates($Directory.'/Views/Templates/Station.tpl');
        //OPCIONES DISPONIBLES EN TRIBUNE
        $StationTribuneOptionList = "<option value=''>Seleccione una estación...</option>";
        foreach ($TribuneParse as $tribune):
            $StationTribuneOptionList .= "<option value='$tribune[numero_estacion]'>$tribune[numero_estacion]</option>";
        endforeach;
        $StationTribuneOptionList .= "";   
        $Content->set('StationTribuneOptionList', $StationTribuneOptionList);
        $TribuneJSON = json_encode($TribuneParse);
        $Content->set('TribuneParse', $TribuneJSON);
        $Content->set('ChannelsLogosURL', $ChannelsLogosURL);
        
        
        //Obtenemos las imagenes del directorio
        $IconsList="";
        $id = 0;
        $filehandle = opendir($ChannelsLogosURLRoot); // Abrir archivos
        while ($file = readdir($filehandle)) {
            if ($file != "." && $file != "..") {
                $IconsList.= '<div class="item" data-value="'.$file.'"><img class="ui rounded image imagen" src="'.$ChannelsLogosURLStation.$file.'"></div>';
            }else{ }
        }
        closedir($filehandle);
        // Fin lectura archivos
        $Content->set('IconsList', $IconsList);
        
        /* TEXTO DE LAS ETIQUETAS */
        $Content->set('LabelSubTitleSubmenuStation', $Language['LabelSubTitleSubmenuStation']);
        $Content->set('LabelTitleSubmenuStation', $Language['LabelTitleSubmenuStation']);
        $Content->set('LabelHeaderFormListStation', $Language['LabelHeaderFormListStation']);
        $Content->set('LabelHeaderFormEditStation', $Language['LabelHeaderFormEditStation']);
        $Content->set('LabelHeaderFormEditStations', $Language['LabelHeaderFormEditStations']);
        $Content->set('LabelSubListStation', $Language['LabelSubListStation']);
        $Content->set('LabelHeaderFormListStationTribune', $Language['LabelHeaderFormListStationTribune']);
        $Content->set('LabelSubCreateStationTribune', $Language['LabelSubCreateStationTribune']);
        
        $Content->set('LabelSubEditStation', $Language['LabelSubEditStation']);
        $Content->set('LabelHeaderFormStation', $Language['LabelHeaderFormStation']);
        $Content->set('LabelHeaderFormStationTribune', $Language['LabelHeaderFormStationTribune']);
        
        $Content->set('LabelSubCreateStation', $Language['LabelSubCreateStation']);
        $Content->set('LabelTabDeleteStation', $Language['LabelTabDeleteStation']);
        $Content->set('LabelSubDeleteStation', $Language['LabelSubDeleteStation']);
        
        /* MENSAJE VALIDACION INPUTS VACIOS */
        $Content->set('OptionMessageType', $Language['OptionMessageType'][2]); // error
        $Content->set('SummaryMessageType', $Language['SummaryMessageType'][2]); // Error:
        $Content->set('MessageInputsValidate', $Language['MessageInputsValidate']); // Detalle
        
        
        
        /* MENSAJE VALIDACION INPUTS VACIONS JQUERY*/
        $Content->set('MessageInputMulticast', $Language['MessageInputMulticast']);
        $Content->set('MessageInputPort', $Language['MessageInputPort']);
        $Content->set('MessageInputStation', $Language['MessageInputStation']);
        
        //MENSAJES DENTRO DE INPUTS AGREGAR ESTACION TRIBUNE
        $Content->set('LabelModuleOptionListStationTribune', $Language['LabelModuleOptionListStationTribune']);
        $Content->set('LabelModuleOptionListNumberTribune', $Language['LabelModuleOptionListNumberTribune']);
        $Content->set('LabelModuleOptionListIndicativeTribune', $Language['LabelModuleOptionListIndicativeTribune']);
        
        
        $Content->set('LabelPlaceHolderFilter', $Language['LabelPlaceHolderFilter']);
        $Content->set('LabelCaptionDatatable', $Language['LabelCaptionDatatable']);
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelTitleSubmenu', $Language['LabelTitleSubmenu']);
        $Content->set('LabelTitleSubmenuChannel', $Language['LabelTitleSubmenuChannel']);
        
        
        $Content->set('LabelTabUserList', $Language['LabelTabUserList']);
        $Content->set('LabelTabCreateUser', $Language['LabelTabCreateUser']);
        $Content->set('LabelTabEditUser', $Language['LabelTabEditUser']);
        $Content->set('LabelHeaderFormEditChannel', $Language['LabelHeaderFormEditChannel']);
        $Content->set('LabelTabDeleteChannel', $Language['LabelTabDeleteChannel']);
        
        $Content->set('LabelTabDeleteUser', $Language['LabelTabDeleteUser']);
        $Content->set('LabelSubListUsers', $Language['LabelSubListUsers']);
        $Content->set('LabelSubListChannel', $Language['LabelSubListChannel']);
        
        $Content->set('LabelEditNumStation', $Language['LabelEditNumStation']);
        $Content->set('LabelEditNameStation', $Language['LabelEditNameStation']);
        $Content->set('LabelEditNameIndicative', $Language['LabelEditNameIndicative']);
        
        
        
        $Content->set('LabelSubCreateUser', $Language['LabelSubCreateUser']);
        $Content->set('LabelSubEditUser', $Language['LabelSubEditUser']);
        
        $Content->set('LabelEmptyMessage', $Language['LabelEmptyMessage']);
        $Content->set('LabelHeaderFormUser', $Language['LabelHeaderFormUser']);
        
        
        $Content->set('LabelTitleMenu', $Language['LabelTitleMenu']);
        $Content->set('LabelNumStation', $Language['LabelNumStation']);
        $Content->set('LabelNameStation', $Language['LabelNameStation']);
        $Content->set('LabelIndicativeStation', $Language['LabelIndicativeStation']);
        $Content->set('LabelButtonAccept', $Language['LabelButtonAccept']);
        $Content->set('LabelButtonCancel', $Language['LabelButtonCancel']);
        $Content->set('LabelButtonClear', $Language['LabelButtonClear']);
        $Content->set('LabelHeaderFormListChannel', $Language['LabelHeaderFormListChannel']);
        $Content->set('LabelSelectIconStation', $Language['LabelSelectIconStation']);
        $Content->set('LabelSelectIcon', $Language['LabelSelectIcon']);
        
        /* MENSAJES VALIDACION INPUTS */
        $Content->set('MessageInputNumStation', $Language['MessageInputNumStation']);
        $Content->set('MessageInputNameStation', $Language['MessageInputNameStation']);
        $Content->set('MessageInputLastNameIndicative', $Language['MessageInputLastNameIndicative']);
        
       
        /* MENSAJE SELECCIONAR CAMPO PARA EDITAR */
        $Content->set('OptionSelectUser', $Language['OptionMessageType'][1]); // warn
        $Content->set('SummarySelectUser', $Language['SummaryMessageType'][1]); // Advertencia:
        $Content->set('MessageSelectStation', $Language['MessageSelectStation']); // Detalle

        echo $Content->output();
        
        // Carga pie de pagina donde se muestran y cargan los mensajes
        $Footer = new Templates($Directory.'/Views/Layouts/Footer.tpl');
        echo $Footer->output();       
          
} else {
    //"No recibio identificador de usuario";
    header("Location: ../../index.php");
}