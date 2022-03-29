<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/navegacion.php';
include_once 'templates/barra.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Listado de eventos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lista eventos</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Aquí puedes editar o borrar los eventos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="registros" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Categoría</th>
                        <th>Invitado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      try {
                        $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                        $sql .= " FROM eventos ";
                        $sql .= " INNER JOIN categoria_evento ";
                        $sql .= " ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                        $sql .= " INNER JOIN invitados ";
                        $sql .= " ON eventos.id_inv_evento=invitados.id_invitado ";
                        $sql .= " ORDER BY id_evento ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      $evento = $resultado->fetch_assoc();

                      while ($evento = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $evento['nombre_evento'] ?></td>
                          <td><?php echo $evento['fecha_evento'] ?></td>
                          <td><?php echo $evento['hora_evento'] ?></td>
                          <td><?php echo $evento['cat_evento'] ?></td>
                          <td><?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?></td>
                          <td>
                            <a href="editar-evento.php?id=<?php echo $evento['id_evento'] ?>" class="btn bg-orange margin">
                              <i class="fa fa-pencil" style="color:#ffffff"></i>
                            </a>
                            <a href="#" data-id="<?php echo $evento['id_evento']; ?>" data-tipo="evento" data-name="<?php echo $evento['nombre_evento'] ?>" class="btn bg-danger margin borrar_evento">
                              <i class="fa fa-trash" style="color:#ffffff"></i>
                            </a>
                          </td>
                        </tr>

                      <?php };

                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Categoría</th>
                        <th>Invitado</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- ./wrapper -->
  <?php include_once 'templates/footer.php' ?>