<?php
require_once "./controladores/habitacionControlador.php";
$ins_controlador = new habitacionControlador();

$datos_modulo = $ins_controlador->datos_habitacion_controlador("Unico", $pagina[1]);

if ($datos_modulo->rowCount() == 1) {
  $campos = $datos_modulo->fetch();
}

// var_dump($campos);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Habitación <?= $campos['identificador_habitacion'] ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "recepcion" ?>">Recepcion</a></li>
            <li class="breadcrumb-item active">Habitación <?= $campos['identificador_habitacion'] ?></li>
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
        <div class="col-12">
          <ol>
            <li>Obtener información de la habitacion con el ID <i class="fas fa-check"></i></li>
            <li>Obtener la informacion de los ultimos huespedes</li>
            <li>Mostrar una tabla con los ultimos huespedes</li>
            <li>Mostrar informacion de la habitacion</li>
            <li>Si el estatus es disponible
              <ol>
                <li>Mostrar boton para poner en mantenimiento</li>
                <li>Mostrar el buscador dinamico de clientes</li>
                <li>Permitir la busqueda dinamica de clientes

                  <ol>
                    <li>Si existe el cliente crear la relacion huesped-habitacion</li>
                  </ol>

                </li>
              </ol>
            </li>
            <li>Si el estatus es ocupado
              <ol>
                <li>Obtener la lista del ultimo huesped de la habitacion</li>
                <li>Mostrar la informacion del huesped</li>
                <li>Mostrar boton que permita finalizar el hospedaje</li>
              </ol>
            </li>

            <li>Si el estatus es mantenimiento
              <ol>
                <li>Mostrar boton para cambiar a disponible la habitacion</li>
              </ol>
            </li>
          </ol>
          <hr>
          <ol>
            <li>Al seleccionar mantenimiento se debe generar una tarea de limpieza general de esta habitacion dirigida al departamento de mantenimiento.</li>

          </ol>
          <hr>
          <ol>
            <li>Al seleccionar entregar llave finaliza la estadia del huesped, se actualiza el estatus a disponible.</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalles Habitación</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4">
              <div class="form-group">
                <label for="identificador_habitacion">Identificador de la habitación</label>
                <input type="text" class="form-control" id="identificador_habitacion" placeholder="Ingresa identificacion" required="" name="identificador_habitacion" value="<?= $campos['identificador_habitacion'] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="tipo_habitacion">Tipo de habitación</label>
                <input type="text" class="form-control" id="tipo_habitacion" placeholder="Ingresa identificacion" required="" name="tipo_habitacion" value="<?= $campos['tipo_habitacion'] ?>" readonly>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Acciones recomendadas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4">
              <a class="btn btn-app">
                <i class="fas fa-hand-sparkles"></i> Hacer mantenimiento
              </a>

              <a class="btn btn-app">
                <i class="fas fa-key"></i> Entregar llave
              </a>


            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Huesped</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4">
              <?php
              if ($campos['estatus_habitacion'] === 'disponible') {
              ?>
                <form action="#" id="formularioBusqueda">
                  <div class="form-group">
                    <div class="input-group input-group-md">
                      <input type="search" class="form-control form-control-md" placeholder="Ingresa nombre o cedula del huesped" name="inputsearchhuesped">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-md btn-default">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>


                <div class="list-group" id="listaDinamicaHuespedes">

                </div>
              <?php   } else {  ?>


                <div class="row">

                  <div class="form-group  col-6">
                    <label for="identificador_habitacion">Nombre huesped</label>
                    <input type="text" class="form-control" id="identificador_habitacion" placeholder="José Gregorio Heredia Bracho" required="" value="" readonly>
                  </div>



                  <div class="form-group  col-6">
                    <label for="identificador_habitacion">Documento de identidad</label>
                    <input type="text" class="form-control" id="identificador_habitacion" placeholder="V20890738" required="" value="" readonly>
                  </div>


                  <div class="form-group  col-6">
                    <label for="identificador_habitacion">Entrada</label>
                    <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" required>
                  </div>

                  <div class="form-group col-6 ">
                    <label for="identificador_habitacion">Salida</label>
                    <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" required>
                  </div>

                </div>
              <?php   }  ?>

            </div>
            <!-- /.card-body -->
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Últimos huespedes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <td class="font-weight-bold">#</td>
                    <td class="font-weight-bold">Nombre</td>
                    <td class="font-weight-bold">Entrada</td>
                    <td class="font-weight-bold">Salida</td>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i = 0; $i < 6; $i++) {
                    # code...

                  ?>

                    <tr>
                      <td><?= $i + 1; ?></td>
                      <td>Jose Gregorio Heredia Bracho V20890738</td>

                      <td>22 Ene,2024</td>
                      <td>22 Ene,2024</td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>



    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>