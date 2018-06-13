<?php
require_once "model/instructor.model.php";
class AdminController{
  private $ins ;
  function __CONSTRUCT(){
    $this->ins = new InstructorModel();
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
  function assistance(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/asistance/index.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function profile(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/profile.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function viewUser(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/user/search.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
}
?>
