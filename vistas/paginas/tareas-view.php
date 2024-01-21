<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tareas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Tareas</li>
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
          <?php if ($_SESSION['privilegio_spm'] === 2 or  $_SESSION['privilegio_spm'] === 4) { ?>
            <a href="<?php echo SERVERURL . "tarea-create" ?>" class="btn btn-default">Agregar tarea</a>
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
              <table class="table table-striped  text-nowrap table-sm" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tarea</th>
                    <th>Departamento</th>
                    <th>Estatus</th>
                    <th class="text-center">Acciones</th>


                  </tr>
                </thead>
                <tbody>

                  <?php
                  require_once "./controladores/tareaControlador.php";
                  $ins_controlador = new tareaControlador();
                  $mainModel = new mainModel();

                  $lista =  $ins_controlador->listar_tarea_controlador();
                  $tabla = "";
                  $contador = 0;
                  foreach ($lista as $fila) {

                    $contador = $contador + 1;
                    $tabla .= "<tr>";

                    $tabla .= "<td>$contador  </td>";
                    $fecha_formateada = date("d M, Y H:i A", strtotime($fila['created_at']));
                    setlocale(LC_TIME, "es_VE");

                    $tabla .= "
                                        <td>
                                            <a>$fila[titulo_tarea]</a>
                                            <br/>
                                           
                                            <small>Creado $fila[creador]</small>
                                        </td>";

                    $tabla .= "
                                        <td>
                                            <a>$fila[nombre_departamento]</a>
                                            <br/>
                                            <small>Creado $fecha_formateada</small>
                                            
                                        </td>";

                    $tabla .= '
                                        <td class="project-state">
                                            <span class="badge ';

                    // cambio de color en badge

                    if ($fila['estatus_tarea'] === 'abierto') {
                      $tabla .=  "badge-info";
                    } elseif ($fila['estatus_tarea'] === 'cerrado') {
                      $tabla .=  "badge-danger";
                    } else if ($fila['estatus_tarea'] === 'completado') {
                      $tabla .= "badge-success";
                    }


                    $tabla .=  '">' . $fila['estatus_tarea'] . '</span>
                                        </td>';

                    $tabla .= '
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="' . SERVERURL . 'tarea/' . $mainModel::encryption($fila['tarea_id']) . '/">
                                                <i class="fas fa-folder"></i> Ver
                                            </a>';

                    // Mostrar el boton de cancelar solo si

                    // el departamento es recepcion o gerencia
                    if ($_SESSION['privilegio_spm'] === 2 or  $_SESSION['privilegio_spm'] === 4) {

                      // Si esta cerrado ocultar el boton

                      if ($fila['estatus_tarea'] ===  'abierto') {
                        $tabla .= '
                                                <form class="FormularioAjax" action="' . SERVERURL . 'ajax/tareaAjax.php" method="POST" data-form="update" autocomplete="off">
                                                <input type="hidden" name="tarea_id_del" value="' . mainModel::encryption($fila['tarea_id']) . '">
                                                <input type="hidden" name="tipo_cambio" value="cerrado">
                                                <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-trash"></i> Cancelar
                                                </button>
                                              </form>
                                                ';
                      }
                    }




                    $tabla .= '</td>';


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