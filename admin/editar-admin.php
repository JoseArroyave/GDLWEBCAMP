<?php
include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'funciones/funciones.php';
$id = $_GET['id'];

if (filter_var($id, FILTER_VALIDATE_INT)) {
  if ($_SESSION['superuser'] == 1) {
  } else if ($_SESSION['id'] == $id) {
  } else {
    header('Location:404.php');
  }
} else {
  header('Location:404.php');
}
if ($conn->query("SELECT * FROM admins WHERE id_admin = $id")->fetch_assoc() === NULL) {
  header('Location:404.php');
}
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
            <h1><b>Editar administrador</b><br>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
          <h3 class="card-title"> Llena el formulario para editar tus datos de administrador</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="modelo-admin.php" name="guardar-registro" id="guardar-registro">
            <?php
            $sql = "SELECT * FROM admins WHERE id_admin = $id";
            $resultado = $conn->query($sql);
            $admin = $resultado->fetch_assoc();
            ?>
            <!-- Usuario -->
            <div class="form-group row">
              <label for="usuario" class="col-sm-2 col-form-label">Usuario:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario'] ?>">
              </div>
            </div>

            <!-- Nombre -->
            <div class="form-group row">
              <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="<?php echo $admin['nombre'] ?>">
              </div>
            </div>

            <!-- Contraseña -->
            <div class="form-group row">
              <label for="password" id="label_password" class="col-sm-2 col-form-label">Constraseña</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                <small id="passwordHelpBlock" class="form-text text-muted">Tu contraseña debe tener 8-20 carácteres, un número, un carácter especial y una letra mayúscula como mínimo.</small>
              </div>
            </div>

            <!-- Repetir contrasena -->
            <div class="form-group row">
              <label for="password" id="label_password" class="col-sm-2 col-form-label">Repetir constraseña</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Vuelve a digitar tu contraseña">
                <span id="resultado_password" class="help-block"></span>
              </div>
            </div>

            <!-- Superuser -->
            <?php
            if ($_SESSION['superuser'] == 1) {
              echo '<div class="form-group mb-0">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="superuser" class="custom-control-input" id="superuser"' ?>
              <?php if ($admin['superuser'] == 1) {
                echo 'checked';
              } ?>
            <?php echo '>
                <label class="custom-control-label" for="superuser">SuperUser.</label>
              </div>
            </div>';
            } ?>

            <div class="card-footer bg-transparent">
              <!-- <input type="hidden" name="editar-admin" value="0"> -->
              <input type="hidden" name="registro" value="actualizar">
              <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
              <button type="submit" class="btn btn-success col-lg-2" id="agregar">Actualizar</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>