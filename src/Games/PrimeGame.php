<?php

namespace Brain\Games\PrimeGame;

use function Brain\Games\Engine\getPlayerAnswer;

const PRIME_GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number): bool
{
    if ($number < 2) {
        return false;
    } elseif ($number === 2) {
        return true;
    }
    for ($i = 2; $i <= $number - 1; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function runPrimeGame(): bool
{
    $randomNumber = rand(1, 100);
    $question = "{$randomNumber}";
    $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
    return getPlayerAnswer($question, $correctAnswer);
}
