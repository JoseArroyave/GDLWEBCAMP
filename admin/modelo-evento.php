<?php
// include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

if ($_POST['evento'] == 'nuevo') {
  die(json_encode($_POST));
  $nombre = $_POST['titulo_evento'];
  $fecha = $_POST['fecha_evento'];
  $hora = $_POST['hora_evento'];
  $categoria = $_POST['categoria_evento'];
  $invitado = $_POST['invitado_evento'];

  try {
    $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento,fecha_evento, hora_evento, id_cat_evento, id_inv_evento) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssii", $nombre, $fecha, $hora, $categoria, $invitado);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array(
        "respuesta" => "exito",
        "id_insertado" => $id_insertado
      );
    } else {
      $respuesta = array(
        "respuesta" => "error",
      );
    };
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
  die(json_encode($respuesta));
}

if ($_POST['evento'] == 'actualizar') {
  die(json_encode($_POST));
  $nombre = $_POST['titulo_evento'];
  $fecha = $_POST['fecha_evento'];
  $hora = $_POST['hora_evento'];
  $categoria = $_POST['categoria_evento'];
  $invitado = $_POST['invitado_evento'];
  $id = $_POST['id_evento'];

  try {
    $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv_evento = ?, editado = NOW() WHERE id_evento = ?');
    $stmt->bind_param('sssiii', $nombre, $fecha, $hora, $categoria, $invitado, $id);
    $id_actualizado = $stmt->insert_id;
    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_actualizado' => $id_actualizado
      );
    } else {
      $respuesta = array(
        'respuesta' => 'error',
        'usuario' => $nombre
      );
    }
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta));
}

if ($_POST['evento'] == 'eliminar') {
  die(json_encode($_POST));
  $id_borrar = $_POST['id'];

  try {
    $stmt = $conn->prepare('DELETE FROM eventos WHERE id_evento = ?');
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
