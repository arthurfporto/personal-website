<?php

namespace Controllers;

use Core\Controller as Controller;

class Home extends Controller{

  public function __construct() {
    $this->homeModel = $this->model('Home');
  }

  public function index() {

    $cursos = $this->homeModel->findCursos();
    $disciplinas = $this->homeModel->findDisciplinas();
    $ofertas = $this->homeModel->findOfertasByAno(date('Y'));
    $pesquisa = $this->homeModel->findProjetosByTipo('Pesquisa');
    $extensao = $this->homeModel->findProjetosByTipo('Extensão');

    $data = [
      'title' => 'Arthur Porto',
      'cursos' => $cursos,
      'disciplinas' => $disciplinas,
      'ofertas' => $ofertas,
      'pesquisas' => $pesquisa,
      'extensoes' => $extensao
    ];

    $this->view('home/index',$data);
  }
}
