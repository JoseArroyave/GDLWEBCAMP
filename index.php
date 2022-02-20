<?php
include_once 'includes/templates/header.php';
?>
<section class="seccion contenedor">
  <?php
  try {
    require_once('includes/functions/bd_conexion.php');
    $sql = "SELECT * FROM invitados";
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  ?>
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut. Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Excepturi placeat illo ab. Beatae non sapiente, aspernatur accusasntium totam.
  </p>
</section>
<!--.seccion-->

<section class="programa">
  <div class="contenedor-video">
    <video autoplay loop poster="img/bg-talleres.jpg">
      <source src="videos/video.mp4" type="video/mp4" />
      <source src="videos/video.webm" type="videos/webm" />
      <source src="videos/video.ogv" type="videos/ogv" />
    </video>
  </div>
  <!--.contenedor-video-->

  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del evento</h2>
        <?php
        try {
          require_once('includes/functions/bd_conexion.php');
          $sql = "SELECT * FROM categoria_evento";
          $resultado = $conn->query($sql);
        } catch (Exception $e) {
          echo $e->getMessage();
        } ?>
        <nav class="menu-programa">
          <?php while ($cat = $resultado->fetch_assoc()) { ?>
            <a href="#<?php echo strtolower($cat['cat_evento']) ?>"><i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i><?php echo $cat['cat_evento'] ?></a>
          <?php } ?>
          <pre><?php print_r($cat) ?></pre>
        </nav>
        <!--.menu-programa-->
        <?php
        try {
          require_once('includes/functions/bd_conexion.php');
          $sql = "SELECT id_evento, nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
          $sql .= "FROM eventos ";
          $sql .= "INNER JOIN categoria_evento ";
          $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= "INNER JOIN invitados ";
          $sql .= "ON eventos.id_inv_evento = invitados.id_invitado ";
          $sql .= "AND eventos.id_cat_evento = 1 ";
          $sql .= "ORDER BY id_evento LIMIT 2; ";
          $sql .= "SELECT id_evento, nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
          $sql .= "FROM eventos ";
          $sql .= "INNER JOIN categoria_evento ";
          $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= "INNER JOIN invitados ";
          $sql .= "ON eventos.id_inv_evento = invitados.id_invitado ";
          $sql .= "AND eventos.id_cat_evento = 2 ";
          $sql .= "ORDER BY id_evento LIMIT 2; ";
          $sql .= "SELECT id_evento, nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
          $sql .= "FROM eventos ";
          $sql .= "INNER JOIN categoria_evento ";
          $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= "INNER JOIN invitados ";
          $sql .= "ON eventos.id_inv_evento = invitados.id_invitado ";
          $sql .= "AND eventos.id_cat_evento = 3 ";
          $sql .= "ORDER BY id_evento LIMIT 2; ";
        } catch (Exception $e) {
          echo $e->getMessage();
        } ?>

        <?php
        $conn->multi_query($sql);
        do {
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC);
          $i = 0;
          foreach ($row as $evento) :
            if ($i % 2 == 0) { ?>
              <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
              <?php } ?>
              <div class="detalle-evento">
                <h3><?php echo $evento['nombre_evento'] ?></h3>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $evento['hora_evento'] ?></p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $evento['fecha_evento'] ?></p>
                <p><i class="fa fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?></p>
              </div>
              <?php if ($i % 2 == 1) { ?>
                <a href="calendario.php#calendario" class="button float-right">Ver todos</a>
              </div>
        <?php }
              $i++;
            endforeach;
            $resultado->free();
          } while ($conn->more_results() && $conn->next_result()); ?>

      </div>
      <!--.programa-evento-->
    </div>
    <!--.contenedor-->
  </div>
  <!--.contenido-programa-->
</section>
<!--.programa-->

<?php include_once 'includes/templates/invitados.php' ?>

<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento clearfix">
      <li>
        <p class="numero"></p>
        Invitados
      </li>
      <li>
        <p class="numero"></p>
        Talleres
      </li>
      <li>
        <p class="numero"></p>
        Días
      </li>
      <li>
        <p class="numero"></p>
        Conferencias
      </li>
    </ul>
  </div>
</div>
<!--.contador parallax-->

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>Pase por un día</h3>
          <p class="numero">$30</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="registro.php#reservas" class="button hollow">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="registro.php#reservas" class="button">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Pase por 2 días</h3>
          <p class="numero">$45</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="registro.php#reservas" class="button hollow">Comprar</a>
        </div>
      </li>
    </ul>
    <!--.lista-precios clearfix-->
  </div>
  <!--.contenedor-->
</section>
<!--.precios seccion-->

<div id="mapa" class="mapa"></div>
<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor clearfix">
    <div class="testimonial">
      <blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rem, nam repellendus delectus quasi saepe vel tempora voluptas incidunt, maxime atque tempore voluptatem? Natus, earum. Quisquam similique distinctio sed error!
        </p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial" />
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--.testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rem, nam repellendus delectus quasi saepe vel tempora voluptas incidunt, maxime atque tempore voluptatem? Natus, earum. Quisquam similique distinctio sed error!
        </p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial" />
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--.testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rem, nam repellendus delectus quasi saepe vel tempora voluptas incidunt, maxime atque tempore voluptatem? Natus, earum. Quisquam similique distinctio sed error!
        </p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial" />
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <!--.testimonial-->
  </div>
</section>

<div class="newsletter parallax">
  <div class="contenido contenedor">
    <h2>Regístrate al newsletter</h2>
    <!-- <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a> -->
    <!-- boton newsletter pop-up -->
    <div id="mc_embed_signup">
      <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7_dtp.css" rel="stylesheet" type="text/css">
      <form action="https://hotmail.us14.list-manage.com/subscribe/post?u=351981af674a2a0232bd493e7&amp;id=e7724c3525" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email" style="border: 1px solid #fe4918" required>
          <input style="position: absolute; left: -5000px;" aria-hidden="true" type="text" name="b_351981af674a2a0232bd493e7_e7724c3525" tabindex="-1" value="">
          <div class="clear foot">
            <input type="submit" value="Subscríbete" name="subscribe" id="mc-embedded-subscribe" class="button">
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--.contenido contenedor-->
</div>
<!--.newsletter parallax-->

<section class="seccion">
  <h2>Faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li>
        <p id="dias" class="numero"></p>
        días
      </li>
      <li>
        <p id="horas" class="numero"></p>
        horas
      </li>
      <li>
        <p id="minutos" class="numero"></p>
        minutos
      </li>
      <li>
        <p id="segundos" class="numero"></p>
        segundos
      </li>
    </ul>
  </div>
  <!--.cuenta-regresiva contenedor-->
</section>
<?php
include_once 'includes/templates/footer.php';
?>