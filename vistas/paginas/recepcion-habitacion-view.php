<?php
require_once "./controladores/habitacionControlador.php";
$ins_controlador = new habitacionControlador();

$datos_modulo = $ins_controlador->datos_habitacion_controlador("Unico", $pagina[1]);

if ($datos_modulo->rowCount() == 1) {
  $campos = $datos_modulo->fetch();
}


require_once "./controladores/gestorHabitacionControlador.php";
$ins_habitacion = new gestorHabitacionControlador();

$lista_huespedes =  $ins_habitacion->listar_ultimos_huespedes($campos['habitacion_id']);
$huesped_activo = [];
$con = 0;
foreach ($lista_huespedes as $fila) {
  $con = 1 + $con;
  if ($con === 1) {
    $huesped_activo = $fila;
  }

  $tabla .= "<tr>";

  $tabla .= "<td>" . $fila['nombre_completo'] . " " . $fila['documento'] . "</td>";
  $fecha_formateada_entrada = date("d M, Y H:i A", strtotime($fila['entrada']));
  $tabla .= "<td>" . $fecha_formateada_entrada . "</td>";
  $fecha_formateada_salida = date("d M, Y H:i A", strtotime($fila['salida']));
  $tabla .= "<td>" . $fecha_formateada_salida . "</td>";
  $tabla .= "</tr>";
}

if (count($lista_huespedes) === 0) {
  $tabla .= "<tr><td colspan='3' class='text-center'>No hay datos</td></tr>";
}
// var_dump($huesped_activo);
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
            <li>Obtener la informacion de los ultimos huespedes <i class="fas fa-check"></i></li>
            <li>Mostrar una tabla con los ultimos huespedes <i class="fas fa-check"></i></li>
            <li>Mostrar informacion de la habitacion <i class="fas fa-check"></i></li>
            <li>Si el estatus es disponible
              <ol>
                <li>Mostrar boton para poner en mantenimiento</li>
                <li>Mostrar el buscador dinamico de clientes <i class="fas fa-check"></i></li>
                <li>Permitir la busqueda dinamica de clientes <i class="fas fa-check"></i>

                  <ol>
                    <li>Si existe el cliente crear la relacion huesped-habitacion <i class="fas fa-check"></i></li>
                    <li>Si no existe el cliente mostrar formulario para el registro <i class="fas fa-check"></i></li>
                    <li>Permitir el registro y asignacion del huesped <i class="fas fa-check"></i></li>
                  </ol>

                </li>
              </ol>
            </li>
            <li>Si el estatus es ocupado
              <ol>
                <li>Ocultar formulario dinamico <i class="fas fa-check"></i></li>
                <li>Obtener la lista del ultimo huesped de la habitacion <i class="fas fa-check"></i></li>
                <li>Mostrar la informacion del huesped <i class="fas fa-check"></i></li>
                <li>Mostrar boton que permita finalizar el hospedaje <i class="fas fa-check"></i></li>
              </ol>
            </li>

            <li>Si el estatus es mantenimiento
              <ol>
                <li>Mostrar boton para cambiar a disponible la habitacion <i class="fas fa-check"></i></li>
              </ol>
            </li>
          </ol>
          <hr>
          <ol>
            <li>Al seleccionar mantenimiento se debe generar una tarea de limpieza general de esta habitacion dirigida al departamento de mantenimiento. <i class="fas fa-check"></i></li>

          </ol>
          <hr>
          <ol>
            <li>Al seleccionar entregar llave finaliza la estadia del huesped, se actualiza el estatus a disponible. <i class="fas fa-check"></i></li>
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

              <div class="form-group">
                <label for="tipo_habitacion">Estatus</label>
                <input type="text" class="form-control" id="tipo_habitacion" placeholder="Ingresa identificacion" required="" name="tipo_habitacion" value="<?= $campos['estatus_habitacion'] ?>" readonly>
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
              <?php if ($campos['estatus_habitacion'] === 'disponible') { ?>
                <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/gestorHabitacionAjax.php" method="POST" autocomplete="off">
                  <input type="hidden" name="habitacion_id_mantenimiento" value="<?= $campos['habitacion_id'] ?>">
                  <input type="hidden" name="habitacion" value="<?= $campos['identificador_habitacion'] ?>">
                  <input type="hidden" name="fk_mantenimiento" value="5">
                  <input type="hidden" name="fk_recepcion" value="<?= $_SESSION['privilegio_spm']; ?>">
                  <button class="btn btn-app"><i class="fas fa-hand-sparkles"></i> Hacer mantenimiento
                  </button>

                </form>
              <?php } ?>

              <?php if ($campos['estatus_habitacion'] === 'mantenimiento') { ?>

                <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/gestorHabitacionAjax.php" method="POST" autocomplete="off">
                  <input type="hidden" name="habitacion_to_disponible" value="<?= $campos['habitacion_id'] ?>">
                  <input type="hidden" name="habitacion" value="<?= $campos['identificador_habitacion'] ?>">

                  <button class="btn btn-app"><i class="fas fa-door-open"></i> Habilitar
                  </button>

                </form>
              <?php } ?>


              <?php if ($campos['estatus_habitacion'] === 'ocupada') { ?>
                <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/gestorHabitacionAjax.php" method="POST" autocomplete="off">
                  <input type="hidden" name="habitacion_to_salir" value="<?= $campos['habitacion_id'] ?>">
                  <input type="hidden" name="reserva" value="<?= $huesped_activo['huesped_hab_id']; ?>">
                  <input type="hidden" name="habitacion" value="<?= $campos['identificador_habitacion'] ?>">
                  <button class="btn btn-app"><i class="fas fa-key"></i> Entregar llave
                  </button>

                </form>
              <?php } ?>




            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-6">
          <?php if ($campos['estatus_habitacion'] != 'mantenimiento') { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Huesped</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-4">
                <?php
                if ($campos['estatus_habitacion'] === 'disponible') {
                ?>
                  <form id="formularioBusqueda">
                    <div class="form-group">
                      <div class="input-group input-group-md">
                        <input type="search" class="form-control form-control-md" placeholder="Ingresa nombre o cedula del huesped" name="inputsearchhuesped">
                        <input type="hidden" name="fk_habitacion_search" id="fk_habiformularioBusquedatacion_search" value="<?= $campos['habitacion_id']; ?>">
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
                <?php   } else {   ?>


                  <div class="row">

                    <div class="form-group  col-6">
                      <label for="identificador_habitacion">Nombre huesped</label>
                      <input type="text" class="form-control" id="identificador_habitacion" placeholder="José Gregorio Heredia Bracho" required="" value="<?= $huesped_activo['nombre_completo'] ?>" readonly>
                    </div>



                    <div class="form-group  col-6">
                      <label for="identificador_habitacion">Documento de identidad</label>
                      <input type="text" class="form-control" id="identificador_habitacion" placeholder="V20890738" required="" value="<?= $huesped_activo['documento'] ?>" readonly>
                    </div>


                    <div class="form-group  col-6">
                      <label for="identificador_habitacion">Entrada</label>
                      <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" required value="<?= $huesped_activo['entrada'] ?>" readonly>
                    </div>

                    <div class="form-group col-6 ">
                      <label for="identificador_habitacion">Salida</label>
                      <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" value="<?= $huesped_activo['salida'] ?>" required readonly>
                    </div>



                  </div>
                <?php   }  ?>

              </div>
              <!-- /.card-body -->
            </div>
          <?php } ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Últimos huespedes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>

                    <td class="font-weight-bold">Nombre</td>
                    <td class="font-weight-bold">Entrada</td>
                    <td class="font-weight-bold">Salida</td>

                  </tr>
                </thead>
                <tbody>
                  <?php

                  echo $tabla;
                  ?>


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