<?php

namespace Brain\Games\GcdGame;

use function Brain\Games\Engine\getPlayerAnswer;

const GCD_GAME_RULES = "Find the greatest common divisor of given numbers.";

function runGcdGame(): bool
{
    $randomNumber1 = rand(1, 100);
    $randomNumber2 = rand(1, 100);
    $question = "{$randomNumber1} {$randomNumber2}";
    $commonDivisor = 1;
    for ($i = 1; $i <= min($randomNumber1, $randomNumber2); $i++) {
        if ($randomNumber1 % $i === 0 && $randomNumber2 % $i === 0) {
            $commonDivisor = $i;
        }
    }
    return getPlayerAnswer($question, (string)$commonDivisor);
}
