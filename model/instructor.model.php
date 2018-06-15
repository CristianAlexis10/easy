<?php
class InstructorModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  function selectAll(){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
}
?>
