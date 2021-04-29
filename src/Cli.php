<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function isEven($number)
{
    return $number % 2 === 0;
}

function answerToBool($answer)
{
    if ($answer === "yes") {
        return true;
    } elseif ($answer === "no") {
        return false;
    }
    return "none";
}

function answerToYesNoFormate($bool)
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
        line("Question: {$randomNumber}");
        $answer = prompt("Your answer: ");
        $isAnswerCorrect = isEven($randomNumber) === answerToBool($answer);
        if ($isAnswerCorrect) {
            line('Correct!');
        } else {
            $correctAnswerInYesNo = answerToYesNoFormate(!answerToBool($answer));
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswerInYesNo}'.");
            return false;
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
