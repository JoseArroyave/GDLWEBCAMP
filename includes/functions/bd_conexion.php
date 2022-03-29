<?php
// $conn = new mysqli(URL, USERNAME, PASSWORD, 'DATABASE ID');
$url = 'kutnpvrhom7lki7u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'x3gibc7zmsfresxr';
$password = 'i3m6nobc78t2rtyo';
$database = 'gqdytjbo00dyuv2j';
$conn = new mysqli($url, $username, $password, $database);
if (!$conn->set_charset("utf8")) {
  $conn->set_charset("utf8");
} else {
}
if ($conn->connect_error) {
  echo $error->$conn->connect_error;
}
