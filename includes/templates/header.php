<?php
// Definir un nombre para cachear
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);

// Definir archivo para cachear (puede ser .php también)
$archivoCache = 'cache/' . $pagina . '.html';
// Cuanto tiempo deberá estar este archivo almacenado
$tiempo = 36000;
// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
  include($archivoCache);
  exit;
}
// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
ob_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />

  <link rel="manifest" href="site.webmanifest" />
  <link rel="apple-touch-icon" href="img/favicon.ico" />
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Oswald:wght@200;300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />

  <?php
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace('.php', '', $archivo);
  if ($pagina == 'invitados') {
    echo '<link rel="stylesheet" href="css/colorbox.css">';
  } else if ($pagina == 'galeria') {
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
  } else if ($pagina == 'index') {
    echo '<link rel="stylesheet" href="css/colorbox.css">';
  }
  ?>

  <link rel="stylesheet" href="css/main.css" />
  <meta name="theme-color" content="#fafafa" />
</head>

<body>
  <!-- Add your site or application content here -->
  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </nav>
        <!--.redes-sociales-->
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha">
              <i class="fa fa-calendar" aria-hidden="true"></i> 10-12 Dic
            </p>
            <p class="ciudad">
              <i class="fa fa-map-marker" aria-hidden="true"></i> NY City, USA
            </p>
          </div>
          <h1 class="nombre-sitio">GdlWebCamp</h1>
          <p class="slogan">
            La mejor conferencia de <span>diseño web</span>
          </p>
        </div>
        <!--.informacion-evento-->
      </div>
    </div>
    <!--.hero-->
  </header>

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
          <img src="img/logo.svg" alt="logo gdlwebcamp" />
        </a>
      </div>
      <div class="menu-padre">
        <div class="menu-movil clearfix">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <nav class="navegacion-principal clearfix">
        <a href="index.php">Home</a>
        <a href="galeria.php">Galeria</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div>
    <!--.contenedor-->
  </div>
  <!--.barra-->