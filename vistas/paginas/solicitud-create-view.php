<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Solicitud</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "solicitudes" ?>">Solicitudes</a></li>
                        <li class="breadcrumb-item active">Crear Solicitud</li>
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
                            <h5 class="card-title">Formulario de creación Solicitud</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/solicitudAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="titulo_solicitud_reg">Titulo de solicitud</label>
                                    <input type="text" class="form-control" id="titulo_solicitud_reg" placeholder="Ingresa el titulo" maxlength="35" required="" name="titulo_solicitud_reg">
                                </div>

                                <div class="form-group">
                                    <label for="descripción_solicitud_reg">Descripción Solicitud <small>max 500 caracteres</small></label>
                                    <textarea id="descripción_solicitud_reg" class="form-control" rows="4" name="descripción_solicitud_reg"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar puesto</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "solicitudes" ?>">Volver a solicitudes</a>
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