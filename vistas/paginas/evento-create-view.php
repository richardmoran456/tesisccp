<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear evento</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "eventos" ?>">Eventos</a></li>
                        <li class="breadcrumb-item active">Crear evento</li>
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
                            <h5 class="card-title mb-4">Formulario de creación de evento</h5>

                            <p class="card-text mb-4">
                                Por favor introduzca los datos del evento
                            </p>


                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/eventoAjax.php" method="POST" data-form="save" autocomplete="off">

                                <div class="form-group ">
                                    <label for="titulo_reg">Nombre del Eventro </label>
                                    <input type="text" class="form-control" id="titulo_reg" placeholder="Ingresa el titulo del evento" required="" name="titulo_reg">
                                </div>


                                <div class="form-group ">
                                    <label for="descripcion_reg">Descripción del evento </label>
                                    <textarea class="form-control" rows="3" placeholder="Ingresar ..." name="descripcion_reg" id="descripcion_reg"></textarea>
                                </div>

                                <div class="form-group ">
                                    <label for="inicio_reg" class="control-label">Cuando inicia el evento?</label>
                                    <input type="datetime-local" class="form-control " name="inicio_reg" id="inicio_reg" required>
                                </div>

                                <div class="form-group mb-8">
                                    <label for="final_reg" class="control-label">Cuando finaliza el evento?</label>
                                    <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Registrar evento</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "eventos" ?>">Volver a eventos</a>
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