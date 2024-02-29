<?php


$id = $_GET['id']; //1

$sql = "DELETE FROM tools WHERE tool_id = :id";

require "database.php";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("location: tool_index.php");
    exit;
}

echo "Oops! Something went wrong";
