<?php

//database connection   
$dbhost = "mariadb";
$dbuser = "root";
$dbpass = "password";
$dbname = "tools4ever";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

