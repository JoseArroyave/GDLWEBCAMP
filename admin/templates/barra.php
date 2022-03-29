    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link">
        <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light"><b>GDL</b>WebCamp</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="img/<?php echo $_SESSION['foto'] ?>.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['nombre'] ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar..." aria-label="Search">
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

            <!-- Dashboard -->
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- Eventos -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  Eventos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-evento.php" class="nav-link">
                    <i class="fa-solid fa-circle-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lista-evento.php" class="nav-link">
                    <i class="fa-solid fa-list nav-icon"></i>
                    <p>Ver todos</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Categoria eventos -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-book"></i>
                <p>
                  Categorías eventos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-categoria.php" class="nav-link">
                    <i class="fa-solid fa-circle-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lista-categoria.php" class="nav-link">
                    <i class="fa-solid fa-list nav-icon"></i>
                    <p>Ver todos</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Invitados -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                  Invitados
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-invitado.php" class="nav-link">
                    <i class="fa-solid fa-circle-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lista-invitado.php" class="nav-link">
                    <i class="fa-solid fa-list nav-icon"></i>
                    <p>Ver todos</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Registrados -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-user-check"></i>
                <p>
                  Registrados
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-registrado.php" class="nav-link">
                    <i class="fa-solid fa-circle-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lista-registrado.php" class="nav-link">
                    <i class="fa-solid fa-list nav-icon"></i>
                    <p>Ver todos</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Administradores -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-address-card"></i>
                <p>
                  Administradores
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-admin.php" class="nav-link">
                    <i class="fa-solid fa-circle-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lista-admin.php" class="nav-link">
                    <i class="fa-solid fa-list nav-icon"></i>
                    <p>Ver todos</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Testimoniales -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-comments"></i>
                <p>
                  Testimoniales
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa-solid fa-circle-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa-solid fa-list nav-icon"></i>
                    <p>Ver todos</p>
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