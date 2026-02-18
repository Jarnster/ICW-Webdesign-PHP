<title>Alle auto's</title>

<?php
session_start();
require_once 'utils.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<h1>Overzicht auto's</h1>


<table border="1">
    <tr>
        <th>ID</th>
        <th>username</th>
        <th>email</th>
        <th>role ID</th>
        <th>password</th>
    </tr>

    <?php
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
    $rows = $pdo->query('SELECT * FROM users')->fetchAll();
    foreach ($rows as $row) {


        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['role_id'] . "</td>";
        echo "<td>" . $row['password_hash'] . "</td>";
        echo "<td><a href='admin_bewerk.php?id=" . $row["id"] . "'>Bewerk</a></td>";
        echo "</tr>";
    }
    ?>
</table>