<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>easy atendance</title>
    <link rel="stylesheet" href="views/assets/css/docente.css">
    <link rel="stylesheet" href="views/assets/css/multiple-select.css">
    <link rel="stylesheet" href="views/assets/css/selectAutocomplete.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Roboto:400,700" rel="stylesheet">
  </head>
  <body>
    <section class="backgroundContent">
      <?php require ("views/include/docente/scope.topMenu.php"); ?>
      <?php require ("views/include/docente/scope.leftMenu.php"); ?>
<div class="contentUser">
  <div class="container-fluid">
          <div>
              <button id="play"  type="button" class="btn">play</button>
              <button id="stop" type="button" class="btn">pausar</button>
              <button id="stopAll" type="button" class="btn">Terminar</button>
          </div>
          <div class="col-md-6">
              <div class="well">
                  <canvas id="qr-canvas" width="320" height="240"></canvas>
                    <label id="zoom-value" width="100">Zoom: 2</label>
                    <input type="range" id="zoom" value="20" min="10" max="30" onchange="Page.changeZoom();"/>
              </div>
          </div>
          <div class="col-md-6" >
                  <div class="well">
                    <h3>Titulo resultado de aprendizaje</h3>
                      <img id="scanned-img" src="views/assets/img/sena.png" width="240" height="240">
                      <div class="caption">
                        <h3>Asistencia a clase</h3>
                        <p id="scanned-QR"></p>
                      </div>
                  </div>
          </div>
  </div>
</div>
</div>


    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="views/assets/js/multiple-select.js"></script>
    <script src="views/assets/js/select.js"></script>
    <script src="views/assets/js/main-admin.js"></script>
    <script src="views/assets/js/main-user.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="views/assets/js/lector/qrcodelib.js"></script>
    <script type="text/javascript" src="views/assets/js/lector/WebCodeCam.js"></script>
    <script type="text/javascript" src="views/assets/js/generador/base64.js"></script>
    <script type="text/javascript" src="views/assets/js/lector/main.js"></script>
  </body>
</html>
