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
  function informacionInstructor($data){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id INNER JOIN instructor ON usuario.usu_codigo = instructor.usu_codigo  WHERE usuario.usu_codigo = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function fichasInstructor($data){
    try {
      $sql="SELECT * FROM  instructor_ficha  WHERE instructor_ficha.id_ins = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function fichasAprendiz($data){
    try {
      $sql="SELECT * FROM   aprendizxficha    WHERE aprendizxficha.id_aprendiz= ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function informacionAprendiz($data){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id INNER JOIN aprendiz ON usuario.usu_codigo = aprendiz.usu_codigo WHERE usuario.usu_codigo = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
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
  function readBy($data){
    try {
      $sql="SELECT * FROM usuario WHERE usu_codigo = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function ciudades($data){
    try {
      $sql="SELECT * FROM ciudad ";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function cambiarEstado($data){
    try {
      $sql="UPDATE usuario SET usu_estado = ? WHERE usu_codigo = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function modificarUsuario($data){
    try {
      $sql="UPDATE usuario SET usu_identificacion = ?, usu_nombre = ? , usu_nombre2 = ? , usu_apellido = ? , usu_apellido2 = ? ,usu_correo = ? ,usu_celular = ?, ciu_codigo  = ? , usu_direccion = ?, tipo_documento = ? WHERE usu_codigo = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
}
?>
