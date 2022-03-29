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
              <h1>Listado de administradores</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lista admins</li>
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
                  <h3 class="card-title">Recuerda que solamente puedes editar tus datos de accesso</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="registros" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id usuario</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Superuser</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      try {
                        $sql = "SELECT id_admin, usuario, nombre, superuser FROM admins";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while ($admin = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $admin['id_admin'] ?></td>
                          <td><?php echo $admin['usuario'] ?></td>
                          <td><?php echo $admin['nombre'] ?></td>
                          <td><?php 
                          if($admin['superuser'] == 1){
                            echo 'Sí';
                            }else{
                              echo 'No';}
                              ?></td>
                          <td>
                            <a href="editar-admin.php?id=<?php echo $admin['id_admin'] ?>" class="btn bg-orange margin <?php 
                            if($_SESSION['superuser'] == 1){
                              echo 'enabled';
                              }else if ($_SESSION['usuario'] == $admin['usuario']) {
                                echo 'enabled';
                              }else{
                                echo 'disabled';
                              }
                              ?>">
                              <i class="fa fa-pencil" style="color:#ffffff"></i>
                            </a>
                            <a href="#" data-id="<?php echo $admin['id_admin']; ?>" data-tipo="admin" data-name="<?php echo $admin['nombre'] ?>" class="btn bg-danger margin borrar_registro <?php 
                            if($_SESSION['superuser'] == 1){
                              echo 'enabled';
                              }else if ($_SESSION['usuario'] == $admin['usuario']) {
                                echo 'enabled';
                              }else{
                                echo 'disabled';
                              }
                              ?>">
                              <i class="fa fa-trash" style="color:#ffffff"></i>
                            </a>

                          </td>

                        </tr>

                      <?php };

                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id usuario</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Superuser</th>
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