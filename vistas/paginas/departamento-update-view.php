<?php
require_once "./controladores/departamentoControlador.php";
$instancia_controlador = new departamentoControlador();

$datos_modulo = $instancia_controlador->datos_departamento_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar departamento</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "departamentos" ?>">Departamentos</a></li>
                        <li class="breadcrumb-item active">Actualizar departamento</li>
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



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/departamentoAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="departamento_id_up" value="<?php echo $pagina[1]; ?>">


                                <div class="form-group">
                                    <label for="nombre_departamento_up">Nombre departamento</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_departamento_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_departamento_up" value="<?php echo $campos['nombre']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="abreviatura_departamento_up">abreviatura</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}" class="form-control" id="abreviatura_departamento_up" placeholder="Ingresa la abreviatura" maxlength="10" required="" name="abreviatura_departamento_up" value="<?php echo $campos['abreviatura']; ?>">
                                </div>


                                <button type="submit" class="btn btn-primary">Actualizar departamento</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "departamentos" ?>">Volver a departamentos</a>
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