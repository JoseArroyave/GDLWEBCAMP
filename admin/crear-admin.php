<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/navegacion.php';
include_once 'templates/barra.php';
?>

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Crear administrador</b><br>
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
          <h3 class="card-title"> Llena el formulario para crear un administrador</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="modelo-admin.php" name="guardar-registro" id="guardar-registro">

            <!-- Usuario -->
            <div class="form-group row">
              <label for="usuario" class="col-sm-2 col-form-label">Usuario:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
              </div>
            </div>

            <!-- Nombre -->
            <div class="form-group row">
              <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
              </div>
            </div>

            <!-- Contrase??a -->
            <div class="form-group row">
              <label for="password" id="label_password" class="col-sm-2 col-form-label">Constrase??a</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contrase??a">
                <small id="passwordHelpBlock" class="form-text text-muted">Tu contrase??a debe tener 8-20 car??cteres, un n??mero, un car??cter especial y una letra may??scula como m??nimo.</small>
              </div>
            </div>

            <!-- Repetir contrasena -->
            <div class="form-group row">
              <label for="password" id="label_password" class="col-sm-2 col-form-label">Repetir constrase??a</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Vuelve a digitar tu contrase??a">
                <span id="resultado_password" class="help-block"></span>
              </div>
            </div>

            <!-- Superuser -->
            <?php
            if ($_SESSION['superuser'] == 1) {
              echo '<div class="form-group mb-0">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="superuser" class="custom-control-input" id="superuser">
                <label class="custom-control-label" for="superuser">SuperUser.</label>
              </div>
            </div>';
            }
            ?>

            <div class="card-footer bg-transparent">
              <!-- <input type="hidden" name="agregar-admin" value="0"> -->
              <input type="hidden" name="registro" value="nuevo">
              <button type="submit" class="btn btn-success col-lg-2" id="crear_registro">A??adir</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>