<?php
$con = new mysqli('localhost', 'root', '', 'music');

// Check connection
if (mysqli_connect_errno()) {
  echo "ket noi that bai " . mysqli_connect_error();
  exit();
}
?>