<footer class="site-footer">
  <div class="contenedor clearfix">
    <div class="footer-informacion">
      <h3>Sobre <span>gdlwebcamp</span></h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi animi ducimus aperiam quidem. Ex corrupti nesciunt beatae exercitationem accusamus unde, eaque quos adipisci magni debitis repudiandae rem sapiente ipsum?
      </p>
    </div>
    <div class="ultimos-tweets">
      <h3>Últimos <span>tweets</span></h3>
      <ul>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
      </ul>
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

<!--   <div style="display: none;"> 
    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7_dtp.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      #mc_embed_signup {
        background: #fff;
        clear: left;
        font: 14px Helvetica, Arial, sans-serif;
        width: 100%;
      }
    </style>
    <div id="mc_embed_signup">
      <form action="https://hotmail.us14.list-manage.com/subscribe/post?u=351981af674a2a0232bd493e7&amp;id=e7724c3525" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <label for="mce-EMAIL">Subscribe</label>
          <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_351981af674a2a0232bd493e7_e7724c3525" tabindex="-1" value=""></div>
          <div class="clear foot">
            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
          </div>
          <p><a href="http://eepurl.com/hVfVK5" title="Mailchimp - email marketing made easy and fun"><img class="referralBadge" src="https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg"></a></p>
        </div>
      </form>
    </div>
  </div> -->

</footer>
<!--.site-footer-->

<script src="js/jQuery.js"></script>
<script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>

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