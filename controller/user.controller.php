<?php
require_once "model/user.model.php";
class UserController{
  private $user ;
  function __CONSTRUCT(){
    $this->user = new UserModel();
  }
  function main(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/user/index.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function crear(){
    $data  = $_POST['data'];
    $data[]="activo";
    if ($data[0]!="" && $data[1]!="" && $data[3]!="" && $data[5]!="" && $data[8]!="") {
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$data[5])){
            $result = $this->user->crear($data);
            if ($result==1) {
              $token = md5($data[0].$data[1].date("Y"));
              $contra = password_hash("miembrosena", PASSWORD_DEFAULT);
              $dataUser = $this->user->consultarNumero($data[0]);
              $result = $this->user->crearAcceso(array($token,$contra,$dataUser['usu_codigo']));
              if ($result==1) {
                if ($data[9]==2) {
                    $result = $this->user->crearInstructor(array($dataUser['usu_codigo']));
                    if ($result == 1) {
                      echo json_encode("instructor");
                    }else{
                      echo json_encode("error al crear instructor: ".$result);
                    }
                }else if($data[9]==3){
                    $result = $this->user->crearAprendiz(array($dataUser['usu_codigo']));
                    if ($result == 1) {
                      echo json_encode("aprendiz");
                    }else{
                      echo json_encode("error al crear aprendiz: ".$result);
                    }
                }else{
                    echo json_encode(true);
                }
              }else{
                echo json_encode("Error al crear el acceso: ".$result);
              }
            }else{
              echo json_encode("Error al crear usuario: ".$result);
            }
          }else{
              echo json_encode("Formato del correo no valido.");
          }
    }else{
      echo  json_encode("Por favor llena todos los campos que son requeridos.");
    }
  }

  function crearInstructor(){
    $data = $_POST['data'];
    if (length($data) >= 0) {
      foreach ($data as $row) {
        $result = $this->user->crearInsXficha(array($_SESSION['ins'],$row));
      }
      if ($result==1) {
        echo json_encode(true);
      }else{
        echo json_encode("Ocurrio un error: ".$result);
      }
    }else{
      echo json_encode("por favor selecciona una ficha.");
    }
  }
  function crearApren($data){
        $result = $this->user->crearAprenXficha(array($_SESSION['apren'],$data));
      if ($result==1) {
        echo json_encode(true);
      }else{
        echo json_encode("Ocurrio un error: ".$result);
      }
  }
}
?>
