<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Empleado</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "empleados" ?>">Empleado</a></li>
                        <li class="breadcrumb-item active">Crear Empleado</li>
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
                            <h5 class="card-title">Formulario de creación Empleado</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empleadoAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="nombre_empleado_reg">Nombre empleado</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_empleado_reg" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_empleado_reg">
                                </div>

                                <div class="form-group">
                                    <label for="documento_empleado_reg">Documento de identidad</label>
                                    <input type="text" class="form-control" id="documento_empleado_reg" placeholder="Ingresa tu número de identidad nacional" maxlength="35" required="" name="documento_empleado_reg">
                                </div>


                                <div class="form-group">
                                    <label for="fk_puesto_reg">Departamento </label>

                                    <select class="custom-select text-uppercase " id="fk_puesto_reg" name="fk_puesto_reg">
                                        <?php
                                        require_once "./controladores/puestoControlador.php";
                                        $ins_controlador = new puestoControlador();
                                        $lista =  $ins_controlador->datos_puesto_combo_controlador();
                                        $opc = "";
                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[puesto_id]'>$fila[departamento] - $fila[nombre]</option>";
                                        }

                                        echo $opc;
                                        ?>




                                    </select>

                                </div>

                                <button type="submit" class="btn btn-primary">Registrar empleado</button>
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