<?php

namespace Brain\Games\Engine;

use function Brain\Games\CalcGame\calcGame;
use function Brain\Games\EvenGame\evenGame;
use function Brain\Games\GcdGame\gcdGame;
use function Brain\Games\PrimeGame\primeGame;
use function Brain\Games\ProgressionGame\progressionGame;
use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function boolToYesNoFormat($bool): string
{
    if ($bool === true) {
        return "yes";
    } elseif ($bool === false) {
        return "no";
    }
    return "none";
}

function getPlayerAnswer($question, $correctAnswer): bool
{
    line("Question: {$question}");
    $answer = prompt("Your answer: ");
    if ($answer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        return false;
    }
}

function gameMode($gameMode)
{
    switch ($gameMode) {
        case "CalcGame":
            return calcGame();
        case "EvenGame":
            return evenGame();
        case "GcdGame":
            return gcdGame();
        case "ProgressionGame":
            return progressionGame();
        case "PrimeGame":
            return primeGame();
    }
    return 0;
}

function gameCycle($name, $gameName, $rules): bool
{
    line($rules);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        if (!gameMode($gameName)) {
            line("Let's try again, %s!", $name);
            return false;
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
