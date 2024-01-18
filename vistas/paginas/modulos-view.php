<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Módulos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Módulos</li>
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
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Agregar módulo</button>
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
                    <th>Tipo de módulo</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  require_once "./controladores/moduloControlador.php";
                  $ins_modulo = new moduloControlador();
                  $mainModel = new mainModel();

                  $lista =  $ins_modulo->listar_modulo_controlador();
                  $tabla = "";
                  $contador = 0;
                  foreach ($lista as $fila) {
                    $contador = $contador + 1;
                    $tabla .= "<tr>";
                    $tabla .= "<td>$contador</td>";
                    $tabla .= "<td>$fila[nombre]</td>";
                    setlocale(LC_TIME, "es_VE");
                    $fecha_formateada = date("d M, Y H:i A", strtotime($fila['created_at']));
                    $tabla .= "<td>$fecha_formateada</td>";
                    $tabla .= '
                    <td>
                      <a href="' . SERVERURL . 'modulo-update/' . $mainModel::encryption($fila['modulo_id']) . '/">
                        <i class="fas fa-sync-alt"></i>
                      <a/>
                    </td>';

                    $tabla .= '
                    <td>
                      <form class="FormularioAjax" action="' . SERVERURL . 'ajax/moduloAjax.php" method="POST" data-form="delete" autocomplete="off">
                        <input type="hidden" name="modulo_id_del" value="' . mainModel::encryption($fila['modulo_id']) . '">

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


<!-- modal  -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <form class="modal-content FormularioAjax" action="<?php echo SERVERURL; ?>ajax/moduloAjax.php" method="POST" data-form="save" autocomplete="off">
      <div class="modal-header">
        <h4 class="modal-title">Crear módulo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nombre_modulo_form">Describe el módulo</label>
          <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_modulo_form" placeholder="Describe el módulo" maxlength="35" required="" name="nombre_modulo_form">
        </div>
        <p>La creación del módulo es referencial, las funciones del mismo deben desarrollarse individualmente.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrar módulo</button>
      </div>
    </form>

  </div>
</div>