<?php
/*******************************************************************************
 * OBJETIVO: Permite declarar todos los parametros generales necesarios para
 * un correcto funcionamiento del sistema, ademas ayuda a heredar los
 * parametros con solo llamar el archivo
 * CREADO POR: Tania
 * FECHA: Abril 2017
 ******************************************************************************/


/**************************** VARIABLES RESPALDO ******************************/
// Ip del servidor:
$BackupIp                   = "localhost";
// Puerto del servidor
$BackupPort                 = "80";
// Directorio raiz:
$BackupRootDirectory        = "/var/www/html";

/**************************** PARAMETROS PROYECTO *****************************/
// IP DEL SERVIDOR
$Ip                         = !empty($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : $BackupIp;
// PUERTO
$Port                       = !empty($_SERVER["SERVER_PORT"]) ? $_SERVER["SERVER_PORT"] : $BackupPort;
// DIRECTORIO RAIZ
$RootDirectory              = !empty($_SERVER["DOCUMENT_ROOT"]) ? $_SERVER["DOCUMENT_ROOT"] : $BackupRootDirectory;
// NUMERO DE VERSION
$VersionProyect             = "";
// NOMBRE DEL PROYECTO (MAX 3)
$ProyectName                = "CBC";
// DIRECTORIO RAIZ PROYECTO
$RootProyect                = "/BBINCO/";
// DIRECTORIO PROYECTO BACK
$ProyectDirectory           = "/Admin";
// DIRECTORIO PROYECTO FRONT 
$ProyectDirectoryFront      = "/IPTV";
// DIRECTORIO DESARROLLO
$DevelopmentDirectory       = "";
// VALIDA CONTEXTO DE DESAROLLO
$DevelopmentContex          = !empty($DevelopmentDirectory) ? $DevelopmentDirectory : "";
// IDIOMA INICIAL [ESPANOL]
$PrimaryLanguage            = "es.php";

/**************************** DIRECTORIO DEL PROYECTO *************************/

// DIRECTORIO CORE (Incluye controladores, DAO, Modelos, Queries, Pruebas)
$CoreDirectory              = "/Core";
    // DIRECTORIO MODULES FRONT
    $Modules                = "/Modules/";


// DIRECTORIO GENERAL (Idioma, Log)
$GeneralDirectory           = "/General";
    // ARCHIVO CON LOG DEL SISTEMA DE TV
    $LogFile                = "/Log/Log.txt";


// DIRECTORIO MEDIA (Imagenes)
$MediaDirectory             = "/Media";
    // DIRECTORIO AVATARS
    $Avatars                = "/Avatars/";


// DIRECTORIO VIEWS (Estilos, Templates, Librerias)
$ViewsDirectory             = "/Views";

//DIRECTORIO PARA VISTAS PREVIAS General
$Preview                    = $DevelopmentDirectory.$RootProyect.$VersionProyect.$ProyectDirectoryFront.$CoreDirectory.$Modules;
//DIRECTORIO PARA VISTAS PREVIAS
$Prev                       = $DevelopmentDirectory.$RootProyect.$VersionProyect.$ProyectDirectoryFront.$CoreDirectory.$Modules;
//DIRECTORIO PARA CREACION DE EPG
$URL_EPG                       = $DevelopmentContex.$RootProyect.$VersionProyect.$ProyectDirectoryFront;


// DIRECTORIO MEDIA PARA FRONT Y BACK
$RootMediaDirectory         = "/MULTIMEDIA_".$ProyectName;
// DIRECTORIO DE CANALES
$ChannelsLogos              = "/Channels/";
// DIRECTORIO DE IMAJENES
$Images                     = "/Images/";
// DIRECTORIO DE ICONOS
$Icons                      = "/Icons/";
// DIRECTORIO DE VIDEO
$Videos                     = "/Videos/";
//DIRECTORIO IMAGENES
$Logos                      = "/Logos/";
// DIRECTORIO DE VISTAS PRELIMINATES
$Previews                   = "/Views/";
/**************************** CONSTRUCCION PARAMETROS GENERALES ***************/

$Proyect                    = $DevelopmentContex.$RootProyect.$VersionProyect.$ProyectDirectory;
// URL SERVIDOR
$ServerURL                  = "http://".$Ip.":".$Port;
// URL DIRECTORIO PROYECTO
$ProyectURL                 = $ServerURL.$Proyect;
// DIRECTORIO PARA GUARDAR LOG
$DirectoryLog               = $ProyectURL.$GeneralDirectory.$LogFile;
// DIRECTORIO CORE
$DirectoryCore              = $RootDirectory.$Proyect.$CoreDirectory;
// DIRECTORIO MEDIA CON URL DEL PROYECTO
$MediaURL                   = $Proyect.$MediaDirectory;
// DIRECTORIO FIRMWARE
$FirmwareDirectory          = "/Firmware";
// DIRECTORIO AVATARS
$AvatarsURL                 = $ProyectURL.$MediaDirectory.$Avatars;
// DIRECTORIO VISTAS PRELIMINARES
$PreviewsURL           		= $ServerURL.$RootMediaDirectory.$Previews;
// DIRECTORIO LOGOS ESTACIONES
$ChannelsLogosURL           = $ServerURL.$RootMediaDirectory.$ChannelsLogos;
//NO TOCAR CHANEL PARA ESTACIONES MEMO
$ChannelsLogosURLRoot           = $BackupRootDirectory.$RootMediaDirectory.$ChannelsLogos;
$ChannelsLogosURLStation        = $RootMediaDirectory.$ChannelsLogos;
// DIRECTORIO IMAGENES
$ImagesURLRoot                  = $BackupRootDirectory.$RootMediaDirectory.$Images;
$ImagesURL                      = $RootMediaDirectory.$Images;
//DIRECTORIO DE ICONOS
$IconsURLRoot                  = $BackupRootDirectory.$RootMediaDirectory.$Icons;
$IconsURL                      = $RootMediaDirectory.$Icons;
// DIRECTORIO VIDEOS
$VideosURLRoot              = $BackupRootDirectory.$RootMediaDirectory.$Videos;
$VideosURL                      = $RootMediaDirectory.$Videos;
/**************************** IMAGENES DEL SISTEMA ****************************/
// IMAGEN BBINCO TV
$SystemImage                = "/bbinco.png";
// LOADER GIF
$LoaderGif                  = "/loader.gif";
// IMAGEN USUARIO
$UserImage                  = "default.jpg";
// IMAGEN USUARIO ALTERNO
$MemberImage                = "default.png"; 
// IMAGEN BACKGROUND PRINCIPAL
$PrimaryBackground          = "/11.png";
// IMAGEN BACKGROUND SECUNDARIO
$SecondaryBackground        = "/18.jpg";
// IMAGEN PROYECTO
$ProyectImage               = "/bbincoS.png";
// ICONO TITULO
$IconTitle                  = "/icon.ico";

/**************************** VARIABLES DE SESION *****************************/
// LENGUAJE
$_SESSION['Lenguage']           = $PrimaryLanguage;
// DIRECTORIO GENERAL DEL PROYECTO PARA TENER
$_SESSION['DirectoryProyect']   = $RootDirectory.$Proyect;

/**************************** STBREMOTECONF ***********************************/
//
$STBremoteDirectory         = "/usr/local/bin/";
//
$STBPass                    = "stbrckey";
//
$STBKey                     = "keys/amino/STBrc-KEY.private";
//
$mcfs                       = array("/bbincoTV-MB-DI-0.mcfs","/bbincoTV-26.mcfs","/Minervas0.mcfs","/bbinco_x5x_0.mcfs","/minerva_x5x_0.mcfs");//
//
$FirmwareURL                = $ProyectURL.$GeneralDirectory.$FirmwareDirectory;

/************************** DIRECTORIO TRIBUNE ********************************/
$TribuneDirectory           ="/mnt/nv/epg/";

//codigo nueva variable para librerias 
$LibraryURL                 ="/Librarys/";
$Views                      ="/Views";
$Library                    =$DevelopmentDirectory.$RootProyect.$VersionProyect.$ProyectDirectory.$Views.$LibraryURL;
//$DevelopmentDirectory.$RootProyect.$ProyectDirectoryFront llega a back_TV

/************************ VALIDACIONES SI NO SE OPTIENEN DATOS ************************/
$Empty = 0;
$Full = 1;
