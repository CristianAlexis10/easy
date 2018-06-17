<?php
require_once "model/instructor.model.php";
class InstructorController{
  private $ins;
  function __CONSTRUCT(){
    $this->ins = new InstructorModel();
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
  function selectAllFichas(){
    $result = $this->ins->selectAllFichas();
    return $result;
  }
  function selectAllFichasBy(){
    $result = $this->ins->selectIns($_SESSION['INS']);
    $result = $this->ins->selectAllFichasBy($result['id_ins']);
    return $result;
  }
  function endRegister(){
    $result = $this->ins->selectIns($_SESSION['INS']);
    $result = $this->ins->selectAllFichasBy($result['id_ins']);
    if ($result==array()) {
      echo json_encode("Selecciona al menos una ficha.");
    }else{
      unset($_SESSION['INS']);
      echo json_encode(true);
    }
  }
  function asigar_fichasSave(){
    $result = $this->ins->selectIns($_POST['instructor']);
    $result = $this->ins->asigar_fichasSave(array($result['id_ins'],$_POST['ficha']));
    echo json_encode($result);
  }
}
?>
