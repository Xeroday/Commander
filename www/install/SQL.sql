CREATE DATABASE IF NOT EXISTS commander;
USE commander;

CREATE TABLE IF NOT EXISTS users (
	`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`hwid` varchar(255) NOT NULL UNIQUE,
	`pcname` varchar(255),
	`username` varchar(255),
	`os` varchar(255),
	`ip` varchar(255),
	`version` varchar(255),
	`first_seen` varchar(255),
	`last_seen` varchar(255),
	`current_command` varchar(255),
	`command_seen` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE = InnoDB CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hwid` varchar(255) NOT NULL,
  `pcname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `first_seen` varchar(255) DEFAULT NULL,
  `last_seen` varchar(255) DEFAULT NULL,
  `current_command` varchar(255) DEFAULT NULL,
  `command_seen` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hwid` (`hwid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;