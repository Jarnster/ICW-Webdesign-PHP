
<style>
    .red {
        border: 4px solid red;
    }

    .green {
        border: 4px solid green;
    }

    .input {
        /* border: 2px solid grey; */
        border-radius: 25%;
        width: 250px;
        height: 100px;
    }
</style>

<?php
// (⭐Uitbreiding) H2 Oef 1

// Algemene Debug Tip H2
print_r($_GET);
print_r($_POST);

// 1. Array initialiseren
$answers = array();

$flag = isset($_POST['submit']) || false; // Flag om bij te houden of de quiz verzonden is

$correct = 0;
$fout = 0;

// Helper functions
function SetAnswerCorrect(int $id, bool $isCorrect = false)
{
    global $answers;

    $answers[$id] = $isCorrect;
}

function GetAnswerCorrect(int $id): bool
{
    global $answers;

    return $answers[$id];
}

function RenderAnswerCorrectness(int $id)
{
    if(GetAnswerCorrect($id))
    {
        echo "green";
    }
    
    echo "red";
}

// 2. Vragen controleren en array fields aanpassen indien nodig

// Question 1:
if (isset($_POST['question1'])) {
    if (strtolower($_POST['question1']) == 'frieten') {
        SetAnswerCorrect(1, true);
    } else {
        SetAnswerCorrect(1, false);
    }
} else {
    SetAnswerCorrect(1, false);
}

// Question 2:
if (isset($_POST['question2'])) {
    if (intval($_POST['question2']) == 4) {
        SetAnswerCorrect(2, true);
    } else {
        SetAnswerCorrect(2, false);
    }
} else {
    SetAnswerCorrect(2, false);
}
?>

<title>Simpele Quiz</title>
<h1>Simpele Quiz</h1>

<?php
// Resultaten weergeven bij het indienen van quiz
if ($flag) {
    if ($correct > $fout) // Gebruiker heeft gewonnen (meer juist dan fout)
    {
        echo "<b style='color:green;'>Je hebt gewonnen.</b>";
    } else {
        echo "<b style='color:red;'>Je bent verloren.</b>";
    }

    echo "<p>Je hebt $correct correcte antwoorden en $fout foute antwoorden ingediend.</p>";
}
else{
    echo "Dien eerst je quizvragen in voordat je resultaten te zien krijgt!<hr>";
}
?>

<form method="POST">
    <input type="text" name="question1" class="input <?= RenderAnswerCorrectness(1); ?>" placeholder="Wat is je lievelingseten?">
    <hr>
    <input type="text" name="question2" class="input <?= RenderAnswerCorrectness(2); ?>" placeholder="Hoeveel kinderen heeft de koning?">
    <hr>
    <button type="submit" name="submit">Controleer mijn antwoorden</button>
</form>