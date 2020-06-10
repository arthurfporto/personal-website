<?php

namespace Core;

class Controller {

  public function model($model) {
    $class = "\\Models\\{$model}";
    return new $class();
  }

  public function view($view, $data = []) {
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      die('view não existe');
    }
  }
}
