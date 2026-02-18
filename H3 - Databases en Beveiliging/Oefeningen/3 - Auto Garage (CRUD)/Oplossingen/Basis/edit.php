<title>Auto bewerken</title>
<h1>Auto bewerken</h1>

<?php
session_start();
require_once 'utils.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
$id = $_GET['id'];

if (isset($_POST['edit'])) {
    $sql = 'UPDATE vehicles SET model_name = ?, brand_name = ?, owner_full_name = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['model_name'],
        $_POST['brand_name'],
        $_POST['owner_full_name'],
        $id
    ]);

    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM vehicles WHERE id = ?');
$stmt->execute([$id]);
$row = $stmt->fetch();
?>

<form method="POST">
    <input type="text" name="model_name" value="<?= $row['model_name'] ?>">
    <br>
    <input type="text" name="brand_name" value="<?= $row['brand_name'] ?>">
    <br>
    <input type="text" name="owner_full_name" value="<?= $row['owner_full_name'] ?>">
    <br>
    <button type="submit" name="edit">Bewerken</button>
</form>