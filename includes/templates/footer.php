<footer class="site-footer">
  <div class="contenedor clearfix">
    <div class="footer-informacion">
      <h3>Sobre <span>gdlwebcamp</span></h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi animi ducimus aperiam quidem. Ex corrupti nesciunt beatae exercitationem accusamus unde, eaque quos adipisci magni debitis repudiandae rem sapiente ipsum?
      </p>
    </div>
    <div class="ultimos-tweets">
      <a class="twitter-timeline" data-width="366" data-height="138" data-theme="dark" href="https://twitter.com/JoseArroyaveR?ref_src=twsrc%5Etfw"></a>
    </div>
    <div class="menu">
      <h3>Redes <span>sociales</span></h3>
      <nav class="redes-sociales">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </nav>
    </div>
  </div>
  <!--.contenedor clearfix-->
  <p class="copyright">Todos los derechos reservados GDLWEBCAMP 2022.</p>

</footer>
<!--.site-footer-->

<script src="js/jQuery.js"></script>
<script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>
<script src="js/cotizador.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace('.php', '', $archivo);
if ($pagina == 'invitados') {
  echo '<script src="js/jquery.colorbox-min.js"></script>';
} else if ($pagina == 'galeria') {
  echo '<script src="js/lightbox.js"></script>';
} else if ($pagina == 'index') {
  echo '<script src="js/jquery.waypoints.min.js"></script>';
  echo '<script src="js/jquery.animateNumber.js"></script>';
  echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDLep9qEq9PX7JVBvQjQ21yM_D3bHO8ZU&callback=initMap" async></script>';
  echo '<script src="js/jquery.colorbox-min.js"></script>';
}
?>

<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
  window.ga = function() {
    ga.q.push(arguments);
  };
  ga.q = [];
  ga.l = +new Date();
  ga("create", "UA-XXXXX-Y", "auto");
  ga("set", "anonymizeIp", true);
  ga("set", "transport", "beacon");
  ga("send", "pageview");
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>