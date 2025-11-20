<?php
// H2 Oef 2
// Aanpassing aan de opdracht: ipv header() echo <a> (headers already sent error) 
// Algemene Debug Tip H2
print_r($_GET);
print_r($_POST);
function handleVaultOpen()
{
    $KLUIS_URL = "https://sjabi.smartschool.be"; // Gewenste doellocatie kiezen
    echo "<a href='$KLUIS_URL'>📜 OPEN DE INHOUD VAN JE KLUIS 📜</a>";
}

$CORRECT_CODE = 1234;
if(isset($_POST['submit']) && isset($_POST['code']))
{
    $user_code = intval($_POST['code']);
    if($user_code == $CORRECT_CODE)
    {
        handleVaultOpen(); // Call losse helper functie bij "kluis openmaken"
    }
}
?>

<title>Kluis oefening</title>
<h1>Kluis oefening</h1>
<form method="POST">
    <input type="number" name="code" id="code" placeholder="Voer de PIN code in">
    <button type="submit" name="submit">ENTER</button>
</form>
