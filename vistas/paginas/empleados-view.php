<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Empleados</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Empleados</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!--Vista  para el departamento de RRHH y Gerencia -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">

          <!-- Boton solo estara para el departamento de RRHH -->

          <a href="<?php echo SERVERURL . "empleado-create" ?>" class="btn btn-default">Agregar empleado</a>
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
                    <th>Departamento</th>
                    <th>Puesto</th>
                    <th>Nombre</th>
                    <th>Creado</th>
                    <!-- Acciones solo estara para el departamento de RRHH -->
                    <th>Acciones</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  require_once "./controladores/empleadoControlador.php";
                  $ins_controlador = new empleadoControlador();
                  $mainModel = new mainModel();

                  $lista =  $ins_controlador->listar_empleado_controlador();
                  $tabla = "";
                  $contador = 0;
                  foreach ($lista as $fila) {
                    $contador = $contador + 1;
                    $tabla .= "<tr>";
                    $tabla .= "<td>$contador</td>";
                    $tabla .= "<td>$fila[departamento]</td>";
                    $tabla .= "<td>$fila[puesto]</td>";
                    $tabla .= "<td>$fila[nombre_completo]</td>";
                    setlocale(LC_TIME, "es_VE");
                    $fecha_formateada = date("d M, Y H:i A", strtotime($fila['created_at']));
                    $tabla .= "<td>$fecha_formateada</td>";
                    $tabla .= '
                    <td>
                      <a href="' . SERVERURL . 'empleado-update/' . $mainModel::encryption($fila['empleado_id']) . '/">
                        <i class="fas fa-sync-alt"></i>
                      <a/>
                      <a href="' . SERVERURL . 'reportes/index.php?id=' . $mainModel::encryption($fila['empleado_id']) . '" target="_blank">
                      <i class="fas fa-address-card"></i>
                      <a/>
                    </td>';

                    $tabla .= '
                    <td>
                      <form class="FormularioAjax" action="' . SERVERURL . 'ajax/empleadoAjax.php" method="POST" data-form="delete" autocomplete="off">
                        <input type="hidden" name="empleado_id_del" value="' . mainModel::encryption($fila['empleado_id']) . '">

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