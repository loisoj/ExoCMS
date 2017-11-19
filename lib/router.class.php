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

    if (count($path_parts)){
      //Получаем язык или роут первым элементом

      if(in_array(strtolower(current($path_parts)), array_keys($routes) ) ){
        $this->route = strtolower(current($path_parts));
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        array_shift($path_parts);
      }elseif (in_array(strtolower(current($path_parts)), Config::get('languages') )) {
        $this->languages = strtolower(current($path_parts));
        array_shift($path_parts);
      }
      //Получаем контроллер- след. элемент массива
      if(current($path_parts)){
        $this->controller = strtolower(current($path_parts));
        array_shift($path_parts);
      }

      //Получаем Экшен
      if(current($path_parts)){
        $this->action = strtolower(current($path_parts));
        array_shift($path_parts);
      }


      //получение всех параметров
      $this->params = $path_parts;


    }
  }

}
 ?>
