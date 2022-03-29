<?php
include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'funciones/funciones.php';
$id = $_GET['id'];

if (filter_var($id, FILTER_VALIDATE_INT)) {
} else {
  header('Location:404.php');
}
if ($conn->query("SELECT * FROM categoria_evento WHERE id_categoria = $id")->fetch_assoc() === NULL) {
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
            <h1><b>Editar Categoría</b><br>
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
          $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id";
          $resultado = $conn->query($sql);
          $categoria = $resultado->fetch_assoc();
          echo '<pre>';
          print_r($categoria);
          echo '</pre>';
          ?>
          <form class="form-horizontal" role="form" method="POST" action="modelo-categoria.php" name="guardar-categoria" id="guardar-categoria">

            <!-- Nombre categoria-->
            <div class="form-group row">
              <label for="nombre_categoria" class="col-sm-2 col-form-label">Categoría:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoria del evento" value="<?php echo $categoria['cat_evento'] ?>">
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
                <input type="text" class="form-control" name="icono" id="icono" placeholder="fa fa-icon" value="<?php echo $categoria['icono'] ?>">
              </div>
            </div>

            <div class="card-footer bg-transparent">
              <!-- <input type="hidden" name="editar-admin" value="0"> -->
              <input type="hidden" name="categoria" value="actualizar">
              <input type="hidden" name="id_categoria" value="<?php echo $id; ?>">
              <button type="submit" class="btn btn-success col-lg-2" id="agregar">Actualizar</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>