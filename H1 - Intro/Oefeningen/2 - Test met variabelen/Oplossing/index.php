<title>Test met variabelen</title>

<style>
    body {
        font-family: Arial;
    }
</style>

<h2>Jouw verdelingsgraad:</h2>
<?php
$aantalKcal = 1200;
$aantalMaaltijden = 4;

$verdelingsgraad = $aantalKcal / $aantalMaaltijden;

if ($verdelingsgraad >= 5) {
    echo "<b style='color:blue;'>Is oké</b>";
} else if ($verdelingsgraad >= 3) {
    echo "<b style='color:green;'>Is oké</b>";
} else if ($verdelingsgraad >= 2) {
    echo "<b style='color:orange;'>Is nog net acceptabel</b>";
} else {
    echo "<b style='color:red;'>Is ongezond. Probeer morgen beter!</b>";
}
?>