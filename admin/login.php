<?php
session_start();
if (isset($_GET['cerrar_sesion'])) {
  $cerrar_sesion = $_GET['cerrar_sesion'];
  if ($cerrar_sesion) {
    session_destroy();
    header('Location: login.php');
  }
}
if (isset($_GET['index'])) {
  $index = $_GET['index'];
  if ($index) {
    session_destroy();
    header('Location: index.php');
  };
}
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
?>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="../index.php" class="h1"><b>GDL</b>WebCamp</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Inicia sesión</p>
        <form method="POST" action="modelo-admin.php" name="login-admin" id="login-admin">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <!-- <input type="hidden" name="login-admin" value="1"> -->
              <input type="hidden" name="registro" value="login">
              <button type="submit" class="btn btn-success btn-block">Ingresar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include_once 'templates/footer.php' ?>