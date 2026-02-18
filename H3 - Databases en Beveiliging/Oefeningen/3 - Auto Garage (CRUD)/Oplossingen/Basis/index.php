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

<a href="add.php">+ Nieuwe auto</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Merk</th>
        <th>Eigenaar</th>
        <th>Datum</th>
        <th>Acties</th>
    </tr>

    <?php
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');
    $rows = $pdo->query('SELECT * FROM vehicles')->fetchAll();
    foreach ($rows as $row) {
        $html_extra = "";

        if (CheckIfUserCan($_SESSION['user']['id'], 'edit_vehicles')) {
            $html_extra .= "<td><a href='edit.php?id=" . $row["id"] . "'>Bewerk</a></td>";
        }
        if (CheckIfUserCan($_SESSION['user']['id'], 'remove_vehicles')) {
            $html_extra .= "<td><a href='delete.php?id=" . $row["id"] . "'>Verwijder</a></td>";
        }

        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['model_name'] . "</td>";
        echo "<td>" . $row['brand_name'] . "</td>";
        echo "<td>" . $row['owner_full_name'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo $html_extra;
        echo "</tr>";
    }
    ?>

    <a href="logout.php"> Logout</a>

</table>