<?php
$mysqli = mysqli_connect("localhost","root","","mynotescode");

// Check connection
if ($mysqli -> connect_error) {
  //echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  //exit();
  die("Connection failed: " . $mysqli->connect_error);
}
?>