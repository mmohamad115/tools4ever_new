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

$sql = "SELECT * FROM users WHERE id = :id";
$id = $_GET['id'];

$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
if ($stmt->execute()) {
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);
        // die;
    } else {
        require 'header.php';
        echo "<main>";
        echo "Geen gebruiker gevonden met deze ID <br>";
        echo "<a href ='users_index.php'> Ga terug </a>";
        echo "</main>";
        exit;
    }
}
require 'header.php';

?>

<main>
    <div class="container">
        <form action="users_update.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
            <div>
                <label for="firstname">Voornaam:</label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname'] ?>">
            </div>
            <div>
                <label for="lastname">Achternaam:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $user['lastname'] ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>">
            </div>
            <div>
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" value="<?php echo $user['password'] ?>">
            </div>
            <div>
                <label for="address">Adres:</label>
                <input type="text" id="address" name="address" value="<?php echo $user['address'] ?>">
            </div>
            <div>
                <label for="city">Stad:</label>
                <input type="text" id="city" name="city" value="<?php echo $user['city'] ?>">
            </div>
            <div>
                <label for="backgroundColor">kleur:</label>
                <input type="color" id="backgroundColor" name="backgroundColor">
            </div>
            <div>
                <label for="city">Lettertype:</label>
                <select id='select' onChange="return fontChange();" name="font">
                </select>
            </div>
            <div>
                <label for="role">Rol:</label>
                <select id="role" name="role">
                    <option value="<?php echo $user['role'] ?>"><?php echo $user['role'] ?></option>
                    <option value="administrator">Admin</option>
                    <option value="employee">Werknemer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Edit user</button>
        </form>
    </div>
</main>
<?php require 'footer.php' ?>