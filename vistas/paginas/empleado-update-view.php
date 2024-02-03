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



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php"
                                method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="empleado_id_up" value="<?php echo $pagina[1]; ?>">
                                <div class="form-group">
                                    <label for="nombre_empleado_up">Nombre puesto</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                        id="nombre_empleado_up" placeholder="Ingresa el nombre" maxlength="35"
                                        required="" name="nombre_empleado_up"
                                        value="<?php echo $campos['nombre_completo']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="documento_empleado_up">Documento de identidad</label>
                                    <input type="text" class="form-control" id="documento_empleado_up"
                                        placeholder="Ingresa tu número de identidad nacional" maxlength="35" required=""
                                        name="documento_empleado_up" value="<?php echo $campos['documento']; ?>">
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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Cambiar Foto de empleado</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form class="FormularioAjax " action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php"
                                        method="POST" data-form="update" autocomplete="off"
                                        enctype="multipart/form-data">




                                        <div class="custom-file mb-2">
                                            <input type="file" class="custom-file-input" id="customFile" name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <input type="submit" class="btn btn-block bg-gradient-primary btn-sm"
                                            value="Cambiar">

                                    </form>

                                </div>
                                <!-- /.card-body -->
                            </div>



                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Subir Resumen</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form class="FormularioAjax " action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php"
                                        method="POST" data-form="update" autocomplete="off"
                                        enctype="multipart/form-data">

                                        <div class="custom-file mb-2">
                                            <input type="file" class="custom-file-input" id="customFile" name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <input type="submit" class="btn btn-block bg-gradient-primary btn-sm"
                                            value="Cambiar">

                                    </form>

                                </div>
                                <!-- /.card-body -->
                            </div>



                            <div class="tab-content">

                                <!-- /.tab-pane -->
                                <div class="tab-pane active" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Modulo</a> que hizo</h3>

                                                <div class="timeline-body">
                                                    Describir la actividad realizada.
                                                </div>
                                                <!-- <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div> -->
                                            </div>
                                        </div>
                                        <!-- END timeline item -->




                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName"
                                                    placeholder="Name"
                                                    value="<?php echo $campos['nombre_completo']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail"
                                                    placeholder="Email" value="<?php echo $campos['username']; ?>">
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>

                </div>








            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- /.col -->




</div>