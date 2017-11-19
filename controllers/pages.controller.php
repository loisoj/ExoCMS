<?php

/**
 *
 */
class PagesController extends Controller
{

public function index(){
  $this->data['test_content'] = 'Тут у нас будут списки страниц';
}

public function view(){
  $params = App::getRouter()->getParams();

  if(isset($params[0])){
    $alias = strtolower($params[0]);

    $this->data['content'] = 'Теперь мы на странице по адрессу ' . $alias;
  }
}
}


 ?>
