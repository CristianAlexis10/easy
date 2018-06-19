<div class="contentUser">
  <div class="title">
    <h1>asistencia</h1>
  </div>
  <div class="wrapTable">

    <table class="datatable">
          <thead>
              <tr>
                  <th>Nombre actividad</th>
                  <th>Fecha Realización </th>
                  <th>Ficha</th>
                  <th>Asistencia</th>
              </tr>
          </thead>
          <tbody>
            <?php
                foreach ($actividades as $row) {?>
                  <tr>
                    <td><?php echo $row['nom_act'];?></td>
                    <td><?php echo $row['fecha_realizacion'];?></td>
                    <td><?php echo $row['id_ficha'];?></td>
                    <td>
                      <a href="detalle-asistencia-<?php echo $row['id_act']?>"><i class="fas fa-eye"></i></a>
                    </td>
                  </tr>
              <?php   }  ?>
          </tbody>
        </table>
    </div>
  </div>
