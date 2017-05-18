create database binlab;

use binlab;

CREATE TABLE `newsfeed` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `paraText` VARCHAR(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);
