<?php

namespace Brain\Games\Engine;

use function Brain\Games\CalcGame\runCalcGame;
use function Brain\Games\EvenGame\runEvenGame;
use function Brain\Games\GcdGame\runGcdGame;
use function Brain\Games\PrimeGame\runPrimeGame;
use function Brain\Games\ProgressionGame\runProgressionGame;
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

function chooseGameMode($gameMode)
{
    switch ($gameMode) {
        case "CalcGame":
            return runCalcGame();
        case "EvenGame":
            return runEvenGame();
        case "GcdGame":
            return runGcdGame();
        case "ProgressionGame":
            return runProgressionGame();
        case "PrimeGame":
            return runPrimeGame();
    }
    return 0;
}

function runGameCycle($name, $gameName, $rules): bool
{
    line($rules);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        if (!chooseGameMode($gameName)) {
            line("Let's try again, %s!", $name);
            return false;
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
