<!DOCTYPE html>
<head>
    <title>Logout</title>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<h1>Wil je uitloggen?</h1>

<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>

<br>

<a href="index.php">Terug / annuleren</a>

</body>
</html>