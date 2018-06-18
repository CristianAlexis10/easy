<?php
require_once "model/asistance.model.php";
class AsistanceController{
  private $login;
  function __CONSTRUCT(){
    $this->login = new LoginModel();
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

}
?>
