<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/navegacion.php';
include_once 'templates/barra.php';
?>

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="overflow-y: scroll">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Crear categoría</b><br>
              <h6></h6>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"> Llena el formulario para crear una nueva categoría</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="modelo-categoria.php" name="guardar-categoria" id="guardar-categoria">

            <!-- Nombre categoria-->
            <div class="form-group row">
              <label for="nombre_categoria" class="col-sm-2 col-form-label">Categoría:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoria del evento">
              </div>
            </div>

            <!-- Icono -->
            <div class="form-group">
              <label for="icono_categoria">Icono:</label>
              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="fa fa-address-book"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="icono" id="icono" placeholder="fa fa-icon">
              </div>
            </div>

            <div class="card-footer bg-transparent">
              <input type="hidden" name="categoria" value="nuevo">
              <button type="submit" class="btn btn-success col-lg-2">Añadir</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>