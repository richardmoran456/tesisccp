<?php
require_once "./controladores/pisoControlador.php";
$instancia_controlador = new pisoControlador();

$datos_modulo = $instancia_controlador->datos_piso_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Actualizar Piso</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "pisos" ?>">Pisos</a></li>
                        <li class="breadcrumb-item active">Actualizar Piso</li>
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
                            <h5 class="card-title">Formulario de creación Pisos</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/pisoAjax.php" method="POST" data-form="update" autocomplete="off">
                                <input type="hidden" name="piso_id_up" value="<?php echo $pagina[1]; ?>">
                                <div class="form-group">
                                    <label for="nombre_piso_up">Nombre piso</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_piso_up" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_piso_up" value="<?php echo $campos['nombre']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="fk_ala_up">Ala </label>
                                    <select class="custom-select " id="fk_ala_up" name="fk_ala_up" value="<?php echo $campos['fk_ala']; ?>">
                                        <?php
                                        require_once "./controladores/alaControlador.php";
                                        $ins_controlador = new alaControlador();
                                        $lista =  $ins_controlador->listar_ala_controlador();
                                        $opc = "";
                                        $ala_id_bd = $campos['fk_ala'];

                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[ala_id]' "($fila['ala_id'] == $ala_id_bd ? "selected" : "") . ">
                                            $fila[nombre]
                                          </option>";
                                        }

                                        echo $opc;
                                        ?>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Actuaizar piso</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "pisos" ?>">Volver a pisos</a>
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