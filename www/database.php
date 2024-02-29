<?php

// //database connection   
// $dbhost = "mariadb";
// $dbuser = "root";
// $dbpass = "password";
// $dbname = "tools4ever";

// $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }


$servername = "mariadb";
$username = "root";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=tools4ever", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
