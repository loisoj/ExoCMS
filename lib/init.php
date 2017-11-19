<?php

require_once(ROOT.DS.'config'.DS.'config.php');

function __autoload($class_name){
  $lib_path = ROOT.DS.'lib'.DS.strtolover($class_name).'.class.php';
  $controllers_path = ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolover($class_name)).'.controller.php';
  $model_path = ROOT.DS.'models'.DS.strtolover($class_name).'.php';

  if (file_exists($lib_path)) {
    require_once($lib_path);
  } elseif (file_exists($controllers_path)) {
    require_once($controllers_path);
  } elseif (file_exists($model_path)) {
    require_once($model_path);
  } else {
    throw new Exception('Не удалось подключить класс: '.$class_mane);
  }

}


