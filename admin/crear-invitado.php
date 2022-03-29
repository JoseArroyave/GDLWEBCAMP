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
            <h1><b>Crear invitado</b><br>
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
          <h3 class="card-title"> Llena el formulario para crear un nuevo invitado</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="modelo-invitado.php" name="guardar-invitado" id="guardar-invitado" enctype="multipart/form-data">

            <!-- Nombre invitado-->
            <div class="form-group row">
              <label for="nombre_invitado" class="col-sm-2 col-form-label">Nombre:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre del invitado">
              </div>
            </div>

            <!-- Apellido invitado-->
            <div class="form-group row">
              <label for="apellido_invitado" class="col-sm-2 col-form-label">Apellido:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido del invitado">
              </div>
            </div>

            <!-- Biografía invitado-->
            <div class="form-group row">
              <label for="descripción" class="col-sm-2 col-form-label">Biografía:</label>
              <div class="col-sm-12">
                <textarea name="descripcion_invitado" rows="5" class="form-control" cols="40" id="descripcion" placeholder="Ingresa aquí una mini biografía del invitado"></textarea>
              </div>
            </div>

            <!-- Url imagen del invitado-->
            <div class="form-group row">
              <label for="url_imagen" class="col-sm-2 col-form-label">Foto del invitado:</label>
              <div class="col-sm-12">
                <input type="file" id="url_imagen" name="url_imagen" require>
              </div>
            </div>

            <div class="card-footer bg-transparent">
              <input type="hidden" name="invitado" value="nuevo">
              <button type="submit" class="btn btn-success col-lg-2" id="boton_agregar_invitado">Añadir</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>