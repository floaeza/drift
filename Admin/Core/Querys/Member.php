<?php

$DirectoryLog = '';
/*
------------------
Language: Español
------------------
*/

$Language = array();
/* GENERALES */
// OPTION
$Language['OptionMessageType'] = array('info', 'warn', 'error');
// SUMMARY [DECLARACION OPCIONES PARA MOSTRAR MENSAJES DE COLORES, NOTA[NO TIENE TRADUCCION, YA QUE ES UNA PROPIEDAD DE PRIMERUI]
$Language['SummaryMessageType'] = array('info', 'Advertencia', 'Error');
// BOTONES
$Language['LabelButtonAccept'] = 'Aceptar';
$Language['LabelButtonCancel'] = 'Cancelar';
$Language['LabelButtonClear'] = 'Limpiar';
$Language['LabelButtonDelete'] = 'Eliminar';
$Language['LabelButtonClose'] = 'Cerrar';
$Language['LabelButtonNext'] = 'Siguiente';
$Language['LabelButtonAdvanced'] = 'Avanzado';
$Language['LabelButtonReturn'] = 'Anterior';
$Language['LabelButtonAdd'] = 'Agregar IP';
$Language['LabelButtonRestart'] = 'Reiniciar dispositivo';
$Language['LabelButtonRT'] = 'Reiniciar todos los dispositivos';
$Language['LabelButtonQuit'] = 'Quitar dispositivo asociado';
$Language['LabelButtonChangeLocation'] = 'Cambiar ubicacion de dispositivo';
$Language['LabelButtonPC'] = 'Administrar control parental del dispositivo';
$Language['LabelWaitAMoment'] = 'Por favor espere...';
$Language['LabelButtonSend'] = 'Enviar';
$Language['LabelButtonCreateEPG'] = 'Crear Archivo EPG para el paquete seleccionado';
// MENSAJE VALIDACION FORMULARIO INPUTS GENERAL
// DETAIL
$Language['MessageInputsValidate'] = 'Introduzca los datos de los campos requeridos';
$Language['MessageInsertCorrect'] = 'Se han guardado correctamente sus datos';
$Language['MessageInsertCorrectPC'] = 'Se han guardado correctamente sus datos,<br><b>Es necesario reiniciar el dispositivo para que se reflejen los cambios.</b>';

$Language['MessageInsertIncorrect'] = 'Ha ocurrido un error al intentar guardar sus datos';
$Language['MessageInsertIncorrectDeletePackage'] = 'No se puede eliminar el paquete seleccionado debido a que este se encuentra asignado a un residencia.';

//LOADER
$Language['ChargeMessage'] = 'Espere por favor...';

/* INDEX */

// ETIQUETAS FOMULARIO
$Language['LabelInputEmail'] = 'Correo electronico';
$Language['LabelInputPass'] = 'Contraseña';
$Language['LabelButtonLogin'] = 'Iniciar sesion';

// DETAIL
$Language['MessageLoginIncorrect'] = 'Datos incorrectos, intente de nuevo';
$Language['MessageLoginEnable'] = 'Inicio de sesion correcto';
$Language['MessageLoginDisable'] = 'Su cuenta a sido dado de baja, contacte a su administrador';
$Language['MessageLoginSuspend'] = 'Su cuenta a sido suspendida, contacte a su administrador';

// VALIDAR INPUTS LOGIN
$Language['MessageInputEmail'] = 'Introduzca un correo electronico valido';
$Language['MessageInputPass'] = 'Introduzca su contraseña';

/* ACCOUNTS */
// ETIQUETAS GENERALES
$Language['LabelPlaceHolderFilter'] = 'Búsqueda general';
$Language['LabelCaptionDatatable'] = 'Lista de usuarios';
$Language['LabelEmptyMessage'] = 'No hay registros';
$Language['LabelTabUserList'] = 'Listar usuarios';
$Language['LabelTabCreateUser'] = 'Crear usuario';
$Language['LabelTabEditUser'] = 'Modificar usuario';
$Language['LabelTabDeleteUser'] = 'Eliminar usuario';
$Language['LabelSubListUsers'] = 'Ver todos los registros';
$Language['LabelSubCreateUser'] = 'Ingrese un nuevo registro';
$Language['LabelTitleSubmenu'] = 'Usuarios';
$Language['LabelHelpUser'] = 'Ayuda';

//SUBMENUS DE PANELES
$Language['LabelSubTitleSubmenu'] = 'Administre todos los usuarios del sistema';
$Language['LabelSubTitleSubmenuMember'] = 'Administre todos los residencias del sistema';
$Language['LabelSubTitleSubmenuChannel'] = 'Administre todos los canales del sistema';
$Language['LabelSubTitleSubmenuStation'] = 'Administre todas las estaciones del sistema';
$Language['LabelSubTitleSubmenuPackages'] = 'Administre todos los paquetes del sistema';
$Language['LabelSubTitleSubmenuFirmware'] = 'Administre firmware de los dispositivos';

$Language['LabelSubEditUser'] = 'Edite el registro seleccionado';
$Language['LabelSubDeleteUser'] = 'Inhabilite el registro seleccionado';
$Language['LabelTitleSubmenu2'] = 'Residencias';
$Language['LabelTitleMenu'] = 'Cuentas';
$Language['LabelHeaderFormUser'] = 'Datos del nuevo usuario';
$Language['LabelHeaderFormEditUser'] = 'Editando al usuario:';
$Language['LabelSelectAvatar'] = 'Seleccione un avatar';
$Language['LabelSelectIconStation'] = 'Seleccione una imagen';
$Language['LabelSelectIcon'] = 'Imagen: ';
$Language['LabelUserAvatar'] = 'Avatar:';

//ETIQUETAS PAQUETES
$Language['LabelHeaderFormEditPackages'] = 'Editar paquete';
$Language['LabelHeaderFormEditPackages2'] = 'Editando paquete';
$Language['LabelTabDeletePackages'] = 'Eliminar paquete';
$Language['LabelHeaderFormListPackages'] = 'Listar paquetes';
$Language['LabelSubEditPackages'] = 'Editar paquete seleccionado';
$Language['LabelSubDeletPackages'] = 'Eliminar paquete seleccionado';
$Language['LabelSubCreatePackages'] = 'Cree un nuevo paquete';
$Language['LabelHeaderFormPackagesT'] = 'Crear paquete';
$Language['LabelHeaderFormPackages1'] = 'Paso 1: Ingrese los datos del paquete y seleccione las estaciones a incluir.';
$Language['LabelHeaderFormPackages2'] = 'Paso 2: Ingrese el numero de canal a cada una de las estaciones seleccionadas para el paquete o indique el inicio del conteo para una asignacion automatica';
$Language['LabelHeaderFormPackagesStep2'] = 'Canales';
$Language['LabelSubListPackages'] = 'Paquetes';
$Language['LabelTitleSubmenuPackages'] = 'Administración de paquetes';
$Language['LabelTextChannelList'] = 'Seleccione un paquete para ver los canales asociados.';

//LOGS
$Language['LabelTitleSubmenuLogs'] = 'Logs del sistema';
$Language['LabelSubTitleSubmenuLogs'] = 'Logs de acciones creadas en el sistema';
$Language['LabelButtonCleanFilter'] = 'Borrar';


//ETIQUETAS PROPIETARIOS
$Language['LabelTabMemberList'] = 'Listar Residencias';//MBN
$Language['LabelTabCreateMember'] = 'Agregar Residencias';//MBN
$Language['LabelTabEditMember'] = 'Modificar Miembro';//MBN
$Language['LabelTabDeleteMember'] = 'Eliminar Miembro';//MBN
$Language['LabelSubListMember'] = 'Ver todos las residencias';//MBN
$Language['LabelSubCreateMember'] = 'Registro de nuevas residencias';//MBN
$Language['LabelSubEditMember'] = 'Edite residencia seleccionado';//MBN
$Language['LabelHeaderFormEditMember'] = 'Editando Miembro';//MBN
$Language['LabelSubDeleteMember'] = 'Inhabilite residencia seleccionado';//MBN
$Language['LabelMember'] = 'Miembro';//MBN
$Language['LabelButtonAdvancedDescribe'] = 'Habilitar edicion del codigo de residencia';
$Language['LabelButtonAdvancedCancelDescribe'] = 'Cancelar edicion del codigo de residencia';

//ETIQUETAS LOCACIONES
$Language['LabelSubEditLocation'] = 'Edite residencia seleccionado';//MBN
$Language['LabelHeaderFormLocation'] = 'Nuevo Miembro';//MBN
$Language['LabelTabLocationList'] = 'Listar Residencias';//MBN
$Language['LabelTabChargeLocations'] = 'Agregar residencias';//MBN
$Language['LabelTabEditLocation'] = 'Modificar residencia';//MBN
$Language['LabelTabViewDevices'] = 'Dispositivos';
$Language['LabelTabSubViewDevices'] = 'Ver dispositivos del residencia';
$Language['LabelSubListLocations'] = 'Ver residencias';//MBN
$Language['LabelSubChargeLocations'] = 'Ingrese nuevas residencias';//MBN
$Language['LabelHeaderFormEditLocation'] = 'Editando Locación';//MBN
$Language['LabelLocation'] = 'Locación';//MBN

// ETIQUETAS FORMULARIO NUEVO USUARIO
$Language['LabelUserName'] = 'Nombre:';
$Language['LabelUserLastNameF'] = 'Apellido paterno:';
$Language['LabelUserLastNameM'] = 'Apellido materno:';
$Language['LabelUserEmail'] = 'Correo:';
$Language['LabelUserPass'] = 'Contraseña:';
$Language['LabelUserProfile'] = 'Perfil:';
$Language['LabelUserStatus'] = 'Estatus:';

// ETIQUETAS FORMULARIO NUEVO MIEMBRO
$Language['LabelMemberTitle'] = 'Titulo:';
$Language['LabelMemberName'] = 'Nombre:';
$Language['LabelMemberLastNameF'] = 'Apellido paterno:';
$Language['LabelMemberLastNameM'] = 'Apellido materno:';
$Language['LabelMemberEmail'] = 'Correo:';
$Language['LabelMemberCode'] = 'Codigo:';

// ETIQUETAS FORMULARIO NUEVO PAQUETE
$Language['LabelPackagesName'] = 'Nombre del paquete:';
$Language['LabelPackagesDescription'] = 'Descripción del paquete:';
$Language['LabelTabChannelsPackages'] = 'Números de canales';
$Language['LabelSubChannelsPackages'] = 'Habilite los canales';
$Language['LabelButtonAddChannels'] = 'Cargar';

//ETIQUETAS ESTACION
$Language['LabelNumStation'] = 'Estación:';
$Language['LabelNameStation'] = 'Nombre de la estación:';
$Language['LabelIndicativeStation'] = 'Indicativo:';

// ETIQUETAS FORMULARIO NUEVA LOCACION

$Language['LabelLocationCode'] = 'Código Miembro:';
$Language['LabelLocationStatus'] = 'Regla de estado de la locación:';
$Language['LabelLocationPassword'] = 'Contraseña:';
$Language['LabelLocationDirection'] = 'Dirección:';
$Language['LabelLocationDescription'] = 'Descripción:';
$Language['LabelLocationModule'] = 'Módulo inicial para BBINCOTV:';
$Language['LabelLocationType'] = 'Tipo locación:';
$Language['LabelLocationPropierty'] = 'Código del propietario:';
$Language['LabelLocationTypeDescription'] = 'Descripción del tipo de locación:';
$Language['SearchMember'] = 'Buscar por código de residencia';

// MENSAJES VALIDACION DE INPUTS
$Language['MessageInputUserName'] = 'Introduzca su nombre';
$Language['MessageInputLastNameF'] = 'Introduzca su apellido';
$Language['MessageInputLastNameM'] = 'Introduzca su apellido';
$Language['MessageInputUserEmail'] = 'Introduzca un correo electronico correcto';
$Language['MessageInputUserPass'] = 'Introduzca su contraseña';
$Language['MessageInputLenghtPassGeneral'] = 'Su contraseña es muy corta';

// MENSAJES VALIDACION DE INPUTS MIEMBROS
$Language['MessageInputMemberTitle'] = 'Introduzca un titulo para el nuevo propietario';
$Language['MessageInputMemberName'] = 'Introduzca el nombre del nuevo propietario';
$Language['MessageInputMemberLastNameF'] = 'Introduzca el primer apellido del propietario';
$Language['MessageInputMemberLastNameM'] = 'Introduzca el segundo apellido del propietario';
$Language['MessageInputMemberEmail'] = 'Introduzca un correo electronico correcto';
$Language['MessageInputMemberCode'] = 'Introduzca su Member Code';

//MENSAJES DE VALIDACION DE INPUTS
$Language['MessageInputMulticast'] = 'Introduzca dirección multicast'; //
$Language['MessageInputPort'] = 'Introduzca puerto';

//MENSAJES DE VALIDACION DE INPUTS PAQUETES
$Language['MessageInputPackagesName'] = 'Introduzca un nombre para el paquete';
$Language['MessageInputPackagesDescription'] = 'Describa las caracteristicas del paquete';
$Language['MessageInputPackagesChannels'] = 'Seleccione los canales que perteneceran al paquete';
$Language['MessageInputPackagesChannelsBeans'] = 'Indique el inicio del conteo';

// MENSAJES VALIDACION DE INPUTS LOCACION

$Language['MessageInputLocationKey'] = 'Introduzca la clave de la locación';
$Language['MessageInputLocationCode'] = 'Introduzca el codigo de la locación';
$Language['MessageInputLocationStatusId'] = 'Introduzca el estado inicial de la locación';
$Language['MessageInputLocationPassword'] = 'Introduzca la contraseña de la locación';
$Language['MessageInputLenghtPass'] = 'Introduzca al menos 4 caracteres';
$Language['MessageInputLocationDirection'] = 'Introduzca la dirección de la locación';
$Language['MessageInputLocationDescription'] = 'Introduzca la descripción de la locación';
$Language['MessageInputLocationModule'] = 'Introduzca el módulo en el que desee que el sistema arranque';
$Language['MessageInputLocationType'] = 'Introduzca un tipo de locacion';
$Language['MessageInputLocationService'] = 'Seleccione los servicios que activara';
$Language['MessageInputLocationPropierty'] = 'Introduzca el codigo del propietario';
$Language['MessageInputLocationTypeDescription'] = 'Seleccione una descripción para la locacion';
$Language['MessageInputTitleMember'] = 'Introduzca el titulo de el residencia';


//MENSAJES DE VALIDACION NUEVA VENTANA PROPIETARIOS

$Language['MessageCodeLocation'] = 'Introduzca el codigo de locacion';
$Language['MessageCodeMemberLocation'] = 'Introduzca el codigo de residencia';
$Language['MessageTitleMemberLocation'] = 'Introduzca el titulo de residencia';
$Language['MessageNameMemberLocation'] = 'Introduzca el nombre de residencia';
$Language['MessageLastNameLocation'] = 'Introduzca el apellido de residencia';
$Language['MessageMailMemberLocation'] = 'Introduzca el correo de residencia';
$Language['MessageProgramingMember'] = 'Introduzca el paquete de el residencia';
$Language['LabelMemberInstructions'] = 'Llene cada uno de los campos del formulario';
$Language['LabelLocationInstructions'] = 'Ahora por favor indica su locación.';


// MENSAJES FORMULARIOS
// DETAIL
// MENSAJE NUEVO USUARIO
$Language['MessageNewFormInfo'] = 'Se ha creado correctamente el usuario';
$Language['MessageNewFormError'] = 'Se ha producido un error al intentar crear un usuario';
$Language['MessageNewFormInfo'] = 'Se ha creado correctamente el usuario';
$Language['MessageNewFormError'] = 'Se ha producido un error al intentar crear un usuario';
// MENSAJE EDITAR USUARIO INHABALITADO
$Language['MessageDisableUser'] = 'El usuario no puede ser editado o eliminado porque ya ha sido inhabilitado del sistema';
// MENSAJE EDITAR MIEMBRO INHABALITADO
$Language['MessageDisableMember'] = 'El propietario no puede ser editado o eliminado porque ya ha sido inhabilitado del sistema';
// MENSAJE SELECCIONAR USUARIO
$Language['MessageSelectUser'] = 'Seleccione un usuario de la tabla para continuar';

// MENSAJE SELECCIONAR LOCACION
$Language['MessageSelectLocation'] = 'Seleccione una locacion de la tabla para continuar';
// MENSAJE SELECCIONAR MIEMBRO
$Language['MessageSelectMember'] = 'Seleccione un propiertario de la tabla para continuar';

$Language['MessageSelectDispositive'] = 'Seleccione un dispositivo de la tabla para continuar';
// MENSAJE SELECCIONAR PAQUETE
$Language['MessageSelectPackage'] = 'Seleccione un paquete de la tabla para continuar';
$Language['MessageBeanPackage'] = 'Indique los numeros de canales a asignar, o indique un punto de partida para la asignacion automatica. <b>Los numeros de canal no deben repetirse</b>';

// MENSAJE EDITAR USUARIO
$Language['MessageEditActiveUser'] = 'No puede editar la informacion del usuario en sesion';

/* FIRMWARE */
// ETIQUETAS ACTUALIZACION DE FIRMWARE
$Language['LabelHeaderFirmware'] = 'Actualización firmware';
$Language['LabelStepOne'] = 'Paso 1:';
$Language['LabelStepTwo'] = 'Paso 2:';
$Language['LabelInstructionsOne'] = 'Introduzca el IDMember, las direcciones IP y seleccione el firmware que desee instalar ';
$Language['LabelInstructionsTwo'] = 'Presione el boton de actualizar para realizar los cambios';
$Language['MessageInputIpDevice'] = 'Introduzca una dirección IP valida';
$Language['LabelButtonUpgrade'] = 'Actualizar';
$Language['LabelButtonClear'] = 'Limpiar';
$Language['LabelButtonNext'] = 'Siguiente';
$Language['LabelFirmwareMember'] = 'Miembro: ';
$Language['LabelIpDirection'] = 'Dirección IP: ';
$Language['LabelMiddlewareOption'] = 'Middleware: ';
$Language['MessageSelectIP'] = 'La dirección IP ingresada ya esta cargada a la lista de actualización';

// MENSAJE VALIDACION INPUT
$Language['MessageInputIpDeviceValid'] = 'Introduzca una dirección IP valida';
$Language['MessageInputIDMember'] = 'Indique el propietario de los dispositivos';
$Language['MessageListDeviceValidate'] = 'Falta agregar dispositivos a la lista de actualización';
/* TEXTO PARA GENERAR LOGS DE LOS USUARIOS */
// A = INFO
// B = WARN
// C = ERROR

// Accounts
// Ejecucion correcta -- INFO
$Language['LabelAccountsLogCreateA'] = 'User created correctly: ';
$Language['LabelAccountsLogEditA'] = 'User edited correctly: ';
$Language['LabelAccountsLogDeleteA'] = 'User successfully deleted: ';
// Ejecicion incorrecta -- WARN
$Language['LabelAccountsLogCreateB'] = 'Warning error when creating user: ';
$Language['LabelAccountsLogEditB'] = 'Warning error when editing user: ';
$Language['LabelAccountsLogDeleteB'] = 'Failed to delete user: ';

//ejecucion iincorrecta --ERROR

$Language['LabelAccountsLogCreateC'] = 'Error to create user: ';
$Language['LabelAccountsLogEditC'] = 'Error to Edit user: ';
$Language['LabelAccountsLogDeleteC'] = 'Error to delete user: ';


// Menus
// Submenus
// Television
// Locaciones
$Language['LabelAccountsLogCreateLocationA'] = 'location created correctly :';
$Language['LabelAccountsLogCreateLocationB'] = 'There was an error creating the location :';


//Paquetes
$Language['LabelAccountsLogCreatePackagesA'] = 'Package created correctly: ';
$Language['LabelAccountsLogEditPackagesA'] = 'Package edited correctly: ';
$Language['LabelAccountsLogDeletePackagesA'] = 'Package successfully deleted: ';

$Language['LabelAccountsLogCreatePackagesB'] = 'There was an error creating the package: ';
$Language['LabelAccountsLogEditPackagesB'] = 'There was an error editing the package: ';
$Language['LabelAccountsLogDeletePackagesB'] = 'Failed to delete Package: ';
//CANALES
$Language['LabelAccountsLogCreateChannelA'] = 'Channel created correctly: ';
$Language['LabelAccountsLogEditChannelA'] = 'Channel edited correctly: ';
$Language['LabelAccountsLogDeleteChannelA'] = 'Channel successfully deleted: ';

$Language['LabelAccountsLogCreateChannelB'] = 'There was an error creating the channel: ';
$Language['LabelAccountsLogEditChannelB'] = 'There was an error editing the channel: ';
$Language['LabelAccountsLogDeleteChannelB'] = 'Failed to delete channel: ';
//Estaciones
$Language['LabelAccountsLogCreateStationA'] = 'Station created correctly: ';
$Language['LabelAccountsLogEditStationA'] = 'Station edited correctly: ';
$Language['LabelAccountsLogDeleteStationA'] = 'Station successfully deleted: ';

$Language['LabelAccountsLogCreateStationB'] = 'There was an error creating the station: ';
$Language['LabelAccountsLogEditStationB'] = 'There was an error editing the station: ';
$Language['LabelAccountsLogDeleteStationB'] = 'Failed to delete station: ';

//Residencias
//info
$Language['LabelAccountsLogCreateMemberA'] = 'Member created correctly: ';
$Language['LabelAccountsLogEditMemberA'] = 'Member edited correctly: ';
$Language['LabelAccountsLogDeleteMemberA'] = 'Member successfully deleted: ';
//warn
$Language['LabelAccountsLogCreateMemberB'] = 'Warning error creating the member: ';
$Language['LabelAccountsLogEditMemberB'] = 'Warning error editing the member: ';
$Language['LabelAccountsLogDeletedMemberB'] = 'Failed to delete member: ';
//error
$Language['LabelAccountsLogCreateMemberC'] = 'Error creating the member: ';
$Language['LabelAccountsLogEditMemberC'] = 'Error editing the member: ';
$Language['LabelAccountsLogDeletedMemberC'] = 'Error to delete member: ';
////


$Language['LabelAccountsLogRestartDeviceA'] = 'Device restarted correctly';
$Language['LabelAccountsLogRemoveDeviceA'] = 'Remove successfully Device';
$Language['LabelAccountsLogAssignedDeviceA'] = 'Assigned Device correctly';

$Language['LabelAccountsLogRestartDeviceB'] = 'Tried to Device restart';
$Language['LabelAccountsLogRemoveDeviceB'] = 'Tried to Remove Device';
$Language['LabelAccountsLogAssignedDeviceB'] = 'Tried to Assigned Device';
//Upgrade System Amino NO SE PUEDE
$Language['LabelAccountsLogUpdateDeviceA'] = 'Updated Device ';

$Language['LabelAccountsLogUpdateDeviceB'] = 'Error Update Device';

$Language['LabelAccountsLogUpdateDeviceC'] = 'Tried to Update Device Restart';
$Language['LabelDescriptionMember'] = 'Miembro: ';


/* CHANNEL */
$Language['LabelTabDeleteChannel'] = 'Eliminar canal';
$Language['MessageSelectChannel'] = 'Seleccione un canal de la tabla para continuar';
$Language['LabelSubDeleteChannel'] = 'Inhabilite el canal seleccionado';
$Language['LabelSubListChannel'] = 'Lista de canales';
$Language['LabelSubCreateChannel'] = 'Ingrese un nuevo canal';
$Language['LabelSubEditChannel'] = 'Edite el canal seleccionado';
$Language['LabelTitleSubmenuChannel'] = 'Canales';
$Language['LabelHeaderFormChannel'] = 'Nuevo Canal';
$Language['LabelHeaderFormSubChannel'] = 'Editar canal';
$Language['LabelHeaderFormListChannel'] = 'Listar canales';
$Language['LabelHeaderFormChannel'] = 'Crear canal';
$Language['LabelPackagesChannels'] = 'Seleccione los canales:';
$Language['LabelPackagesChannelsBeans'] = 'Indique el inicio del conteo:';
$Language['FindChannels'] = 'Buscar canales...';
$Language['LabelHeaderFormEditChannel'] = 'Editando canal';
// ETIQUETAS FORMULARIO EDITAR CANAL

$Language['LabelEditDirectionMulti'] = 'Dirección multicast:';
$Language['LabelEditPort'] = 'Puerto:';
$Language['LabelEditStation'] = 'Estación:';
$Language['LabelChannelName'] = 'Dirección multicast:';
$Language['LabelChannelPuert'] = 'Puerto:';
$Language['LabelChannelStation'] = 'Estación:';

/* ESTACION*/
$Language['LabelTabDeleteStation'] = 'Eliminar estación'; //stations
/* STATIONS CREADAS POR BAILON*/
$Language['LabelSubCreateStationTribune'] = 'Seleccione una estación'; // Stations
$Language['LabelSubCreateStation'] = 'Ingrese una nueva estación'; // Stations
$Language['LabelSubEditStation'] = 'Edite la estación seleccionada'; //stations
$Language['LabelSubDeleteStation'] = 'Inhabilite la estación seleccionada'; //stations
$Language['LabelTitleSubmenuStation'] = 'Estaciones'; // Stations
$Language['LabelSubListStation'] = 'Lista de estaciones'; // Stationa
$Language['LabelHeaderFormEditStation'] = 'Editar estación'; // stations
$Language['LabelHeaderFormListStation'] = 'Listar estación'; // Stations
$Language['LabelHeaderFormListStationTribune'] = 'Seleccionar de tribune'; // Stations
$Language['LabelHeaderFormStation'] = 'Crear estación local'; // Stations
$Language['LabelHeaderFormStationTribune'] = 'Agregar estación de tribune'; // Stations
$Language['ErrorTribuneDirectory'] = 'Error al intentar abrir: ';
// MENSAJE SELECCIONAR ESTACION
$Language['MessageSelectStation'] = 'Seleccione una estación de la tabla para continuar';
$Language['MessageInputStation'] = 'Seleccione una estación';
$Language['MessageInputNumStation'] = 'Introduzca la estación';
$Language['MessageInputNameStation'] = 'Introduzca el nombre de estación';
// ETIQUETAS FORMULARIO EDITAR ESTACION
$Language['LabelEditNumStation'] = 'Numero de la estación:';
$Language['LabelEditNameStation'] = 'Nombre de la estación:';
$Language['LabelEditNameIndicative'] = 'Indicativo:';
$Language['LabelHeaderFormEditStations'] = 'Editando estación';
$Language['MessageInputLastNameIndicative'] = 'Introduzca indicativo';

//LISTADO DE DISPOSITIVOS
$Language['LabelHeaderDevices'] = 'Dispositivos';
$Language['LabelSubHeaderDevices'] = 'Dispositivos disponibles para asignacion';
$Language['LabelTabDevicesList'] = 'Lista de dispositivos';
$Language['LabelTabSubDevicesList'] = 'Ver Dispositivos disponibles.';
$Language['LabelTabAssingDevices'] = 'Asignar este dispositivo';
$Language['LabelTabDetailDevices'] = 'Ver detalle';
$Language['LabelSubTabDetailDevices'] = 'Muestra información especifica';
$Language['LabelTabRestartDevices'] = 'Reiniciar';
$Language['LabelSubTabRestartDevices'] = 'Reinicia el dispositibo seleccionado';
$Language['LabelSubTabAssingDevices'] = 'Ligar dispositivo con un residencia';
$Language['LabelMemberCode'] = 'Codigo del residencia: ';
$Language['LabelMemberOptionList'] = 'Seleccione un residencia';
$Language['LabelHeaderFormSelectDevice'] = 'Selección multiple al mantener seleccionada "Ctrl".';
$Language['LabelHeaderFormAssingDevice'] = 'Seleccione el residencia al cual se asignaran los dispositivos';
$Language['LabelListSelectedDevices'] = 'Los siguientes dispositivos se ligaran con el residencia que selecciones: ';
$Language['MessageSelectDevices'] = 'Seleccione por lo menos un dispositivo de la tabla para continuar';
$Language['MessageSelectDeviceAvailable'] = 'El dispositivo seleccionado ya se encuentra asignado';

$Language['LabelMemberCodeModal'] = 'CODIGO MIEMBRO: ';
$Language['LabelMemberModal'] = 'MIEMBRO: ';
$Language['LabelMailModal'] = 'CORREO: ';
$Language['LabelContentModal'] = 'Detalles del dispositivo: ';
$Language['LabelIpModal'] = 'DIRECCIÓN IP: ';
$Language['LabelLocationModal'] = 'UBICACIÓN: ';
$Language['LabelStatusModal'] = 'ESTADO: ';

$Language['LabelHeaderFormDispositives'] = 'Dispositivos';
$Language['LabelHeaderFormListDispositives'] = 'Listar dispositivos';
$Language['LabelSubListDispositives'] = 'Lista de dispositivos';

$Language['LabelHeaderFormListDispositivesRestart'] = 'Reiniciar dispositivo';
$Language['LabelSubListDispositivesRestart'] = 'Reinicio  de dispositivos';
$Language['LabelHeaderFormDispositivesR'] = 'Reiniciar dispositivos ';

$Language['LabelTitleDevicesPanel'] = 'Administración de los dispositivos';
$Language['LabelInstructionsPrincipalPanel'] = 'Seleccione un dispositivo de la lista para habilitar las opciones especificas, o use las opciones generales del panel de botones inferior.';
$Language['LabelInstructionsLimboPanel'] = 'Seleccione un dispositivo de la lista y presione +Agregar para indicar el residencia al que se asignara el dispositivo';
$Language['MessageDevicesValidate'] = 'No se ha seleccionado ningun dispositivo';

//CONTENIDO MULTIMEDIA
$Language['LabelHeaderMultimedia'] = 'Media';
$Language['LabelSubHeaderMultimedia'] = 'Contenido multimedia';
$Language['LabelTabMultimediaList'] = 'Lista de contenido';
$Language['LabelTabSubMultimediaList'] = 'Ver contenido multimedia';
$Language['LabelUploadNewMultimedia'] = 'Subir imagen:';
//iconos
$Language['LabelSubHeaderIcon'] = 'Iconos';
$Language['LabelTabSubIconList'] = 'Ver Iconos subidos';
$Language['LabelUploadNewIcon'] = 'Subir icono:';

//CREACION DE MODULOS

$Language['LabelHeaderModules'] = 'Creación de módulos';
$Language['LabelSubHeaderModules'] = 'Información a mostrar en el front end';
$Language['StepOne'] = 'Selección de elementos';
$Language['StepOneDescription'] = 'Asigne los elementos pincipales al nuevo módulo';
$Language['StepOneLong'] = 'Selección de elementos principales para la creacion de modulos nuevos';
$Language['StepOneDescriptionLong'] = 'Especifique los elementos pincipales que distinguirán al modulo que esta por crearse';
$Language['StepTwo'] = 'Selección de template';
$Language['StepTwoDescription'] = 'Elija un tipo de vista para el nuevo módulo';
$Language['StepThree'] = 'Carga de contenido';
$Language['StepThreeDescription'] = 'Elija el contenido a mostrar';
$Language['LabelAdvisoryPreview'] = 'Esta es solo una vista previa. "Las dimenciones y los efectos pueden variar segun su pantalla y dispositivo"';

$Language['LabelTabModuleList'] = 'Modulos del sistema';
$Language['LabelSubTabModuleList'] = 'Lista de modulos actuales';
$Language['LabelTabCreateModule'] = 'Creacion de modulos';
$Language['LabelSubTabCreateModule'] = 'Cree modulos nuevos';
$Language['LabelTabEditModule'] = 'Editar modulo';
$Language['LabelSubTabEditModule'] = 'Modificar el contenido';
$Language['LabelTabDeleteModule'] = 'Eliminar modulo';
$Language['LabelSubTabDeleteModule'] = 'Eliminar modulo seleccionado';
$Language['LabelTabShowModule'] = 'Vista Previa';
$Language['LabelSubTabShowModule'] = 'Vista previa del modulo';

$Language['LabelModuleName'] = 'Nombre del nuevo modulo:';
$Language['LabelModuleIco'] = 'Icono a mostrar:';
$Language['LabelModuleNamePlace'] = 'Ej: ¡¡Christmas Dinner!!';
$Language['LabelModuleIcoPlace'] = 'Ej: ✬ Flower.png';
$Language['LabelModuleDescription'] = 'Descripción del modulo:';
$Language['LabelModuleTemplate'] = 'Seleccione el tipo de vista:';
$Language['LabelModuleDescriptionPlace'] = 'Ej: Modulo de eventos';
$Language['LabelModuleTemplatePlace'] = 'Accordion';

$Language['MessageInputModuleName'] = 'Indique el nombre del modulo';
$Language['MessageInputModuleIcon'] = 'Indique un icono para mostrar';
$Language['MessageInputModuleTemplate'] = 'Indique la vista para el modulo';
$Language['MessageMaximumVar'] = 'Ya ha seleccionado el numero maximo de imágenes';
$Language['MessageMaximumVarNumber'] = 'Hace falta seleccionar ';
$Language['MessageMaximumVarNumberImg'] = 'Imagenes para continuar';

$Language['SummaryPrincipalModule'] = 'Advertencia: <b>Modulo principal!!</b><br>';
$Language['MessagePrincipalModule'] = 'Los modulos principales no pueden ser editados o eliminados del sistema';
$Language['MessageSelectModule'] = 'Seleccione un modulo de la lista para continuar';

//NUEVO FORMULARIO lOCATION CONTROLLER

$Language['LabelEditTitleMember'] = 'Titulo: ';
$Language['LabelEditNameMember'] = 'Nombre residencia: ';
$Language['LabelLastName'] = 'Apellido: ';
$Language['LabelEditMailMermber'] = 'Correo: ';
$Language['LabelPackageMember'] = 'Programación: ';
$Language['LabelPackageOptionList'] = 'Seleccione paquete';
$Language['LabelStatusOptionList'] = 'Seleccione locacion';
$Language['LabelModuleOptionList'] = 'Seleccione módulo';
$Language['LabelServiceOptionList'] = 'Agregar servicios';
//MENSAJES DENTRO DE INPUTS PROPIETARIOS MIEMBRO
$Language['LabelModuleOptionListCodeMember'] = 'Ingrese codigo';
$Language['LabelModuleOptionListTitle'] = 'Ingrese titulo';
$Language['LabelModuleOptionListName'] = 'Ingrese nombre';
$Language['LabelModuleOptionListLastName'] = 'ingrese apellido';
$Language['LabelModuleOptionListMail'] = 'Ingrese correo ';
//MENSAJES DENTRO DE INPUTS PROPIETARIOS LOCACION
$Language['LabelModuleOptionListCodeLocation'] = 'Ingrese codigo locacion';
$Language['LabelModuleOptionListKeyLocation'] = 'Ingrese clave';
$Language['LabelModuleOptionListDirectionLocation'] = 'ingrese dirección';
$Language['LabelModuleOptionListDescriptionLocation'] = 'Ingrese descripción';

//MENSAJES DENTRO DE INPUTS CREAR USUARIO
$Language['LabelModuleOptionListNameUser'] = 'Ingrese nombre';
$Language['LabelModuleOptionListLastNameUser'] = 'ingrese apellido paterno';
$Language['LabelModuleOptionListFirstNameUser'] = 'Ingrese apellido materno';

//MENSAJES DENTRO DE INPUTS AGREGAR ESTACION DE TRIBUNE
$Language['LabelModuleOptionListStationTribune'] = 'Seleccione estacion';
$Language['LabelModuleOptionListNumberTribune'] = 'Ingrese nombre';
$Language['LabelModuleOptionListIndicativeTribune'] = 'Ingrese indicativo';

$Language['LabelEditCodeLocation'] = 'Codigo locacion: ';
$Language['LabelEditStatusLocation'] = 'Estatus locacion: ';
$Language['LabelKeyLocation'] = 'Clave locacion: ';
$Language['LabelDirectionLocation'] = 'Dirección locacion: ';
$Language['LabelDescriptionLocation'] = 'Locación: ';
$Language['LabelEditModule'] = 'Módulo inicial: ';
$Languaje['LabelEditService'] = 'Servicios: ';
$Language['LabelEditEngraver'] = 'Grabador: ';
$Language['LabelSubHeaderLocation'] = 'Locación propietario';

//CONTROL PARENTAL
$Language['Advisory'] = 'Advertencias';
$Language['Language'] = 'Lenguaje';
$Language['Nudity'] = 'Desnudos';
$Language['Violence'] = 'Violencia';
$Language['StrongContent'] = 'Contenido Fuerte';
$Language['AdultSituations'] = 'Situaciones para adultos';
$Language['TV&MovieRatings'] = 'Clasificacion de TV Y Peliculas';
$Language['M18'] = 'Mayores de 18';
$Language['M13'] = 'Mayores de 13';
$Language['NotRated'] = 'Sin Clasificacion';
$Language['MessageRestartDevice'] = 'Es necesario reiniciar el dispositivo para que los cambios se vean reflejados.';

//MENSAJES
$Language['LabelTitleSubmenuMessages'] = 'Mensajes';
$Language['LabelSubTitleSubmenuMessages'] = 'Administración y creacion de mensajes';
$Language['LabelTabMessagesList'] = 'Listar mensajes';
$Language['LabelTabCreateMessages'] = 'Nuevo mensaje';
$Language['LabelTabEditMessages'] = 'Editar mensaje';
$Language['LabelTabDeleteMessages'] = 'Eliminar mensaje';
$Language['LabelSubListMessages'] = 'Lista de mensajes';
$Language['LabelSubCreateMessages'] = 'Crear nuevo mensaje';
$Language['LabelSubEditMessages'] = 'Edite mensaje vigente';
$Language['LabelSubDeleteMessages'] = 'Elimine mensaje vigente';
$Language['LabelHeaderFormMessages'] = 'Nuevo mensaje';
$Language['LabelHeaderFormEditMessages'] = 'Editando mensaje';
$Language['LabelMessagesAddressee'] = 'Destinatario:';
$Language['LabelMessagesSubject'] = 'Asunto:';
$Language['LabelMessagesContent'] = 'Contenido:';
$Language['LabelMessagesDate'] = 'Fecha y hora final:';
$Language['LabelMessagesType'] = 'Tipo de mensaje:';
$Language['LabelSelectMessagesType'] = 'Seleccione el tipo de mensaje:';
$Language['MessageInputMessagesAddressee'] = 'Indique el destinatario';
$Language['MessageInputMessagesSubject'] = 'El mensaje debe tener un asunto';
$Language['MessageInputMessagesContent'] = 'No puede enviar un mensaje vacio';
$Language['MessageInputMessagesDate'] = 'Indique la fecha y hora a la que sucedera el evento';
$Language['LabelMessagesAddresseeOptionList'] = 'Seleccione un destinatario';
$Language['LabelMessagesSubjectPlace'] = 'Asunto';
$Language['LabelMessagesContentPlace'] = 'Detalle';
$Language['LabelMessagesDestinationData'] = 'Datos del destinatario';
$Language['MessageDisableMessages'] = 'No se puede editar, el mensaje ha sido leido';
$Language['MessageSelectMessages'] = 'Seleccione un mensaje de la tabla para continuar';

//MENSAJES GRUPO
$Language['LabelTitleSubmenuMessagesGroup'] = 'Mensajes por Grupo';
$Language['LabelSubTitleSubmenuMessagesGroup'] = 'Administración y creacion de mensajes';
$Language['LabelTabMessagesGroupList'] = 'Listar mensajes';
$Language['LabelTabCreateMessagesGroup'] = 'Nuevo mensaje';
$Language['LabelTabEditMessagesGroup'] = 'Editar mensaje';
$Language['LabelTabDeleteMessagesGroup'] = 'Eliminar mensaje';
$Language['LabelSubListMessagesGroup'] = 'Lista de mensajes';
$Language['LabelSubCreateMessagesGroup'] = 'Crear nuevo mensaje';
$Language['LabelSubEditMessagesGroup'] = 'Edite mensaje vigente';
$Language['LabelSubDeleteMessagesGroup'] = 'Elimine mensaje vigente';
$Language['LabelHeaderFormMessagesGroup'] = 'Nuevo mensaje';
$Language['LabelHeaderFormEditMessagesGroup'] = 'Editando mensaje';
$Language['LabelMessagesGroupAddressee'] = 'Destinatario:';
$Language['LabelMessagesGroupSubject'] = 'Asunto:';
$Language['LabelMessagesGroupContent'] = 'Contenido:';
$Language['LabelMessagesGroupDate'] = 'Fecha y hora:';
$Language['LabelMessagesGroupType'] = 'Tipo de mensaje:';
$Language['LabelSelectMessagesGroupType'] = 'Seleccione el tipo de mensaje';
$Language['MessageInputMessagesGroupAddressee'] = 'Indique el destinatario';
$Language['MessageInputMessagesGroupSubject'] = 'El mensaje debe tener un asunto';
$Language['MessageInputMessagesGroupContent'] = 'No puede enviar un mensaje vacio';
$Language['MessageInputMessagesGroupDate'] = 'Indique la fecha y hora a la que sucedera el evento';
$Language['LabelMessagesGroupAddresseeOptionList'] = 'Seleccione un destinatario';
$Language['LabelMessagesGroupSubjectPlace'] = 'Asunto';
$Language['LabelMessagesGroupContentPlace'] = 'Detalle';
$Language['LabelMessagesGroupDestinationData'] = 'Datos del destinatario';
$Language['MessageDisableMessagesGroup'] = 'No se puede editar, el mensaje ha sido leido por el member';
$Language['MessageSelectMessagesGroup'] = 'Seleccione un mensaje de la tabla para continuar';

/*Insert
$Language['Label']            = 'Codigo locacion: ';
$Language['Label']          = 'Estatus locacion: ';
$Language['Label']                 = 'Clave locacion: ';
$Language['Label']           = 'Direccion locacion: ';
$Language['Label']         = 'Descripcion locacion: ';
$Language['Label']                  = 'Modulo locacion: ';
$Language['Label']                = 'Grabador: ';
$Language['Label']            = 'Codigo locacion: ';
$Language['Label']          = 'Estatus locacion: ';
$Language['Label']                 = 'Clave locacion: ';
$Language['Label']           = 'Direccion locacion: ';
$Language['Label']         = 'Descripcion locacion: ';
*/
$Language['LabelTitleEstadistic'] = 'Estadisticas de canales';
$Language['LabelSubEstadistic'] = 'Administre todos los usuarios del sistema';

//ETIQUETAS PARA LA CREACION DE GRUPOS DE MIEMBROS
$Language['LabelTitleGroup'] = 'Grupos';
$Language['LabelSubTitleGroup'] = 'Grupos de residencias';
$Language['LabelTabGroupList'] = 'Listar grupos';
$Language['LabelSubTabGroupList'] = 'Listado de grupos actuales';
$Language['LabelTabGroupNew'] = 'Nuevo grupo';
$Language['LabelSubTabGroupNew'] = 'Creacion de nuevos grupos';
$Language['LabelTabGroupEdit'] = 'Editar grupo';
$Language['LabelSubTabGroupEdit'] = 'Edite grupo seleccionado';
$Language['LabelTabGroupDelete'] = 'Eliminar grupo';
$Language['LabelSubTabGroupDelete'] = 'Elimine el grupo seleccionado';
$Language['LabelNameGroup'] = 'Nombre del grupo: ';
$Language['LabelDescriptionGroup'] = 'Descripción: ';
$Language['LabelValidityGroup'] = 'Vigencia: ';
$Language['LabelMembersGroup'] = 'Residencias del grupo: ';
$Language['LabelHeaderFormCreateGroup'] = 'Creacion de nuevo grupo';
$Language['LabelValidateNameGroup'] = 'Escriba un nombre valido para este grupo';
$Language['LabelValidateDescriptionGroup'] = 'Escriba una descripción para identificar el grupo';
$Language['LabelValidateValidityGroup'] = 'Indique una fecha de caducidad para el grupo';
$Language['LabelValidateMembersGroup'] = 'Indique los residencias que pertenecen a este grupo';
$Language['LabelHeaderFormEditGroup'] = 'Editando grupo';

//ETIQUETAS PARA LA ADMINISTRACIÓN DE ICONOS

//ETIQUETAS PARA GRAFICAS DE ESTADISTICAS
$Language['LabelFilterMonthAndYear'] = 'Filtrar por mes';
$Language['LabelFilterDayAndMonthAndYear'] = 'Filtrar por dia';
$Language['LabelFilterOpionList'] = 'Filtrar por residencia';
$Language['SelectMember'] = 'Seleccionar residencia';
$Language['LabelTitleTopMembersInactive'] = 'Ultima actividad';
$Language['TitleMemberList'] = 'Miembro';
$Language['TitleCodeList'] = 'Código';
$Language['TitleLastActivity'] = 'Última actividad';
$Language['TitleModuleList'] = 'Módulo';
$Language['LabelsubtitleStadisticsMemberInactive'] = 'Fecha de la última actividad de los residencias de ';
$Language['LabelTitleTopMembersActive'] = 'Top residencias mas activos: ';
$Language['LabelSubTitleStadisticsMemberActive'] = 'Incluye tiempo de actividad en horas de TV y modulos del menu';
$Language['LabelTitleTopTenChannels'] = 'Top 10:';
$Language['LabelSubtitleTopTenChannels'] = 'Canales más vistos del ultimo mes';


$Language['LabelTitleStatisticsAllChannels'] = 'Tiempo de vista de todos los canales';
$Language['LabelSubtitleStatisticsAllChannels'] = 'Tiempo total de los canales en horas';
$Language['LabelTitleStatisticsAllChannelsFilter'] = 'Tiempo de vista de los canales vistos durante el mes';
$Language['LabelSubtitleStatisticsAllChannelsFilter'] = 'Tiempo total de cada canal visto en el mes';
$Language['LabelTitleStatisticsChannels'] = 'Top 10 canales más vistos';
$Language['LabelSubTitleStatisticsChannels'] = 'Canales más vistos';
$Language['LabelTitleStatisticsChannelsFillter'] = 'Top 10 canales más vistos del mes';
$Language['LabelTitleStatisticsChannelsDown'] = 'Top 10 canales menos vistos';
$Language['LabelSubTitleStatisticsChannelsDown'] = 'Canales menos vistos';
$Language['LabelTitleStatisticsChannelsDownFilter'] = 'Top 10 canales menos vistos del mes';
$Language['LabelTitleStatisticsMessages'] = 'Mensajes enviados / Mensajes leidos';
$Language['LabelSubTitleStatisticsMessages'] = 'Fechas de mensajes enviados y mensajes leídos';
$Language['LabelTitleStatisticsMessagesFilter'] = 'Mensajes enviados / Mensajes leidos, durante el mes';
$Language['LabelTitleStatisticsMembers'] = 'Residencias más activos en el módulo TV';
$Language['LabelSubTitleStatisticsMembers'] = 'Tiempo de actividad del residencia en horas';
$Language['LabelTitleStatisticsMembersFilter'] = 'Residencias más activos en el módulo TV durante el mes';
$Language['LabelTitleStatisticsModules'] = 'Tiempo de vista de todos los módulos';
$Language['LabelSubTitleStatisticsModules'] = 'Tiempo total de los módulos en horas';
$Language['LabelTitleStatisticsModulesFilter'] = 'Tiempo de vista de todos los módulos del mes';
$Language['LabelTitleStatisticsAvarageTimeTV'] = 'Tiempo de uso de TV durante las horas del dia';
$Language['LabelTitleStatisticsAvarageTimeTVFilter'] = 'Tiempo de uso de TV del dia';
$Language['LabelSubTitleStatisticsAvarageTimeTV'] = 'Tiempo de uso promedio de TV durante cada hora';
$Language['LabelTitleStatisticsModulesMembers'] = 'Tiempo de vista de todos los módulos del Miembro';
$Language['LabelTitleStatisticsModulesMembersFilter'] = 'Porcentaje de modulos utilizados del residencia';
$Language['LabelSubTitleStatisticsModulesMembers'] = 'Tiempo de modulos en general en horas';
$Language['LabelSubTitleStatisticsModulesMembersFilter'] = 'Tiempo de modulos del residencia en horas';



session_start();
/* *****************************************************************************
 * OBJETIVO: Recibe del controlador de locaciones la opcion a ejecutar [Select, Insert, Update,
 * Delete] y regresa un mensaje dependiendo de la accion
 * PARAMETROS RECIBIDOS: Option
 * CREADO POR: Mauricio Bailon
 * FECHA: Abril 2017
 * ****************************************************************************/
//modificar los casos use of undefined constant se le agrego "" a todos

    require '../Models/Log.php';
    require '../DAO/LocationsDAO.php';
    require '../DAO/MembersDAO.php';
    require '../../General/Languages/es.php';
    require '../DAO/DevicesDAO.php';
    require '../DAO/UsersDAO.php';
    // Obtenemos el identificador de la locacion seleccionada en el registro
    $LocationCode = "DEFAULT";
    $DCode = 1;
    $DAOLocations = new Locations();
    $DAOMembers = new MembersDAO('');
    $DAODevices = new DevicesDAO('');

    if(isset($_GET['Option'])){
        $Option = $_GET['Option'];
    } else {
        $Option = $_POST['Option'];
    }

	switch ($Option){

        case "SelectLocations":
            $LocationList = $DAOLocations->getLocationsList();
            echo json_encode($LocationList);
        break;


        case "SelectLocationsDisp":
           // if(isset($_POST['IDPackage'])){
                $Response = $DAOLocations->getLocationDispList($_POST['IDPackage']);

            /*}else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }*/
            $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
        break;

        case "InsertLocation":
            if(isset($_POST['CodeLocation']) && isset($_POST['StatusLocation']) && isset($_POST['KeyLocation']) && isset($_POST['IdModuleLocation'])){
                //$MemberId = $DAOMembers->getLastMemberId();
                $Location = array
                           ('codigo_locacion'       =>strtoupper($_POST['CodeLocation']),
                            'id_estatus_locacion'   =>$_POST['StatusLocation'],
                            'clave_locacion'        => base64_encode($_POST['KeyLocation']),
                            'direccion_locacion'    =>$_POST['DirectionLocation'],
                            'descripcion_locacion'  =>$_POST['DescriptionLocation'],
                            'id_modulo'             =>$_POST['IdModuleLocation'],
                            'codigo_miembro'        =>$_POST['MemberId']);

                $NewLocation = $DAOLocations->setLocation($Location);

                if($NewLocation[0] > 0){

                    $LastLocationID = $DAOLocations->getLastLocationId();

                    if($LastLocationID[0] > 0){

                        $Services = array('id_locacion' => $LastLocationID[0]['id']);

                        $NewLocationServices = $DAOLocations->setServiceLocation($Services);

                        if($NewLocationServices[0] > 0){

                           $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);

                        }else{
                            $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                        }
                    }else{
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }

                }
                else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }


            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

            }
            echo json_encode($Response);
        break;

        case "InsertMember":
            if(isset($_POST['CodeLocation'])){
              $MemberArray = array('codigo_locacion'          =>strtoupper($_POST['CodeLocation']),
				'codigo_miembro'=> strtoupper($_POST['CodeLocation']),
                                'descripcion_locacion'             =>$_POST['DescriptionLocation'],
                                'id_paquete'             =>$_POST['ProgrammingMember']);
                $Member = $DAOMembers->setMember($MemberArray);
                if($Member[0] > 0){
                    $Response = array('Response'   => 1);
                    // Log creacion usuario correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description ='';
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
//                    $NewLog = $LogModel->setLog($Log);
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                    'MessageSummary'  => $Language['SummaryMessageType'][1],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                     // Log creacion usuario correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogCreateMemberB']." ".$_POST['NameMemberLocation']." ".$_POST['LastNameLocation'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
//                    $NewLog = $LogModel->setLog($Log);

                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                // Log creacion usuario correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogCreateMemberC']." ".$_POST['NameMemberLocation']." ".$_POST['LastNameLocation'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
//                    $NewLog = $LogModel->setLog($Log);

            }
            echo json_encode($Response);
        break;


        case "EditMember":
            if(isset($_POST['EditCodeMemberLocation']) &&
              isset($_POST['EditTitleMemberLocation']) &&
              isset($_POST['EditNameMemberLocation']) &&
              isset($_POST['EditLastNameLocation']) &&
              isset($_POST['EditMailMemberLocation']) && isset($_POST['EditProgrammingMember'])){
                $MemberArray = array(
                                'codigo_miembro'             =>$_POST['EditCodeMemberLocation'],
                                'titulo_miembro'             =>$_POST['EditTitleMemberLocation'],
                                'nombre_miembro'             =>$_POST['EditNameMemberLocation'],
                                'apellido_miembro'           =>$_POST['EditLastNameLocation'],
                                'correo_miembro'             =>$_POST['EditMailMemberLocation'],
                                'id_paquete'                 =>$_POST['EditProgrammingMember']);
                $Member = $DAOMembers->EditMember($MemberArray, $_POST['IdMember']);
                if($Member[0] >= 0){
                    $Response = array('Response'   => 1);
                    // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogEditMemberA']." ".$_POST['EditNameMemberLocation']." ".$_POST['EditLastNameLocation'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                    'MessageSummary'  => $Language['SummaryMessageType'][1],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogEditMemberB']." ".$_POST['EditNameMemberLocation']." ".$_POST['EditLastNameLocation'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
                    $NewLog = $LogModel->setLog($Log);
                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                 // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogEditMemberC']." ".$_POST['EditNameMemberLocation']." ".$_POST['EditLastNameLocation'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;

        case "EditLocation":
            if(isset($_POST['EditCodeLocation']) && isset($_POST['EditStatusLocation']) && isset($_POST['EditKeyLocation']) && isset($_POST['EditDirectionLocation']) && isset($_POST['EditDescriptionLocation']) && isset($_POST['EditIdModuleLocation'])){
                //$MemberId = $DAOMembers->getLastMemberId();
                $Location = array
                           ('codigo_locacion'       =>$_POST['EditCodeLocation'],
                            'id_estatus_locacion'   =>$_POST['EditStatusLocation'],
                            'clave_locacion'        => base64_encode($_POST['EditKeyLocation']),
                            'direccion_locacion'    =>$_POST['EditDirectionLocation'],
                            'descripcion_locacion'  =>$_POST['EditDescriptionLocation'],
                            'id_modulo'             =>$_POST['EditIdModuleLocation'],
                            'codigo_miembro'        =>$_POST['EditMemberId']);

                $NewLocation = $DAOLocations->EditLocation($Location, $_POST['IdLocation']);

                if($NewLocation[0] >= 0){

                    $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                      'MessageSummary'  => $Language['SummaryMessageType'][0],
                                      'MessageDetail'   => $Language['MessageInsertCorrect']);


                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

            }
            echo json_encode($Response);
        break;

        case "EditMemberOfLocation":
            if(isset($_POST['IdLocation']) && isset($_POST['EditMemberId'])){
                //$MemberId = $DAOMembers->getLastMemberId();
                $Location = array
                           ('codigo_miembro'        =>$_POST['EditMemberId']);

                $NewLocation = $DAOLocations->EditLocation($Location, $_POST['IdLocation']);

                if($NewLocation[0] >= 0){

                    $Response = array('Response'   => 1);


                }else {
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                      'MessageSummary'  => $Language['SummaryMessageType'][2],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);

            }
            echo json_encode($Response);
        break;

        case "UpdateLocation":
            $LocationId = $_POST['EditLocationId'];
                $Pass1 = base64_encode($_POST['EditLocationPassword']);
                $Location = array
                         ('codigo_miembro'             =>$_POST['EditCodeMember'],
                          'titulo_miembro'             =>$_POST['EditTitleMember'],
                          'nombre_miembro'             =>$_POST['EditNameMember'],
                          'apellido_miembro'           =>$_POST['EditLastName'],
                          'correo_miembro'             =>$_POST['EditMailMember'],
                          'codigo_locacion'            =>$_POST['EditCodeLocation'],
                          'id_estatus_locacion'        =>$_POST['EditStatusLocation'],
                          'clave_locacion'             =>$_POST['EditKeyLocation'],
                          'direccion_locacion'         =>$_POST['EditDirectionLocation'],
                          'descripcion_locacion'       =>$_POST['EditDescriptionLocation'],
                          'id_modulo'                  =>$_POST['EditModule'],
                          'grabador'                   =>$_POST['EditEngraver']);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

                if(isset($_POST['EditLocationCode']) && isset($_POST['EditLocationStatusId']) && isset($Pass1) && isset($_POST['EditLocationModule']) && isset($_POST['EditLocationType']) && isset($_POST['EditLocationMember']) && isset($_POST['EditLocationTypeDescription'])){
                    $EditLocation = $DAOLocations->updateLocation($Location, $LocationId);

                    if($EditLocation[0] > 0){
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }
                    else {
                        $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                          'MessageSummary'  => $Language['SummaryMessageType'][2],
                                          'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }else{
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                          'MessageSummary'  => $Language['SummaryMessageType'][2],
                                          'MessageDetail'   => $Language['MessageInsertIncorrect']);
                }
            echo json_encode($Response);
        break;


        case "SelectDevicesLocations":
            if(isset($_POST['idLocation'])){
                $Response = $DAOLocations->getDevicesLocationsList($_POST['idLocation']);
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;

        case "SelectLimboDevices":
            $Response = $DAOLocations->getDevicesLimboList();

            echo json_encode($Response);
        break;

        case "UpdatePackage":
            if(isset($_POST['EditPackageLocationId']) && isset($_POST['EditPackageList'])){
                $idLocation=$_POST['EditPackageLocationId'];
                $idPackage=$_POST['EditPackageList'];

                $Dispositivos=$DAOLocations->getDevicesLocationsList($idLocation);
                if($Dispositivos[0] > 0){
                    foreach ($Dispositivos as $d){
                    }
                }



            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;

        case "RestartDevice":
            if(isset($_POST['ip'])){
                $Ip = $_POST['ip'];
               //$Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&"."./STBremoteconf $Ip REBOOT";
                //echo $Command.' Comando ejecutado... Reiniciando'.$Ip.'..';
                //$CommandLine = shell_exec($Command);
                //echo $Command. 'Comando ejecutado... Reiniciando'.$Ip.'..';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => 'Comando ejecutado... <b>Reiniciando: <br>'.$Ip.'</b>..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceA']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);


            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => 'Error al ejecutar el comando...Cancelando..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceB']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                //echo 'Error al ejecutar el comando... Cancelando..';
            }
            echo json_encode($Response);
        break;

        case "RestartAllDevices":
            if(isset($_POST['ip'])){
                $Ip = substr($_POST['ip'], 2);
                //$Command = "cd $STBremoteDirectory && export STBPASS=$STBPass && export STBKEY=$STBKey &&"."./STBremoteconf $Ip REBOOT";
                //$CommandLine = shell_exec($Command);
                //echo 'Comando ejecutado... Reiniciando: '.$Ip.'..';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                  'MessageSummary'  => $Language['SummaryMessageType'][0],
                                  'MessageDetail'   => 'Comando ejecutado... <b>Reiniciando: <br>'.$Ip.'</b>..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceA']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => 'Error al ejecutar el comando... Cancelando..');
                // Log creacion usuario correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRestartDeviceB']." ".$_POST['ip'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
                    $NewLog = $LogModel->setLog($Log);
                //echo 'Error al ejecutar el comando... Cancelando..';
            }
            echo json_encode($Response);
        break;

        case "DeleteDevice":
            if(isset($_POST['id'])){
//                $LocationIdArray = $DAOLocations->getLocationPackage();
//                //echo json_encode($LocationIdArray[0][id_locacion]);
//                $Package = $LocationIdArray[0]['id_paquete'];
//                $IDLocation = $LocationIdArray[0]['id_locacion'];
                $locationUP = array('id_locacion' => '1');
                $Dispositivos = $DAODevices->updateDeviceLocation($locationUP, $_POST['id']);
                //$Dispositivos=$DAOLocations->DeleteDevice($_POST['id']);
                if($Dispositivos[0] > 0){

//                    $DispArray = array('id_estatus_disponibilidad'  => $DCode,
//                                       'id_paquete'  => $Package);
//                    $Dispositivos=$DAOLocations->ChangeStatusDispDev($DispArray, $_POST['id']);
//                    if($Dispositivos[0] > 0){
//                        $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
//                                          'MessageSummary'  => $Language['SummaryMessageType'][0],
//                                          'MessageDetail'   => $Language['MessageInsertCorrect']);
//
//                    // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogRemoveDeviceA']." ".$_POST['id'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }else{
//                      //echo 'error change status';
//                        $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
//                                'MessageSummary'  => $Language['SummaryMessageType'][1],
//                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
//                        // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogRemoveDeviceB']." ".$_POST['id_estatus_disponibilidad']." ".$_POST['id_paquete'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }
                }else{
                  //echo 'error update location';
                  $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
                  //Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRemoveDeviceB']." ".$_POST['id_estatus_disponibilidad']." ".$_POST['id_paquete'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
            }else{
              //echo 'error post';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
                //Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogRemoveDeviceB']." ".$_POST['id_estatus_disponibilidad']." ".$_POST['id_paquete'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;

        case "ADDDevice":
            if(isset($_POST['id']) && isset($_POST['IdLocation'])){
              $LocationIdArray = $DAODevices->getPackageIdLocation($_POST['IdLocation']);
              //echo json_encode($LocationIdArray[0][id_locacion]);
              $Package = $LocationIdArray[0]['id_paquete'];
              //echo $Package.' == '.$LocationIdArray[0].'<br>';
                //$DevLoc = array('id_locacion'         =>$_POST['IdLocation']);
                //$Relation = $DAOLocations->setRelationLocationDev($DevLoc);
                $locationUP = array('id_locacion' => $_POST['IdLocation']);
                $Relation = $DAODevices->updateDeviceLocation($locationUP, $_POST['id']);
                if($Relation[0] > 0){
//                    $DispArray = array('id_estatus_disponibilidad'   => 2,
//                                       'id_paquete'                  =>$Package);
//                    $Dispositivos=$DAOLocations->ChangeStatusDispDev($DispArray, $_POST['id']);
//                    if($Dispositivos[0] > 0){
//                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
//                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
//                                        'MessageDetail'   => $Language['MessageInsertCorrect']);
//                      // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogAssignedDeviceA']." ".$_POST['id'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][0]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }else{
//                     //echo 'ajaja';
//                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
//                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
//                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
//                      // Log creacion usuario incorrectamente correctamente
//                    $LogModel = new Log($DirectoryLog);
//                    $Description = $Language['LabelAccountsLogAssignedDeviceB']." ".$_POST['IdLocation']." ".$_POST['id'];
//                    $Log = array ('descripcion_log' =>$Description,
//                                  'id_usuario'      =>$_SESSION['UserId'],
//                                  'tipo_aviso'      =>$Language['OptionMessageType'][1]);
//                    $NewLog = $LogModel->setLog($Log);
//                    }

                }else{
                  //echo 'ejeje';
                    $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                    'MessageSummary'  => $Language['SummaryMessageType'][2],
                                    'MessageDetail'   => $Language['MessageInsertIncorrect']);
                     // Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogAssignedDeviceB']." ".$_POST['IdLocation']." ".$_POST['id'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
                }
            }else{
              //echo 'ijiji';
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                'MessageSummary'  => $Language['SummaryMessageType'][2],
                                'MessageDetail'   => $Language['MessageInsertIncorrect']);
                 // Log creacion usuario incorrectamente correctamente
                    $LogModel = new Log($DirectoryLog);
                    $Description = $Language['LabelAccountsLogAssignedDeviceB']." ".$_POST['IdLocation']." ".$_POST['id'];
                    $Log = array ('descripcion_log' =>$Description,
                                  'id_usuario'      =>$_SESSION['UserId'],
                                  'tipo_aviso'      =>$Language['OptionMessageType'][2]);
                    $NewLog = $LogModel->setLog($Log);
            }
            echo json_encode($Response);
        break;

        case "ParentalControlDevice":
            if(isset($_POST['id'])){
                $Response = $DAODevices->getParentalControlDevice($_POST['id']);
            }else{

            }
            echo json_encode($Response);
        break;

        case "ParentalControlUpdate":
            if(isset($_POST['id']) || isset($_POST['est']) || isset($_POST['leng']) || isset($_POST['des']) || isset($_POST['vio']) || isset($_POST['cf']) || isset($_POST['sa']) || isset($_POST['m18']) || isset($_POST['m13']) || isset($_POST['sc'])){
                $dispositivo = $_POST['id'];
                $estado = $_POST['est'];
                $lenguaje = $_POST['leng'];
                $desnudos = $_POST['des'];
                $violencia = $_POST['vio'];
                $contenido_fuerte = $_POST['cf'];
                $situaciones_adultas = $_POST['sa'];
                $mayores_dieciocho = $_POST['m18'];
                $mayores_trece = $_POST['m13'];
                $sin_clasificacion = $_POST['sc'];
                if($estado == 1){
                    $PC = array('estado'                => $estado,
                                'lenguaje'              => $lenguaje,
                                'desnudos'              => $desnudos,
                                'violencia'             => $violencia,
                                'contenido_fuerte'      => $contenido_fuerte,
                                'mayores_dieciocho'     => $mayores_dieciocho,
                                'mayores_trece'         => $mayores_trece,
                                'situaciones_adultas'   => $situaciones_adultas,
                                'sin_clasificacion'     => $sin_clasificacion);
                    $ParentalC = $DAODevices->updateParentalControlDevice($dispositivo, $PC);
                    if($ParentalC[0] > 0){
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrectPC']);
                    }else{
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                } else {
                    $PC = array('estado'                => $estado,
                                'lenguaje'              => $lenguaje,
                                'desnudos'              => $desnudos,
                                'violencia'             => $violencia,
                                'contenido_fuerte'      => $contenido_fuerte,
                                'mayores_dieciocho'     => $mayores_dieciocho,
                                'mayores_trece'         => $mayores_trece,
                                'situaciones_adultas'   => $situaciones_adultas,
                                'sin_clasificacion'     => $sin_clasificacion);
                    $ParentalC = $DAODevices->updateParentalControlDevice($dispositivo, $PC);
                    if($ParentalC[0] > 0){
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrectPC']);
                    }else{
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect']);
                    }
                }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][2],
                                  'MessageSummary'  => $Language['SummaryMessageType'][2],
                                  'MessageDetail'   => $Language['MessageInsertIncorrect']);
            }
            echo json_encode($Response);
        break;

        case "ChangeDeviceLocation":
            if(isset($_POST['EditDeviceId']) && isset($_POST['EditDeviceLocation'])){
                $locationUP = array('ubicacion_dispositivo' => $_POST['EditDeviceLocation']);
                $Dispositivos = $DAODevices->updateDevices($_POST['EditDeviceId'], $locationUP);
                if($Dispositivos[0] > 0){
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][0],
                                        'MessageSummary'  => $Language['SummaryMessageType'][0],
                                        'MessageDetail'   => $Language['MessageInsertCorrect']);
                    }else{
                      $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'].' Insert Error');
                    }
            }else{
                $Response = array('MessageOption'   => $Language['OptionMessageType'][1],
                                      'MessageSummary'  => $Language['SummaryMessageType'][1],
                                      'MessageDetail'   => $Language['MessageInsertIncorrect'].' Post Error');
            }
            echo json_encode($Response);
        break;
    }
