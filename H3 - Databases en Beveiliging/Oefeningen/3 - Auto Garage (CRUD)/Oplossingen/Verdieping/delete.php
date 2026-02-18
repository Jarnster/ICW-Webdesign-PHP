<title>Auto verwijderen</title>

<?php
session_start();
require_once 'utils.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if (!CheckIfUserCan($_SESSION['user']['id'], 'delete_vehicles')):
    header("Location: login.php");
endif;

$id = $_GET['id'];

$pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
$sql = 'DELETE FROM vehicles WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit;
