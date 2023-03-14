<?php

class App{
  protected $controller = "Home";
  protected $method = "index";
  protected $params = [];

  public function __construct(){  //bakal jalan when the class itu jalan
  
  $url = $this->parseUrl();
  if (isset($url[0])) { //checking di variabels
    if(file_exists("../app/controllers/{$url[0]}.php")){
      $this->controller = $url[0];
      unset($url[0]);
    }
  }

  require_once "../app/controllers/{$this->controller}.php"; //getting the controller file
  $this->controller = new $this->controller; //inisiasi the controller class dari controller file

  
  if(isset($url[1])){
    if (method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }
  }

  if (!empty($url)) { //checking the variabel
    $this->params = array_values($url);
  }

  // call di variabel
  call_user_func_array([$this->controller, $this->method], $this->params);
 }

//  add function for parseUrl
public function parseUrl() {
  if(isset($_GET["url"])) {
    $url = rtrim($_GET["url"], "/");
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode("/", $url);
    return $url;
  }
}
}

