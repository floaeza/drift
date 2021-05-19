-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 11:38 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbincoTV`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_canal`
--

CREATE TABLE `cat_canal` (
  `id_canal` int(3) NOT NULL,
  `src` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `puerto` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_estacion` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_contenido`
--

CREATE TABLE `cat_contenido` (
  `id_contenido` int(3) NOT NULL,
  `url_contenido` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_contenido` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_dispositivo`
--

CREATE TABLE `cat_dispositivo` (
  `id_dispositivo` int(9) NOT NULL,
  `mac_address` varchar(17) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_dispositivo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `version_software` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_activacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modelo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_estatus_energia` int(3) NOT NULL,
  `id_estatus_disponibilidad` int(3) NOT NULL,
  `id_estatus_licencia` int(3) NOT NULL,
  `id_grabador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_estacion`
--

CREATE TABLE `cat_estacion` (
  `id_estacion` int(3) NOT NULL,
  `numero_estacion` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_canal` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `indicativo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_estatus_disponibilidad`
--

CREATE TABLE `cat_estatus_disponibilidad` (
  `id_estatus_disponibilidad` int(3) NOT NULL,
  `estatus_disponibilidad` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_estatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_estatus_disponibilidad`
--

INSERT INTO `cat_estatus_disponibilidad` (`id_estatus_disponibilidad`, `estatus_disponibilidad`, `descripcion_estatus`) VALUES
(1, 'disponible', 'El dispositivo esta libre para ser asignado a una locacion'),
(2, 'no disponible', 'El dispositivo a sigo asociado a una locacion');

-- --------------------------------------------------------

--
-- Table structure for table `cat_estatus_energia`
--

CREATE TABLE `cat_estatus_energia` (
  `id_estatus_energia` int(3) NOT NULL,
  `estatus_energia` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_energia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cat_estatus_energia`
--

INSERT INTO `cat_estatus_energia` (`id_estatus_energia`, `estatus_energia`, `descripcion_energia`) VALUES
(1, 'encendido', 'El dispositivo esta conectado'),
(2, 'apagado', 'El dispositivo esta desconectado');

-- --------------------------------------------------------

--
-- Table structure for table `cat_estatus_lectura`
--

CREATE TABLE `cat_estatus_lectura` (
  `id_estatus_lectura` int(3) NOT NULL,
  `estatus_lectura` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_lectura` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_estatus_lectura`
--

INSERT INTO `cat_estatus_lectura` (`id_estatus_lectura`, `estatus_lectura`, `descripcion_lectura`) VALUES
(1, 'leido', 'El mensaje a sido visualizado por el cliente'),
(2, 'no leido', 'El mensaje no a sido visualizado por el cliente');

-- --------------------------------------------------------

--
-- Table structure for table `cat_estatus_licencia`
--

CREATE TABLE `cat_estatus_licencia` (
  `id_estatus_licencia` int(3) NOT NULL,
  `estatus_licencia` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_estatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_estatus_licencia`
--

INSERT INTO `cat_estatus_licencia` (`id_estatus_licencia`, `estatus_licencia`, `descripcion_estatus`) VALUES
(1, 'activa', 'El dispositivo puede funcionar correctamente'),
(2, 'inactivo', 'Las licencias han caducado o se han terminado');

-- --------------------------------------------------------

--
-- Table structure for table `cat_estatus_usuario`
--

CREATE TABLE `cat_estatus_usuario` (
  `id_estatus_usuario` int(3) NOT NULL,
  `estatus_usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_estatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_estatus_usuario`
--

INSERT INTO `cat_estatus_usuario` (`id_estatus_usuario`, `estatus_usuario`, `descripcion_estatus`) VALUES
(1, 'habilitado', 'El usuario puede iniciar sesion en el sistema'),
(2, 'inhabilitado', 'El usuario a sido dado de baja definitiva'),
(3, 'suspendido', 'El usuario a sido inhabilitado por un tiempo');

-- --------------------------------------------------------

--
-- Table structure for table `cat_evento`
--

CREATE TABLE `cat_evento` (
  `id_evento` int(3) NOT NULL COMMENT '\n',
  `nombre_evento` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_evento` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_grupo`
--

CREATE TABLE `cat_grupo` (
  `id_grupo` int(3) NOT NULL,
  `nombre_grupo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_grupo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vigencia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_licencia`
--

CREATE TABLE `cat_licencia` (
  `id_licencia` int(3) NOT NULL,
  `cantidad_licencias` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `cantidad_usadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_locacion`
--

CREATE TABLE `cat_locacion` (
  `id_locacion` int(11) NOT NULL,
  `numero_locacion` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_locacion` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono_locacion` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_locacion` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion_locacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_locacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_modulo` int(3) NOT NULL,
  `id_paquete` int(3) NOT NULL,
  `grabador` int(1) DEFAULT NULL,
  `id_tipo_locacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_menu`
--

CREATE TABLE `cat_menu` (
  `id_menu` int(3) NOT NULL,
  `nombre_menu` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_menu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url_menu` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_modulo`
--

CREATE TABLE `cat_modulo` (
  `id_modulo` int(3) NOT NULL,
  `nombre_modulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_modulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_template` int(3) NOT NULL,
  `modulo_principal` int(3) NOT NULL,
  `url_modulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_icono` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_paquete`
--

CREATE TABLE `cat_paquete` (
  `id_paquete` int(3) NOT NULL,
  `nombre_paquete` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_paquete` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_perfil`
--

CREATE TABLE `cat_perfil` (
  `id_perfil` int(3) NOT NULL,
  `nombre_perfil` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_perfil` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_perfil`
--

INSERT INTO `cat_perfil` (`id_perfil`, `nombre_perfil`, `descripcion_perfil`) VALUES
(1, 'administrador', 'Tiene acceso a los modulos generales y los modulos de administracion del sistema'),
(2, 'operador', 'Tiene acceso a los modulos generales'),
(3, 'basico', 'Tiene acceso a ciertos modulos del sistema');

-- --------------------------------------------------------

--
-- Table structure for table `cat_submenu`
--

CREATE TABLE `cat_submenu` (
  `id_submenu` int(3) NOT NULL,
  `nombre_submenu` varchar(45) NOT NULL,
  `descripcion_submenu` varchar(255) DEFAULT NULL,
  `url_submenu` varchar(45) DEFAULT NULL,
  `id_menu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_submodulo`
--

CREATE TABLE `cat_submodulo` (
  `id_submodulo` int(3) NOT NULL,
  `nombre_submodulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_submodulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_modulo` int(3) NOT NULL,
  `id_template` int(3) NOT NULL,
  `url_submodulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_template`
--

CREATE TABLE `cat_template` (
  `id_template` int(3) NOT NULL,
  `nombre_template` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_template` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url_template` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_aviso`
--

CREATE TABLE `cat_tipo_aviso` (
  `id_tipo_aviso` int(3) NOT NULL,
  `tipo_aviso` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_aviso` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_tipo_aviso`
--

INSERT INTO `cat_tipo_aviso` (`id_tipo_aviso`, `tipo_aviso`, `descripcion_aviso`) VALUES
(1, 'advertencia', 'Se realizo una transaccion delicada que puede afectar al funcionamiento correcto del sistema'),
(2, 'informativo', 'Se a realizado una transaccion correctamente'),
(3, 'error', 'Se intento realizar una transaccion');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_locacion`
--

CREATE TABLE `cat_tipo_locacion` (
  `id_tipo_locacion` int(3) NOT NULL,
  `tipo_locacion` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_tipo_locacion` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_tipo_locacion`
--

INSERT INTO `cat_tipo_locacion` (`id_tipo_locacion`, `tipo_locacion`, `descripcion_tipo_locacion`) VALUES
(1, 'villa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cat_usuario`
--

CREATE TABLE `cat_usuario` (
  `id_usuario` int(3) NOT NULL,
  `correo_usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_estatus_usuario` int(3) NOT NULL,
  `id_perfil` int(3) NOT NULL,
  `imagen_usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contador_visitas`
--

CREATE TABLE `contador_visitas` (
  `id_contador_visitas` int(3) NOT NULL,
  `id_dispositivo` int(3) NOT NULL,
  `hora_visita` time NOT NULL,
  `fecha_visita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_modulo` int(3) NOT NULL,
  `id_submodulo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispositivo_locacion`
--

CREATE TABLE `dispositivo_locacion` (
  `id_dispositivo_locacion` int(3) NOT NULL,
  `id_dispositivo` int(3) NOT NULL,
  `id_locacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estadisticas_canales`
--

CREATE TABLE `estadisticas_canales` (
  `id_estadisticas_canales` int(3) NOT NULL,
  `id_dispositivo` int(3) NOT NULL,
  `id_canal` int(3) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_evento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grupo_locacion`
--

CREATE TABLE `grupo_locacion` (
  `id_grupo_locacion` int(3) NOT NULL,
  `id_grupo` int(3) NOT NULL,
  `id_locacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(3) NOT NULL,
  `fecha_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion_log` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `id_tipo_aviso` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(3) NOT NULL,
  `destinatario` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asunto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cuerpo_mensaje` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `fecha_fin_envio` datetime NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `id_estatus_lectura` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensaje_grupo`
--

CREATE TABLE `mensaje_grupo` (
  `id_mensaje_grupo` int(3) NOT NULL,
  `id_grupo` int(3) NOT NULL,
  `id_mensaje` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensaje_locacion`
--

CREATE TABLE `mensaje_locacion` (
  `id_mensaje_locacion` int(3) NOT NULL,
  `id_locacion` int(3) NOT NULL,
  `id_mensaje` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paquete_canal`
--

CREATE TABLE `paquete_canal` (
  `id_paquete_canal` int(3) NOT NULL,
  `id_canal` int(3) NOT NULL,
  `id_paquete` int(3) NOT NULL,
  `numero_canal` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perfil_menu`
--

CREATE TABLE `perfil_menu` (
  `id_perfil_menu` int(3) NOT NULL,
  `id_perfil` int(3) NOT NULL,
  `id_menu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template_contenido`
--

CREATE TABLE `template_contenido` (
  `id_template_contenido` int(3) NOT NULL,
  `id_contenido` int(3) NOT NULL,
  `id_template` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_canal`
--
ALTER TABLE `cat_canal`
  ADD PRIMARY KEY (`id_canal`),
  ADD KEY `fk_cat_canal_1_idx` (`id_estacion`);

--
-- Indexes for table `cat_contenido`
--
ALTER TABLE `cat_contenido`
  ADD PRIMARY KEY (`id_contenido`);

--
-- Indexes for table `cat_dispositivo`
--
ALTER TABLE `cat_dispositivo`
  ADD PRIMARY KEY (`id_dispositivo`),
  ADD KEY `fk_cat_dispositivo_1_idx` (`id_estatus_energia`),
  ADD KEY `fk_cat_dispositivo_2_idx` (`id_estatus_disponibilidad`),
  ADD KEY `fk_cat_dispositivo_3_idx` (`id_estatus_licencia`);

--
-- Indexes for table `cat_estacion`
--
ALTER TABLE `cat_estacion`
  ADD PRIMARY KEY (`id_estacion`);

--
-- Indexes for table `cat_estatus_disponibilidad`
--
ALTER TABLE `cat_estatus_disponibilidad`
  ADD PRIMARY KEY (`id_estatus_disponibilidad`);

--
-- Indexes for table `cat_estatus_energia`
--
ALTER TABLE `cat_estatus_energia`
  ADD PRIMARY KEY (`id_estatus_energia`);

--
-- Indexes for table `cat_estatus_lectura`
--
ALTER TABLE `cat_estatus_lectura`
  ADD PRIMARY KEY (`id_estatus_lectura`);

--
-- Indexes for table `cat_estatus_licencia`
--
ALTER TABLE `cat_estatus_licencia`
  ADD PRIMARY KEY (`id_estatus_licencia`);

--
-- Indexes for table `cat_estatus_usuario`
--
ALTER TABLE `cat_estatus_usuario`
  ADD PRIMARY KEY (`id_estatus_usuario`);

--
-- Indexes for table `cat_evento`
--
ALTER TABLE `cat_evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `cat_grupo`
--
ALTER TABLE `cat_grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `cat_licencia`
--
ALTER TABLE `cat_licencia`
  ADD PRIMARY KEY (`id_licencia`),
  ADD KEY `fk_cat_licencia_1_idx` (`id_usuario`);

--
-- Indexes for table `cat_locacion`
--
ALTER TABLE `cat_locacion`
  ADD PRIMARY KEY (`id_locacion`),
  ADD KEY `fk_cat_locacion_1_idx` (`id_paquete`),
  ADD KEY `fk_cat_locacion_2_idx` (`id_modulo`),
  ADD KEY `fk_cat_locacion_3_idx` (`id_tipo_locacion`);

--
-- Indexes for table `cat_menu`
--
ALTER TABLE `cat_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `cat_modulo`
--
ALTER TABLE `cat_modulo`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `fk_cat_modulo_1_idx` (`id_template`);

--
-- Indexes for table `cat_paquete`
--
ALTER TABLE `cat_paquete`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indexes for table `cat_perfil`
--
ALTER TABLE `cat_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `cat_submenu`
--
ALTER TABLE `cat_submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `fk_cat_submenu_1_idx` (`id_menu`);

--
-- Indexes for table `cat_submodulo`
--
ALTER TABLE `cat_submodulo`
  ADD PRIMARY KEY (`id_submodulo`),
  ADD KEY `fk_cat_submodulo_1_idx` (`id_template`),
  ADD KEY `fk_cat_submodulo_2_idx` (`id_modulo`);

--
-- Indexes for table `cat_template`
--
ALTER TABLE `cat_template`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `cat_tipo_aviso`
--
ALTER TABLE `cat_tipo_aviso`
  ADD PRIMARY KEY (`id_tipo_aviso`);

--
-- Indexes for table `cat_tipo_locacion`
--
ALTER TABLE `cat_tipo_locacion`
  ADD PRIMARY KEY (`id_tipo_locacion`);

--
-- Indexes for table `cat_usuario`
--
ALTER TABLE `cat_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_cat_usuario_1_idx` (`id_estatus_usuario`),
  ADD KEY `fk_cat_usuario_2_idx` (`id_perfil`);

--
-- Indexes for table `contador_visitas`
--
ALTER TABLE `contador_visitas`
  ADD PRIMARY KEY (`id_contador_visitas`),
  ADD KEY `fk_contador_visitas_1_idx` (`id_modulo`),
  ADD KEY `fk_contador_visitas_2_idx` (`id_submodulo`),
  ADD KEY `fk_contador_visitas_3_idx` (`id_dispositivo`);

--
-- Indexes for table `dispositivo_locacion`
--
ALTER TABLE `dispositivo_locacion`
  ADD PRIMARY KEY (`id_dispositivo_locacion`),
  ADD KEY `fk_dispositivo_locacion_1_idx` (`id_locacion`),
  ADD KEY `fk_dispositivo_locacion_2_idx` (`id_dispositivo`);

--
-- Indexes for table `estadisticas_canales`
--
ALTER TABLE `estadisticas_canales`
  ADD PRIMARY KEY (`id_estadisticas_canales`),
  ADD KEY `fk_estadisticas_canales_1_idx` (`id_evento`),
  ADD KEY `fk_estadisticas_canales_2_idx` (`id_dispositivo`),
  ADD KEY `fk_estadisticas_canales_3` (`id_canal`);

--
-- Indexes for table `grupo_locacion`
--
ALTER TABLE `grupo_locacion`
  ADD PRIMARY KEY (`id_grupo_locacion`),
  ADD KEY `fk_grupo_locacion_1_idx` (`id_locacion`),
  ADD KEY `fk_grupo_locacion_2_idx` (`id_grupo`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_1_idx` (`id_usuario`),
  ADD KEY `fk_log_2_idx` (`id_tipo_aviso`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_mensaje_1_idx` (`id_usuario`),
  ADD KEY `fk_mensaje_2_idx` (`id_estatus_lectura`);

--
-- Indexes for table `mensaje_grupo`
--
ALTER TABLE `mensaje_grupo`
  ADD PRIMARY KEY (`id_mensaje_grupo`),
  ADD KEY `fk_mensaje_grupo_1_idx` (`id_grupo`),
  ADD KEY `fk_mensaje_grupo_2_idx` (`id_mensaje`);

--
-- Indexes for table `mensaje_locacion`
--
ALTER TABLE `mensaje_locacion`
  ADD PRIMARY KEY (`id_mensaje_locacion`),
  ADD KEY `fk_mensaje_locacion_2_idx` (`id_mensaje`),
  ADD KEY `fk_mensaje_locacion_1_idx` (`id_locacion`);

--
-- Indexes for table `paquete_canal`
--
ALTER TABLE `paquete_canal`
  ADD PRIMARY KEY (`id_paquete_canal`),
  ADD KEY `fk_paquete_canal_1_idx` (`id_canal`),
  ADD KEY `fk_paquete_canal_2_idx` (`id_paquete_canal`);

--
-- Indexes for table `perfil_menu`
--
ALTER TABLE `perfil_menu`
  ADD PRIMARY KEY (`id_perfil_menu`),
  ADD KEY `fk_perfil_menu_1_idx` (`id_perfil`),
  ADD KEY `fk_perfil_menu_2_idx` (`id_menu`);

--
-- Indexes for table `template_contenido`
--
ALTER TABLE `template_contenido`
  ADD PRIMARY KEY (`id_template_contenido`),
  ADD KEY `fk_template_contenido_1_idx` (`id_contenido`),
  ADD KEY `fk_template_contenido_2_idx` (`id_template`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_canal`
--
ALTER TABLE `cat_canal`
  MODIFY `id_canal` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_contenido`
--
ALTER TABLE `cat_contenido`
  MODIFY `id_contenido` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_dispositivo`
--
ALTER TABLE `cat_dispositivo`
  MODIFY `id_dispositivo` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_estacion`
--
ALTER TABLE `cat_estacion`
  MODIFY `id_estacion` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_estatus_disponibilidad`
--
ALTER TABLE `cat_estatus_disponibilidad`
  MODIFY `id_estatus_disponibilidad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cat_estatus_energia`
--
ALTER TABLE `cat_estatus_energia`
  MODIFY `id_estatus_energia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cat_estatus_lectura`
--
ALTER TABLE `cat_estatus_lectura`
  MODIFY `id_estatus_lectura` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cat_estatus_licencia`
--
ALTER TABLE `cat_estatus_licencia`
  MODIFY `id_estatus_licencia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cat_estatus_usuario`
--
ALTER TABLE `cat_estatus_usuario`
  MODIFY `id_estatus_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cat_evento`
--
ALTER TABLE `cat_evento`
  MODIFY `id_evento` int(3) NOT NULL AUTO_INCREMENT COMMENT '\n';
--
-- AUTO_INCREMENT for table `cat_grupo`
--
ALTER TABLE `cat_grupo`
  MODIFY `id_grupo` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_licencia`
--
ALTER TABLE `cat_licencia`
  MODIFY `id_licencia` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_locacion`
--
ALTER TABLE `cat_locacion`
  MODIFY `id_locacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_menu`
--
ALTER TABLE `cat_menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_modulo`
--
ALTER TABLE `cat_modulo`
  MODIFY `id_modulo` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_paquete`
--
ALTER TABLE `cat_paquete`
  MODIFY `id_paquete` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_perfil`
--
ALTER TABLE `cat_perfil`
  MODIFY `id_perfil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cat_submenu`
--
ALTER TABLE `cat_submenu`
  MODIFY `id_submenu` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_submodulo`
--
ALTER TABLE `cat_submodulo`
  MODIFY `id_submodulo` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_template`
--
ALTER TABLE `cat_template`
  MODIFY `id_template` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cat_tipo_aviso`
--
ALTER TABLE `cat_tipo_aviso`
  MODIFY `id_tipo_aviso` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cat_tipo_locacion`
--
ALTER TABLE `cat_tipo_locacion`
  MODIFY `id_tipo_locacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cat_usuario`
--
ALTER TABLE `cat_usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contador_visitas`
--
ALTER TABLE `contador_visitas`
  MODIFY `id_contador_visitas` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dispositivo_locacion`
--
ALTER TABLE `dispositivo_locacion`
  MODIFY `id_dispositivo_locacion` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estadisticas_canales`
--
ALTER TABLE `estadisticas_canales`
  MODIFY `id_estadisticas_canales` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupo_locacion`
--
ALTER TABLE `grupo_locacion`
  MODIFY `id_grupo_locacion` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mensaje_grupo`
--
ALTER TABLE `mensaje_grupo`
  MODIFY `id_mensaje_grupo` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mensaje_locacion`
--
ALTER TABLE `mensaje_locacion`
  MODIFY `id_mensaje_locacion` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paquete_canal`
--
ALTER TABLE `paquete_canal`
  MODIFY `id_paquete_canal` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfil_menu`
--
ALTER TABLE `perfil_menu`
  MODIFY `id_perfil_menu` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `template_contenido`
--
ALTER TABLE `template_contenido`
  MODIFY `id_template_contenido` int(3) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cat_canal`
--
ALTER TABLE `cat_canal`
  ADD CONSTRAINT `fk_cat_canal_1` FOREIGN KEY (`id_estacion`) REFERENCES `cat_estacion` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_dispositivo`
--
ALTER TABLE `cat_dispositivo`
  ADD CONSTRAINT `fk_cat_dispositivo_1` FOREIGN KEY (`id_estatus_energia`) REFERENCES `cat_estatus_energia` (`id_estatus_energia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cat_dispositivo_2` FOREIGN KEY (`id_estatus_disponibilidad`) REFERENCES `cat_estatus_disponibilidad` (`id_estatus_disponibilidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cat_dispositivo_3` FOREIGN KEY (`id_estatus_licencia`) REFERENCES `cat_estatus_licencia` (`id_estatus_licencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_licencia`
--
ALTER TABLE `cat_licencia`
  ADD CONSTRAINT `fk_cat_licencia_1` FOREIGN KEY (`id_usuario`) REFERENCES `cat_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_locacion`
--
ALTER TABLE `cat_locacion`
  ADD CONSTRAINT `fk_cat_locacion_1` FOREIGN KEY (`id_paquete`) REFERENCES `cat_paquete` (`id_paquete`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cat_locacion_2` FOREIGN KEY (`id_modulo`) REFERENCES `cat_modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cat_locacion_3` FOREIGN KEY (`id_tipo_locacion`) REFERENCES `cat_tipo_locacion` (`id_tipo_locacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_modulo`
--
ALTER TABLE `cat_modulo`
  ADD CONSTRAINT `fk_cat_modulo_1` FOREIGN KEY (`id_template`) REFERENCES `cat_template` (`id_template`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_submenu`
--
ALTER TABLE `cat_submenu`
  ADD CONSTRAINT `fk_cat_submenu_1` FOREIGN KEY (`id_menu`) REFERENCES `cat_menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_submodulo`
--
ALTER TABLE `cat_submodulo`
  ADD CONSTRAINT `fk_cat_submodulo_1` FOREIGN KEY (`id_template`) REFERENCES `cat_template` (`id_template`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cat_submodulo_2` FOREIGN KEY (`id_modulo`) REFERENCES `cat_modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cat_usuario`
--
ALTER TABLE `cat_usuario`
  ADD CONSTRAINT `fk_cat_usuario_1` FOREIGN KEY (`id_estatus_usuario`) REFERENCES `cat_estatus_usuario` (`id_estatus_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cat_usuario_2` FOREIGN KEY (`id_perfil`) REFERENCES `cat_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contador_visitas`
--
ALTER TABLE `contador_visitas`
  ADD CONSTRAINT `fk_contador_visitas_1` FOREIGN KEY (`id_modulo`) REFERENCES `cat_modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contador_visitas_2` FOREIGN KEY (`id_submodulo`) REFERENCES `cat_submodulo` (`id_submodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contador_visitas_3` FOREIGN KEY (`id_dispositivo`) REFERENCES `cat_dispositivo` (`id_dispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dispositivo_locacion`
--
ALTER TABLE `dispositivo_locacion`
  ADD CONSTRAINT `fk_dispositivo_locacion_1` FOREIGN KEY (`id_locacion`) REFERENCES `cat_locacion` (`id_locacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dispositivo_locacion_2` FOREIGN KEY (`id_dispositivo`) REFERENCES `cat_dispositivo` (`id_dispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estadisticas_canales`
--
ALTER TABLE `estadisticas_canales`
  ADD CONSTRAINT `fk_estadisticas_canales_1` FOREIGN KEY (`id_evento`) REFERENCES `cat_evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estadisticas_canales_2` FOREIGN KEY (`id_dispositivo`) REFERENCES `cat_dispositivo` (`id_dispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estadisticas_canales_3` FOREIGN KEY (`id_canal`) REFERENCES `cat_canal` (`id_canal`);

--
-- Constraints for table `grupo_locacion`
--
ALTER TABLE `grupo_locacion`
  ADD CONSTRAINT `fk_grupo_locacion_1` FOREIGN KEY (`id_locacion`) REFERENCES `cat_locacion` (`id_locacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_locacion_2` FOREIGN KEY (`id_grupo`) REFERENCES `cat_grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_1` FOREIGN KEY (`id_usuario`) REFERENCES `cat_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_2` FOREIGN KEY (`id_tipo_aviso`) REFERENCES `cat_tipo_aviso` (`id_tipo_aviso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_mensaje_1` FOREIGN KEY (`id_usuario`) REFERENCES `cat_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensaje_2` FOREIGN KEY (`id_estatus_lectura`) REFERENCES `cat_estatus_lectura` (`id_estatus_lectura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje_grupo`
--
ALTER TABLE `mensaje_grupo`
  ADD CONSTRAINT `fk_mensaje_grupo_1` FOREIGN KEY (`id_grupo`) REFERENCES `cat_grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensaje_grupo_2` FOREIGN KEY (`id_mensaje`) REFERENCES `mensaje` (`id_mensaje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje_locacion`
--
ALTER TABLE `mensaje_locacion`
  ADD CONSTRAINT `fk_mensaje_locacion_1` FOREIGN KEY (`id_locacion`) REFERENCES `cat_locacion` (`id_locacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensaje_locacion_2` FOREIGN KEY (`id_mensaje`) REFERENCES `mensaje` (`id_mensaje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paquete_canal`
--
ALTER TABLE `paquete_canal`
  ADD CONSTRAINT `fk_paquete_canal_1` FOREIGN KEY (`id_canal`) REFERENCES `cat_canal` (`id_canal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paquete_canal_2` FOREIGN KEY (`id_paquete_canal`) REFERENCES `cat_paquete` (`id_paquete`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perfil_menu`
--
ALTER TABLE `perfil_menu`
  ADD CONSTRAINT `fk_perfil_menu_1` FOREIGN KEY (`id_perfil`) REFERENCES `cat_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_menu_2` FOREIGN KEY (`id_menu`) REFERENCES `cat_menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `template_contenido`
--
ALTER TABLE `template_contenido`
  ADD CONSTRAINT `fk_template_contenido_1` FOREIGN KEY (`id_contenido`) REFERENCES `cat_contenido` (`id_contenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_template_contenido_2` FOREIGN KEY (`id_template`) REFERENCES `cat_template` (`id_template`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;