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
    <?php if ( $informacion['rol_nombre']=="Aprendiz") {?>
      <div class="wrapInfo">
        <label>Codigo de ingreso (QR):</label>
        <span>  <a href="#" onclick="update_qrcode(Base64.encode('<?php echo $informacion['usu_codigo'];?>'),<?php echo $informacion['usu_identificacion'];  ?>)">Generar Codigo</a> </span>
      </div>
      <div id="qr"></div>
    <?php }?>
  </div>
</div>
