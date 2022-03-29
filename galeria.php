<?php
include_once 'includes/templates/header.php';
?>
<section class="seccion contenedor">
  <h2>Galería de fotos</h2>
  <div class="galeria">
    <?php
    for ($i = 0; $i < 21; $i++) {
      if ($i < 10) { ?>
        <a href="img/galeria/0<?php echo $i ?>.jpg" data-lightbox="galeria"><img src="img/galeria/thumbs/0<?php echo $i ?>.jpg" alt=""></a>
      <?php } else { ?>
        <a href="img/galeria/<?php echo $i ?>.jpg" data-lightbox="galeria"><img src="img/galeria/thumbs/<?php echo $i ?>.jpg" alt=""></a>
    <?php }
    } ?>
  </div>
</section>
<?php
include_once 'includes/templates/footer.php';
?>