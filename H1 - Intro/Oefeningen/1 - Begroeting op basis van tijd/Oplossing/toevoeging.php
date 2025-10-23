<title>➕TOEVOEGING Begroeting op basis van tijd</title>

<style>
    body {
        font-family: Arial;
    }
</style>

<?php
date_default_timezone_set("Europe/Brussels"); // Tijdzone instellen

$fullDate = date("d-m-Y H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
echo "<div class='container'><p>IP adres: $ip</p></div>";
echo "<br>";
echo "<div class='container'><p>Huidige datum en tijd: $fullDate</p></div>";
echo "<br>";

$currentHour = date("H");
if ($currentHour < 12) {
    echo "<div class='container'><h1>Goedemorgen!</h1></div>";
} elseif ($currentHour < 18) {
    echo "<div class='container'><h1>Goedemiddag!</h1></div>";
} else {
    echo "<div class='container'><h1>Goedenavond!</h1></div>";
}
?>
