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
  function seleccionarAsistentes($data){
    try {
      $sql = "SELECT usuario.usu_codigo FROM asistencia  INNER JOIN aprendiz ON asistencia.id_apren = aprendiz.id_apren INNER JOIN usuario ON aprendiz.usu_codigo=usuario.usu_codigo WHERE  id_actividad = ?";
      $query = $this->pdo->prepare($sql);
      $query->execute($data);
      $result = $query->fetchAll(PDO::FETCH_BOTH);

    } catch (Exception $e) {
      $result =$e->getMessage();
    }
    return $result;
  }
  function infoUser($data){
    try {
      $sql = "SELECT * FROM usuario WHERE  usu_codigo = ?";
      $query = $this->pdo->prepare($sql);
      $query->execute($data);
      $result = $query->fetch(PDO::FETCH_BOTH);

    } catch (Exception $e) {
      $result =$e->getMessage();
    }
    return $result;
  }
}
?>
