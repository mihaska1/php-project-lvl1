<?php

namespace Brain\Games\EvenGame;

use function Brain\Games\Engine\getPlayerAnswer;
use function Brain\Games\Engine\boolToYesNoFormat;

const EVEN_GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number): bool
{
    return $number % 2 === 0;
}

function runEvenGame(): bool
{
    $randomNumber = rand(1, 300);
    $correctAnswer = BoolToYesNoFormat(isEven($randomNumber));
    return getPlayerAnswer($randomNumber, $correctAnswer);
}
