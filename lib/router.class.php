<?php
class Router{
  protected $uri;

  protected $controller;

  protected $action;

  protected $params;

  protected $route;

  protected $method_prefix;

  protected $language;

  public function getUri(){
    return $this->uri;
  }

  public function getController(){
    return $this->controller;
  }

  public function getAction(){
    return $this->action;
  }


  public function getParams(){
    return $this->params;
  }


  public function getRoute(){
    return $this->route;
  }

  public function getMethodPrefix(){
    return $this->method_prefix;
  }

  public function getLanguage(){
    return $this->language;
  }

  public function __construct($uri){
    $this->uri = urldecode(trim($uri, '/'));

    //Получаем настройки по умолчанию

    $routes = Config::get('routes');
    $this->route = Config::get('default_route');
    $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
    $this->language = Config::get('default_language');
    $this->controller = Config::get('default_controller');
    $this->action = Config::get('default_action');

    $uri_parts = explode('?', $this->uri);

    //Получаем путь на подобии /lng/controller/action/par1/par2/..../....
    $path = $uri_parts[0];

    $path_parts = explode('/', $path);


    echo "<pre>"; print_r($path_parts);
  }

}
 ?>
