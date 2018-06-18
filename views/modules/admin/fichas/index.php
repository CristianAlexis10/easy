<div class="contentUser">
  <div class="title">
    <h1>Fichas</h1>
  </div>
  <ul class="optionModule">
    <a href="#"><li id="search"><i class="fas fa-plus"></i> Nueva ficha</li></a>
  </ul>
  <div class="wrapTable">
  <table class="datatable">
        <thead>
            <tr>
                <th>N°</th>
                <th>Programa</th>
                <th>accion</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $id = 1;
           foreach ($this->readAll() as $row) { ?>
              <tr>
                <td><?php echo $row['id_ficha'];?></td>
                <td><?php echo $row['nom_ficha'];?></td>
                <td>
                  <a href="editar-ficha-<?php echo $row['id_ficha'];?>"><i class="fas fa-edit"></i></a>
                  <a href="#" onclick="eliminar_ficha(<?php echo $row['id_ficha'];?>)"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
          <?php $id++; }?>
        </tbody>
      </table>
    </div>
  </div>
