<?php

require "database.php";

$id = $_GET['id']; //1

$sql = "SELECT  user_id FROM user_settings WHERE user_id =:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {

    $sql = "DELETE FROM user_settings WHERE user_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            header("location:users_index.php");
            exit;
        }
    }
}
