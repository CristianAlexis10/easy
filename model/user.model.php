<?php
class   UserModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  function crear($data){
    try {
      $sql="INSERT INTO usuario (usu_identificacion,usu_nombre,usu_nombre2,usu_apellido,usu_apellido2,usu_correo,usu_celular,ciu_codigo,usu_direccion,rol_id,tipo_documento,usu_estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function crearAcceso($data){
    try {
      $sql="INSERT INTO acceso (acc_token,acc_contra,usu_codigo) VALUES (?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function crearInsXficha($data){
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
  function crearAprenXficha($data){
    try {
      $sql="INSERT INTO aprendizxficha (id_aprendiz,id_ficha) VALUES (?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function crearInstructor($data){
    try {
      $sql="INSERT INTO instructor (usu_codigo) VALUES (?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function crearAprendiz($data){
    try {
      $sql="INSERT INTO aprendiz (usu_codigo,fecha_registro) VALUES (?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function cambiarEstado($data){
    try {
      $sql="UPDATE usuario SET usu_estado = ?  WHERE usu_codigo = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = true;
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function consultar($data){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id WHERE usu_codigo = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute($data);
      $result = $query->fecth(PDO::FECTH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
  function consultarNumero($data){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id WHERE usu_identificacion = ?";
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
