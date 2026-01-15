<title>Leerling bewerken</title>
<h1>Leerling bewerken</h1>

<a href="index.php">Terug/annuleren</a>

<?php
// Database connection
$pdo = new PDO('mysql:host=127.0.0.1;dbname=leerlingentabel', 'root', '');

$id = $_GET['id'];
    
if (isset($_POST['edit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // SQL query
    $sql = 'UPDATE students SET firstname = ?, lastname = ?, email = ? WHERE id = ?';

    // Prepare the query
    $stmt = $pdo->prepare($sql);

    // Bind and execute
    $stmt->execute([$firstname, $lastname, $email, $id]);

    echo "SUCCESVOL !";
    header('Location: index.php');
}

// SQL query
$sql = 'SELECT * FROM students WHERE id = ?';

// Prepare the query
$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
?>

<form method="POST">
    <input type="text" name="firstname" placeholder="Voornaam" value="<?= $firstname; ?>">
    <br>
    <input type="text" name="lastname" placeholder="Achternaam" value="<?= $lastname; ?>">
    <br>
    <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>">
    <br>
    <hr>
    <button type="submit" name="edit">Bewerken</button>
</form>