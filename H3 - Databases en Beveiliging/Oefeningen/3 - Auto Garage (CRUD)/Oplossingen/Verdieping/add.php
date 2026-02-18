<title>Auto toevoegen</title>
<h1>Auto toevoegen</h1>

<?php
session_start();
require_once 'utils.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if (!CheckIfUserCan($_SESSION['user']['id'], 'add_vehicles')):
    header("Location: login.php");
endif;
?>

<a href="index.php">Terug/annuleren</a>

<?php
if (isset($_POST['add'])) {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');

    $sql = 'INSERT INTO vehicles (model_name, brand_name, owner_full_name) VALUES (?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['model_name'],
        $_POST['brand_name'],
        $_POST['owner_full_name']
    ]);

    header('Location: index.php');
    exit;
}
?>

<form method="POST">
    <input type="text" name="model_name" placeholder="Model naam">
    <br>
    <input type="text" name="brand_name" placeholder="Merk naam">
    <br>
    <input type="text" name="owner_full_name" placeholder="Eigenaar">
    <br>
    <button type="submit" name="add">Aanmaken</button>
</form>