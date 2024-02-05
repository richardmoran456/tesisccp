<?php
require_once "./controladores/eventoControlador.php";
$instancia_controlador = new eventoControlador();

$datos_modulo = $instancia_controlador->datos_evento_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Editar evento</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "eventos" ?>">Eventos</a></li>
                        <li class="breadcrumb-item active">Editar evento</li>
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
                            <h5 class="card-title mb-4">Formulario de edición de evento</h5>

                            <p class="card-text mb-4">
                            </p>


                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/eventoAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="evento_id_up" value="<?php echo $pagina[1]; ?>">

                                <div class="form-group ">
                                    <label for="titulo_up">Nombre del evento </label>
                                    <input type="text" class="form-control" id="titulo_up" placeholder="Ingresa el titulo del evento" required="" name="titulo_up" value="<?php echo $campos['titulo_evento']; ?>">
                                </div>


                                <div class="form-group ">
                                    <label for="descripcion_up">Descripción del evento </label>
                                    <textarea class="form-control" rows="3" placeholder="Ingresar ..." name="descripcion_up" id="descripcion_up"><?php echo $campos['descripcion_evento']; ?></textarea>
                                </div>

                                <div class="form-group ">
                                    <label for="inicio_up" class="control-label">Cuando inicia el evento?</label>
                                    <input type="datetime-local" class="form-control " name="inicio_up" id="inicio_up" value="<?php echo $campos['inicio_evento']; ?>" required>
                                </div>

                                <div class="form-group mb-8">
                                    <label for="final_up" class="control-label">Cuando finaliza el evento?</label>
                                    <input type="datetime-local" class="form-control " name="final_up" id="final_up" value="<?php echo $campos['finaliza_evento']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Actualizar evento</button>
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