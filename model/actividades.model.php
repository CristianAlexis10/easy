<?php
class ActividadesModel{
  private $pdo;
  function __CONSTRUCT(){
    $this->pdo = ConexionBD::openDB();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  function selectAllBy($user){
    $sql = "SELECT * FROM actividad WHERE id_ins = ?";
    $query = $this->pdo->prepare($sql);
    $query->execute(array($user));
    $result = $query->fetchAll(PDO::FETCH_BOTH);
    return $result;
  }
  function informacionInstructor($data){
    try {
      $sql="SELECT * FROM usuario INNER JOIN rol_id ON usuario.rol_id = rol_id.rol_id INNER JOIN instructor ON usuario.usu_codigo = instructor.usu_codigo INNER JOIN ciudad ON usuario.ciu_codigo=ciudad.ciu_codigo WHERE usuario.usu_codigo = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data));
      $result = $query->fetch(PDO::FETCH_BOTH);
    } catch (Exception $e) {
      $result = $e->getMessage();
    }
    return $result;
  }
}
?>
