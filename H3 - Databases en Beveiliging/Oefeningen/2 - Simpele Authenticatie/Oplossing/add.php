<title>Leerling toevoegen</title>
<h1>Leerling toevoegen</h1>

<a href="index.php">Terug/annuleren</a>

<?php
if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Database connection
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=leerlingentabel', 'root', '');

    // SQL query
    $sql = 'INSERT INTO students (firstname, lastname, email) VALUES (?, ?, ?)';

    // Prepare the query
    $stmt = $pdo->prepare($sql);

    // Bind and execute
    $stmt->execute([$firstname, $lastname, $email]);

    echo "SUCCESVOL !";
    header('Location: index.php');
}
?>

<form method="POST">
    <input type="text" name="firstname" placeholder="Voornaam">
    <br>
    <input type="text" name="lastname" placeholder="Achternaam">
    <br>
    <input type="email" name="email" placeholder="E-mail">
    <br>
    <hr>
    <button type="submit" name="add">Aanmaken</button>
</form>