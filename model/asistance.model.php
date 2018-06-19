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
  function readAssis($id){
    $sql = "SELECT * FROM asistencia  INNER JOIN aprendiz ON asistencia.id_apren = aprendiz.id_apre INNER JOIN usuario ON aprendiz.usu_codigo=usuario.usu_codigo WHERE id_actividad = ?";
    $query = $this->pdo->prepare($sql);
    $query->execute($id);
    $result = $query->fetchAll(PDO::FETCH_BOTH);
    return $result;
  }
  function actividad($id){
    $sql = "SELECT * FROM actividad   WHERE id_act = ?";
    $query = $this->pdo->prepare($sql);
    $query->execute(array($id));
    $result = $query->fetch(PDO::FETCH_BOTH);
    return $result;
  }
  function seleccionarAsistentes($data){
    try {
      $sql = "SELECT aprendiz.id_apre,usuario.usu_codigo FROM asistencia  INNER JOIN aprendiz ON asistencia.id_apren = aprendiz.id_apre INNER JOIN usuario ON aprendiz.usu_codigo=usuario.usu_codigo WHERE  id_actividad = ?";
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
      $sql = "SELECT * FROM usuario   INNER JOIN aprendiz ON usuario.usu_codigo=aprendiz.usu_codigo WHERE usuario.usu_codigo = ?";
      $query = $this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);

    } catch (Exception $e) {
      $result =$e->getMessage();
    }
    return $result;
  }
  function addAsistencia($data){
    try {
      $sql = "INSERT INTO asistencia VALUES (?,?,?)";
      $query = $this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result =$e->getMessage();
    }
    return $result;
  }

}
?>
