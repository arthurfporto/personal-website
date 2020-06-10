<?php
/*
 * Classe de conexão com o Banco utilizando PDO
 * Recebe a SQL e retorna os resultados
 */

namespace Core;

use PDO;
use PDOException;

class Database {
  // Informações vinda do app/config/config.php
  private $db_host = DB_HOST;
  private $db_name = DB_NAME;
  private $db_user = DB_USER;
  private $bd_pass = DB_PASS;

  #Manipulador do Banco para preparar, executar e retornar os resultados. 
  private $pdo;
  private $stmt;
  private $error;

  public function __construct()   {
    // Data Source Name
    $dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name . ";charset=utf8";
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    );
    try {
      $this->pdo = new PDO($dsn, $this->db_user, $this->bd_pass, $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  // Prepara a instrução a partir de uma SQL
  public function query($sql)   {
    $this->stmt = $this->pdo->prepare($sql);
  }

  // Vincula parâmetros à instrução
  public function bind($param, $value, $type = null)   {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  // Executa a instrução
  public function execute()   {
    return $this->stmt->execute();
  }

  // Retornando um conjunto no resultado
  public function resultSet()   {
    $this->execute();
    return $this->stmt->fetchAll();
  }

  // Retornando um único valor
  public function result()   {
    $this->execute();
    return $this->stmt->fetch();
  }

  // Pegando número de linhas retornandas
  public function rowCount()   {
    return $this->stmt->rowCount();
  }
}
