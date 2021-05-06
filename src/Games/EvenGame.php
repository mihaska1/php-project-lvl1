<?php

namespace Brain\Games\EvenGame;

use function Brain\Games\Engine\GetPlayerAnswer;

const EVEN_GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function BoolToYesNoFormat($bool)
{
    if ($bool === true) {
        return "yes";
    } elseif ($bool === false) {
        return "no";
    }
    return "none";
}

function evenGame()
{
    $randomNumber = rand(1, 300);
    $correctAnswer = BoolToYesNoFormat(isEven($randomNumber));
    return GetPlayerAnswer($randomNumber, $correctAnswer);
}
