<?php
require_once "./controladores/usuarioControlador.php";
$instancia_controlador = new usuarioControlador();

$datos_modulo = $instancia_controlador->datos_usuario_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "usuarios" ?>">Usuarios</a></li>
                        <li class="breadcrumb-item active">Actualizar Usuario</li>
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
                            <h5 class="card-title">Formulario de actualización usuario</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="usuario_id_up" value="<?php echo $pagina[1]; ?>">

                                <div class="form-group">
                                    <label for="nombre_usuario_up">Nombre completo </label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_usuario_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_usuario_up" value="<?php echo $campos['nombre_completo']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="username_usuario_up">Username </label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="username_usuario_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="username_usuario_up" value="<?php echo $campos['username']; ?>">
                                </div>




                                <div class="form-group">
                                    <label for="fk_departamento_up">Departamento </label>
                                    <select class="custom-select " id="fk_departamento_up" name="fk_departamento_up" value="<?php echo $campos['fk_departamento']; ?>">
                                        <?php
                                        require_once "./controladores/departamentoControlador.php";
                                        $ins_controlador = new departamentoControlador();
                                        $lista =  $ins_controlador->listar_departamento_controlador();
                                        $opc = "";
                                        $departamento_id_bd = $campos['fk_departamento'];

                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[departamento_id]' " . ($fila['departamento_id'] == $departamento_id_bd ? "selected" : "") . ">
                                            $fila[nombre]
                                          </option>";
                                        }

                                        echo $opc;
                                        ?>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Actuaizar usuario</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "usuarios" ?>">Volver a usuarios</a>
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