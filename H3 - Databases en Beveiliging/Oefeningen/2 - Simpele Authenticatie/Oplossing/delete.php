<title>Leerling verwijderen</title>
<h1>Leerling verwijderen</h1>

<?php
$id = $_GET['id'];

// Database connection
$pdo = new PDO('mysql:host=127.0.0.1;dbname=leerlingentabel', 'root', '');

// SQL query
$sql = 'DELETE FROM students WHERE id = ?';

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind and execute
$stmt->execute([$id]);

echo "SUCCESVOL !";
header('Location: index.php');
?>