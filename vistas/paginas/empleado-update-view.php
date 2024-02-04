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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod
                                pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam
                                perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
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
                                        $lista = $ins_controlador->datos_puesto_combo_controlador();
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

                <!-- /.card para las fotos y el CV -->

                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="text-center mb-3">
                                <?php
                                /** Mostrar la foto del empleado solo si existe, caso contrario mostrar otra default */
                                $imagen_default = SERVERURL . "vistas/assets/images/user-profile-icon.jpg";

                                /** Si la ruta que viene de la bd tiene  SIN DATO mostramos la default. */
                                if ($campos['url_imagen'] === "SIN DATO") {
                                    $imagen_empleado = $imagen_default;
                                } else {
                                    /** La ruta no viene vacia, entonces se carga la ruta */
                                    $imagen_empleado = SERVERURL . "vistas/assets/images/empleados/" . $campos['url_imagen'];
                                }



                                ?>
                                <img class="profile-user-img  img-circle  " src="<?= $imagen_empleado; ?>" alt="FOTO EMPLEADO">
                            </div>

                            <h3 class="card-title text-center">Cambiar Foto de empleado</h3>
                        </div>
                        <div class="card-body">
                            <form class="FormularioAjax " action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php" method="POST" data-form="update" autocomplete="off" enctype="multipart/form-data">

                                <input type="hidden" name="empleado_id_imagen" value="<?php echo $pagina[1]; ?>">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="file_foto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <input type="submit" class="btn btn-block bg-gradient-primary btn-sm" value="Cargar FOTO">

                            </form>

                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Subir Resumen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="FormularioAjax " action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php" method="POST" data-form="update" autocomplete="off" enctype="multipart/form-data">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="file_resumen">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <input type="submit" class="btn btn-block bg-gradient-info btn-sm" value="Cargar Archivo">

                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>



                </div>








            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- /.col -->




</div>