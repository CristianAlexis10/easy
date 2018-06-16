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
}
?>
