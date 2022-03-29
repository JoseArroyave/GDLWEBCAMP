<?php if (isset($_POST['form'])) :
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $fecha = date('Y-m-d H:i:s');

  include_once 'includes/functions/funciones.php';

  // Pedidos
  $boletos = $_POST['boletos'];
  // $camisas = $_POST['camisa_evento'];
  $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
  // $etiquetas = $_POST['etiquetas_evento'];
  $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

  // Precios
  // $pedidoExtra = $_POST['pedido_extra'];
  // $precioCamisas = $_POST['pedido_extra']['camisas']['precio'];
  // $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];

  $pedido = productos_json($boletos, $camisas, $etiquetas);

  // Eventos
  $eventos = $_POST['registro'];
  $registro = eventos_json($eventos);

  try {
    require_once('includes/functions/bd_conexion.php');
    $stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: validar_registro.php?exitoso=1');
  } catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
  }

endif;
?>
<?php include_once 'includes/templates/header.php'; ?>
<section class="seccion contenedor" id="reservas">
  <?php if (isset($_GET['exitoso'])) :
    if ($_GET['exitoso'] == "1") :
      echo "<h2>Resumen registro</h2>";
    endif;
  endif; ?>
</section>
<?php include_once 'includes/templates/footer.php'; ?>