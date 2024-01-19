<?php
require_once "./controladores/empleadoControlador.php";
$instancia_controlador = new empleadoControlador();

$datos_modulo = $instancia_controlador->datos_empleado_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar Empleado</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "empleados" ?>">Empleados</a></li>
                        <li class="breadcrumb-item active">Actualizar Empleado</li>
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
                            <h5 class="card-title">Formulario de Actualización Empleado</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="empleado_id_up" value="<?php echo $pagina[1]; ?>">
                                <div class="form-group">
                                    <label for="nombre_empleado_up">Nombre puesto</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_empleado_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_empleado_up" value="<?php echo $campos['nombre_completo']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="documento_empleado_up">Documento de identidad</label>
                                    <input type="text" class="form-control" id="documento_empleado_up" placeholder="Ingresa tu número de identidad nacional" maxlength="35" required="" name="documento_empleado_up" value="<?php echo $campos['documento']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="fk_puesto_up">Puesto</label>
                                    <?php echo $campos['fk_puesto']; ?>
                                    <select class="custom-select text-uppercase " id="fk_puesto_up" name="fk_puesto_up">
                                        <?php
                                        require_once "./controladores/puestoControlador.php";
                                        $ins_controlador = new puestoControlador();
                                        $lista =  $ins_controlador->datos_puesto_combo_controlador();
                                        $opc = "";
                                        $puesto_id_bd = $campos['fk_puesto'];
                                        foreach ($lista as $fila) {

                                            $opc .= "<option value='$fila[puesto_id]' " . ($fila['puesto_id'] == $puesto_id_bd ? "selected" : "") . ">$fila[departamento] - $fila[nombre]</option>";
                                        }

                                        echo $opc;
                                        ?>
                                    </select>

                                </div>



                                <button type="submit" class="btn btn-primary">Actualizar empleado</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "empleados" ?>">Volver a empleados</a>
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