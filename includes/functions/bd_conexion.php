<?php
$conn = new mysqli('localhost', 'root', '', 'gdlwebcamp');
if (!$conn->set_charset("utf8")) {
  $conn->set_charset("utf8");
} else {
}
if ($conn->connect_error) {
  echo $error->$conn->connect_error;
}
