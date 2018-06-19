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
  function detail(){
    if (isset($_SESSION['USER']['ROL']) ) {
      $data = $this->actividad($_GET['data']);
      if ( $_SESSION['USER']['ROL']==2 ) {
        require_once "views/include/docente/scope.header.php";
        require_once "views/modules/docente/asistance/detail.php";
        require_once "views/include/docente/scope.footer.php";
      }else{
        require_once "views/include/scope.header.php";
        require_once "views/modules/docente/asistance/detail.php";
        require_once "views/include/scope.footer.php";
      }
    }else{
      header("Location: inicio");
    }
  }
  function add(){
    date_default_timezone_set("America/Bogota");
    $data = base64_decode($_POST['data']);
    $data = json_decode($data, true);
    if (is_array($data)) {
      if (isset($data['user_easy']) && $data['user_easy'] == true) {
        $user_id = base64_decode($data['id']);
        $userData = $this->asis->infoUser($user_id);
        $usersAsis = $this->asis->seleccionarAsistentes(array($_SESSION['ACTIVIDAD']));
        $user_assis_real = array();
        foreach ($usersAsis as $row) {
          $user_assis_real[] = $row['id_apre'];
        }
        // die(json_encode($user_assis_real));
        if (in_array($userData['id_apre'],$user_assis_real)) {
            echo json_encode("Este aprendiz ya ha sido registrado.");
        }else{
          $hora = date("G:i");
          $result = $this->asis->addAsistencia(array($_SESSION['ACTIVIDAD'],$userData['id_apre'],$hora));
          if ($result==1) {
            $hora_format = strtotime($hora);
            $hora_format= date("g:i", $hora_format);
            $id = base64_decode($data['id']);
            $data = array("user"=>true,"name"=>$userData['usu_nombre'],"last_name"=>$userData['usu_apellido'],"hora"=>$hora_format,"id"=>$userData['id_apre']);
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
  function readAssis($data){
    $result = $this->asis->readAssis(array($data));
    return $result;
  }
  function actividad($data){
    $result = $this->asis->actividad($data);
    return $result;
  }

}
?>
