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
    }else if(isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2){
      // require_once "views/include/scope.header.php";
      require_once "views/modules/docente/index.php";
      // require_once "views/include/scope.footer.php";
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
  function readAll(){
    $result = $this->ins->selectAll();
    return $result;
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
  function editProfile(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      require_once "views/include/scope.header.php";
      require_once "views/modules/admin/user/editar.php";
      require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function viewDetail(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1 ) {
      $dataUser = $this->AllInfo($_GET['data']);
    $informacion = $dataUser[0];
    $fichas = $dataUser[1];
      // require_once "views/include/scope.header.php";
      require_once "views/modules/admin/user/detail.php";
      // require_once "views/include/scope.footer.php";
    }else{
      header("Location: inicio");
    }
  }
  function AllInfo($data){
    $data = $this->readBy($data);
    if ($data['rol_id']==2) {
      // instructor
      $result = $this->ins->informacionInstructor($data['usu_codigo']);
      $fichas = $this->ins->fichasInstructor($result['id_ins']);
    }else if($data['rol_id']==3){
      $result = $this->ins->informacionAprendiz($data['usu_codigo']);
      $fichas = $this->ins->fichasAprendiz($data['usu_codigo']);
    }
    return array($result,$fichas);
  }
  function readBy($data){
    $result = $this->ins->readBy($data);
    return $result;
  }
  function ciudades(){
    $result = $this->ins->ciudades();
    return $result;
  }
  function updateUser(){
    $data = $_POST['data'];
    if ($data[0]!="" && $data[1]!="" && $data[3]!="" && $data[5]!="" && $data[8]!="") {
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$data[5])){
            $result = $this->ins->modificarUsuario($data);
            echo json_encode($result);
        }else{
          echo json_encode("formato del correo no valido");
        }
    }else{
      echo json_encode("hay campos que son requeridos");
    }
  }
  function cambiarEstado(){
    $user = $_POST['user'];
    $estado = $_POST['es'];
    $result = $this->ins->cambiarEstado(array($estado,$user));
    echo json_encode($result);
  }
}
?>
