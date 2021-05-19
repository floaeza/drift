<?php
/* 
------------------
Language: Español
------------------
*/

$Language = array();
/* GENERALES */
    // OPTION
    $Language['OptionMessageType']           = array ('info', 'warn', 'error');
    // SUMMARY [DECLARACION OPCIONES PARA MOSTRAR MENSAJES DE COLORES, NOTA[NO TIENE TRADUCCION, YA QUE ES UNA PROPIEDAD DE PRIMERUI]
    $Language['SummaryMessageType']          = array ('Info:', 'Advertencia:', 'Error:');
    // BOTONES
    $Language['LabelButtonAccept']           = 'Aceptar';
    $Language['LabelButtonCancel']           = 'Cancelar';
    $Language['LabelButtonClear']            = 'Limpiar';
    $Language['LabelButtonAdd']              = 'Agregar';
    // MENSAJE VALIDACION FORMULARIO INPUTS GENERAL
    // DETAIL
    $Language['MessageInputsValidate']       = 'Introduzca los datos de los campos requeridos';
    $Language['MessageInsertCorrect']        = 'Se han guardado correctamente sus datos';
    $Language['MessageInsertIncorrect']      = 'Ha ocurrido un error al intentar guardar sus datos';

/* INDEX */

    // ETIQUETAS FOMULARIO
    $Language['LabelInputEmail']             = 'Correo electronico';
    $Language['LabelInputPass']              = 'Contraseña';
    $Language['LabelButtonLogin']            = 'Iniciar sesion';

    // DETAIL
    $Language['MessageLoginIncorrect']       = 'Datos incorrectos, intente de nuevo';
    $Language['MessageLoginEnable']          = 'Inicio de sesion correcto';
    $Language['MessageLoginDisable']         = 'Su cuenta a sido dado de baja, contacte a su administrador';
    $Language['MessageLoginSuspend']         = 'Su cuenta a sido suspendida, contacte a su administrador';
    
    // VALIDAR INPUTS LOGIN
    $Language['MessageInputEmail']           = 'Introduzca un correo electronico valido';
    $Language['MessageInputPass']            = 'Introduzca su contraseña';

/* ACCOUNTS */
    // ETIQUETAS GENERALES
    $Language['LabelPlaceHolderFilter']      = 'Busqueda general';
    $Language['LabelCaptionDatatable']       = 'Lista de usuarios';
    $Language['LabelEmptyMessage']           = 'No hay registros';
    $Language['LabelTabUserList']            = 'Listar usuarios';
    $Language['LabelTabCreateUser']          = 'Crear usuario';
    $Language['LabelTabEditUser']            = 'Editar usuario';
    $Language['LabelTabDeleteUser']          = 'Eliminar usuario';
    $Language['LabelTitleSubmenu']           = 'Usuarios';
    $Language['LabelTitleMenu']              = 'Cuentas';
    $Language['LabelHeaderFormUser']         = 'Nuevo usuario';
    $Language['LabelHeaderFormEditUser']     = 'Editar usuario';

    // ETIQUETAS FORMULARIO NUEVO USUARIO
    $Language['LabelUserName']               = 'Nombre:';
    $Language['LabelUserLastNameF']          = 'Apellido paterno:';
    $Language['LabelUserLastNameM']          = 'Apellido materno:';
    $Language['LabelUserEmail']              = 'Correo:';
    $Language['LabelUserPass']               = 'Contraseña:';
    $Language['LabelUserProfile']            = 'Perfil:';
    
    // MENSAJES VALIDACION DE INPUTS
    $Language['MessageInputUserName']       = 'Introduzca su nombre';
    $Language['MessageInputLastNameF']      = 'Introduzca su apellido';
    $Language['MessageInputLastNameM']      = 'Introduzca su apellido';
    $Language['MessageInputUserEmail']      = 'Introduzca un correo electronico correcto';
    $Language['MessageInputUserPass']       = 'Introduzca su contraseña';
    $Language['MessageInputLenghtPass']     = 'Su contraseña es muy corta';
    
    // MENSAJES FORMULARIOS
    // DETAIL
    // MENSAJE NUEVO USUARIO
    $Language['MessageNewFormInfo']         = 'Se ha creado correctamente el usuario';
    $Language['MessageNewFormError']        = 'Se ha producido un error al intentar crear un usuario';
    // MENSAJE EDITAR USUARIO INHABALITADO
    $Language['MessageDisableUser']         = 'El usuario no puede ser editado porque ya ha sido inhabilitado del sistema';
    // MENSAJE SELECCIONAR USUARIO
    $Language['MessageSelectUser']          = 'Seleccione un usuario de la tabla para continuar';
    // MENSAJE EDITAR USUARIO
    $Language['MessageEditActiveUser']      = 'No puede editar la informacion del usuario en sesion';

/* DEVICES */
    // ETIQUETAS ACTUALIZACION DE FIRMWARE
    $Language['LabelHeaderDevices']         = 'Actualizar firmware';
    $Language['LabelStepOne']               = 'Paso 1:';
    $Language['LabelStepTwo']               = 'Paso 2:';
    $Language['LabeInstructionsOne']        = 'Introduzca la direccion IP del dispositivo que desee actualizar, seleccione el sistema que desee y presione el boton "agregar"';
    $Language['LabeInstructionsTwo']        = 'Presione el boton de actualizar para realizar los cambios';
    $Language['MessageInputIpDevice']       = 'Introduzca una direccion IP valida';
    $Language['LabelButtonUpgrade']         = 'Actualizar';
    // MENSAJE VALIDACION INPUT
    $Language['MessageInputIpDeviceValid']  = 'Introduzca una direccion IP valida';
    
/* TEXTO PARA GENERAR LOGS DE LOS MENUS Y SUBMENUS */
  /* NOTA A:
     1 = CREAR - INSERT
     2 = EDITAR - UPDATE
     3 = ELIMINAR - DELETE
     NOTA B:
     1 = INFO
     2 = WARN
     3 = ERROR */
    
    // Tipo de advertencias
    $Language['LabelTypeAdvert']            = array('1'=>'info', '2'=>'warn', '3'=>'error');
    // Accounts
    $Language['LabelAccountsLog']        = 'Creo al usuario';
    $Language['LabelAccountsLog']        = 'Edito al usuario';
    $Language['LabelAccountsLog']        = 'Elimino al usuario';
    // Menus
    $Language['LabelMenusLog']           = 'Creo el menu';
    $Language['LabelMenusLog']           = 'Edito el menu';
    $Language['LabelMenusLog']           = 'Elimino el menu';
    // Submenus
    // Television