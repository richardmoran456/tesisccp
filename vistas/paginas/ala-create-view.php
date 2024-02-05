<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Ala</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "alas" ?>">Alas</a></li>
                        <li class="breadcrumb-item active">Crear Ala</li>
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
                            <h5 class="card-title">Formulario de creación de ala</h5>

                            <p class="card-text">
                                Formulario para el registro del Ala, Recuerde que las alas Disponibles  en el Gran Hotel CCP Suites C.A, son el Ala Sur y el Ala Norte.
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/alaAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="nombre_ala_reg">Nombre Ala</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_ala_reg" placeholder="Ingresa el nombre del Ala" maxlength="35" required="" name="nombre_ala_reg">
                                </div>
                               
                          
                                <button type="submit" class="btn btn-primary">Registrar ala</button>
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