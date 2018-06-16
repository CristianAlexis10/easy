<div class="contentUser">
  <form class="formRegister" action="index.html" method="post">
    <div class="title">
      <h1>perfil de usuario</h1>
    </div>
    <div class="wrapInfo">
      <p>aqui podras modificar la informacion de tu perfil de ser necesario</p>
    </div>
    <div class="wrapInput">
      <select placeholder="seleccionar tipo de documento" class="" id="tipodoc" name="">
        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
        <option value="Cedula de ciudadania">Cedula de ciudadania</option>
        <option value="Cedula extranjera">Cedula extranjera</option>
      </select>
    </div>
    <div class="wrapInput">
      <input required id="id" type="number" name="" value="" hidden>
    </div>
    <div class="wrapInput">
      <input required id="documento" type="number" name="" value="">
      <label for="documento">Numero de documento</label>
    </div>
    <div class="wrapInput">
      <input required id="nombre1" type="text" name="" value="">
      <label for="nombre1">Nombre 1</label>
    </div>
    <div class="wrapInput">
      <input required id="nombre2" type="text" name="" value="">
      <label for="nombre2">Nombre 2</label>
    </div>
    <div class="wrapInput">
      <input required id="apellido" type="text" name="" value="">
      <label for="apellido1">apellido 1</label>
    </div>
    <div class="wrapInput">
      <input required id="apellido2" type="text" name="" value="">
      <label for="apellido2">apellido 2</label>
    </div>
    <div class="wrapInput">
      <input required id="correo" type="text" name="" value="">
      <label for="correo">correo</label>
    </div>
    <div class="wrapInput">
      <input required id="celular" type="text" name="" value="">
      <label for="celular">celular</label>
    </div>
    <div class="wrapInput">
      <select placeholder="seleccionar tipo de documento" class="" id="ciudad" name="">
        <option value="1">Medellin</option>
        <option value="2">Bogota</option>
      </select>
    </div>
    <div class="wrapInput">
      <input required id="direccion" type="text" name="" value="">
      <label for="direccion">direccion</label>
    </div>
      <div class="wrapInput">
        <button type="submit" name="button">actualizar</button>
      </div>
    </form>
  </div>
