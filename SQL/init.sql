create table `main`(
	`id` int(3) primary key auto_increment,
	`time` timestamp NOT NULL,
	`num` varchar(8),
	`stop` varchar(10),
	`comment` varchar(50),
	`latitude` decimal(10,6),
	`longitude` decimal(10,6)
)ENGINE=InnoDB charset=utf8;


create table `rule`(
	`id` int(3) primary key auto_increment,
	`time` timestamp NOT NULL,
	`rule` varchar(100) NOT NULL
)ENGINE=InnoDB charset=utf8;

ALTER TABLE `main` ADD `lon_` DECIMAL(10) NOT NULL AFTER `latitude`, ADD `lat_` DECIMAL(10) NOT NULL AFTER `lon_`;

create TABLE `map`(
	`id` int(3) primary key auto_increment,
	`lon_` decimal(10,6),
	`lat_` decimal(10,6)
) 