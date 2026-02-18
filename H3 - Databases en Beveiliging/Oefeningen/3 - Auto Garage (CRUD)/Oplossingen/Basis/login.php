<?php

require_once 'utils.php';

session_start();

if (isset($_POST['login'])) { // Checken of login is aangeklikt
    // Formulierwaarden ophalen
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Database connection
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
    $sql = "SELECT * FROM users WHERE username = ? AND email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email]);
    $countResults = $stmt->rowCount();

    if ($countResults > 0) { // User does exist, but password isn't verified yet
        $userRow = $stmt->fetch();
        $hash_in_db = $userRow['password_hash'];

        if (password_verify($password, $hash_in_db) == TRUE) { // Password is verified
            $_SESSION['user'] = $userRow;

            header("Location: index.php");
            exit;
        } else {
            echo "Deze gebruik bestaat wel, maar het wachtwoord komt niet overeen";
        }
    } else {
        echo "Deze gebruiker bestaat helemaal niet. Jij liegt!";
    }
}
?>
<title>Login</title>
<h1>Login</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Voer uw gebruikersnaam">
    <br><br>
    <input type="password" name="password" placeholder="Voer uw wachtwoord in">
    <br><br>
    <input type="text" name="email" placeholder="Voer uw email adres in">
    <br><br>
    <button type="submit" name="login">Login</button>
</form>

<a href="register.php">+ Registreren</a>