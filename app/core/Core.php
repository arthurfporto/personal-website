<?php

namespace Core;

class Core{

  protected $controller = "\\Controllers\\" . DEFCONTROLLER;
  protected $method = DEFTMETHOD;
  protected $params = [];

  private $url;

  public function __construct() {
    
    if (!empty($this->getUrl())) {
      
      $this->url = $this->getUrl();
      $this->params = explode('/',$this->url);
      
      if ( isset($this->params[0]) && class_exists("\\Controllers\\" . $this->params[0]) ) {
        $this->controller = "\\Controllers\\" . $this->params[0];
      }
      
      $this->params = $this->params ? array_values($this->params) : [];
    }

    $this->controller = new $this->controller();

    if (isset($this->params[1]) && method_exists($this->controller, $this->params[1])) {
      $this->method = $this->params[1];
    }

    call_user_func_array([$this->controller, $this->method], $this->params);

  }

  public function getUrl() {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      return $url;
    }
  }
}
