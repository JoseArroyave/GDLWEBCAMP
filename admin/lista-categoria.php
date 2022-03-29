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
              <h1>Listado de categorías de eventos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lista categorías</li>
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
                  <h3 class="card-title">Aquí puedes editarlos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="registros" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Icono</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      try {
                        $sql = "SELECT * FROM categoria_evento";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while ($categoria = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $categoria['cat_evento'] ?></td>
                          <td><i class="<?php echo $categoria['icono'] ?>"></i></td>
                          <td>
                            <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria'] ?>" class="btn bg-orange margin">
                              <i class="fa fa-pencil" style="color:#ffffff"></i>
                            </a>
                            <a href="#" data-id="<?php echo $categoria['id_categoria']; ?>" data-tipo="categoria" data-name="<?php echo $categoria['cat_evento'] ?>" class="btn bg-danger margin borrar_categoria">
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
                        <th>Icono</th>
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