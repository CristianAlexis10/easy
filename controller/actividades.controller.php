<?php
require_once "model/actividades.model.php";
class ActividadesController{
  private $actividades;
  function __CONSTRUCT(){
    $this->actividades = new ActividadesModel();
  }
  function main(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2 ) {
      $data = $this->actividades->informacionInstructor($_SESSION['USER']['ID']);
      $actividades = $this->actividades->selectAllBy($data['id_ins']);
      require_once "views/include/docente/scope.header.php";
      require_once "views/modules/docente/actividades/index.php";
      require_once "views/include/docente/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function llamar_asistencia(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2 ) {
      // require_once "views/include/docente/scope.header.php";
      require_once "views/modules/docente/asistance/llamar.php";
      // require_once "views/include/docente/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }

  function newRegister(){
    $nombre = $_POST['nombre'];
    $ficha = $_POST['ficha'];
    $data = $this->actividades->informacionInstructor($_SESSION['USER']['ID']);
    if ($nombre!="") {
      $fecha =date("Y-m-d");
        $result = $this->actividades->crear(array($nombre,$fecha,$data['id_ins'],$ficha));
        if ($result==1) {
          $act = $this->actividades->selectActividad(array($nombre,$fecha,$ficha));
            $_SESSION['ACTIVIDAD'] = $act['id_act'];
            echo json_encode(true);
        }else{
          echo json_encode("Error".$result);
        }
    }else{
      echo json_encode("Camnpos Requeridos");
    }
  }
}
?>
