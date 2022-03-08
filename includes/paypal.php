<?php

//url aquispe
define('URL_SITIO', 'https://localhost:3000');


require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    'AcJxP6zW_DFHEhyOg73b1uzTV-2Lq8qxPPJQWqytPUmvCqkzh7o0mAPBLKD6rOcTgko3a_HrwwrZZAuB',     // ClientID
    'EMyodfE7zWSWWDMrsZimUY7k-USxjY3aOelyAVrjy3MnjRX9nbKNqrZ4EEvD06nnbS-UntmMsyByrzu-'      // ClientSecret
  )
);
