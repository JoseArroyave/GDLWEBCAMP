<?php
// include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

if ($_POST['registrado'] == 'nuevo') {
  die(json_encode($_POST));
  $nombre = $_POST['nombre_registrado'];
  $apellido = $_POST['apellido_registrado'];
  $email = $_POST['email_registrado'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $fecha = date('Y-m-d H:i:s');
  $pagado = 1;

  // Pedidos
  $boletos = $_POST['boletos'];
  $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
  $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

  $pedido = productos_json($boletos, $camisas, $etiquetas);

  // Eventos
  $eventos = $_POST['registro'];
  $registro = eventos_json($eventos);

  try {
    $stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssi", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total, $pagado);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array(
        "respuesta" => "exito",
        "id_insertado" => $id_insertado
      );
    } else {
      $respuesta = array(
        "respuesta" => "error"
      );
    };
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    $respuesta = array(
      "respuesta" => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
}

if ($_POST['registrado'] == 'actualizar') {
  die(json_encode($_POST));
  $nombre = $_POST['nombre_registrado'];
  $apellido = $_POST['apellido_registrado'];
  $email = $_POST['email_registrado'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $id = $_POST['id_registrado'];
  $pagado = 1;

  // Pedidos
  $boletos = $_POST['boletos'];
  $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
  $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

  $pedido = productos_json($boletos, $camisas, $etiquetas);

  // Eventos
  $eventos = $_POST['registro'];
  $registro = eventos_json($eventos);
  try {
    $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado = ?, apellido_registrado= ?, email_registrado= ?, pases_articulos= ?, talleres_registrados= ?, regalo= ?, total_pagado= ?, pagado= ?, editado = NOW() WHERE id_registrado = ?");
    $stmt->bind_param("sssssssii", $nombre, $apellido, $email, $pedido, $registro, $regalo, $total, $pagado, $id);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array(
        "respuesta" => "exito",
        "id_insertado" => $id_insertado
      );
    } else {
      $respuesta = array(
        "respuesta" => "error"
      );
    };
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    $respuesta = array(
      "respuesta" => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
}

if ($_POST['registrado'] == 'eliminar') {
  die(json_encode($_POST));
  $id_borrar = $_POST['id'];

  try {
    $stmt = $conn->prepare('DELETE FROM registrados WHERE id_registrado = ?');
    $stmt->bind_param('i', $id_borrar);
    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id_borrar
      );
    } else {
      $respuesta = array(
        'respuesta' => 'error'
      );
    };
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
}
