<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once(ROOT.DS.'lib'.DS.'init.php');

$router = new Router($_SERVER['REQUEST_URI']);

    echo "<pre>";
    print_r('Роут: '.$router->getRoute().PHP_EOL);
    print_r('Язык: '.$router->getLanguage().PHP_EOL);
    print_r('Контроллер: '.$router->getController().PHP_EOL);
    print_r('Метод: '.$router->getMethodPrefix().$router->getAction().PHP_EOL);
    echo "Параметры";
    print_r($router->getParams());

echo $_SERVER['REQUEST_URI'];
