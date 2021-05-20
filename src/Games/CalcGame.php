<?php

namespace Brain\Games\CalcGame;

use function Brain\Games\Engine\getPlayerAnswer;

const CALC_GAME_RULES = "What is the result of the expression?";

function runCalcGame()
{
    $rand1 = rand(2, 100);
    $rand2 = rand(2, 100);
    $operator = array('*', '+', '-');
    $randomOperator = $operator[rand(0, 2)];
    switch ($randomOperator) {
        case "+":
            $correctAnswer = strval($rand1 + $rand2);
            $question = "{$rand1} + {$rand2}";
            return getPlayerAnswer($question, $correctAnswer);
        case "-":
            $correctAnswer = strval($rand1 - $rand2);
            $question = "{$rand1} - {$rand2}";
            return getPlayerAnswer($question, $correctAnswer);
        case "*":
            $correctAnswer = strval($rand1 * $rand2);
            $question = "{$rand1} * {$rand2}";
            return getPlayerAnswer($question, $correctAnswer);
    }
    return 0;
}
