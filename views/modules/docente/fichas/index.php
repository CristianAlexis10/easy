<div class="contentUser">
  <div class="title">
    <h1>fichas</h1>
  </div>
  <div class="wrapTable">

  <table class="datatable">
        <thead>
            <tr>
                <th>N°</th>
                <th>nombre ficha</th>
                <th>Jornada</th>
                <th>ver </th>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach ($fichas as $row) { ?>
              <tr>
                <td><?php echo $row['id_ficha']?></td>
                <td><?php  echo $row['nom_ficha']?></td>
                <td><?php  echo $row['nom_jor']?></td>
                <td>
                  <a href="ver-aprendiz-ficha-<?php  echo $row['id_ficha']?>"><i class="fas fa-eye"></i></a>
                </td>
              </tr>
              <?php }   ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
