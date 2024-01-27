<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Habitacion</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "habitaciones" ?>">Habitaciones</a>
                        </li>
                        <li class="breadcrumb-item active">Crear Habitacion</li>
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
                            <h5 class="card-title">Formulario de registro de habitaciones</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod
                                pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam
                                perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/habitacionAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="habitacion_reg">habitacion habitacion</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="habitacion_reg" placeholder="Ingresa el nombre" maxlength="35" required="" name="habitacion_reg">
                                </div>

                                <div class="form-group">
                                    <label for="identificador_habitacion_reg">identificador</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}" class="form-control" id="identificador_habitacion_reg" placeholder="Ingresa identificacion" maxlength="10" required="" name="identificador_habitacion_reg">
                                </div>

                                <div class="form-group">
                                    <label for="tipo_habitacion_reg">Tipo de habitacion</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}" class="form-control" id="tipo_habitacion_reg" placeholder="Ingresa el tipo de habitacion" maxlength="10" required="" name="tipo_habitacion_reg">
                                </div>

                                <div class="form-group">
                                    <label for="fk_ala_reg">Ala</label>
                                    <select class="custom-select text-uppercase" id="fk_ala_reg" name="fk_ala_reg">
                                        <?php
                                        require_once "./controladores/alaControlador.php";
                                        $controlador = new alaControlador();
                                        $alas = $controlador->listar_ala_controlador();
                                        $con = 0;
                                        echo $opc .= '<option value="">Seleccione</option>';
                                        // aqui tenias un error de escritura solo colocaste id y nosotros usamos ala_id
                                        foreach ($alas as $ala) {
                                            $con = $con + 1;
                                            if ($con > 0) {

                                                echo "<option value='{$ala['ala_id']}'>{$ala['nombre']}</option>";
                                            } else {
                                                echo $opc .= '<option value="">Ala no disponible</option>';
                                            }
                                        }

                                        // Tome el condicional del ejemplo para mostrar algo en caso de que no exista un ala registrado
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="fk_piso_reg">Piso</label>
                                    <select class="custom-select text-uppercase" id="fk_piso_reg" name="fk_piso_reg">
                                        <!-- Los pisos se cargarán aquí basado en la selección del ala -->
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary">Registrar habitacion</button>
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