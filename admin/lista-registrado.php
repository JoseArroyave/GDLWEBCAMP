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
              <h1>Listado de registrados</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lista registrados</li>
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
                        <th>Email</th>
                        <th>Fecha registro</th>
                        <th>Artículos adquiridos</th>
                        <th>Talleres registrados</th>
                        <th>Regalo</th>
                        <th>Total pagado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      try {
                        $sql = "SELECT * FROM registrados";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while ($registrado = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $registrado['nombre_registrado'] . ' ' . $registrado['apellido_registrado']; ?>
                            <?php
                            $pagado = $registrado['pagado'];
                            if ($pagado) {
                              echo '<br>';
                              echo '<span class="badge bg-green">Ya pagó</span>';
                            } else {
                              echo '<span class="badge bg-red">No ha pagado</span>';
                            } ?>
                          </td>
                          <td><?php echo $registrado['email_registrado'] ?></td>
                          <td><?php echo $registrado['fecha_registro'] ?></td>
                          <td>
                            <?php
                            $articulos = json_decode($registrado['pases_articulos'], true);
                            $arreglo_articulos = array(
                              'pase_dia' => 'Pase un día',
                              'pase_completo' => 'Pase completo',
                              'dos_dias' => 'Pase dos días',
                              'camisas' => 'Camisas',
                              'etiquetas' => 'Etiquetas',
                            );
                            foreach ($articulos as $key => $articulo) {
                              echo '<b>' . $articulo . '</b>' . ' - ' . $arreglo_articulos[$key] . '<br>';
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            $talleres = json_decode($registrado['talleres_registrados'], true);

                            $talleres = implode("', '", $talleres['eventos']);

                            $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres')";

                            $resultado_talleres = $conn->query($sql_talleres);

                            while($eventos = $resultado_talleres->fetch_assoc()){
                              // echo $eventos['nombre_evento'] . ' ' . $eventos['fecha_evento'] . ' ' . $eventos['hora_evento'] . '<br>';
                              echo $eventos['nombre_evento'] . '<br>';
                            }
                            ?>
                          </td>
                          <td><?php echo $registrado['regalo'] ?></td>
                          <td>$ <?php echo $registrado['total_pagado'] ?></td>
                          <td>
                            <a href="editar-registrado.php?id=<?php echo $registrado['id_registrado'] ?>" class="btn bg-orange margin">
                              <i class="fa fa-pencil" style="color:#ffffff"></i>
                            </a>
                            <a href="#" data-id="<?php echo $registrado['id_registrado']; ?>" data-tipo="registrado" data-name="<?php echo $registrado['nombre_registrado'] . ' ' . $registrado['apellido_registrado'] ?>" class="btn bg-danger margin borrar_registrado">
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
                        <th>Email</th>
                        <th>Fecha registro</th>
                        <th>Artículos adquiridos</th>
                        <th>Talleres registrados</th>
                        <th>Regalo</th>
                        <th>Total pagado</th>
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