<div class="contentUser">
  <div class="title">
    <h1>Fichas</h1>
  </div>
  <div class="wrapTable">
    <?php $data = $this->selectBy($_GET['data']);
    ?>
    <form  id="modificarFicha">
      <div class="wrapInput">
        <input type="text" id="nombre" value="<?php echo $data['nom_ficha'] ?>">
      </div>
      <div class="wrapInput">
        <select class="" id="jornada" name="">
          <?php
              foreach ($this->readAllJor() as $row) {
                if ($row['id_jor']==$data['id_jor']) {
                  echo "<option value='".$row['id_jor']."' selected>".$row['nom_jor']."</option>";
                }else{
                  echo "<option value='".$row['id_jor']."'>".$row['nom_jor']."</option>";
                }
              }
          ?>
        </select>
      </div>
      <input type="hidden" id="ficha" value="<?php echo $data['id_ficha'] ?>">
  <div class="wrapInput">
      <input type="submit" value="Modificar">
    </div>
    </form>
    </div>
  </div>
