
<div class="contentUser">
  <div class="title">
    <h1>Detalles</h1>
  </div>
  <div class="wrapTable">
    <p>Actividad: <?php echo  $data['nom_act'] ?></p>
    <p>Fecha De realización: <?php echo  $data['fecha_realizacion'] ?></p>
    <p>Ficha: <?php echo  $data['id_ficha'] ?></p>
  <table class="datatable">
        <thead>
            <tr>
                <th>aprendiz</th>
                <th>Hora de entrada</th>
            </tr>
        </thead>
        <tbody>
          <?php
              foreach ($this->readAssis($_GET['data']) as $row) {?>
                <tr>
                  <td><?php echo $row['usu_nombre']." ".$row['usu_apellido'];?></td>
                  <td><?php echo $row['hora_entrada'];?></td>
                </tr>
            <?php   }  ?>
        </tbody>
      </table>
    </div>
  </div>
