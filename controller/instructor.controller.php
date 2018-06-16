<?php
require_once "model/instructor.model.php";
class InstructorController{
  private $apren;
  function __CONSTRUCT(){
    $this->apren = new InstructorModel();
  }
  function asigar_fichas(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/user/asignar_fichas_instructor.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
}
?>
