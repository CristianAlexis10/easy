<?php
class AsistanceModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  function selectAllFichas(){
    $sql = "SELECT * FROM ficha";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_BOTH);
    return $result;
  }
}
?>
