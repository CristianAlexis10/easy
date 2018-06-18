<?php
require_once "model/actividades.model.php";
class ActividadesController{
  private $acti;
  function __CONSTRUCT(){
    $this->actividades = new ActividadesModel();
  }
  function main(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2 ) {
      require_once "views/include/docente/scope.header.php";
      require_once "views/modules/docente/actividades/index.php";
      require_once "views/include/docente/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }

}
?>
