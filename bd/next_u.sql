/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : next_u

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2018-05-11 00:50:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `fecha_inicio` date DEFAULT '0000-00-00',
  `hora_inicio` time DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT '0000-00-00',
  `hora_finalizacion` time DEFAULT NULL,
  `dia_completo` enum('true','false') DEFAULT NULL,
  `usuario_creador` smallint(6) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `estado` enum('activo','eliminado') DEFAULT 'activo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos
-- ----------------------------
INSERT INTO `eventos` VALUES ('1', 'Entrega proyecto - Next_U', '2018-05-12', '00:00:00', '2018-05-13', '00:00:00', 'true', '1', '2018-05-11 00:22:15', '2018-05-11 07:47:59', 'eliminado');
INSERT INTO `eventos` VALUES ('2', 'Evento de las flores', '2018-05-21', '08:30:00', '2018-05-24', '16:30:00', 'false', '1', '2018-05-11 00:24:47', null, 'activo');
INSERT INTO `eventos` VALUES ('3', 'Reunión Familiar', '2018-05-06', '12:30:00', '2018-05-09', '21:30:00', 'false', '1', '2018-05-11 00:30:28', null, 'activo');
INSERT INTO `eventos` VALUES ('4', 'Salida de campo', '2018-05-14', '11:00:00', '2018-05-16', '20:30:00', 'false', '2', '2018-05-11 00:38:58', null, 'activo');
INSERT INTO `eventos` VALUES ('5', 'Reunión laboral', '2018-05-30', '00:00:00', '0000-00-00', '00:00:00', 'true', '2', '2018-05-11 00:39:23', null, 'activo');
INSERT INTO `eventos` VALUES ('6', 'Exposición artes', '2018-05-11', '06:30:00', '2018-05-13', '22:30:00', 'false', '1', '2018-05-11 00:48:28', null, 'activo');
INSERT INTO `eventos` VALUES ('7', 'Evento informativo', '2018-05-08', '00:00:00', '0000-00-00', '00:00:00', 'true', '3', '2018-05-11 00:49:52', null, 'activo');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('activo','inactivo','eliminado') DEFAULT 'activo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Nelson Boada', 'nboadam1@gmail.com', '1a3447f43ae92b09a5095a77405bfb97ef129d71', '1995-03-06', '2018-05-10 00:20:16', 'activo');
INSERT INTO `usuarios` VALUES ('2', 'Steven Muñoz', 'smunoz@gmail.com', '1a3447f43ae92b09a5095a77405bfb97ef129d71', '1995-03-07', '2018-05-10 00:21:07', 'activo');
INSERT INTO `usuarios` VALUES ('3', 'Nicol Vargas', 'nvargas@gmail.com', '1a3447f43ae92b09a5095a77405bfb97ef129d71', '1993-06-17', '2018-05-10 00:21:34', 'activo');
