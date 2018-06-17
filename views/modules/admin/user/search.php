<div class="contentUser">
  <div class="title">
    <h1>usuarios</h1>
  </div>
  <ul class="optionModule">
    <a href="#"><li id="search"><i class="fas fa-search"></i> buscar</li></a>
  </ul>
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
                  <a href="editar-usuario-<?php echo $row['usu_codigo'];?>"><i class="fas fa-edit"></i></a>
                  <?php
                    if ($row['usu_estado']=="activo") {?>
                      <a href="#" onclick="inactivar_usuario(<?php echo $row['usu_codigo'];?>)"><i class="fas fa-user-times"></i></a>
                    <?php }else{?>
                      <a href="#" onclick="activar_usuario(<?php echo $row['usu_codigo'];?>)"><i class="fas fa-user-plus  "></i></a>
                  <?php  }   ?>
                </td>
              </tr>
          <?php $id++; }?>
        </tbody>
      </table>
    </div>
  </div>
