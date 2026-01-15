<?php
session_start();

if (isset($_POST['login'])) { // Checken of login is aangeklikt
    // Formulierwaarden ophalen
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=leerlingentabel', 'root', '');
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $countResults = $stmt->rowCount();

    if ($countResults > 0) { // User does exist, but password isn't verified yet
        $userRow = $stmt->fetch();
        $hash_in_db = $userRow['password_hash'];
        if (password_verify($password, $hash_in_db) == TRUE) { // Password is verified
            echo "Login successful";
            $_SESSION['user'] = $userRow;
            print_r($_SESSION);
            echo "<a href='index.php'>Klik hier om verder te gaan.</a>";
        }
        else{
            echo "Deze gebruik bestaat wel, maar het wachtwoord komt niet overeen";
        }
    }
    else{
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
    <button type="submit" name="login">Login</button>
</form>