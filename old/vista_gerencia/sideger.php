<!-- SidebarSearch Form -->
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="usuarios/" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Inicio
                    <span class="right badge badge-danger"></span>
                </p>
            </a>
        </li>

        
        <li class="nav-item">
            <a href="usuarios/" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    usuarios
                    <span class="right badge badge-danger"></span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Solicitudes
                    <span class="right badge badge-danger"></span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo $url_gerencia; ?>pisos/" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Pisos
                    <span class="right badge badge-danger"></span>
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->