<?php
include_once 'includes/templates/header.php';
?>

<section class="seccion contenedor" id="calendario">
  <h2>Calendario de eventos</h2>
  <?php
  try {
    require_once('includes/functions/bd_conexion.php');   
    $sql = "SELECT id_evento, nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
    $sql .= "FROM eventos ";
    $sql .= "INNER JOIN categoria_evento ";
    $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
    $sql .= "INNER JOIN invitados ";
    $sql .= "ON eventos.id_inv_evento = invitados.id_invitado ";
    $sql .= "ORDER BY id_evento";
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  ?>

  <div class="calendario">
    <?php
    $calendario = array();
    while ($eventos = $resultado->fetch_assoc()) {
      $fecha = $eventos['fecha_evento'];
      $evento = array(
        'titulo' => $eventos['nombre_evento'],
        'fecha' => $eventos['fecha_evento'],
        'hora' => $eventos['hora_evento'],
        'categoria' => $eventos['cat_evento'],
        'icono' => $eventos['icono'],
        'invitado' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']
      ); // Me los arroja individuales, los guardo en $calendario para que sea un array de arrays donde se contengan todos y cada uno de los eventos

      $calendario[$fecha][] = $evento;
    } ?>

    <div class="calendario">
      <?php
      // Imprime todos los eventos
      foreach ($calendario as $dia => $lista_eventos) { ?>
        <h3>
          <span>
            <i class="fa fa-calendar"></i>
            <?php setlocale(LC_TIME, "spanish");
            echo utf8_encode(strftime("%d de %b %Y", strtotime($dia))) ?>
          </span>
        </h3>
        <?php foreach ($lista_eventos as $evento) { ?>
          <div class="dia">
            <p class="titulo">
              <?php echo $evento['titulo'] ?>
            </p>
            <p class="hora">
              <i class="fa fa-clock-o" aria-hidden="true"></i>
              <?php echo $evento['hora'] ?>
            </p>
            <p class="categoria">
              <i class="fa <?php echo $evento['icono']; ?>" aria-hidden="true"></i>
              <?php echo $evento['categoria'] ?>
            </p>
            <p class="invitado">
              <i class="fa fa-user" aria-hidden="true"></i>
              <?php echo $evento['invitado'] ?>
            </p>
          </div>
      <?php
        } // fin foreach eventos
      } // fin foreach dias
      ?>
    </div>
  </div>

  <?php
  $conn->close();
  ?>

</section>
<?php
include_once 'includes/templates/footer.php';
?>