<?php

namespace Brain\Games\ProgressionGame;

use function Brain\Games\Engine\getPlayerAnswer;

const PROGRESSION_GAME_RULES = "What number is missing in the progression?";

function progressionGame(): bool
{
    $currentNumberInProgression = rand(1, 100);
    $progressionValue = rand(1, 20);
    $progressionAmount = rand(5, 10);
    $questionPosition = rand(0, $progressionAmount);
    $progressionQuestion = "";
    $progressionAnswer = 0;
    for ($i = 0; $i <= $progressionAmount; $i++) {
        if ($i === $questionPosition) {
            $progressionQuestion .= ".. ";
            $progressionAnswer = $currentNumberInProgression;
        } else {
            $progressionQuestion .= "{$currentNumberInProgression} ";
        }
        $currentNumberInProgression += $progressionValue;
    }
    return getPlayerAnswer($progressionQuestion, (string)$progressionAnswer);
}
