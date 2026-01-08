<title>Alle leerlingen: Overzicht</title>

<h1>Overzicht van alle leerlingen</h1>
<p>Hier zie je een tabel van alle studenten in de database.</p>

<a href="add.php">+ Nieuwe leerling aanmaken</a>

<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>E-mail</th>
            <th>Aangemaakt op (datum)</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Database connection
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=leerlingentabel', 'root', '');

        // SQL query
        $sql = 'SELECT * FROM students';

        // Execute the query
        $stmt = $pdo->query($sql);

        // Fetch all rows as an associative array
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the results
        foreach ($rows as $row) {
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $name = $firstname . " " . $lastname;
            $email = $row['email'];
            $created_at = $row['created_at'];
            echo "<tr>
            <td>$id</td>
            <td>$firstname</td>
            <td>$lastname</td>
            <td>$email</td>
            <td>$created_at</td>
            <td> <a href='delete.php?id=$id'>Verwijder record</a>  <a href='edit.php?id=$id'>Bewerk record</a> </td>
            </tr>";
        }
        ?>
    </tbody>
</table>