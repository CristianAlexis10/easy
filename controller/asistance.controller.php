<?php
require_once "model/asistance.model.php";
class AsistanceController{
  private $asis;
  function __CONSTRUCT(){
    $this->asis = new AsistanceModel();
  }
  function view(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/asistance/detail.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function main(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2 ) {
      require_once "views/include/docente/scope.header.php";
      require_once "views/modules/docente/asistance/index.php";
      require_once "views/include/docente/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function agregarAlListado(){
    date_default_timezone_set("America/Bogota");
    $data = base64_decode($_POST['data']);
    $data = json_decode($data, true);
    if (is_array($data)) {
      if (isset($data['user_easy']) && $data['user_easy'] == true) {
        $user_id = base64_decode($data['id']);
        $usersAsis = $this->asis->seleccionarAsistentes(array($_SESSION['ACTIVIDAD']));
        if (in_array($user_id,$usersAsis)) {
            echo json_encode("Este aprendiz ya ha sido registrado.");
        }else{
          $hora = date("G:i");
          $result = $this->asis->addAsistencia(array($_SESSION['ACTIVIDAD'],$user_id,$hora));
          if ($result==1) {
            $userData = $this->asis->infoUser($user_id);
            $hora_format = strtotime($hora);
            $hora_format= date("g:i", $hora_format);
            $id = base64_decode($data['id']);
            $data = array("user"=>true,"name"=>$userData['usu_nombre'],"last_name"=>$userData['usu_apellido'],"hora"=>$hora_format,"id"=>$user_id);
            echo json_encode($data);
          }else{
            echo json_encode("Ocurrio un error. ".$result);
          }
        }
      }else{
        echo json_encode("Este codigo QR no es valido para este aplicativo");
      }
    }else{
      echo json_encode("Este codigo QR no es valido para este aplicativo");
    }
  }
  function selectAllFichas(){
    $result = $this->asis->selectAllFichas();
    return $result;
  }

}
?>
