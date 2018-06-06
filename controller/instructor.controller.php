<?php
require_once "model/instructor.model.php";
class InstructorController{
  private $ins ;
  function __CONSTRUCT(){
    $this->ins = new InstructorModel();
  }
  function main(){
      require_once "views/include/scope.header.php";
      require_once "views/modules/user/index.php";
      require_once "views/include/scope.footer.php";
  }
}
?>
