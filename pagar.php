<?php

if (!isset($_POST['form'])) {
  exit("hubo un error");
}

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

require 'includes/paypal.php';

if (isset($_POST['form'])) :
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $fecha = date('Y-m-d H:i:s');
  include_once 'includes/functions/funciones.php';

  // Pedidos
  $boletos = $_POST['boletos'];
  $numeroBoletos = $boletos;

  $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
  $pedidoExtra = $_POST['pedido_extra'];
  $precioCamisas = $_POST['pedido_extra']['camisas']['precio'];
  $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
  $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];

  $pedido = productos_json($boletos, $camisas, $etiquetas);

  // Eventos
  $eventos = $_POST['registro'];
  $registro = eventos_json($eventos);

  try {
    require_once('includes/functions/bd_conexion.php');
    $stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
    $stmt->execute();
    $ID_registro = $stmt->insert_id;
    $stmt->close();
    $conn->close();
    // header('Location: validar_registro.php?exitoso=1');
  } catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
  }
endif;

$compra = new Payer();
$compra->setPaymentMethod('paypal');

$i = 0;
$arreglo_pedido = array();
foreach ($numeroBoletos as $key => $value) {
  if ((int)$value['cantidad'] > 0) {

    ${"articulos$i"} = new Item();
    $arreglo_pedido[] = ${"articulos$i"};
    ${"articulos$i"}->setName('Pase: ' . $key)
      ->setCurrency('USD')
      ->setQuantity((int)$value['cantidad'])
      ->setPrice((int)$value['precio']);
    $i++;
  }
};

$i = 0;
foreach ($pedidoExtra as $key => $value) {
  if ((int)$value['cantidad'] > 0) {

    if ($key == 'camisas') {
      $precio = (float) $value['precio'] * 0.93;
    } else {
      $precio = (int) $value['precio'];
    }

    ${"articulos$i"} = new Item();
    $arreglo_pedido[] = ${"articulos$i"};
    ${"articulos$i"}->setName('Extras: ' . $key)
      ->setCurrency('USD')
      ->setQuantity((int)$value['cantidad'])
      ->setPrice($precio);
    $i++;
  }
};

$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

$cantidad = new Amount();
$cantidad->setCurrency('USD')
  ->setTotal($total);


$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
  ->setItemList((array)$listaArticulos)
  ->setDescription('Pago GDLWEBCAMP')
  ->setInvoiceNumber($ID_registro);

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true&id_pago{$ID_registro}")
  ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false&id_pago{$ID_registro}");


$pago = new Payment();
$pago->setIntent("sale")
  ->setPayer($compra)
  ->setRedirectUrls($redireccionar)
  ->setTransactions(array($transaccion));

try {
  $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
  // Don't spit out errors or use "exit" like this in production code
  echo '<pre>';
  echo $pce->getData();
  // print_r(json_decode($pce->getData()));
  exit;
  echo '</pre>';
}

$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");
