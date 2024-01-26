<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar equipos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "equipos" ?>">Equipos</a></li>
                        <li class="breadcrumb-item active">Registrar equipo</li>
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
                            <h5 class="card-title">Formulario de Registro para un equipo</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/equipoAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="modelo_equipo_reg">Modelo del Equipo</label>
                                    <input type="text" class="form-control" id="modelo_equipo_reg" placeholder="Ingresa el modelo" maxlength="35" required="" name="modelo_equipo_reg">
                                </div>
                                <div class="form-group">
                                    <label for="nserial_equipo_reg">Serial</label>
                                    <input type="text" class="form-control" id="nserial_equipo_reg" placeholder="Ingrese el serial del equipo" maxlength="35" required="" name="nserial_equipo_reg">
                                </div>
                                <div class="form-group">
                                    <label for="estado_equipo_reg">Estado</label>
                                    <input type="text" class="form-control" id="estado_equipo_reg" placeholder="Estadooooo" maxlength="35" required="" name="estado_equipo_reg">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_equipo_reg">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion_equipo_reg" placeholder="Ingrese una breve descripcion del equipo" maxlength="35" required="" name="descripcion_equipo_reg">
                                </div>
                                <div class="form-group">
                                    <label for="tipo_equipo_reg">Tipo</label>
                                    <input type="text" class="form-control" id="tipo_equipo_reg" placeholder="Indique el tipo de equipo" maxlength="35" required="" name="tipo_equipo_reg">
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar equipo</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "equipos" ?>">Volver a equipos</a>
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