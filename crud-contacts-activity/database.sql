create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `number` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);