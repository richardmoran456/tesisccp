<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo SERVERURL . "home" ?>" class="brand-link">
    <img src="<?php SERVERURL; ?>vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo COMPANY; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php SERVERURL; ?>vistas/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo SERVERURL . "perfil" ?>" class="d-block">Nombre</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->

        <!-- menu app -->
        <li class="nav-item">
          <a href="<?php echo SERVERURL . "usuarios" ?>" class="nav-link">
            <p>Usuarios</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "eventos" ?>" class="nav-link">
            <p>Eventos</p>
          </a>
        </li>



        <li class="nav-item">
          <a href="<?php echo SERVERURL . "modulos" ?>" class="nav-link">
            <p>Modulos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "equipos" ?>" class="nav-link">
            <p>Equipos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "alas" ?>" class="nav-link">
            <p>Alas</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "empleados" ?>" class="nav-link">
            <p>Empleados</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "departamentos" ?>" class="nav-link">
            <p>Departamentos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "puestos" ?>" class="nav-link">
            <p>Puestos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "solicitudes" ?>" class="nav-link">
            <p>Solicitudes</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo SERVERURL . "tareas" ?>" class="nav-link">
            <p>Tareas</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "huespedes" ?>" class="nav-link">
            <p>Huéspedes</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Hotel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "pisos" ?>" class="nav-link">
                <p>Pisos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "habitaciones" ?>" class="nav-link">
                <p>Habitaciones</p>
              </a>
            </li>

          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>