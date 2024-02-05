<?php
require_once "./controladores/alaControlador.php";
$instancia_controlador = new alaControlador();

$datos_modulo = $instancia_controlador->datos_ala_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar ala</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "alas" ?>">Alas</a></li>
                        <li class="breadcrumb-item active">Actualizar ala</li>
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
                            <h5 class="card-title">Formulario de actualización</h5>

                            <p class="card-text">
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alaAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="ala_id_up" value="<?php echo $pagina[1]; ?>">


                                <div class="form-group">
                                    <label for="nombre_ala_up">Nombre departamento</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_ala_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_ala_up" value="<?php echo $campos['nombre']; ?>">
                                </div>
                            

                                <button type="submit" class="btn btn-primary">Actualizar ala</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "alas" ?>">Volver a alas</a>
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