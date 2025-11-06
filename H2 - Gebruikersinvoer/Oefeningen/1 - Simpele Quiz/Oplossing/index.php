<?php
// H2 Oef 1

// Algemene Debug Tip H2
print_r($_GET);
print_r($_POST);

// 1. Tellers instellen
$correct = 0;
$fout = 0;

$flag = isset($_POST['submit']) || false; // Flag om bij te houden of de quiz verzonden is

// Helper functions
function InterpreteQuestionAnswer($isCorrect = false)
{
    global $correct, $fout; // "Waarschuwing accepteren"

    if ($isCorrect) {
        $correct++;
    } else {
        $fout++;
    }
}

// 2. Vragen controleren en tellers aanpassen indien nodig

// Question 1:
if (isset($_POST['question1'])) {
    if (strtolower($_POST['question1']) == 'frieten') {
        InterpreteQuestionAnswer(true);
    } else {
        InterpreteQuestionAnswer(false);
    }
} else {
    InterpreteQuestionAnswer(false);
}

// Question 2:
if (isset($_POST['question2'])) {
    if (intval($_POST['question2']) == 4) {
        InterpreteQuestionAnswer(true);
    } else {
        InterpreteQuestionAnswer(false);
    }
} else {
    InterpreteQuestionAnswer(false);
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
    <input type="text" name="question1" placeholder="Wat is je lievelingseten?">
    <hr>
    <input type="text" name="question2" placeholder="Hoeveel kinderen heeft de koning?">
    <hr>
    <button type="submit" name="submit">Controleer mijn antwoorden</button>
</form>