/*
SQLyog Enterprise - MySQL GUI v6.03
Host - 5.1.36-community-log : Database - gestor
*********************************************************************
Server version : 5.1.36-community-log
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
  `PESO_ARCHIVO` int(10) DEFAULT NULL,
  `FECHA_CREACION` int(10) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_gestor_archivos` (`ID_PRINCIPAL`),
  KEY `FK_usuario_archivo` (`ID_USUARIO`),
  CONSTRAINT `FK_gestor_archivos` FOREIGN KEY (`ID_PRINCIPAL`) REFERENCES `gestor_principal` (`ID`),
  CONSTRAINT `FK_usuario_archivo` FOREIGN KEY (`ID_USUARIO`) REFERENCES `gestor_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_archivos` */

/*Table structure for table `gestor_areas` */

DROP TABLE IF EXISTS `gestor_areas`;

CREATE TABLE `gestor_areas` (
  `ID_AREA` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(250) NOT NULL,
  `ESTADO` varchar(1) NOT NULL,
  `DESCRIPCION` longtext NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `NIVEL_ACCESO` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_AREA`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `gestor_areas` */

insert  into `gestor_areas`(`ID_AREA`,`NOMBRE`,`ESTADO`,`DESCRIPCION`,`FECHA_CREACION`,`USUARIO_CREACION`,`PC_CREACION`,`FECHA_ACTUALIZACION`,`USUARIO_ACTUALIZACION`,`PC_ACTUALIZACION`,`NIVEL_ACCESO`) values (1,'Fabrica de Software','A','Area Fabrica de Software',1,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Facturacion Electronica','A','Area de Facturacion Electronica',1,NULL,NULL,1468964798,'root@localhost',NULL,NULL),(9,'BI','A','Bussiness Inteligence',1468957549,'root@localhost',NULL,NULL,NULL,NULL,NULL),(10,'Administracion','A','Administracion de la empresa en general',1470020659,'root@localhost',NULL,1470022186,'root@localhost',NULL,NULL);

/*Table structure for table `gestor_areas_relacion` */

DROP TABLE IF EXISTS `gestor_areas_relacion`;

CREATE TABLE `gestor_areas_relacion` (
  `ID` int(10) NOT NULL,
  `ID_PADRE` int(10) NOT NULL,
  `ID_HIJO` int(10) NOT NULL,
  `FECHA_CREACION` int(10) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_gestor_areas_relacion1` (`ID_PADRE`),
  KEY `FK_gestor_areas_relacion2` (`ID_HIJO`),
  CONSTRAINT `FK_gestor_areas_relacion1` FOREIGN KEY (`ID_PADRE`) REFERENCES `gestor_areas` (`ID_AREA`),
  CONSTRAINT `FK_gestor_areas_relacion2` FOREIGN KEY (`ID_HIJO`) REFERENCES `gestor_areas` (`ID_AREA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_areas_relacion` */

/*Table structure for table `gestor_campo_personalizado` */

DROP TABLE IF EXISTS `gestor_campo_personalizado`;

CREATE TABLE `gestor_campo_personalizado` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) NOT NULL,
  `TIPO_DATO` int(10) NOT NULL,
  `VALORES_POSIBLES` longtext,
  `MOSTRAR_LLENAR` int(10) DEFAULT NULL,
  `MOSTRAR_ACTUALIZAR` int(10) DEFAULT NULL,
  `MOSTRAR_CERRAR` int(10) DEFAULT NULL,
  `REQUERIDO_LLENAR` int(10) DEFAULT NULL,
  `REQUERIDO_ACTUALIZAR` int(10) DEFAULT NULL,
  `REQUERIDO_CERRAR` int(10) DEFAULT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `gestor_campo_personalizado` */

insert  into `gestor_campo_personalizado`(`ID`,`NOMBRE`,`TIPO_DATO`,`VALORES_POSIBLES`,`MOSTRAR_LLENAR`,`MOSTRAR_ACTUALIZAR`,`MOSTRAR_CERRAR`,`REQUERIDO_LLENAR`,`REQUERIDO_ACTUALIZAR`,`REQUERIDO_CERRAR`,`FECHA_CREACION`,`USUARIO_CREACION`,`PC_CREACION`,`FECHA_ACTUALIZACION`,`USUARIO_ACTUALIZACION`,`PC_ACTUALIZACION`,`ESTADO`) values (2,'fecha',20,'',1,1,1,1,0,1,1413175151,NULL,NULL,NULL,NULL,NULL,'A'),(3,'fecha2',20,'',1,1,1,1,1,1,1413175238,NULL,NULL,NULL,NULL,NULL,'A'),(4,'tipos',10,'Casa|Carro|Moto',1,1,1,1,1,1,1413177037,NULL,NULL,NULL,NULL,NULL,'A'),(5,'estado',10,'',1,1,1,1,1,0,1413955207,NULL,NULL,NULL,NULL,NULL,'A'),(6,'nota',10,'',1,1,1,1,1,1,1413955792,NULL,NULL,NULL,NULL,NULL,'A'),(18,'PRUEBA1',10,'',1,1,0,1,0,1,1420944857,NULL,NULL,NULL,NULL,NULL,'A'),(19,'sws',10,'ss',1,1,1,0,0,1,1424557102,NULL,NULL,NULL,NULL,NULL,'A'),(20,'xxsx',10,'xsx',1,1,0,0,1,1,1424571222,NULL,NULL,NULL,NULL,NULL,'A'),(21,'zaz',10,'1',0,0,0,0,0,0,1465681129,NULL,NULL,NULL,NULL,NULL,'A'),(22,'observacion',10,'',1,1,1,0,1,1,1467896470,NULL,NULL,NULL,NULL,NULL,'A'),(23,'aaaa',10,'1',1,1,0,0,0,0,1467897102,NULL,NULL,NULL,NULL,NULL,'A'),(24,'bbbb',10,'2',1,0,0,1,0,0,1467897252,NULL,NULL,NULL,NULL,NULL,'A'),(25,'quwuwuw',10,'1',0,0,0,0,0,0,1467897571,NULL,NULL,NULL,NULL,NULL,'A'),(26,'ccc',10,'',0,0,1,1,0,0,1467898251,NULL,NULL,NULL,NULL,NULL,'A'),(27,'pruebita2',10,'a',1,1,1,0,0,0,1468341249,NULL,NULL,NULL,NULL,NULL,'A'),(28,'xyz',10,'na',1,0,0,1,0,0,1468345135,NULL,NULL,NULL,NULL,NULL,'A'),(29,'prueba3',10,'g',0,1,0,0,0,1,1468354540,NULL,NULL,NULL,NULL,NULL,'A'),(30,'bolon',10,'A',1,1,0,0,0,0,1468370478,NULL,NULL,NULL,NULL,NULL,'A'),(31,'bolivar',10,'a',1,1,1,0,0,0,1468694110,NULL,NULL,NULL,NULL,NULL,'A'),(32,'ddgfgg',10,'',1,1,0,0,0,0,1468889888,NULL,NULL,NULL,NULL,NULL,'A'),(33,'ddgfgg',10,'',1,1,0,0,0,0,1468889888,NULL,NULL,NULL,NULL,NULL,'A'),(34,'byron',40,'a!b!c',1,1,0,0,0,1,1468945592,NULL,NULL,NULL,NULL,NULL,'A'),(35,'kbjbnn',10,'',0,0,0,0,0,0,1468965751,NULL,NULL,NULL,NULL,NULL,'A'),(36,'hw',20,'',1,1,0,0,0,0,1469299830,NULL,NULL,NULL,NULL,NULL,'A'),(37,'Fecha Ingreso',20,'',1,0,1,1,0,1,1471356554,NULL,NULL,NULL,NULL,NULL,'A');

/*Table structure for table `gestor_campos_areas` */

DROP TABLE IF EXISTS `gestor_campos_areas`;

CREATE TABLE `gestor_campos_areas` (
  `id` int(10) NOT NULL,
  `ID_CAMPO_PERSONALIZADO` int(10) NOT NULL,
  `ID_AREA` int(10) NOT NULL,
  `ORDEN` int(10) NOT NULL,
  `FECHA_CREACION` int(10) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_gestor_campos_areas1` (`ID_CAMPO_PERSONALIZADO`),
  KEY `FK_gestor_campos_areas` (`ID_AREA`),
  CONSTRAINT `FK_gestor_campos_areas` FOREIGN KEY (`ID_AREA`) REFERENCES `gestor_areas` (`ID_AREA`),
  CONSTRAINT `FK_gestor_campos_areas1` FOREIGN KEY (`ID_CAMPO_PERSONALIZADO`) REFERENCES `gestor_campo_personalizado` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_campos_areas` */

/*Table structure for table `gestor_campos_principales` */

DROP TABLE IF EXISTS `gestor_campos_principales`;

CREATE TABLE `gestor_campos_principales` (
  `id` int(10) NOT NULL,
  `ID_CAMPO_PERSONALIZADO` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) NOT NULL,
  `VALOR` longtext NOT NULL,
  `FECHA_CREACION` int(10) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  KEY `FK_gestor_campos_principales` (`ID_CAMPO_PERSONALIZADO`),
  CONSTRAINT `FK_gestor_campos_principales` FOREIGN KEY (`ID_CAMPO_PERSONALIZADO`) REFERENCES `gestor_campo_personalizado` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_campos_principales` */

/*Table structure for table `gestor_dias_no_laborables` */

DROP TABLE IF EXISTS `gestor_dias_no_laborables`;

CREATE TABLE `gestor_dias_no_laborables` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FECHA` int(10) NOT NULL,
  `MOTIVO` varchar(100) NOT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `FECHA_CREACION` int(10) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `gestor_dias_no_laborables` */

insert  into `gestor_dias_no_laborables`(`ID`,`FECHA`,`MOTIVO`,`ESTADO`,`FECHA_CREACION`,`USUARIO_CREACION`,`PC_CREACION`,`FECHA_ACTUALIZACION`,`USUARIO_ACTUALIZACION`,`PC_ACTUALIZACION`) values (1,1466564811,'ACTUALIZACION','A',1,'ROOT',NULL,1466565145,'root',NULL),(2,1466564671,'','A',1,'root',NULL,1466564725,'root',NULL);

/*Table structure for table `gestor_historico` */

DROP TABLE IF EXISTS `gestor_historico`;

CREATE TABLE `gestor_historico` (
  `ID_USUARIO` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) NOT NULL,
  `NOMBRE_CAMPO` varchar(70) NOT NULL,
  `VALOR_ANTERIOR` int(10) NOT NULL,
  `VALOR_ACTUAL` int(10) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL
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
  `FECHA_ACTUALIZACION` int(10) NOT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_gestor_principal` (`ID_AREA`),
  KEY `FK_gestor_principal2` (`ID_SOLICITANTE`),
  KEY `FK_gestor_principal3` (`ID_EJECUTOR`),
  KEY `FK_gestor_principal4` (`ID_TEMA`),
  CONSTRAINT `FK_gestor_principal` FOREIGN KEY (`ID_AREA`) REFERENCES `gestor_areas` (`ID_AREA`),
  CONSTRAINT `FK_gestor_principal2` FOREIGN KEY (`ID_SOLICITANTE`) REFERENCES `gestor_usuario` (`ID_USUARIO`),
  CONSTRAINT `FK_gestor_principal3` FOREIGN KEY (`ID_EJECUTOR`) REFERENCES `gestor_usuario` (`ID_USUARIO`),
  CONSTRAINT `FK_gestor_principal4` FOREIGN KEY (`ID_TEMA`) REFERENCES `gestor_temas` (`id_tema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_principal` */

/*Table structure for table `gestor_principal_relacion` */

DROP TABLE IF EXISTS `gestor_principal_relacion`;

CREATE TABLE `gestor_principal_relacion` (
  `ID` int(10) NOT NULL,
  `ID_PRINCIPAL` int(10) NOT NULL,
  `ID_PRINCIPAL_RELACION` int(10) NOT NULL,
  `TIPO_RELACION` int(10) NOT NULL,
  `FECHA_CREACION` int(10) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_PRINCIPAL` (`ID_PRINCIPAL`),
  KEY `FK_gestor_principal_relacion2` (`ID_PRINCIPAL_RELACION`),
  CONSTRAINT `FK_gestor_principal_relacion1` FOREIGN KEY (`ID_PRINCIPAL`) REFERENCES `gestor_principal` (`ID`),
  CONSTRAINT `FK_gestor_principal_relacion2` FOREIGN KEY (`ID_PRINCIPAL_RELACION`) REFERENCES `gestor_principal` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gestor_principal_relacion` */

/*Table structure for table `gestor_temas` */

DROP TABLE IF EXISTS `gestor_temas`;

CREATE TABLE `gestor_temas` (
  `id_tema` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(250) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `gestor_temas` */

insert  into `gestor_temas`(`id_tema`,`NOMBRE`,`FECHA_CREACION`,`USUARIO_CREACION`,`PC_CREACION`,`FECHA_ACTUALIZACION`,`USUARIO_ACTUALIZACION`,`PC_ACTUALIZACION`,`ESTADO`) values (1,'Soporte tecnico',1466544635,'root',NULL,1466565741,'root',NULL,'A'),(2,'Capacitacion',1466545340,'root',NULL,NULL,NULL,NULL,'A');

/*Table structure for table `gestor_temas_areas` */

DROP TABLE IF EXISTS `gestor_temas_areas`;

CREATE TABLE `gestor_temas_areas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fecha_creacion` int(11) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `gestor_temas_areas` */

insert  into `gestor_temas_areas`(`id`,`id_tema`,`id_area`,`estado`,`fecha_creacion`,`USUARIO_CREACION`,`PC_CREACION`,`FECHA_ACTUALIZACION`,`USUARIO_ACTUALIZACION`,`PC_ACTUALIZACION`) values (72,2,10,'A',1470021482,'root',NULL,NULL,NULL,NULL),(71,1,10,'A',1470021482,'root',NULL,NULL,NULL,NULL),(75,1,1,'A',1471472493,'root',NULL,NULL,NULL,NULL);

/*Table structure for table `gestor_usuario` */

DROP TABLE IF EXISTS `gestor_usuario`;

CREATE TABLE `gestor_usuario` (
  `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(50) NOT NULL,
  `NOMBRES` varchar(250) NOT NULL,
  `APELLIDOS` varchar(250) NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `CLAVE` varchar(50) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `NIVEL_ACCESO` int(10) NOT NULL,
  `FECHA_CREACION` int(10) NOT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `gestor_usuario` */

insert  into `gestor_usuario`(`ID_USUARIO`,`USUARIO`,`NOMBRES`,`APELLIDOS`,`EMAIL`,`CLAVE`,`TELEFONO`,`NIVEL_ACCESO`,`FECHA_CREACION`,`USUARIO_CREACION`,`PC_CREACION`,`FECHA_ACTUALIZACION`,`USUARIO_ACTUALIZACION`,`PC_ACTUALIZACION`) values (1,'banton','BYRON ','ANTON','banton5_9@hotmail.com','1234','0993800504',20,1411358676,NULL,NULL,NULL,NULL,NULL),(2,'yguachamin','YESSICA ','GUACHAMIN','yguachamin@hotmail.com','567','0993800504',50,9,NULL,NULL,NULL,NULL,NULL),(3,'kjkjk','jkjkj','jkjkj','jkjkj','jkjk','jkjkj',10,1411358676,NULL,NULL,NULL,NULL,NULL),(4,'okokok','kpkp','kpkp','pkpk','pkpk','pkpk',40,1411358781,NULL,NULL,NULL,NULL,NULL),(5,'jarreaga','Jose','Arreaga','jarreaga@mail.com','','0999999999',10,1411527161,NULL,NULL,NULL,NULL,NULL),(6,'sgranda','Stalyn','Granda','sgranda@mail.com','prueba','0999999999',10,1411527869,NULL,NULL,NULL,NULL,NULL),(7,'FEFE','EFEF','','','','',10,1411531518,NULL,NULL,NULL,NULL,NULL),(8,'nmnm','kkn','knkn','nkn','4e140f2cb07a662b4b14d374762d7ba5','nkn',40,1411962384,NULL,NULL,NULL,NULL,NULL),(9,'jkhjkh','jkjk','jkj','kjkj','7cef3cc8a3288ba7a374617f1956318d','jkjk',40,1411963219,NULL,NULL,NULL,NULL,NULL),(10,'scsc','scs','scs','scs','a59c8f86f499c8e5d8896946bb07af49','scs',10,1424568464,NULL,NULL,NULL,NULL,NULL),(11,'bgbg','bgb','gbgbb','bgbg','2ba20d57b5b752d83cebf77a4db3ff30','gbgb',10,1424569083,NULL,NULL,NULL,NULL,NULL),(12,'aa','aaaa','aa','a','7960b521125ec71f49031dea24d0c3a7','1',10,1465681169,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `gestor_usuarios_areas` */

DROP TABLE IF EXISTS `gestor_usuarios_areas`;

CREATE TABLE `gestor_usuarios_areas` (
  `id` int(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fecha_creacion` int(11) DEFAULT NULL,
  `USUARIO_CREACION` varchar(50) DEFAULT NULL,
  `PC_CREACION` varchar(50) DEFAULT NULL,
  `FECHA_ACTUALIZACION` int(10) DEFAULT NULL,
  `USUARIO_ACTUALIZACION` varchar(50) DEFAULT NULL,
  `PC_ACTUALIZACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `gestor_usuarios_areas` */

/* Procedure structure for procedure `SP_EXISTE_AREA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_EXISTE_AREA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EXISTE_AREA`(ID INT,OUT TOTAL INT)
BEGIN
     SELECT COUNT(*)INTO TOTAL
     FROM GESTOR_AREAS
WHERE ID_AREA=ID;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_EXISTE_NO_LABORABLE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_EXISTE_NO_LABORABLE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EXISTE_NO_LABORABLE`(ID_DIA INT,OUT TOTAL INT)
BEGIN
     SELECT COUNT(*)INTO TOTAL
     FROM gestor_dias_no_laborables
WHERE ID=ID;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_EXISTE_TEMA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_EXISTE_TEMA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EXISTE_TEMA`(ID INT,OUT TOTAL INT)
BEGIN
     SELECT COUNT(*)INTO TOTAL
     FROM GESTOR_AREA
WHERE ID_AREA=ID;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_EXISTE_TEMA_AREA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_EXISTE_TEMA_AREA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EXISTE_TEMA_AREA`(ID INT,OUT TOTAL INT)
BEGIN
     SELECT COUNT(*)INTO TOTAL
     FROM GESTOR_TEMAS_AREAS
WHERE ID_AREA=ID;
    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_inactiva_gestor_areas` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_inactiva_gestor_areas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inactiva_gestor_areas`(AREA INT )
BEGIN
    UPDATE gestor_areas
    SET  ESTADO='I',
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    
   
    WHERE ID_AREA=AREA;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INACTIVA_NO_LABORABLE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INACTIVA_NO_LABORABLE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INACTIVA_NO_LABORABLE`(ID_DIA INT )
BEGIN

 UPDATE gestor_dias_no_laborables
    SET ESTADO='I',
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    WHERE ID=ID_DIA;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INACTIVA_TEMA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INACTIVA_TEMA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INACTIVA_TEMA`(ID INT)
BEGIN
    UPDATE gestor_TEMAS
    SET ESTADO='A',
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    WHERE ID_TEMA=ID;
   
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INACTIVA_TEMA_AREA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INACTIVA_TEMA_AREA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INACTIVA_TEMA_AREA`(ID_TA INT)
BEGIN

  UPDATE gestor_TEMAS_AREAS
    SET ESTADO='I',
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    WHERE ID=ID_TA;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERT_GESTOR_AREAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERT_GESTOR_AREAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERT_GESTOR_AREAS`(NOMBRE VARCHAR(250),DESCRIPCION VARCHAR(250))
BEGIN

 insert  into `gestor_areas`(`NOMBRE`,
                             `ESTADO`,
                             `DESCRIPCION`,
                             `FECHA_CREACION`,
                             `USUARIO_CREACION`,
                             `PC_CREACION`,
                             `FECHA_ACTUALIZACION`,
                             `USUARIO_ACTUALIZACION`,
                             `PC_ACTUALIZACION`)
                              values (NOMBRE,
                                      'A',
                                      DESCRIPCION,
                                       UNIX_TIMESTAMP( NOW()),
                                       LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1),
                                       NULL,
					NULL,
					NULL,
					NULL);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERT_TEMAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERT_TEMAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERT_TEMAS`(NOMBRE VARCHAR(250))
BEGIN

    insert  into `gestor_TEMAS`(`NOMBRE`,
                             `FECHA_CREACION`,
                             `USUARIO_CREACION`,
                             `PC_CREACION`,
                             `FECHA_ACTUALIZACION`,
                             `USUARIO_ACTUALIZACION`,
                             `PC_ACTUALIZACION`,
                             `ESTADO`)
                              values (NOMBRE,
                                      UNIX_TIMESTAMP( NOW()),
                                       LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1),
                                       NULL,
					NULL,
					NULL,
					NULL,
                                        'A');
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSERT_TEMAS_AREAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSERT_TEMAS_AREAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERT_TEMAS_AREAS`(ID_TEMA INT,ID_AREA INT )
BEGIN
      insert  into `gestor_TEMAS_AREAS`(`ID_TEMA`,
                                 `ID_AREA`,
                             `ESTADO`,
                             `FECHA_CREACION`,
                             `USUARIO_CREACION`,
                             `PC_CREACION`,
                             `FECHA_ACTUALIZACION`,
                             `USUARIO_ACTUALIZACION`,
                             `PC_ACTUALIZACION`)
                              values (ID_TEMA,
                                      ID_AREA,
                                      'A',
                                      UNIX_TIMESTAMP( NOW()),
                                       LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1),
                                       NULL,
					NULL,
					NULL,
					NULL);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_INSER_NO_LABORABLE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_INSER_NO_LABORABLE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSER_NO_LABORABLE`(FECHA INT,MOTIVO VARCHAR(100),ESTADO VARCHAR(1))
BEGIN

 insert  into `gestor_dias_no_laborables`(`FECHA`,
                             `MOTIVO`,
                             `ESTADO`,
                             `FECHA_CREACION`,
                             `USUARIO_CREACION`,
                             `PC_CREACION`)
                              values (FECHA,
                                      MOTIVO,
                                      ESTADO,
                                       UNIX_TIMESTAMP( NOW()),
                                       LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1),
                                       NULL);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_UPDATE_GESTOR_AREAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_UPDATE_GESTOR_AREAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UPDATE_GESTOR_AREAS`(NOMB VARCHAR(250),EST VARCHAR(1),AREA INT )
BEGIN
    UPDATE gestor_areas
    SET NOMBRE=IFNULL(NOMB,NOMBRE), ESTADO=IFNULL(EST,ESTADO),
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    
   
    WHERE ID_AREA=AREA;
    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_UPDATE_NO_LABORABLE` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_UPDATE_NO_LABORABLE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UPDATE_NO_LABORABLE`(FEC INT, MOT VARCHAR(100),ID_DIA INT )
BEGIN

 UPDATE gestor_dias_no_laborables
    SET FECHA=IFNULL(FEC,FECHA), MOTIVO=IFNULL(MOT,MOTIVO),
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    WHERE ID=ID_DIA;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_UPDATE_TEMAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_UPDATE_TEMAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UPDATE_TEMAS`(NOM VARCHAR(250),ID INT)
BEGIN
    UPDATE gestor_TEMAS
    SET NOMBRE=IFNULL(NOM,NOMBRE),
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    WHERE ID_TEMA=ID;
    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_UPDATE_TEMA_AREA` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_UPDATE_TEMA_AREA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UPDATE_TEMA_AREA`(ID_T INT,ID_A INT ,ID_TA INT)
BEGIN

  UPDATE gestor_TEMAS_AREAS
    SET ID_TEMA=IFNULL(ID_T,ID_TEMA),
        ID_AREA=IFNULL(ID_A,ID_AREA),
    FECHA_ACTUALIZACION=UNIX_TIMESTAMP( NOW()),
    USUARIO_ACTUALIZACION=LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1)
    WHERE ID=ID_TA;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
