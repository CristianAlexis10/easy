<?php
class FichaModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  function selectAll(){
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
  function readAllJor(){
    try {
      $sql="SELECT * FROM jornada";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function update($data){
    try {
      $sql="UPDATE ficha SET nom_ficha = ? , id_jor = ? WHERE id_ficha = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function delete($data){
    try {
      $sql="DELETE FROM ficha WHERE id_ficha = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function newRegister($data){
    try {
      $sql="INSERT INTO ficha VALUES (?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function selectBy($data){
    try {
      $sql="SELECT * FROM ficha WHERE id_ficha=?";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }


  function selectAllBy($user){
    $sql = "SELECT * FROM instructor_ficha  INNER JOIN ficha ON instructor_ficha.id_ficha = ficha.id_ficha INNER JOIN jornada ON ficha.id_jor  = jornada.id_jor  WHERE id_ins = ?";
    $query = $this->pdo->prepare($sql);
    $query->execute(array($user));
    $result = $query->fetchAll(PDO::FETCH_BOTH);
    return $result;
  }
  function informacionInstructor($data){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id INNER JOIN instructor ON usuario.usu_codigo = instructor.usu_codigo INNER JOIN ciudad ON usuario.ciu_codigo=ciudad.ciu_codigo WHERE usuario.usu_codigo = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
}
?>
