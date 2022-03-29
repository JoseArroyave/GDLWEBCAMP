<?php
include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'funciones/funciones.php';
$id = $_GET['id'];

if (filter_var($id, FILTER_VALIDATE_INT)) {
} else {
  header('Location:404.php');
}
if ($conn->query("SELECT * FROM invitados WHERE id_invitado = $id")->fetch_assoc() === NULL) {
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
            <h1><b>Editar Invitado</b><br>
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
          <h3 class="card-title"> Llena el formulario para editar la categoría</h3>
        </div>
        <div class="card-body">
          <?php
          $sql = "SELECT * FROM invitados WHERE id_invitado = $id";
          $resultado = $conn->query($sql);
          $invitado = $resultado->fetch_assoc();
          echo '<pre>';
          print_r($invitado);
          echo '</pre>';
          ?>
          <form class="form-horizontal" role="form" method="POST" action="modelo-invitado.php" name="guardar-invitado" id="guardar-invitado">

            <!-- Nombre invitado-->
            <div class="form-group row">
              <label for="nombre_invitado" class="col-sm-2 col-form-label">Nombre:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre del invitado" value="<?php echo $invitado['nombre_invitado'] ?>">
              </div>
            </div>

            <!-- Apellido invitado-->
            <div class="form-group row">
              <label for="apellido_invitado" class="col-sm-2 col-form-label">Apellido:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido del invitado" value="<?php echo $invitado['apellido_invitado'] ?>">
                
              </div>
            </div>
            
            <!-- Biografía invitado-->
            <div class="form-group row">
              <label for="descripción" class="col-sm-2 col-form-label">Biografía:</label>
              <div class="col-sm-12">
                <textarea name="descripcion_invitado" rows="5" class="form-control" cols="40" id="descripcion" placeholder="Ingresa aquí una mini biografía del invitado"><?php echo $invitado['descripcion_invitado'] ?></textarea>
              </div>
            </div>

            <!-- Imagen actual -->
            <div class="form-group">
              <label for="imagen_actual">Imagen actual</label>
              <br>
              <img src="../img/invitados/<?php echo $invitado['url_imagen'] ?>" width="200px">
            </div>
            <!-- Url imagen del invitado-->
            <div class="form-group row">
              <label for="url_imagen" class="col-sm-2 col-form-label">Foto del invitado:</label>
              <div class="col-sm-12">
                <input type="file" id="url_imagen" name="url_imagen" require>
              </div>
            </div>

            <div class="card-footer bg-transparent">
              <!-- <input type="hidden" name="editar-admin" value="0"> -->
              <input type="hidden" name="invitado" value="actualizar">
              <input type="hidden" name="id_invitado" value="<?php echo $id; ?>">
              <button type="submit" class="btn btn-success col-lg-2" id="agregar">Actualizar</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>