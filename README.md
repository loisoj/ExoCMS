///
```
1)Все прикручивается в ручную, конфиги подключения к DB лежат в config/config.php, там же лежит Соль
2)Соль учавствует в генерации паролей пользователей(хэш-сумм), по сему ее надо устанавливать/менять
3)Весь код прокоментирован, что- куда, зачем- откуда и.т.д.```


Описание генерации БД и создания учетки администратора:
///

Генерация базы данных(SQL запрос):

```create database exo;

use exo;

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
) engine=InnoDB default charset=utf8;```

///
Генерация администратора, пока что SQL запроссом(не знаю дойдут ли руки):

```INSERT INTO users
SET login = 'admin', email='admin@your-site.com', role='admin', `password` = md5('stp8kwcle45me32jf6gbekradmin');```


///
Док- некоторых функций:

Session::setFlash(''); -  вызывает симпотичное окно в одном стиле;
Router::redirect(''); - ну тут думаю понятно, редирект он и в африке редирект;
echo _lang_('lng.test', 'default value'); -заложенный фундамент многоязычности, подробнее что такое lng.test можете посмотреть в /lang/ru.php(en.php или fr.php)
Session::get('login') - проверка вошел ли пользователь
