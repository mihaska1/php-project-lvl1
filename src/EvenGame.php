<?php

namespace Brain\Games\EvenGame;

use function Brain\Games\Engine\GetPlayerAnswer;
use function cli\line;

use const Brain\Games\Engine\NUMBER_OF_ROUNDS;

function isEven($number)
{
    return $number % 2 === 0;
}

function BoolToYesNoFormate($bool)
{
    if ($bool === true) {
        return "yes";
    } elseif ($bool === false) {
        return "no";
    }
    return "none";
}

function parityCheckGame($name = "ErrorNoNameGiven")
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $randomNumber = rand(1, 300);
        $correctAnswer = BoolToYesNoFormate(isEven($randomNumber));
        $playerAnswer = GetPlayerAnswer($randomNumber, $correctAnswer);
        if (!$playerAnswer) {
            return false;
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
