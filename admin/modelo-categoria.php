<?php
// include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

if ($_POST['categoria'] == 'nuevo') {
  die(json_encode($_POST));
  $categoria = $_POST['nombre_categoria'];
  $icono = $_POST['icono'];

  try {
    $stmt = $conn->prepare("INSERT INTO categoria_evento (cat_evento,icono) VALUES (?,?)");
    $stmt->bind_param("ss", $categoria, $icono);
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

if ($_POST['categoria'] == 'actualizar') {
  die(json_encode($_POST));
  $categoria = $_POST['nombre_categoria'];
  $icono = $_POST['icono'];
  $id = $_POST['id_categoria'];

  try {
    $stmt = $conn->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ?');
    $stmt->bind_param('ssi',$categoria,$icono,$id);
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

if ($_POST['categoria'] == 'eliminar') {
  die(json_encode($_POST));
  $id_borrar = $_POST['id'];

  try {
    $stmt = $conn->prepare('DELETE FROM categoria_evento WHERE id_categoria = ?');
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