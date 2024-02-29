<?php

require "database.php";

$tool_id = $_POST["tool_id"];
$tool_name = $_POST["name"];
$tool_category = $_POST["category"];
$tool_price = $_POST["price"];
$tool_brand = $_POST["brand"];


$sql = "UPDATE tools SET tool_name = :name, tool_category = :category, tool_price = :price, tool_brand = :brand WHERE tool_id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $tool_name);
$stmt->bindParam(":category", $tool_category);
$stmt->bindParam(":price", $tool_price);
$stmt->bindParam(":brand", $tool_brand);
$stmt->bindParam(":id", $tool_id);

if ($stmt->execute()) {
    echo "Gereedschap updated";
    exit;
}
