<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

$sql = "SELECT regalo, COUNT(*) AS resultado FROM registrados GROUP BY regalo ";
$resultado = $conn->query($sql);

$labels_regalos = array();
$data_regalos = array();
$regaloFinal = array();
while ($regalos = $resultado->fetch_assoc()){
  $regalo = $regalos['regalo'];
  $cantidad = $regalos['resultado'];

  $labels_regalos[] = $regalo;
  $data_regalos[] = $cantidad;
}
$regaloFinal[] = $labels_regalos;
$regaloFinal[] = $data_regalos;

echo json_encode($regaloFinal);
?>