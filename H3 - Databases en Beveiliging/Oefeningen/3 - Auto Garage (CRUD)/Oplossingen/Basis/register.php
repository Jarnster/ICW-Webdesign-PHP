<title>Gebruiker registreren</title>
<h1>Nieuwe gebruiker registreren</h1>

<a href="login.php">Terug/annuleren</a>

<?php
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');

    $sql = 'INSERT INTO users (username, email, role_id, password_hash) VALUES (?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, 1, $password]);

    header('Location: login.php');
    exit;
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Gebruikersnaam">
    <br>
    <input type="password" name="password" placeholder="Wachtwoord">
    <br>
    <input type="text" name="email" placeholder="Email">
    <br>
    <button type="submit" name="add">Aanmaken</button>
</form>