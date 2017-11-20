<?php

/**
 * ExoCms
 */
class GalleryController extends Controller
{

public function __construct($data = array()){
  parent::__construct($data);
  $this->model = new Galleryi();
}

public function index(){
  $this->data['test_content'] = 'hi';
}

public function view(){
  $params = App::getRouter()->getParams();

  if(isset($params[0])){
    $alias = strtolower($params[0]);
    $this->data['content'] = $this->model->getByAlias($alias);
  }
}


}