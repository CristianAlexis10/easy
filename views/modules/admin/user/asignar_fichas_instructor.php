<div class="contentUser">
    <div class="title">
      <h1>asignar ficha</h1>
    </div>
    <div class="wrapTable">
      <a href="#" id="endRegister">Terminar Registro</a>
    <table class="datatable">
          <thead>
              <tr>
                  <th>Nº Ficha</th>
                  <th>Programa</th>
                  <th>accion</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $id = 1;
            $fichas = $this->selectAllFichasBy();
            $fi = array();
            foreach ($fichas as $row) {
              $fi[] = $row["id_ficha"];
            }
             foreach ($this->selectAllFichas() as $row) {
               if (in_array($row['id_ficha'],$fi)) {?>

              <?php  }else{?>
                  <tr>
                    <td><?php echo $row['id_ficha'];?></td>
                    <td><?php echo $row['nom_ficha'];?></td>
                    <td>
                      <a href="#" id="<?php echo $id?>" onclick="asignar_ficha_instructor(<?php echo $row['id_ficha'];?>,<?php echo $_SESSION['INS'];?>,<?php echo $id;?>)">agregar</a>
                    </td>
                  </tr>
               <?php } ?>
            <?php $id++; }?>
          </tbody>
        </table>
      </div>
</div>
