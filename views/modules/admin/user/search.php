<div class="contentUser">
  <div class="title">
    <h1>usuario</h1>
  </div>
  <div class="wrapTable">

  <table class="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>documento</th>
                <th>rol</th>
                <th>accion</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $id = 1;
           foreach ($this->readAll() as $row) { ?>
              <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $row['usu_nombre'];?></td>
                <td><?php echo $row['usu_apellido'];?></td>
                <td><?php echo $row['usu_identificacion'];?></td>
                <td><?php echo $row['rol_nombre'];?></td>
                <td>
                  <a href="editar-usuario-<?php echo $row['usu_codigo'];?>"><i class="fas fa-sync"></i></a>
                  <a href="#" onclick="inactivar_usuario(<?php echo $row['usu_codigo'];?>)">editar</a>
                </td>
              </tr>
          <?php $id++; }?>
        </tbody>
      </table>
    </div>
  </div>
