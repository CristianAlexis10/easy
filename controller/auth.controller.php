<?php
require_once "model/login.model.php";
class AuthController{
  private $login;
  function __CONSTRUCT(){
    $this->login = new LoginModel();
  }
  function logIn(){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user!="" && $user!=" " && $pass !=  "" && $pass !=  " ") {
      $issetUser= $this->login->consultarUsuario($user);
      if ($issetUser!=array()) {
        $dataAcesso = $this->login->consultarAcceso($issetUser['usu_codigo']);
        if (password_verify($pass,$dataAcesso['acc_contra'])) {
            $_SESSION['USER']['ID']=$issetUser['usu_codigo'];
            $_SESSION['USER']['NAME']=$issetUser['usu_nombre'];
            $_SESSION['USER']['ROL']=$issetUser['rol_id'];
            $_SESSION['USER']['LAST_NAME']=$issetUser['usu_apellido'];
            echo json_encode(true);
        }else{
          echo json_encode("La contraseña es incorrecta.");
        }
      }else{
        echo json_encode("Este Usuario no existe.");
      }
    }else{
      echo json_encode("Los campos son requeridos.");
    }

  }
  function logOut(){
    session_destroy();
    header("Location: inicio");
  }
}
?>
