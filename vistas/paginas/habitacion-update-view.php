<?php
require_once "./controladores/habitacionControlador.php";
$instancia_controlador = new habitacionControlador();

$datos_modulo = $instancia_controlador->datos_habitacion_controlador("Unico", $pagina[1]);

if ($datos_modulo->rowCount() == 1) {
    $campos = $datos_modulo->fetch();
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar habitacion</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "habitaciones" ?>">habitaciones</a></li>
                        <li class="breadcrumb-item active">Actualizar habitacion</li>
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
                <div class="col-lg-6">


                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Formulario de actualización de habitacion</h5>

                            <p class="card-text">
                                Indique el identificador del Piso, ejemplo P1N05
                                P1 - Indica que se encuentra en el Piso numero 1.
                                N  - Indica el Ala en la cual se encuentra.
                                05 - Indica el numero de la habitacion.
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/habitacionAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="habitacion_id_up" value="<?php echo $pagina[1]; ?>">


                                <div class="form-group">
                                    <label for="habitacion_up">Indique la habitacion</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="habitacion_up" placeholder="Ingresa el numero de habitacion" maxlength="35" required="" name="habitacion_up" value="<?php echo $campos['habitacion']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="identificador_habitacion_up">identificador</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}" class="form-control" id="identificador_habitacion_up" placeholder="Ingresa el identificador" maxlength="20" required="" name="identificador_habitacion_up" value="<?php echo $campos['identificador']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tipo_habitacion_up">tipo</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}" class="form-control" id="tipo_habitacion_up" placeholder="Ingresa el tipo de habitacion" maxlength="45" required="" name="tipo_habitacion_up" value="<?php echo $campos['tipo']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="fk_piso_reg">Ubicacion </label>

                                    <select class="custom-select text-uppercase " id="fk_piso_reg" name="fk_piso_reg">
                                        <?php
                                        require_once "./controladores/pisoControlador.php";
                                        $ins_controlador = new pisoControlador();
                                        $lista =  $ins_controlador->datos_piso_combo_controlador();
                                        $opc = "";
                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[piso_id]'>$fila[ubicacion] - $fila[habitacion]</option>";
                                        }

                                        echo $opc;
                                        ?>




                                    </select>

                                </div>


                                <button type="submit" class="btn btn-primary">Actualizar habitacion</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "habitaciones" ?>">Volver a habitaciones</a>
                            </div>

                        </div>
                    </div><!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>