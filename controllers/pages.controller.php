<?php

/**
 *
 */
class PagesController extends Controller
{

public function index(){
  echo "Тут у нас будут списки страниц";
}

public function view(){
  $params = App::getRouter()->getParams();

  if(isset($params[0])){
    $alias = strtolower($params[0]);

    echo "Теперь мы на странице по адрессу " . $alias;
  }
}
}


 ?>
