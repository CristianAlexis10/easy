<?php
require_once "model/instructor.model.php";
class InstructorController{
  private $ins ;
  function __CONSTRUCT(){
    $this->ins = new InstructorModel();
  }
  function main(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/user/index.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
}
?>
