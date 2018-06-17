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
  function selectIns($data){
    try {
      $sql="SELECT * FROM instructor WHERE usu_codigo = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function asigar_fichasSave($data){
    try {
      $sql="INSERT INTO instructor_ficha (id_ins,id_ficha) VALUES (?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function selectAllFichas(){
    try {
      $sql="SELECT * FROM ficha";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function selectAllFichasBy($data){
    try {
      $sql="SELECT * FROM instructor_ficha WHERE id_ins = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
}
?>
