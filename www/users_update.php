<?php

require "database.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$passowrd = $_POST["password"];
$address = $_POST["address"];
$city = $_POST["city"];
$role = $_POST["role"];
$id = $_POST["user_id"];


$sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, address = :address, city = :city,  role = :role WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":firstname", $firstname);
$stmt->bindParam(":lastname", $lastname);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);
$stmt->bindParam(":address", $address);
$stmt->bindParam(":city", $city);
$stmt->bindParam(":role", $role);
$stmt->bindParam(":id", $id);

if ($stmt->execute()) {
    echo "User updated";
    exit;
}
