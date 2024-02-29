<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'administrator') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

require 'database.php';

$sql = "SELECT * FROM tools WHERE tool_id = :id";
$id = $_GET['id'];

$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
if ($stmt->execute()) {
    if ($stmt->rowCount() > 0) {
        $tool = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);
        // die;
    } else {
        require 'header.php';
        echo "<main>";
        echo "Geen tool gevonden met deze ID <br>";
        echo "<a href ='tool_index.php'> Ga terug </a>";
        echo "</main>";
        exit;
    }
}
require 'header.php';

?>

<main>
    <h1>Edit Gereedschap</h1>
    <div class="container">
        <form action="tool_update.php" method="post">
            <input type="hidden" name="tool_id" value="<?php echo $user['tool_id'] ?>">
            <div>
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" value="<?php echo $tool['tool_name'] ?>">
            </div>
            <div>
                <label for="category">Categorie:</label>
                <input type="text" id="category" name="category" value="<?php echo $tool['tool_category'] ?>">
            </div>
            <div>
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" value="<?php echo $tool['tool_price'] ?>">
            </div>
            <div>
                <label for="brand">Merk:</label>
                <input type="brand" id="brand" name="brand" value="<?php echo $tool['tool_brand'] ?>">
            </div>
            <button type="submit" class="btn btn-warning">Edit Gereedschap</button>
        </form>
    </div>
</main>
<?php require 'footer.php' ?>
<?php require 'footer.php' ?>