<?php
require_once "model/ficha.model.php";
class FichasController{
  private $ficha;
  function __CONSTRUCT(){
    $this->ficha = new FichaModel();
  }
  function main(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/fichas/index.php";
      require_once "views/include/scope.footer.php";
    }else if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2 ){
      $data = $this->ficha->informacionInstructor($_SESSION['USER']['ID']);
      $fichas = $this->ficha->selectAllBy($data['id_ins']);
      require_once "views/include/docente/scope.header.php";
      require_once "views/modules/docente/fichas/index.php";
      require_once "views/include/docente/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function viewUpdate(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/fichas/editar.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }

  function readAll(){
    $result = $this->ficha->selectAll();
    return $result;
  }
  function readAllJor(){
    $result = $this->ficha->readAllJor();
    return $result;
  }
  function selectBy($data){
    $result = $this->ficha->selectBy($data);
    return $result;
  }
  function update(){
    $result = $this->ficha->update(array($_POST['nombre'],$_POST['jornada'],$_POST['ficha']));
    echo json_encode($result);
  }
  function delete(){
    $result = $this->ficha->delete(array($_POST['id']));
    echo json_encode($result);
  }
  function newRegister(){
    $result = $this->ficha->newRegister(array($_POST['ficha'],$_POST['nombre'],$_POST['jornada']));
    echo json_encode($result);
  }




}
?>
