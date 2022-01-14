<?php
  include_once 'includes/templates/header.php';
?>
  <section class="seccion contenedor">
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
          <nav class="menu-programa">
            <a href="#talleres"><i class="fa fa-code" aria-hidden="true"></i> Talleres</a>
            <a href="#conferencias"><i class="fa fa-comment" aria-hidden="true"></i>
              Conferencias</a>
            <a href="#seminarios"><i class="fa fa-university" aria-hidden="true"></i>
              Seminarios</a>
          </nav>
          <!--.menu-programa-->

          <div id="talleres" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3>HTML 5, CC3 y JavaScript</h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> 16:00</p>
              <p>
                <i class="fa fa-calendar" aria-hidden="true"></i> 10 de Dic
              </p>
              <p>
                <i class="fa fa-user" aria-hidden="true"></i> Juan Pablo de la Torre Valdéz
              </p>
            </div>
            <div class="detalle-evento">
              <h3>Responsive Web Design</h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> 20:00</p>
              <p>
                <i class="fa fa-calendar" aria-hidden="true"></i> 10 de Dic
              </p>
              <p>
                <i class="fa fa-user" aria-hidden="true"></i> Juan Pablo de la Torre Valdéz
              </p>
            </div>
            <a href="calendario.php#calendario" class="button float-right">Ver todos</a>
          </div>
          <!--#talleres-->
          <div id="conferencias" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3>¿Cómo ser freelancer?</h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00</p>
              <p>
                <i class="fa fa-calendar" aria-hidden="true"></i> 10 de Dic
              </p>
              <p>
                <i class="fa fa-user" aria-hidden="true"></i> Gregorio Sánchez
              </p>
            </div>
            <div class="detalle-evento">
              <h3>Tecnologías del futuro</h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> 17:00</p>
              <p>
                <i class="fa fa-calendar" aria-hidden="true"></i> 10 de Dic
              </p>
              <p>
                <i class="fa fa-user" aria-hidden="true"></i> Susan Sánchez
              </p>
            </div>
            <a href="calendario.php#calendario" class="button float-right">Ver todos</a>
          </div>
          <!--#conferencias-->
          <div id="seminarios" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3>Diseño UI/UX para móviles</h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> 17:00</p>
              <p>
                <i class="fa fa-calendar" aria-hidden="true"></i> 11 de Dic
              </p>
              <p>
                <i class="fa fa-user" aria-hidden="true"></i> Harold García
              </p>
            </div>
            <div class="detalle-evento">
              <h3>Aprende a programar en una mañana</h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> 10:00</p>
              <p>
                <i class="fa fa-calendar" aria-hidden="true"></i> 11 de Dic
              </p>
              <p>
                <i class="fa fa-user" aria-hidden="true"></i> Susana Rivera
              </p>
            </div>
            <a href="calendario.php#calendario" class="button float-right">Ver todos</a>
          </div>
          <!--#seminarios-->
        </div>
        <!--.programa-evento-->
      </div>
      <!--.contenedor-->
    </div>
    <!--.contenido-programa-->
  </section>
  <!--.programa-->

  <section class="invitados contenedor seccion">
    <h2>Nuestros Invitados</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="img/invitado1.jpg" alt="imagen invitado" />
          <p>Rafael Bautista</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado2.jpg" alt="imagen invitado" />
          <p>Shari Herrera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado3.jpg" alt="imagen invitado" />
          <p>Gregorio Sanchez</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado4.jpg" alt="imagen invitado" />
          <p>Susana Rivera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado5.jpg" alt="imagen invitado" />
          <p>Harold García</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado6.jpg" alt="imagen invitado" />
          <p>Susan Sanchez</p>
        </div>
      </li>
    </ul>
  </section>
  <!--.invitados contenedor seccion-->

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
      <p>Regístrate al newsletter</p>
      <h3>gdlwebcamp</h3>
      <a href="#" class="button transparente">Registro</a>
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