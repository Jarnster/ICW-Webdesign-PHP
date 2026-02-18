<?php
session_start();

$pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ❌ Kwetsbaar: string concatenatie
    $sql = "SELECT * FROM users 
            WHERE username = '$username' 
            AND password = '$password'";

    echo "<pre>Uitgevoerde query: $sql</pre>";

    $result = $pdo->query($sql);
    $user = $result->fetch();

    if ($user) {
        $_SESSION['user'] = $user;
        echo "✅ Ingelogd als " . $user['username'];
    } else {
        echo "❌ Ongeldige login";
    }
}
?>

<h2>Kwetsbare login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="text" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
