<div class="contentUser">
  <div class="title">
    <h1>asistencia</h1>
  </div>
    <form class="formActivity" id="newAct">
      <div class="wrapInput">
        <input required type="text" id="nombre" value="">
        <label for="">actividad</label>
      </div>
      <div class="wrapInput">
        <select id="ficha">
          <?php
            foreach ($this->selectAllFichas() as $row) {
              echo "<option value='".$row['id_ficha']."'>".$row['nom_ficha']."(".$row['id_ficha'].")</option>";
            }
          ?>
        </select>
      </div>
      <div class="wrapInput">
        <button type="submit" name="button">guardar</button>
      </div>
    </form>
  </div>
