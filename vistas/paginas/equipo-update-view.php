<?php
require_once "./controladores/equipoControlador.php";
$instancia_controlador = new equipoControlador();

$datos_modulo = $instancia_controlador->datos_equipo_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar equipo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "Equipos" ?>">Equipos</a></li>
                        <li class="breadcrumb-item active">Actualizar equipo</li>
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
                            <h5 class="card-title">Formulario de actualización de Equipos</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi inventore laborum magni modi perferendis officiis minima perspiciatis culpa pariatur similique commodi facere quis voluptates, consectetur ratione nihil? Asperiores, illum ex!
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/equipoAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="equipo_id_up" value="<?php echo $pagina[1]; ?>">

                                <div class="form-group">
                                    <label for="modelo_equipo_up">Modelo del Equipo</label>
                                    <input type="text"  class="form-control" id="modelo_equipo_up" placeholder="Ingresa el modelo" maxlength="35" required="" name="modelo_equipo_up" value="<?php echo $campos['modelo']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nserial_equipo_up">Serial</label>
                                    <input type="text"  class="form-control" id="nserial_equipo_up" placeholder="Ingrese el serial del equipo" maxlength="10" required="" name="nserial_equipo_up" value="<?php echo $campos['nserial']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="estado_equipo_up">Estado</label>
                                    <input type="text" class="form-control" id="estado_equipo_up" placeholder="Estado del equipo" maxlength="35" required="" name="estado_equipo_up" value="<?php echo $campos['estado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_equipo_up">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion_equipo_up" placeholder="Ingrese una breve descripcion del equipo" maxlength="35" required="" name="descripcion_equipo_up" value="<?php echo $campos['modelo']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tipo_equipo_up">Tipo</label>
                                    <input type="text" class="form-control" id="tipo_equipo_up" placeholder="Indique el tipo de equipo" maxlength="35" required="" name="tipo_equipo_up" value="<?php echo $campos['tipo_equipo']; ?>">
                                </div>



                                <button type="submit" class="btn btn-primary">Actualizar equipo</button>
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