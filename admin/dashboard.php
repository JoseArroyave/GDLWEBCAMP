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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      <!-- Registrados -->
      <div class="container-fluid">
        <h2 class="page-header">Registrados</h2>
        <div class="row">

          <!-- Total registrados -->
          <div class="col-lg-3 col-6 px-2">
            <?php
            $sql = "SELECT COUNT(id_registrado) as registros FROM registrados ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
            ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $registrados['registros'] ?></h3>
                <p>Total registrados</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-plus"></i>
              </div>
            </div>
          </div>

          <!-- Pagados -->
          <div class="col-lg-3 col-6 px-2">
            <?php
            $sql = "SELECT COUNT(id_registrado) as registros FROM registrados WHERE pagado = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $registrados['registros'] ?></h3>
                <p>Pagados</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-check"></i>
              </div>
            </div>
          </div>

          <!-- Sin pagar -->
          <div class="col-lg-3 col-6 px-2">
            <?php
            $sql = "SELECT COUNT(id_registrado) as registros FROM registrados WHERE pagado = 0 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
            ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $registrados['registros'] ?></h3>
                <p>Sin pagar</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-xmark"></i>
              </div>
            </div>
          </div>

          <!-- Ganancias -->
          <div class="col-lg-3 col-6 px-2">
            <?php
            $sql = "SELECT SUM(total_pagado) as ganancias FROM registrados WHERE pagado = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3>$<?php echo $registrados['ganancias'] ?></h3>
                <p>Ganancias</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-money-bill-1-wave"></i>
              </div>
            </div>
          </div>

          <!-- Ver todos -->
          <div class="col-12 px-2">
            <div class="small-box bg-light">
              <a href="lista-registrado.php" class="small-box-footer">
                Ver todos <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>
      </div>

      <!-- Regalos e invitados, etc -->
      <div class="container-fluid">
        <h2 class="page-header">Regalos</h2>

        <!-- Regalos -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <?php
            $sql = "SELECT COUNT(total_pagado) as ganancias FROM registrados WHERE pagado = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
            ?>
            <!-- Purple card -->
            <div class="card card-purple">

              <!-- Header -->
              <div class="card-header">
                <h3 class="card-title">Regalos</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <!-- Body -->
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="regalo" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <h2 class="page-header">Invitados</h2>
        <div class="row">

          <!-- Invitados -->
          <div class="col-lg-12 col-6 px-2">
            <?php
            $sql = "SELECT COUNT(id_invitado) as invitados FROM invitados ";
            $resultado = $conn->query($sql);
            $invitados = $resultado->fetch_assoc();
            ?>
            <div class="small-box bg-pink">
              <div class="inner">
                <h3><?php echo $invitados['invitados'] ?></h3>
                <p>Invitados</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-people-group"></i>
              </div>
            </div>
          </div>

          <!-- Ver todos -->
          <div class="col-12 px-2">
            <div class="small-box bg-light">
              <a href="lista-invitado.php" class="small-box-footer">
                Ver todos <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <h2 class="page-header">Eventos</h2>
        <div class="row">

          <!-- Total eventos -->
          <div class="col-lg-12 col-6 px-2">
            <?php
            $sql = "SELECT COUNT(id_evento) as eventos FROM eventos ";
            $resultado = $conn->query($sql);
            $eventos = $resultado->fetch_assoc();
            ?>
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php echo $eventos['eventos'] ?></h3>
                <p>Eventos</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-calendar-check"></i>
              </div>
            </div>
          </div>

          <!-- Eventos -->
          <?php
          $sql = "SELECT MAX(id_categoria) as categorias FROM categoria_evento ";
          $resultado = $conn->query($sql);
          $categorias = $resultado->fetch_assoc();
          for ($i = 1; $i <= $categorias['categorias']; $i++) {
            $sql = "SELECT COUNT(id_evento) as eventos FROM eventos WHERE id_cat_evento = $i ";
            $resultado = $conn->query($sql);
            $eventos = $resultado->fetch_assoc();
            if ($eventos['eventos'] != 0) { ?>
              <div class="col-md px-2">
                <div class="small-box bg-light">
                  <div class="inner">
                    <h3><?php echo $eventos['eventos'] ?></h3>
                    <p>
                      <?php
                      $sql = "SELECT cat_evento as nombre FROM categoria_evento WHERE id_categoria = $i ";
                      $resultado = $conn->query($sql);
                      $nombre_evento = $resultado->fetch_assoc();
                      echo $nombre_evento['nombre']; ?>
                    </p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-person-chalkboard"></i>
                  </div>
                </div>
              </div>
          <?php }
          } ?>

          <!-- Ver todos -->
          <div class="col-12 px-2">
            <div class="small-box bg-light">
              <a href="lista-evento.php" class="small-box-footer">
                Ver todos <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
  <?php include_once 'templates/footer.php' ?>