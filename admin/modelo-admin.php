<?php
// include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

if ($_POST['registro'] == 'nuevo') {
  die(json_encode($_POST));
  $usuario = $_POST['usuario'];
  $nombre = $_POST['nombre'];
  $password = $_POST['password'];

  $opciones = array(
    'cost' => 12
  );

  $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

  try {
    if (empty($_POST['superuser'])) {
      $stmt = $conn->prepare("INSERT INTO admins (usuario,nombre,password) VALUES (?,?,?)");
      $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
    } else {
      $_POST['superuser'] = 1;
      $superuser = $_POST['superuser'];
      $stmt = $conn->prepare("INSERT INTO admins (usuario,nombre,password,superuser) VALUES (?,?,?,?)");
      $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed, $superuser);
    }
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if ($id_registro > 0) {
      $respuesta = array(
        "respuesta" => "exito",
      );
    } else {
      $respuesta = array(
        "respuesta" => "error",
        'usuario' => $usuario
      );
    };
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
  die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {
  die(json_encode($_POST));
  $usuario = $_POST['usuario'];
  $nombre = $_POST['nombre'];
  $id_registro = $_POST['id_registro'];

  try {
    if ((empty($_POST['password'])) && (empty($_POST['superuser']))) {
      $_POST['superuser'] = 0;
      $superuser = $_POST['superuser'];
      $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, superuser = ?, editado = NOW() WHERE id_admin = ?");
      $stmt->bind_param('ssii', $usuario, $nombre, $superuser, $id_registro);
    } else if ((empty($_POST['superuser'])) && !(empty($_POST['password']))) {
      $opciones = array(
        'cost' => 12
      );
      $_POST['superuser'] = 0;
      $superuser = $_POST['superuser'];
      $password = $_POST['password'];
      $hash_password  = password_hash($password, PASSWORD_BCRYPT, $opciones);
      $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?,superuser = ?, editado = NOW() WHERE id_admin = ?');
      $stmt->bind_param('sssii', $usuario, $nombre, $hash_password, $superuser, $id_registro);
    } else if (!(empty($_POST['superuser'])) && (empty($_POST['password']))) {
      $_POST['superuser'] = 1;
      $superuser = $_POST['superuser'];
      $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, superuser = ?, editado = NOW() WHERE id_admin = ?");
      $stmt->bind_param('ssii', $usuario, $nombre, $superuser, $id_registro);
    } else {
      $_POST['superuser'] = 1;
      $superuser = $_POST['superuser'];
      $opciones = array(
        'cost' => 12
      );
      $password = $_POST['password'];
      $hash_password  = password_hash($password, PASSWORD_BCRYPT, $opciones);
      $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, superuser = ?, editado = NOW() WHERE id_admin = ?');
      $stmt->bind_param('sssii', $usuario, $nombre, $hash_password, $superuser, $id_registro);
    }

    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_actualizado' => $stmt->insert_id
      );
    } else {
      $respuesta = array(
        'respuesta' => 'error',
        'usuario' => $usuario
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

if ($_POST['registro'] == 'login') {
  die(json_encode($_POST));
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  try {
    $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $superuser, $editado);
    if ($stmt->affected_rows) {
      $existe = $stmt->fetch();
      if ($existe) {
        if (password_verify($password, $password_admin)) {
          session_start();
          $_SESSION['id'] = $id_admin;
          $_SESSION['usuario'] = $usuario_admin;
          $_SESSION['nombre'] = $nombre_admin;
          $_SESSION['superuser'] = $superuser;

          $respuesta = array(
            'respuesta' => 'exitoso',
            'usuario' => $nombre_admin
          );
        } else {
          $respuesta = array(
            'respuesta' => 'password_incorrecto'
          );
        }
      } else {
        $respuesta = array(
          'respuesta' => 'no_existe'
        );
      };
    };
    $stmt->close();
    $conn->close();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  };
  die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar') {
  die(json_encode($_POST));
  $id_borrar = $_POST['id'];

  try {
    $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ?');
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
