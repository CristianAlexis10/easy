<?php
require_once "model/aprendiz.model.php";
class AprendizController{
  private $apren;
  function __CONSTRUCT(){
    $this->apren = new AprendizModel();
  }
  function asigar_fichas_aprendiz(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/user/asignar_fichas_aprendiz.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }

  function selectAllFichas(){
    $result = $this->apren->selectAllFichas();
    return $result;
  }
  function selectAllFichasBy(){
    $result = $this->apren->selectApren($_SESSION['APREN']);
    $result = $this->apren->selectAllFichasBy($result['id_apre']);
    return $result;
  }
  function asigar_fichasSave(){
    $result = $this->apren->selectApren($_POST['aprendiz']);
    $result = $this->apren->asigar_fichasSave(array($result['id_apre'],$_POST['ficha']));
    echo json_encode($result);
  }
  function endRegister(){
    $result = $this->apren->selectApren($_SESSION['APREN']);
    $result = $this->apren->selectAllFichasBy($result['id_apre']);
    if ($result==array()) {
      echo json_encode("Selecciona al menos una ficha.");
    }else{
      unset($_SESSION['APREN']);
      echo json_encode(true);
    }
  }
}
?>
