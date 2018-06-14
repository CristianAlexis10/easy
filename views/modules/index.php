<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>easy atendance</title>
    <link rel="stylesheet" href="views/assets/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Roboto:400,700" rel="stylesheet">
  </head>
  <body>
    <section>
      <div class="wrapLogin">
        <div class="loginLeft">
          <p>¡ tomar asistencia nunca habia sido tan fácil !</p>
          <div class="efect"></div>
          <img class="backgroundLoginLeft" src="views/assets/img/checklist-2077020_1280.jpg" alt="">
        </div>
        <div class="loginRight">
          <form class="formLogin" id="login">
            <div class="wrapInput">
              <img class="logo" src="views/assets/img/logo.png" alt="">
            </div>
            <div class="wrapInput">
              <input id="user" type="text" name="data[]" value="" required>
              <label for="user">usuario</label>
            </div>
            <div class="wrapInput">
              <input id="password" type="password" name="data[]" value="" required>
              <label for="password">contraseña</label>
            </div>
            <div class="wrapInput">
              <button type="submit" name="button">iniciar sesion</button>
            </div>
          </form>
        </div>
      </div>
      <div class="wrapBackground">
        <div class="backgroundRight"></div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="views/assets/js/main-user.js"></script>
  </body>
</html>
