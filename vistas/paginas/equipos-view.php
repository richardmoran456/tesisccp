<?php

/** redireccionar al inicio si no es gerencia, sistemas o mantenimiento */
if ($_SESSION['privilegio_spm'] === 5 or $_SESSION['privilegio_spm'] === 7 or $_SESSION['privilegio_spm'] === 4 or $_SESSION['privilegio_spm'] === 6) {
  // echo "acceso permitido";
} else {
  echo '
  <script>
  window.location.replace("' . SERVERURL . 'home");
  </script>
  ';
}
?>




<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Equipos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Equipos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">

          <!-- Boton Solo para el departamento de sistemas(7) y mantenimiento(5)  -->
          <?php if ($_SESSION['privilegio_spm'] === 7 or $_SESSION['privilegio_spm'] === 5) {

          ?>
            <a href="<?php echo SERVERURL . "equipo-create" ?>" class="btn btn-default">Agregar equipo</a>
          <?php } ?>


        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div> -->
            <!-- /.card-header -->
            <!-- INICIO::tabla de listamod modulos -->
            <div class="card-body table-responsive">
              <table class="table table-hover text-nowrap table-sm" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Modelo</th>
                    <th>Serial</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  require_once "./controladores/equipoControlador.php";
                  $ins_equipo = new equipoControlador();
                  $mainModel = new mainModel();
                  /** Para cargar los equipos le enviaremos el id del departamento al que pertenece el usuario
                   * 
                   * si es gerencia (4) se le muestran todos los equipo
                   * si es mantenimiento (5) solo sus equipo
                   * si es sistemas (5) solo sus equips
                   * El id esta en la variable sesion $_SESSION['privilegio_spm']
                   */
                  $lista =  $ins_equipo->listar_equipo_controlador($_SESSION['privilegio_spm']);
                  $tabla = "";
                  $contador = 0;
                  foreach ($lista as $fila) {
                    $contador = $contador + 1;
                    $tabla .= "<tr>";
                    $tabla .= "<td>$contador</td>";
                    $tabla .= "<td>$fila[modelo]</td>";
                    $tabla .= "<td>$fila[nserial]</td>";
                    $tabla .= "<td>$fila[estado]</td>";
                    $tabla .= "<td>$fila[descripcion_equipo]</td>";
                    $tabla .= "<td>$fila[tipo_equipo]</td>";
                    setlocale(LC_TIME, "es_VE");
                    $fecha_formateada = date("d M, Y H:i A", strtotime($fila['created_at']));
                    $tabla .= "<td>$fecha_formateada</td>";
                    $tabla .= '
                    <td>
                      <a href="' . SERVERURL . 'equipo-update/' . $mainModel::encryption($fila['equipo_id']) . '/">
                        <i class="fas fa-sync-alt"></i>
                      <a/>
                    </td>';

                    $tabla .= '
                    <td>
                      <form class="FormularioAjax" action="' . SERVERURL . 'ajax/equipoAjax.php" method="POST" data-form="delete" autocomplete="off">
                        <input type="hidden" name="equipo_id_del" value="' . mainModel::encryption($fila['equipo_id']) . '">

                        <button type="submit" class="btn btn-warning">
                          <i class="far fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                    ';


                    $tabla .= "</tr>";
                  }

                  echo $tabla;
                  ?>




                </tbody>
              </table>
            </div>
            <!-- FIN::tabla de listamod modulos -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content -->
</div>