<?php
require_once "./controladores/moduloControlador.php";
$instancia_modulo = new moduloControlador();

$datos_modulo = $instancia_modulo->datos_modulo_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar módulo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "modulos" ?>">Modulos</a></li>
                        <li class="breadcrumb-item active">Actualizar módulo</li>
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
                                La Actualización del módulo es referencial, las funciones del mismo deben desarrollarse individualmente..
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/moduloAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="modulo_id_up" value="<?php echo $pagina[1]; ?>">
                                <div class="form-group">
                                    <label for="nombre_modulo_up">Describe el módulo</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_modulo_up" placeholder="Describe el módulo" maxlength="35" required="" name="nombre_modulo_up" value="<?php echo $campos['nombre']; ?>">
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar módulo</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "modulos" ?>">Volver a módulos</a>
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