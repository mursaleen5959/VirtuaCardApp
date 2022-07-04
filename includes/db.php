<?php

// Setting for the Server
// $servername = "virtuax279.mysql.db";
// $username = "virtuax279";
// $password = "Yvirtuacard59";
// $db = "virtuax279";

// Setting for the Localhost Machine
$servername = "localhost";
$username = "root";
$password = "";
$db = "virtuax";

try
{
  $conn = new PDO("mysql:host=$servername;dbname=$db",$username,$password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>