<?php

namespace Models;

class Home{

  private $db;

  public function __construct() {
    $this->db = new \Core\Database();
  }
  
  public function findCursos(){
    $sql = "SELECT cursoId, cursoNome FROM curso ORDER BY cursoNivel";
    $this->db->query($sql);
    return $this->db->resultSet();
  }

  public function findDisciplinas(){
    $sql = "SELECT disciplinaId, disciplinaNome, disciplinaCurso FROM disciplina";
    $this->db->query($sql);
    return $this->db->resultSet();
  }

  public function findOfertasByAno($ano){
    $sql = "SELECT ofertaId, ofertaCodigo, ofertaAno, ofertaPeriodo, ofertaDisciplina, ofertaLink FROM oferta WHERE ofertaAno = $ano";
    $this->db->query($sql);
    return $this->db->resultSet();
  }

  public function findProjetosByTipo($tipo) {
    $sql = "SELECT * FROM projeto WHERE projetoTipo = '$tipo' ORDER BY  projetoDataInicio DESC,  projetoDataFim DESC, projetoTitulo ASC";
    $this->db->query($sql);
    return $this->db->resultSet();
  }
  
}
