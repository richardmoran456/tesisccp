<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Huesped</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "huespedes" ?>">Huespedes</a></li>
                        <li class="breadcrumb-item active">Regristrar huesped</li>
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
                            <h5 class="card-title">Formulario para el registro de huespedes</h5>

                            <p class="card-text">
                                Apartado para el registro de los huespedes, por favor indique los datos solicitados a continuacion
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/huespedAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="nombre_huesped_reg">Nombre del Huesped</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_huesped_reg" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_huesped_reg">
                                </div>

                                <div class="form-group">
                                    <label for="documento_huesped_reg">Documento de identidad</label>
                                    <input type="number" class="form-control" id="documento_huesped_reg" placeholder="Ingresa el número de identidad nacional" maxlength="35" required="" name="documento_huesped_reg">
                                </div>




                                <button type="submit" class="btn btn-primary">Registrar huesped</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "huespedes" ?>">Volver a huespedes</a>
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