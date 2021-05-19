<?php 
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de usuarios la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Tania Maldonado
 * FECHA: Abril 2017
 * ****************************************************************************/
session_start();

    require '../Models/Config.php';
    require '../Models/Log.php';
    require '../../General/Languages/es.php';
    require '../DAO/ModulesDAO.php';
    
    $DAOModules = new ModulesDAO($DirectoryLog);
    
    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }
    
    switch ($Option){
        
        case "SelectModules":
            $Response = $DAOModules->getModulesListBack();
            echo json_encode($Response);
        break;
    
        case "SelectModuleType":
            if(isset($_POST['id_modulo'])){
                $Response = $DAOModules->getModuleType($_POST['id_modulo']);
            }else{
                
            }
            echo json_encode($Response);
        break;
        
        case "TemplateList":
            if(isset($_POST['data'])){
                $TemplateList = $DAOModules->getModulesTemplatesName($_POST['data']);
                if($TemplateList[0] > 0){
                    $Response = $TemplateList;
                }else{
                    
                }
            }else{
                
            }
            echo json_encode($Response);
        break;
        
        case "TemplateType":
            if(isset($_POST['data'])){
                    $Response = $DAOModules->getTemplateType($_POST['data']);
            }else{
                
            }
            echo json_encode($Response);
        break;
        
        case "GetFather":
            if(isset($_POST['data'])){
                    $Response = $DAOModules->getModuleType($_POST['data']);
            }else{
                echo 'vacio';
            }
            echo json_encode($Response);
        break;
        
        case "TemplateVariableCount":
            if(isset($_POST['data'])){
                $TemplateList = $DAOModules->getModulesTemplatesVariableCount($_POST['data']);
                if($TemplateList[0] > 0){
                    $Response = $TemplateList;
                }else{
                    
                }
            }else{
                
            }
            echo json_encode($Response);
        break;
        
        case "CreateModule":
            if(isset($_POST['nombre_modulo']) && isset($_POST['descripcion_modulo']) && isset($_POST['nombre_icono']) && isset($_POST['id_template']) && isset($_POST['Images'])){
                $Images = $_POST['Images'];
                $cont = 0;
                $NewModule = array('nombre_modulo'      => $_POST['nombre_modulo'],
                                   'descripcion_modulo' => $_POST['descripcion_modulo'],
                                   'id_template'        => $_POST['id_template'],
                                   'nombre_icono'       => $_POST['nombre_icono']);
                $Module = $DAOModules->setModule($NewModule);
                if($Module[0] > 0){
                    $VarNum = $DAOModules->getModulesTemplatesVariable($_POST['id_template']);
                    if($VarNum[0] > 0){
                        $IdModule = $DAOModules->getLastModuleId();
                        if($IdModule[0]['id'] > 0){
                            foreach ($VarNum as $var):
                                $NewModule = array('id_modulo'              => $IdModule[0]['id'],
                                                   'id_template_variable'   => $var['id_template_variable'],
                                                   'valor'                  => $Images[$cont]);
                                $Module = $DAOModules->setModuleContent($NewModule);
                                if($Module[0] > 0){
                                    $cont++;
                                }else {
                                    //echo 'ERROR MODCONT: '.$cont;
                                }
                            endforeach;
                            if($cont == count($Images)){
                                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                  'MessageDetail'   => $Language['MessageInsertCorrect']);
                            }else{ }
                        }else {
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error IDMOD');
                        }
                        
                    } else {
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error NUMVAR');
                    }
                } else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }else if(isset($_POST['nombre_modulo']) && isset($_POST['descripcion_modulo']) && isset($_POST['nombre_icono']) && isset($_POST['id_template']) && isset($_POST['array'])){
                $Child = $_POST['array'];
                if ($_POST['id_template'] == 9){
                    $NewModule = array('nombre_modulo'      => $_POST['nombre_modulo'],
                                       'descripcion_modulo' => $_POST['descripcion_modulo'],
                                       'id_template'        => $_POST['id_template'],
                                       'url_modulo'         => "Submenu.php",
                                       'nombre_icono'       => $_POST['nombre_icono']);
                }else if ($_POST['id_template'] == 12){
                    $NewModule = array('nombre_modulo'      => $_POST['nombre_modulo'],
                                       'descripcion_modulo' => $_POST['descripcion_modulo'],
                                       'id_template'        => $_POST['id_template'],
                                       'url_modulo'         => "Submenu.php",
                                       'nombre_icono'       => $_POST['nombre_icono']);
                }else{
                    $NewModule = array('nombre_modulo'      => $_POST['nombre_modulo'],
                                       'descripcion_modulo' => $_POST['descripcion_modulo'],
                                       'id_template'        => $_POST['id_template'],
                                       'url_modulo'         => "General.php",
                                       'nombre_icono'       => $_POST['nombre_icono']);
                }
                $Module = $DAOModules->setModule($NewModule);
                if($Module[0] > 0){
                    $VarNum = $DAOModules->getModulesTemplatesVariable($_POST['id_template']);
                    if($VarNum[0] > 0){
                        $theLast = $DAOModules->getLastModuleId();
                        if($theLast[0] > 0){
                            $contador=0;
                            foreach ($VarNum as $var):
                                if($var['tipo_variable'] == 'URL'){
                                    if($Child[$contador+2]['value'] == 9){
                                        $NewModule = array('id_modulo'              => $theLast[0]['id'],
                                                       'id_template_variable'   => $var['id_template_variable'],
                                                       'valor'                  => 'Submenu.php');
                                    }else{
                                        $NewModule = array('id_modulo'              => $theLast[0]['id'],
                                                       'id_template_variable'   => $var['id_template_variable'],
                                                       'valor'                  => 'General.php');
                                    }
                                }else if($var['tipo_variable'] == 'image'){
                                    if($var['nombre_variable'] == 'SubmenuAndImageImage5'){
                                        $NewModule = array('id_modulo'              => $theLast[0]['id'],
                                                           'id_template_variable'   => $var['id_template_variable'],
                                                           'valor'                  => 'VDMlogo.png');
                                    }else{
                                        $NewModule = array('id_modulo'              => $theLast[0]['id'],
                                                           'id_template_variable'   => $var['id_template_variable'],
                                                           'valor'                  => $Child[$contador+1]['value']);
                                    }
                                }else if($var['tipo_variable'] == 'text'){
                                    $NewModule = array('id_modulo'              => $theLast[0]['id'],
                                                   'id_template_variable'   => $var['id_template_variable'],
                                                   'valor'                  => $Child[$contador]['value']);
                                }
//                                echo json_encode($NewModule);
                                $Module = $DAOModules->setModuleContent($NewModule);
                                if($Module[0] > 0 && $contador < count($Child)-3){
                                    $contador=$contador+3;
                                }else {
                                    $contador=0;
                                }
                            endforeach;
                        }else{
                            echo 'Error get last created module';
                        }
                    }else{
                        echo 'Error get number var of template';
                    }
                    
                    $Response = array ('response' => 'ok');
                }else{
                    $Response = array ('response' => 'null');
                }
                
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            
            echo json_encode($Response);
        break;
        
        case "CreateModuleChild":
            if(isset($_POST['array'])){
                $Child = $_POST['array'];
                $level = 0;
                $mod = 0;
                $theLast1 = $DAOModules->getLastModuleId();
                if($theLast1[0] > 0){
                    for($i = 0, $size = count($Child); $i < $size; $i+=3) {
                        //echo $Child[($i+2)]['value'];
                        if($Child[($i+2)]['value'] != 9){
                            $NewModule = array('nombre_modulo'      => $Child[$i]['value'],
                                               'descripcion_modulo' => "",
                                               'id_template'        => $Child[($i+2)]['value'],
                                               'url_modulo'         => "General.php",
                                               'nombre_icono'       => $Child[($i+1)]['value'],
                                               'nivel_modulo'       => ($level+1),
                                               'padre_modulo'       => $theLast1[0]['id']);
                        }else if($Child[($i+2)]['value'] == 9){
                            $NewModule = array('nombre_modulo'      => $Child[$i]['value'],
                                               'descripcion_modulo' => "",
                                               'id_template'        => $Child[($i+2)]['value'],
                                               'url_modulo'         => "Submenu.php",
                                               'nombre_icono'       => "promos.png",
                                               'nivel_modulo'       => ($level+1),
                                               'padre_modulo'       => $theLast1[0]['id']);
                        }
                        $Module = $DAOModules->setModule($NewModule);
                        if($Module[0] > 0 && $Child[($i+2)]['value'] != 9){
                            $VarNum = $DAOModules->getModulesTemplatesVariable($Child[($i+2)]['value']);
                            if($VarNum[0] > 0){
                                $IdModule1 = $DAOModules->getLastModuleId();
                                if($IdModule1[0]['id'] > 0){
                                    $cont = 0;
                                    foreach ($VarNum as $var):
                                        $NewModule = array('id_modulo'              => $IdModule1[0]['id'],
                                                           'id_template_variable'   => $var['id_template_variable'],
                                                           'valor'                  => 'VDMlogo.png');
                                        $Module = $DAOModules->setModuleContent($NewModule);
                                        if($Module[0] > 0){
                                            $cont++;
                                        }else {
                                            //echo 'ERROR MODCONT: '.$cont;
                                        }
                                    endforeach;
                                    if($cont == count($VarNum)){
                                        $mod++;
                                    }else{ }
                                }else {
                                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                                              'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error IDMOD');
                                }

                            } else {
                                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                                              'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error NUMVAR');
                            }
                        }else if($Module[0] > 0 && $Child[($i+2)]['value'] == 9){
                            $mod2 = 0;
//                            if($Module[0] > 0){
                                $VarNum = $DAOModules->getModulesTemplatesVariable($Child[($i+2)]['value']);
                                if($VarNum[0] > 0){
                                    $theLast2 = $DAOModules->getLastModuleId();
                                    if($theLast2[0] > 0){
                                        $contador=0;
                                        foreach ($VarNum as $var):
                                            if($var['tipo_variable'] == 'URL'){
                                                $NewModule = array('id_modulo'              => $theLast2[0]['id'],
                                                               'id_template_variable'   => $var['id_template_variable'],
                                                               'valor'                  => 'General.php');
                                            }else if($var['tipo_variable'] == 'image'){
                                                $NewModule = array('id_modulo'              => $theLast2[0]['id'],
                                                                   'id_template_variable'   => $var['id_template_variable'],
                                                                   'valor'                  => "promos.png");
                                            }else if($var['tipo_variable'] == 'text'){
                                                $NewModule = array('id_modulo'              => $theLast2[0]['id'],
                                                               'id_template_variable'   => $var['id_template_variable'],
                                                               'valor'                  => "vacio");
                                            }
            //                                echo json_encode($NewModule);
                                            $Module = $DAOModules->setModuleContent($NewModule);
                                            if($Module[0] > 0 && $contador < 9){
                                                $contador=$contador+3;
                                            }else {
                                                $contador=0;
                                            }
                                        endforeach;
                                    }else{
                                        echo 'Error get last created module';
                                    }
                                }else{
                                    echo 'Error get number var of template';
                                }

    //                             $Response = array ('response' => 'ok');

                                $theLast3 = $DAOModules->getLastModuleId();
                                if($theLast3[0] > 0){
                                    for($j = 0, $size = 12; $j < $size; $j+=3) {
                                        $NewModule = array('nombre_modulo'      => "vacio",
                                                           'descripcion_modulo' => "",
                                                           'id_template'        => 8,
                                                           'url_modulo'         => "General.php",
                                                           'nombre_icono'       => "promos.png",
                                                           'nivel_modulo'       => ($level+2),
                                                           'padre_modulo'       => $theLast3[0]['id']);
                                        $Module = $DAOModules->setModule($NewModule);
                                        if($Module[0] > 0){
                                            $VarNum = $DAOModules->getModulesTemplatesVariable(8);
                                            if($VarNum[0] > 0){
                                                $IdModule = $DAOModules->getLastModuleId();
                                                if($IdModule[0]['id'] > 0){
                                                    $cont = 0;
                                                    foreach ($VarNum as $var):
                                                        $NewModule = array('id_modulo'              => $IdModule[0]['id'],
                                                                           'id_template_variable'   => $var['id_template_variable'],
                                                                           'valor'                  => 'VDMlogo.png');
                                                        $Module = $DAOModules->setModuleContent($NewModule);
                                                        if($Module[0] > 0){
                                                            $cont++;
                                                        }else {
                                                            //echo 'ERROR MODCONT: '.$cont;
                                                        }
                                                    endforeach;
                                                    if($cont == count($VarNum)){
                                                        $mod2++;
                                                    }else{ }
                                                }else {
                                                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                              'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error IDMOD');
                                                }

                                            } else {
                                                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                              'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error NUMVAR');
                                            }
                                        }else{

                                        }
                                    }
                                    if($mod2 == 4){
                                        $mod++;
                                    }else{
                                        //echo 'jeje';
                                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                  'MessageDetail'   => $Language['MessageInsertIncorrect'].$mod2);
                                    }
                                }
    //**************************************************************************
//                            }else{
//                                $Response = array ('response' => 'null');
//                            }
                            
                        }
                    }
                    if($mod == (count($Child)/3)){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                              'MessageSummary'  => $Language['SummaryMessageType'][0],
                                              'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{
                        //echo 'jaja';
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect'].$mod);
                    }
                }else{
                    echo 'Not get Last'.$theLast[0]['id'];
                }
            }else{
                echo 'Error POST';
            }
            echo json_encode($Response);            
        break;
        
        case "DeleteModule":
            if(isset($_POST['DeleteModuleId'])){
                $TypeModule = $DAOModules->getModuleType($_POST['DeleteModuleId']);
                if($TypeModule[0] > 0){
                    if($TypeModule[0]['url_modulo'] == 'General.php'){
                        $Content = $DAOModules->deleteModuleContent($_POST['DeleteModuleId']);
                        if($Content[0] > 0){
                           $Module = $DAOModules->deleteModule($_POST['DeleteModuleId']);
                           if($Module[0] > 0){
                               $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                    'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                    'MessageDetail'   => $Language['MessageInsertCorrect']);
                           }else{
                               $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                           }
                        }else{
                            echo 'Error Content';
                        }
                    }else if($TypeModule[0]['url_modulo'] == 'Submenu.php'){
                        $cont = 0;
                        $allChild = $DAOModules->getAllFromFatherModule($_POST['DeleteModuleId']);
                        if($allChild[0] > 0){
                            foreach ($allChild as $child):
                                $allSecondChild = $DAOModules->getAllFromFatherModule($child['id_modulo']);
                                if($allSecondChild[0] > 0){
                                    foreach ($allSecondChild as $secondChild):
                                        $ContentSecond = $DAOModules->deleteModuleContent($secondChild['id_modulo']);
                                        if($ContentSecond[0] > 0){
                                            $Module = $DAOModules->deleteModule($secondChild['id_modulo']);
                                        }else{

                                        }
                                    endforeach;
                                }else {
                                    
                                }
                                $Content = $DAOModules->deleteModuleContent($child['id_modulo']);
                                if($Content[0] > 0){
                                    $Module = $DAOModules->deleteModule($child['id_modulo']);
                                    $cont++;
                                }else{

                                }
                            endforeach;
                            if($cont == count($allChild)){
                                $ModuleFather = $DAOModules->deleteModuleContent($_POST['DeleteModuleId']);
                                if($ModuleFather[0] > 0){
                                    $Module = $DAOModules->deleteModule($_POST['DeleteModuleId']);
                                    if($Module[0] > 0){
                                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                                             'MessageSummary'  => $Language['SummaryMessageType'][0],
                                                             'MessageDetail'   => $Language['MessageInsertCorrect']);
                                    }else{
                                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                                             'MessageSummary'  => $Language['SummaryMessageType'][2],
                                                             'MessageDetail'   => $Language['MessageInsertIncorrect']);
                                    }
                                }else{
                                    echo 'Error Delete father';
                                }
                            }else{
                                echo 'Error cont '.$cont;
                            }
                        }else{
                            echo 'Error Child delete';
                        }
                    }else{
                        echo 'NaN';
                    }
                }else{
                    echo 'Error Get Module Type';
                }
            }else{
                echo 'Error Data';
            }
            echo json_encode($Response);
        break;
        
        case "GetAllFromModule":
            if(isset($_POST['id_modulo'])){
                $Module = $DAOModules->getAllFromModule($_POST['id_modulo']);
                if($Module[0] > 0){
                    $Response = $Module;
                }else{
                    $Response = " Error getAllFromModule Function";
                }
            }else{
                //echo 'error post';
            }
            echo json_encode($Response);
        break;
        
        case "UpdateModule":
            if(isset($_POST['id_modulo']) && isset($_POST['padre_modulo']) && isset($_POST['nombre_modulo']) && isset($_POST['descripcion_modulo']) && isset($_POST['nombre_icono']) && isset($_POST['dataImages'])){
                $images = $_POST['dataImages'];
                $cont=0;
                $val = $_POST['id_modulo'] - $_POST['padre_modulo'];
                $values = array(
                                'nombre_modulo'         => $_POST['nombre_modulo'],
                                'descripcion_modulo'    => $_POST['descripcion_modulo'],
                                'nombre_icono'         => $_POST['nombre_icono']
                                );                 
                $Update = $DAOModules->updateModule($_POST['id_modulo'], $values);
                $idMod = $_POST['id_modulo']-$val;
                if($val == 1){
                   $UpdateNameVal = array('valor' => $_POST['nombre_modulo']);
                   $ModuleName = $DAOModules->updateModuleChildValues($idMod, 11, $UpdateNameVal);
                   $UpdateIconVal = array('valor' => $_POST['nombre_icono']);                   
                   $ModuleIcon = $DAOModules->updateModuleChildValues($idMod, 7, $UpdateIconVal);
                }else if($val == 2){
                   $UpdateNameVal = array('valor' => $_POST['nombre_modulo']);
                   $ModuleName = $DAOModules->updateModuleChildValues($idMod, 12, $UpdateNameVal);
                   $UpdateIconVal = array('valor' => $_POST['nombre_icono']);                   
                   $ModuleIcon = $DAOModules->updateModuleChildValues($idMod, 8, $UpdateIconVal); 
                }else if($val == 3){
                    $UpdateNameVal = array('valor' => $_POST['nombre_modulo']);
                   $ModuleName = $DAOModules->updateModuleChildValues($idMod, 13, $UpdateNameVal);
                   $UpdateIconVal = array('valor' => $_POST['nombre_icono']);                   
                   $ModuleIcon = $DAOModules->updateModuleChildValues($idMod, 9, $UpdateIconVal);
                }else if($val == 4){
                    $UpdateNameVal = array('valor' => $_POST['nombre_modulo']);
                   $ModuleName = $DAOModules->updateModuleChildValues($idMod, 14, $UpdateNameVal);
                   $UpdateIconVal = array('valor' => $_POST['nombre_icono']);                   
                   $ModuleIcon = $DAOModules->updateModuleChildValues($idMod, 10, $UpdateIconVal);
                }
                
                if(count($images) > 0){
                    if(count($images) == 1){
                        $idImg = $images['arrayImagesID'][0];
                        $contModule = array('valor' => $images['arrayImagesSRC'][$cont]);
                        $Module = $DAOModules->updateModuleValues($idImg, $contModule);
                    }else{
                        for(; $cont<count($images['arrayImagesID']); $cont++){
                            $idImg = $images['arrayImagesID'][$cont];
                            $contModule = array('valor' => $images['arrayImagesSRC'][$cont]);
                            $Module = $DAOModules->updateModuleValues($idImg, $contModule);
                        }
                    }
                    if($cont == count($images['arrayImagesID'])){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{ }
                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                              'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error IDMOD');
                }
            }else if(isset($_POST['id_modulo']) && isset($_POST['nombre_modulo']) && isset($_POST['descripcion_modulo']) && isset($_POST['nombre_icono'])){
                $values = array(
                                'nombre_modulo'         => $_POST['nombre_modulo'],
                                'descripcion_modulo'    => $_POST['descripcion_modulo'],
                                'nombre_icono'         => $_POST['nombre_icono']
                                ); 
                $Update = $DAOModules->updateModule($_POST['id_modulo'], $values);
                if($Update[0] > 0){
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                              'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            }else if(isset($_POST['id_modulo']) && isset($_POST['nombre_modulo']) && isset($_POST['descripcion_modulo']) && isset($_POST['nombre_icono']) && isset($_POST['dataImages'])){
                $images = $_POST['dataImages'];
                $cont=0;
                $values = array(
                                'nombre_modulo'         => $_POST['nombre_modulo'],
                                'descripcion_modulo'    => $_POST['descripcion_modulo'],
                                'nombre_icono'         => $_POST['nombre_icono']
                                ); 
                $Update = $DAOModules->updateModule($_POST['id_modulo'], $values);
                if(count($images) > 0){
                    for(; $cont<count($images['arrayImagesID']); $cont++){
                        $idImg = $images['arrayImagesID'][$cont];
                        $contModule = array('valor' => $images['arrayImagesSRC'][$cont]);
                        $Module = $DAOModules->updateModuleValues($idImg, $contModule);
                    }
                    if($cont == count($images['arrayImagesID'])){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{ }
                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                              'MessageSummary'  => $Language['SummaryMessageType'][2],
                              'MessageDetail'   => $Language['MessageInsertIncorrect'].'-> Error IDMOD');
                }
            }
            
            echo json_encode($Response);
        break;
    
    }
    
    