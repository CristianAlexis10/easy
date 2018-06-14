<div class="topMenu">
  <div class="userName">
    <a href="perfil"><h2><?php echo $_SESSION['USER']['NAME']." ".$_SESSION['USER']['LAST_NAME']?></h2></a>
  </div>
  <ul>
      <!-- <a href="#"> --><li id="search"><i class="fas fa-search"></i></li><!-- </a> -->
      <!-- <a href="#"> --><li><i class="fas fa-lock"></i></li><!-- </a> -->
      <a href="finalizar"><li><i class="fas fa-sign-out-alt"></i></li></a>
  </ul>
</div>
<div id="modalSearch" class="wrapModal">
  <div class="modal">
    <form class="formSearch" action="index.html" method="post">
      <div class="title">
        <h1>Buscar</h1>
        <span id="closeSearch">X</span>
      </div>
      <div class="wrapInput">
        <input type="text" required name="" value="">
        <label for="">Buscar por ficha</label>
      </div>
      <div class="wrapInput">
        <button type="button" name="button">buscar</button>
      </div>
    </form>
  </div>
</div>
