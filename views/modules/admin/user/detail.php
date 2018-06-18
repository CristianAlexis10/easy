<div class="contentUser">
  <div class="title">
    <h1>detalles del usuario</h1>
  </div>
  <div class="wrapColumns">
    <div class="column1">
      <div class="wrapInfo">
        <label>nombre:</label>
        <span><?php echo $informacion['usu_nombre']." ".$informacion['usu_nombre2']." ".$informacion['usu_apellido']." ".$informacion['usu_apellido2'] ?></span>
      </div>
      <div class="wrapInfo">
        <label>tipo documento:</label>
        <span><?php echo $informacion['tipo_documento']; ?></span>
      </div>
      <div class="wrapInfo">
        <label>fichas asociadas:</label>
        <span><?php echo $ficha ?></span>
      </div>
      <div class="wrapInfo">
        <label>rol:</label>
        <span><?php echo $informacion['rol_nombre']; ?></span>
      </div>
    </div>
    <div class="column2">
      <div class="wrapInfo">
        <label>numero documento:</label>
        <span><?php echo $informacion['usu_identificacion']; ?></span>
      </div>
      <div class="wrapInfo">
        <label>correo:</label>
        <span><?php echo $informacion['usu_correo']; ?></span>
      </div>
      <div class="wrapInfo">
        <label>ciudad:</label>
        <span><?php echo $informacion['ciu_nombre']; ?></span>
      </div>
      <div class="wrapInfo">
        <label>estado:</label>
        <span><?php echo $informacion['usu_estado']; ?></span>
      </div>
    </div>
  </div>
</div>
