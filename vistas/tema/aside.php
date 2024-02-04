<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #023564;">
  <!-- Brand Logo -->
  <a href="<?php echo SERVERURL . "home" ?>" class="brand-link">
    <img src="<?php echo SERVERURL; ?>vistas/assets/dist/img/logoccp.png" alt="CCP Suites Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo COMPANY; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo  $_SESSION['avatar_default']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo SERVERURL . "perfil" ?>" class="d-block"><?php echo $_SESSION['nombre_spm']; ?></a>
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



        <li class="nav-item">
          <a href="<?php echo SERVERURL . "home" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'home') ? 'active' : ''; ?>">
            <p>Inicio</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo SERVERURL . "eventos" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'eventos') ? 'active' : ''; ?>">
            <p>Eventos</p>
          </a>
        </li>






        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($_SESSION['nav_principal'] === 'gestion-gerencia') ? 'active' : ''; ?>">
            <p>
              Gestión de Gerencia
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "usuarios" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'usuarios') ? 'active' : ''; ?>">
                <p>Usuarios</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo SERVERURL . "modulos" ?>" class="nav-link">
                <p>Modulos BASE</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($_SESSION['nav_principal'] === 'gestion-recepcion') ? 'active' : ''; ?>">
            <p>
              Gestión de Recepcion
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "recepcion" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'recepcion') ? 'active' : ''; ?>">
                <p>Recepción</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo SERVERURL . "huespedes" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'huespedes') ? 'active' : ''; ?>">
                <p>Huespedes</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo SERVERURL . "alas" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'alas') ? 'active' : ''; ?>">
                <p>Alas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "pisos" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'pisos') ? 'active' : ''; ?>">
                <p>Pisos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "habitaciones" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'habitaciones') ? 'active' : ''; ?>">
                <p>Habitaciones</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo SERVERURL . "tareas" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'tareas') ? 'active' : ''; ?>">
                <p>Tareas</p>
              </a>
            </li>

          </ul>
        </li>



        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($_SESSION['nav_principal'] === 'gestion-rrhh') ? 'active' : ''; ?>">
            <p>
              Gestión de RRHH
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "empleados" ?>" class="nav-link" <?php echo ($_SESSION['page_active'] === 'empleados') ? 'active' : ''; ?>>
                <p>Empleados</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "puestos" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'puestos') ? 'active' : ''; ?>">
                <p>Puestos</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo SERVERURL . "departamentos" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'departamentos') ? 'active' : ''; ?>">
                <p>Departamentos</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($_SESSION['nav_principal'] === 'gestion-almacen') ? 'active' : ''; ?>">
            <p>
              Gestión de Almacen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo SERVERURL . "solicitudes" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'solicitudes') ? 'active' : ''; ?>">
                <p>Solicitudes</p>
              </a>
            </li>
          </ul>
        </li>





        <?php
        if ($_SESSION['privilegio_spm'] === 5 or $_SESSION['privilegio_spm'] === 7 or $_SESSION['privilegio_spm'] === 4) {


        ?>

          <li class="nav-item">
            <a href="#" class="nav-link <?php echo ($_SESSION['nav_principal'] === 'gestion-sm') ? 'active' : ''; ?>">
              <p>
                Gestión de Sistemas Y Mantenimiento
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo SERVERURL . "equipos" ?>" class="nav-link <?php echo ($_SESSION['page_active'] === 'equipos') ? 'active' : ''; ?>">
                  <p>Equipos</p>
                </a>
              </li>

            </ul>
          </li>

        <?php } ?>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>