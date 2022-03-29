<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/navegacion.php';
include_once 'templates/barra.php';
?>

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="overflow-y: scroll">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Crear registrado</b><br>
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
          <h3 class="card-title"> Llena el formulario para registrar un nuevo usuario</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="modelo-registrado.php" name="guardar-registrado" id="guardar-registrado">

            <!-- Datos personales -->
            <div class="form-group">
              <h4><b>Datos personales</b></h4>
              <div class=" mb-3 p-3 border border-info rounded">
                <div class="row">

                  <!-- Nombre registrado-->
                  <div class="col-4">
                    <label for="nombre_registrado" class="col-form-label">Nombre:</label>
                    <div>
                      <input type="text" class="form-control" id="nombre_registrado" name="nombre_registrado" placeholder="Nombre del usuario a registrar">
                    </div>
                  </div>

                  <!-- Apellido registrado-->
                  <div class="col-4">
                    <label for="apellido_registrado" class="col-form-label">Apellido:</label>
                    <div>
                      <input type="text" class="form-control" id="apellido_registrado" name="apellido_registrado" placeholder="Apellido del usuario a registrar">
                    </div>
                  </div>

                  <!-- Email registrado-->
                  <div class="col-4">
                    <label for="email_registrado" class="col-form-label">Email:</label>
                    <div>
                      <input type="text" class="form-control" id="email_registrado" name="email_registrado" placeholder="Email del usuario a registrar">
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- Boletos registrado-->
            <div class="form-group">
              <h4><b>Boletos</b></h4>
              <div class=" mb-3 p-3 border border-info rounded">
                <div class="row">
                  <div class="col-4">
                    <p>Pase por un día (viernes) $30</p>
                    <input type="number" class="form-control" min="0" size="3" name="boletos[un_dia][cantidad]" placeholder="0" id="pase_dia">
                    <input type="hidden" value="30" name="boletos[un_dia][precio]">
                  </div>
                  <div class="col-4">
                    <p>Todos los días $50</p>
                    <input type="number" class="form-control" min="0" size="3" name="boletos[completo][cantidad]" placeholder="0" id="pase_completo">
                    <input type="hidden" value="50" name="boletos[completo][precio]">
                  </div>
                  <div class="col-4">
                    <p>Pase por 2 días (viernes y sábado) $45</p>
                    <input type="number" class="form-control" min="0" size="3" name="boletos[2dias][cantidad]" placeholder="0" id="pase_dosdias">
                    <input type="hidden" value="45" name="boletos[2dias][precio]">
                  </div>
                </div>
              </div>
            </div>

            <!-- Eventos -->
            <div class="form-group">
              <h4><b>Talleres</b></h4>
              <?php
              try {
                $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " JOIN invitados ";
                $sql .= " ON eventos.id_inv_evento = invitados.id_invitado ";
                $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                echo $e->getMessage();
              }

              $eventos_dias = array();
              while ($eventos = $resultado->fetch_assoc()) {
                $fecha = $eventos['fecha_evento'];
                setlocale(LC_ALL, 'es_ES');
                $dia_semana = strftime("%A", strtotime($fecha));

                $categoria = $eventos['cat_evento'];
                $dia = array(
                  'nombre_evento' => $eventos['nombre_evento'],
                  'hora_evento' => $eventos['hora_evento'],
                  'id_evento' => $eventos['id_evento'],
                  'nombre_invitado' => $eventos['nombre_invitado'],
                  'apellido_invitado' => $eventos['apellido_invitado'],
                  'clave' => $eventos['clave']
                );
                $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
              }
              ?>

              <?php foreach ($eventos_dias as $dia => $eventos) { ?>
                <div id="<?php echo $dia; ?>" class="mb-3 p-3 border border-info rounded">
                  <h5 class="text-center text-uppercase"><b><?php echo $dia; ?></b></h5>
                  <div class="row">
                    <?php foreach ($eventos['eventos'] as $tipo => $evento_dia) { ?>
                      <div class="col-4">
                        <h5><?php echo $tipo ?></h5>
                        <?php foreach ($evento_dia as $evento) { ?>
                          <label style="font-weight:normal;cursor:pointer">
                            <input type="checkbox" name="registro[]" id="<?php echo $evento['id_evento'] ?>" value="<?php echo $evento['clave'] ?>">
                            <time><b><?php echo $evento['hora_evento'] ?></b></time> <?php echo $evento['nombre_evento'] ?>
                            <span class="badge bg-info">
                              <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?>
                            </span>
                            </ style="font-weight:normal;">
                          <?php } ?>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
              <!--#contenido-dia-->
            </div>
            <!--.caja-->

            <!-- Pago y extras -->
            <div class="form-group">
              <h4><b>Pago y extras</b></h4>
              <div class="mb-3 p-3 border border-info rounded">
                <div class="row">

                  <div class="col-4">
                    <p>Camisa del evento $10
                    </p>
                    <input type="number" min='0' name="pedido_extra[camisas][cantidad]" id='camisa_evento' size='3' placeholder="0" class="form-control">
                    <input type="hidden" value='10' name="pedido_extra[camisas][precio]">
                  </div>

                  <div class="col-4">
                    <p>Paquete de 10 etiquetas $2
                    </p>
                    <input type="number" min='0' name="pedido_extra[etiquetas][cantidad]" id='etiquetas' size='3' placeholder="0" class="form-control">
                    <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                  </div>

                  <div class="col-4">
                    <p>Seleccione un regalo</p>
                    <select id="regalo" name='regalo' class="form-control" required>
                      <?php
                      $regalo_actual = $registrado['regalo'];
                      $sql = "SELECT nombre_regalo FROM regalos";
                      $result = $conn->query($sql);
                      while ($regalos = $result->fetch_assoc()) {
                        if ($regalos['nombre_regalo'] == $regalo_actual) { ?>
                          <option value="<?php echo $regalos['nombre_regalo'] ?>" selected>
                            <?php echo $regalos['nombre_regalo'] ?>
                          </option>
                        <?php } else { ?>
                          <option value="<?php echo $regalos['nombre_regalo'] ?>">
                            <?php echo $regalos['nombre_regalo'] ?>
                          </option>
                        <?php } ?>
                      <?php }
                      print_r($regalos);
                      ?>
                    </select>
                  </div>

                  <div class="col-4 pt-3">
                    <input type="button" id='calcular' class="btn btn-warning" value='Calcular'>
                  </div>

                  <div class="col-4 pt-3">
                    <p>Resumen:</p>
                    <div id="lista-productos">
                    </div>
                  </div>

                  <div class="col-4 pt-3">
                    <p>Total:</p>
                    <input type="hidden" name="total_pedido" id="total_pedido">
                    <div id="suma-total">
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="card-footer bg-transparent">
              <input type="hidden" name="registrado" value="nuevo">
              <button type="submit" id="btnRegistro" class="btn btn-success col-lg-2" value="pagar" name='form'>Pagar</button>
              <button type="reset" class="btn btn-danger float-right col-lg-2" id="cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'templates/footer.php' ?>