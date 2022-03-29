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
            <h1><b>Crear evento</b><br>
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
          <h3 class="card-title"> Llena el formulario para crear un evento</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="modelo-evento.php" name="guardar-evento" id="guardar-evento">

            <!-- Titulo -->
            <div class="form-group row">
              <label for="titulo" class="col-sm-2 col-form-label">Titulo evento:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo del evento">
              </div>
            </div>

            <!-- Fecha -->
            <div class="form-group">
              <label>Fecha:</label>
              <div class="input-group date" id="datetime">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="fecha_evento" id="fecha">
              </div>
            </div>

            <!-- Categoria -->
            <div class="form-group row">
              <label for="categoria" class="col-sm-2 col-form-label">Categoria:</label>
              <div class="col-sm-12">
                <select name="categoria_evento" class="form-control categoria" id="">
                  <option></option>
                  <?php
                  try {
                    $sql = "SELECT * FROM categoria_evento";
                    $resultado = $conn->query($sql);
                    while ($cat_evento = $resultado->fetch_assoc()) { ?>;
                  <option value="<?php echo $cat_evento['id_categoria'] ?>"><?php echo $cat_evento['cat_evento'] ?></option>
              <?php }
                  } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                  }
              ?>
                </select>
              </div>
            </div>

            <!-- Hora -->
            <div class="form-group row">
              <label for="hora" class="col-sm-2 col-form-label">Hora</label>
              <div class="col-sm-12">
                <input type="time" id="time-picker" class="form-control" name="hora_evento">
              </div>
            </div>

            <!-- Invitado -->
            <div class="form-group row">
              <label for="invitado" class="col-sm-2 col-form-label">Invitado:</label>
              <div class="col-sm-12">
                <select name="invitado_evento" class="form-control ponente" id="">
                  <option></option>
                  <?php
                  try {
                    $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados";
                    $resultado = $conn->query($sql);
                    while ($invitados = $resultado->fetch_assoc()) { ?>;
                  <option value="<?php echo $invitados['id_invitado'] ?>"><?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado'] ?></option>
              <?php }
                  } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                  }
              ?>
                </select>
              </div>
            </div>

            <div class="card-footer bg-transparent">
              <!-- <input type="hidden" name="agregar-admin" value="0"> -->
              <input type="hidden" name="evento" value="nuevo">
              <button type="submit" class="btn btn-success col-lg-2">Añadir</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>