<?php
namespace Geeks\models;

class Db
{
  private $host="localhost";
  private $db="cena";
  private $user="root";
  private $pass;
  public $conexion=null;
  public $resultado;

  function __construct()
  {
  }

  public function conectar(){
      $error=null;
      try {
          $this->conexion = new \PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      } catch (PDOException $e) {
          $error=$e->getMessage();
      }
      return $error;
    }
}

?>
