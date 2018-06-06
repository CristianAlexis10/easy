<?php
class InstructorModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->exec("SET CHARACTER utf8");
  }
}
?>
