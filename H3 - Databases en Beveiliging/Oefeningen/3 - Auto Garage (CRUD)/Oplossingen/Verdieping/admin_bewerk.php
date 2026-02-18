<title>Gebruikers bewerken</title>
<h1>Gebruiker bewerken</h1>

<?php
session_start();
require_once 'utils.php';

if (!CheckIfUserCan($_SESSION['user']['id'], 'role_permissions')):
    header("Location: login.php");
endif;

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
$id = $_GET['id'];

if (isset($_POST['edit'])) {
    $sql = 'UPDATE users SET role_id = ?, username = ?, email = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['role_id'],
        $_POST['username'],
        $_POST['email'],
        $id
    ]);

    header('Location: admin.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$id]);
$row = $stmt->fetch();
?>

<form method="POST">
    <input type="text" name="id" value="<?= $row['id'] ?>">
    <br>
    <input type="text" name="username" value="<?= $row['username'] ?>">
    <br>
    <input type="text" name="email" value="<?= $row['email'] ?>">
    <br>
    <input type="text" name="role_id" value="<?= $row['role_id'] ?>">
    <br>
    <button type="submit" name="edit">Bewerken</button>
</form>