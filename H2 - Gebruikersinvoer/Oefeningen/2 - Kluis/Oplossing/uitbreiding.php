<?php
session_start(); // Very important

// H2 Oef 2 - Uitbreiding
// Aanpassing aan de opdracht: ipv header() echo <a> (headers already sent error) 

$Debugging = false;
// Algemene Debug Tip H2
if ($Debugging) {
    print_r($_GET);
    print_r($_POST);
}

// Configuration values \\
$ATTEMPTS_SESSION_INDEX = "ATTEMPTS";
$MAX_ATTEMPTS = 8;
$CORRECT_CODE = 1234;
$THRESHOLD_RED = 2;

// HELPER FUNCTIONS \\

// This function prepares all session variables to use in different parts of the program (for now only "Attempts")
function prepareSession()
{
    global $ATTEMPTS_SESSION_INDEX;

    // 1. Attempts
    if (!isset($_SESSION[$ATTEMPTS_SESSION_INDEX])) { // Make sure to set attempts counter to the default value (0) if it does not exist yet
        $_SESSION[$ATTEMPTS_SESSION_INDEX] = 0;
    }
}

function increaseAttempts()
{
    global $ATTEMPTS_SESSION_INDEX;

    prepareSession();

    $_SESSION[$ATTEMPTS_SESSION_INDEX] += 1;
}

// This function resets the attempts counter to the default value (0)
function resetAttempts()
{
    global $ATTEMPTS_SESSION_INDEX;

    $_SESSION[$ATTEMPTS_SESSION_INDEX] = 0;
}

// This function returns the amount of attempts
function getAttemptsCount()
{
    global $ATTEMPTS_SESSION_INDEX;

    prepareSession();

    return $_SESSION[$ATTEMPTS_SESSION_INDEX] ?? 0;
}

// This function returns the amount of attempts the current user can still make before getting blocked
function getRemainingAttempts()
{
    global $MAX_ATTEMPTS;

    $userAttempts = getAttemptsCount();
    return $MAX_ATTEMPTS - $userAttempts;
}

// This function checks if the current user has exceeded their maximum attempts, and blocks them from accessing this page when they have exceeded the threshold
function checkUserBlock()
{
    if (getRemainingAttempts() <= 0) {
        exit("You have been blocked.");
    }
}

function handleUserInput($userCode)
{
    global $CORRECT_CODE, $THRESHOLD_RED;

    if ($userCode == $CORRECT_CODE) {
        handleVaultOpen();
        resetAttempts();
    } else {
        increaseAttempts();
        $remainingAttempts = getRemainingAttempts();

        $extraCSS_class = "";
        if($remainingAttempts <= $THRESHOLD_RED)
        {
            $extraCSS_class = "red";
        }

        echo "<div class='warning $extraCSS_class'>";
        echo "<h1>Waarschuwing</h1>";
        echo "<b>Je hebt nog $remainingAttempts pogingen over voordat u geblokkeerd zal worden.</b>";
        echo "</div>";
    }
}

function handleVaultOpen()
{
    $KLUIS_URL = "https://sjabi.smartschool.be"; // Gewenste doellocatie kiezen
    echo "<div class='vault'>"; // Start Vault class div
    echo "<a href='$KLUIS_URL'>📜 KLIK OM DE INHOUD VAN JE KLUIS TE OPENEN 📜</a>";
    echo "</div>"; // End of Vault class div
}

if (isset($_POST['submit']) && isset($_POST['code'])) {
    $userCode = intval($_POST['code']);
    handleUserInput($userCode);
}

checkUserBlock();
?>
<style>
    body {
        font-family: Helvetica;
    }

    .vault {
        width: 500px;
        height: 500px;
        background: orange;
        font-size: 25px;
        text-align: center;
        border: 5px solid grey;
        border-radius: 15px;
    }

    .vault * {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50%;
        text-decoration: none;
        font-weight: bold;
        color: white;
    }

    .warning {
        background: orangered;
        color: whitesmoke;
        text-align: center;
        padding: 5px;
        border: 5px solid grey;
        border-radius: 5px;
    }

    .red {
        background: maroon;
    }
</style>
<title>Kluis oefening uitbreiding</title>
<h1>Kluis oefening uitbreiding</h1>
<form method="POST">
    <input type="number" name="code" id="code" placeholder="Voer de PIN code in">
    <button type="submit" name="submit">ENTER</button>
</form>