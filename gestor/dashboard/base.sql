/*
SQLyog Enterprise - MySQL GUI v6.03
Host - 5.6.12-log : Database - gestor
*********************************************************************
Server version : 5.6.12-log
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `gestor`;

USE `gestor`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `gestor_archivos` */

DROP TABLE IF EXISTS `gestor_archivos`;

CREATE TABLE `gestor_archivos` (
  `ID` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL,
  `NOMBRE_ARCHIVO` varchar(250) DEFAULT NULL,
  `PESO_ARCHICO` int(10) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_archivos` */

/*Table structure for table `gestor_areas` */

DROP TABLE IF EXISTS `gestor_areas`;

CREATE TABLE `gestor_areas` (
  `ID_AREA` int(10) NOT NULL,
  `NOMBRE` varchar(250) NOT NULL,
  `ESTADO` int(10) NOT NULL,
  `DESCRIPCION` longtext NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  PRIMARY KEY (`ID_AREA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_areas` */

/*Table structure for table `gestor_areas_relacion` */

DROP TABLE IF EXISTS `gestor_areas_relacion`;

CREATE TABLE `gestor_areas_relacion` (
  `ID_PADRE` int(10) NOT NULL,
  `ID_HIJO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_areas_relacion` */

/*Table structure for table `gestor_campo_personalizado` */

DROP TABLE IF EXISTS `gestor_campo_personalizado`;

CREATE TABLE `gestor_campo_personalizado` (
  `ID` int(10) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `TIPO_DATO` int(10) NOT NULL,
  `VALORES_POSIBLES` longtext NOT NULL,
  `MOSTRAR_LLENAR` int(10) NOT NULL,
  `MOSTRAR_ACTUALIZAR` int(10) NOT NULL,
  `MOSTRAR_CERRAR` int(10) NOT NULL,
  `REQUERIDO_LLENAR` int(10) NOT NULL,
  `REQUERIDO_ACTUALIZAR` int(10) NOT NULL,
  `REQUERIDO_CERRAR` int(10) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_campo_personalizado` */

/*Table structure for table `gestor_campos_areas` */

DROP TABLE IF EXISTS `gestor_campos_areas`;

CREATE TABLE `gestor_campos_areas` (
  `ID_CAMPO_PERSONALIZADO` int(10) NOT NULL,
  `ID_AREA` int(10) NOT NULL,
  `ORDEN` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_campos_areas` */

/*Table structure for table `gestor_campos_principales` */

DROP TABLE IF EXISTS `gestor_campos_principales`;

CREATE TABLE `gestor_campos_principales` (
  `ID_CAMPO_PERSONALIZADO` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) NOT NULL,
  `VALOR` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_campos_principales` */

/*Table structure for table `gestor_dias_no_laborables` */

DROP TABLE IF EXISTS `gestor_dias_no_laborables`;

CREATE TABLE `gestor_dias_no_laborables` (
  `ID` int(10) NOT NULL,
  `FECHA` int(10) NOT NULL,
  `MOTIVO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_dias_no_laborables` */

/*Table structure for table `gestor_historico` */

DROP TABLE IF EXISTS `gestor_historico`;

CREATE TABLE `gestor_historico` (
  `ID_USUARIO` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) NOT NULL,
  `NOMBRE_CAMPO` varchar(70) NOT NULL,
  `VALOR_ANTERIOR` int(10) NOT NULL,
  `VALOR_ACTUAL` int(10) NOT NULL,
  `FECHA_MODIFICACION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_historico` */

/*Table structure for table `gestor_principal` */

DROP TABLE IF EXISTS `gestor_principal`;

CREATE TABLE `gestor_principal` (
  `ID` int(10) NOT NULL,
  `ID_AREA` int(10) NOT NULL,
  `ID_SOLICITANTE` int(10) NOT NULL,
  `ID_EJECUTOR` int(10) NOT NULL,
  `ID_TEMA` int(10) NOT NULL,
  `PRIORIDAD` int(10) NOT NULL,
  `ESTADO` int(10) NOT NULL,
  `OBSERVACION` varchar(250) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  `FECHA_COMPROMISO` int(10) NOT NULL,
  `FECHA_ACTUALIZACION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_principal` */

/*Table structure for table `gestor_principal_relacion` */

DROP TABLE IF EXISTS `gestor_principal_relacion`;

CREATE TABLE `gestor_principal_relacion` (
  `ID` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) NOT NULL,
  `ID_PRINCIPAL_RELACION` int(10) NOT NULL,
  `TIPO_RELACION` int(10) NOT NULL,
  KEY `ID_PRINCIPAL` (`ID_PRINCIPAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_principal_relacion` */

/*Table structure for table `gestor_temas` */

DROP TABLE IF EXISTS `gestor_temas`;

CREATE TABLE `gestor_temas` (
  `ID` int(10) NOT NULL,
  `ID_AREA` int(10) NOT NULL,
  `ID_USUARIO` int(10) NOT NULL,
  `NOMBRE` varchar(250) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_temas` */

/*Table structure for table `gestor_usuario` */

DROP TABLE IF EXISTS `gestor_usuario`;

CREATE TABLE `gestor_usuario` (
  `ID_USUARIO` int(10) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `NOMBRES` varchar(250) NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `CLAVE` varchar(50) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `NIVEL_ACCESO` int(10) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_usuario` */

insert  into `gestor_usuario`(`ID_USUARIO`,`USUARIO`,`NOMBRES`,`EMAIL`,`CLAVE`,`TELEFONO`,`NIVEL_ACCESO`,`FECHA_CREACION`) values (1,'banton','Byron Anton','banton5_9@hotmail.com','1234','93800504',1,24);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
