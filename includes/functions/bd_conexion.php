<?php
// $conn = new mysqli(URL, USERNAME, PASSWORD, 'DATABASE ID');
$url = 'bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'rz3nsia6y0srzlc5';
$password = 'u6oynzep12b8xxvr';
$database = 'x25ni5fa58ohsdl3';
$conn = new mysqli($url, $username, $password, $database);
if (!$conn->set_charset("utf8")) {
  $conn->set_charset("utf8");
} else {
}
if ($conn->connect_error) {
  echo $error->$conn->connect_error;
}
