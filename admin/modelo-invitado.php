<?php
// include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

if ($_POST['invitado'] == 'nuevo') {
  // die(json_encode($_POST));
  $nombre = $_POST['nombre_invitado'];
  $apellido = $_POST['apellido_invitado'];
  $descripcion = $_POST['descripcion_invitado'];

  $directorio = '../img/invitados/';
  if (!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['url_imagen']['tmp_name'], $directorio . $_FILES['url_imagen']['name'])) {
    $imagen_url = $_FILES['url_imagen']['name'];
    $imagen_resultado = "Se subió correctamente";
  } else {
    $respuesta = array(
      'respuesta' => error_get_last()
    );
  }

  try {
    $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion_invitado, url_imagen) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $descripcion, $imagen_url);
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

if ($_POST['invitado'] == 'actualizar') {
  // die(json_encode($_POST));
  $id = $_POST['id_invitado'];
  $nombre = $_POST['nombre_invitado'];
  $apellido = $_POST['apellido_invitado'];
  $descripcion = $_POST['descripcion_invitado'];

  $directorio = '../img/invitados/';

  if (move_uploaded_file($_FILES['url_imagen']['tmp_name'], $directorio . $_FILES['url_imagen']['name'])) {
    $imagen_url = $_FILES['url_imagen']['name'];
    $imagen_resultado = "Se subió correctamente";
  }

  try {
    if ($_FILES['url_imagen']['size'] > 0) {
      $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, url_imagen = ?, editado = NOW() WHERE id_invitado = ?");
      $stmt->bind_param("ssssi", $nombre, $apellido, $descripcion, $imagen_url, $id);
    } else {
      $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, editado = NOW() WHERE id_invitado = ?");
      $stmt->bind_param("sssi", $nombre, $apellido, $descripcion, $id);
    }
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

if ($_POST['invitado'] == 'eliminar') {
  // die(json_encode($_POST));
  $id_borrar = $_POST['id'];

  try {
    $stmt = $conn->prepare('DELETE FROM invitados WHERE id_invitado = ?');
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
