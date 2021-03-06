<?php
class LoginModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  function consultarUsuario($user){
    $sql = "SELECT * FROM usuario WHERE usu_identificacion = ?";
    $query = $this->pdo->prepare($sql);
    $query->execute(array($user));
    $result = $query->fetch(PDO::FETCH_BOTH);
    return $result;
  }
  function consultarAcceso($user){
    $sql = "SELECT * FROM acceso WHERE usu_codigo = ?";
    $query = $this->pdo->prepare($sql);
    $query->execute(array($user));
    $result = $query->fetch(PDO::FETCH_BOTH);
    return $result;
  }
}
?>
