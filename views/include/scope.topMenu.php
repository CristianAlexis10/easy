<div class="topMenu">
  <div class="userName">
    <a href="perfil"><h2><?php echo $_SESSION['USER']['NAME']." ".$_SESSION['USER']['LAST_NAME']?></h2></a>
  </div>
  <ul>
      <a href="dashboard"><li><i class="fas fa-home"></i></li></a>
      <a href="finalizar"><li><i class="fas fa-sign-out-alt"></i></li></a>
  </ul>
</div>
<div id="modalSearch" class="wrapModal">
  <div class="modal">
    <form class="formSearch" id="newFicha">
      <div class="title">
        <h1>Nueva Ficha</h1>
        <span id="closeSearch">X</span>
      </div>
      <div class="wrapInput">
        <input type="text" required id="nombre" value="">
        <label for="">Nombre </label>
      </div>
      <div class="wrapInput">
        <input type="text" required id="ficha" value="">
        <label for="">Numero </label>
      </div>
      <div class="wrapInput">
        <select  id="jornada">
          <option value="1">Mañana</option>
          <option value="2">Mixta</option>
          <option value="3">Nocturna</option>
        </select>
      </div>
      <div class="wrapInput">
        <button type="submit" name="button">Agregar</button>
      </div>
    </form>
  </div>
</div>
