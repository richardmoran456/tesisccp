<?php
require_once "./controladores/huespedControlador.php";
$instancia_controlador = new huespedControlador();

$datos_modulo = $instancia_controlador->datos_huesped_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar datos del huesped</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "huespedes" ?>">huespedes</a></li>
                        <li class="breadcrumb-item active">Actualizar datos del huesped</li>
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
                            <h5 class="card-title"> Actualización del Huesped</h5>

                            <p class="card-text">
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/huespedAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="huesped_id_up" value="<?php echo $pagina[1]; ?>">
                                <div class="form-group">
                                    <label for="nombre_huesped_up">Nombre del huesped</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_huesped_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_huesped_up" value="<?php echo $campos['nombre_completo']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="documento_huesped_up">Documento de identidad</label>
                                    <input type="text" class="form-control" id="documento_huesped_up" placeholder="Ingresa su número de identidad nacional" maxlength="35" required="" name="documento_huesped_up" value="<?php echo $campos['documento']; ?>">
                                </div>



                                <button type="submit" class="btn btn-primary">Actualizar huesped</button>
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