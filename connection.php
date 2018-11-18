<?php
$mysqli = new mysqli("localhost","testUser", "testPassword","candidatura");

if($mysqli && $mysqli->connect_error){   
  die($mysqli->connect_error);
}
