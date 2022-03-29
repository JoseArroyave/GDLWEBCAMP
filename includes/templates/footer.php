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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha512-3n19xznO0ubPpSwYCRRBgHh63DrV+bdZfHK52b1esvId4GsfwStQNPJFjeQos2h3JwCmZl0/LgLxSKMAI55hgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/plugins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js" integrity="sha512-9ex1Kp3S7uKHVZmQ44o5qPV6PnP8/kYp8IpUHLDJ+GZ/qpKAqGgEEH7rhYlM4pTOSs/WyHtPubN2UePKTnTSww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/cotizador.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace('.php', '', $archivo);
if ($pagina == 'invitados') {
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js" integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
} else if ($pagina == 'galeria') {
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
} else if ($pagina == 'index') {
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha512-WY7Piz2TwYjkLlgxw9DONwf5ixUOBnL3Go+FSdqRxhKlOqx9F+ee/JsablX84YBPLQzUPJsZvV88s8YOJ4S/UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
  echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDLep9qEq9PX7JVBvQjQ21yM_D3bHO8ZU&callback=initMap" async></script>';
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js" integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
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

<?php
// Guarda todo el contenido a un archivo
// $fp = fopen($archivoCache, 'w');
// fwrite($fp, ob_get_contents());
// fclose($fp);
// Enviar al navegador
// ob_end_flush();
?>
</body>

</html>