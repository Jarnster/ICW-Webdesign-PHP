<title>Begroeting op basis van tijd</title>

<style>
    body {
        font-family: Arial;
    }
</style>

<?php
date_default_timezone_set("Europe/Brussels"); // Tijdzone instellen

$currentHour = date("H");
if ($currentHour < 12) {
    echo "<h1>Goedemorgen!</h1>";
} elseif ($currentHour < 18) {
    echo "<h1>Goedemiddag!</h1>";
} else {
    echo "<h1>Goedenavond!</h1>";
}
?>