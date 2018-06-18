<?php $data = $this->readBy($_GET['data']); ?>
<div class="contentUser">
  <form class="formRegister" id="UpdateUser">
    <div class="title">
      <h1>editar usuario puto el que lo lea</h1>
    </div>
        <div class="wrapInput">
          <select placeholder="seleccionar tipo de documento" class="" id="tipodoc" name="">
            <?php
              if ($data['tipo_documento']=="Tarjeta de identidad") { ?>
                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                <option value="Cedula extranjera">Cedula extranjera</option>
              <?php }else if($data['tipo_documento']=="Cedula de ciudadania"){?>
                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                <option value="Cedula extranjera">Cedula extranjera</option>
              <?php }else{?>
                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                <option value="Cedula extranjera">Cedula extranjera</option>
              <?php } ?>
          </select>
        </div>
        <div class="wrapInput">
          <input required id="documento" type="number" name="" value="<?php echo $data['usu_identificacion'] ?>">
          <label for="documento">Numero de documento</label>
        </div>
        <div class="wrapInput">
          <input required id="nombre1" type="text" name="" value="<?php echo $data['usu_nombre'] ?>">
          <label for="nombre1">Nombre 1</label>
        </div>
        <div class="wrapInput">
          <input  id="nombre2" type="text" name="" value="<?php echo $data['usu_nombre2'] ?>">
          <label for="nombre2">Nombre 2</label>
        </div>
        <div class="wrapInput">
          <input required id="apellido" type="text" name="" value="<?php echo $data['usu_apellido'] ?>">
          <label for="apellido1">apellido 1</label>
        </div>
        <div class="wrapInput">
          <input  id="apellido2" type="text" name="" value="<?php echo $data['usu_apellido2'] ?>">
          <label for="apellido2">apellido 2</label>
        </div>
        <div class="wrapInput">
          <input required id="correo" type="text" name="" value="<?php echo $data['usu_correo'] ?>">
          <label for="correo">correo</label>
        </div>
        <div class="wrapInput">
          <input required id="celular" type="text" name="" value="<?php echo $data['usu_celular'] ?>">
          <label for="celular">celular</label>
        </div>
        <div class="wrapInput">
          <select placeholder="seleccionar tipo de documento" class="" id="ciudad" name="">
            <?php
                foreach ($this->ciudades() as $row) {
                  if ($row['ciu_codigo']==$data['ciu_codigo']) {
                    echo "<option value='".$row['ciu_codigo']."' selected>".$row['ciu_nombre']."</option>";
                  }else{
                    echo "<option value='".$row['ciu_codigo']."'>".$row['ciu_nombre']."</option>";
                  }
                }
            ?>
          </select>
        </div>
        <div class="wrapInput">
          <input required id="direccion" type="text" name="" value="<?php echo $data['usu_direccion'] ?>">
          <label for="direccion">direccion</label>
        </div>
        <div class="wrapInput">
          <input required id="id" type="hidden" name="" value="<?php echo $data['usu_codigo'] ?>" >
        </div>
      <div class="wrapInput">
        <button type="submit" name="button">guardar</button>
      </div>
    </form>
  </div>
