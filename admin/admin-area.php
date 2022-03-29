<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/navegacion.php';
include_once 'templates/barra.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title
            <?php
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
            ?>
          </h3>

        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <div class="card-footer">
          Footer
        </div>
      </div>

    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>