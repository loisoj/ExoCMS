use mvc;

create table `pages`(
`id` tinyint(3) unsigned not null auto_increment,
`alias` varchar(100) not null,
`title` varchar(100) not null,
`content` text default null,
`is_published` tinyint(1) unsigned default 0,
primary key (`id`)
) engine = InnoDB default charset=utf8;

insert into `pages` values
(1, 'about', 'About us', 'Test content',1),
(2, 'test', 'Test page', 'Another test content',1);

create table `messages` (
`id` tinyint(3) unsigned not null auto_increment,
`name` varchar(100) not null,
`email` varchar(100) not null,
`messages` text default null,
primary key (`id`)
) engine=InnoDB default charset=utf8;

create table `users` (
`id` smallint(5) unsigned not null auto_increment,
`login` varchar(45) not null,
`email` varchar(100) not null,
`role` varchar(45) not null default 'admin',
`password` char(32) not null,
`is_active` tinyint(1) unsigned default '1',
primary key (`id`)
) engine=InnoDB default charset=utf8;
