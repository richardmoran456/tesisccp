<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "usuarios" ?>">Usuarios</a></li>
                        <li class="breadcrumb-item active">Crear Usuario</li>
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
                            <h5 class="card-title">Formulario de creación usuario</h5>

                            <p class="card-text">
                                Apartado destinado a la creacion de usuarios que seran admitidos en el sistema
                            </p>


                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="save" autocomplete="off">

                                <div class="form-group">
                                    <label for="nombre_usuario_reg">Nombre completo </label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_usuario_reg" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_usuario_reg">
                                </div>

                                <div class="form-group">
                                    <label for="username_usuario_reg">Username </label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="username_usuario_reg" placeholder="Ingresa el nombre de usuario" maxlength="35" required="" name="username_usuario_reg">
                                </div>
                                <div class="form-group">
                                    <label for="password_usuario_reg">Contrase&ntilde;a</label>
                                    <input type="text" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" class="form-control" id="password_usuario_reg" placeholder="Ingrese la contraseña" maxlength="35" required="" name="password_usuario_reg">
                                </div>
                                <div class="form-group">
                                    <label for="fk_departamento_reg">Departamento </label>
                                    <select class="custom-select " id="fk_departamento_reg" name="fk_departamento_reg">
                                        <?php
                                        require_once "./controladores/departamentoControlador.php";
                                        $ins_controlador = new departamentoControlador();
                                        $lista =  $ins_controlador->listar_departamento_controlador();
                                        $opc = "";
                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[departamento_id]'>$fila[nombre]</option>";
                                        }

                                        echo $opc;
                                        ?>




                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar usuario</button>
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