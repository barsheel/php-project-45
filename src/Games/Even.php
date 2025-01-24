<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Even;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const MAX_NUMBER_TO_ASK = 100;

/**
 * Ask a question, print message and return boolean result
 *
 * @return array - returns array of question string and correct answer
 */
function askQuestion(): array
{
    $numberToAsk = random_int(0, MAX_NUMBER_TO_ASK);

    isEven($numberToAsk) ? $correctAnswer  = "yes" : $correctAnswer  = "no";

    $questionString = "Answer \"yes\" if the number is even, otherwise answer \"no\".\nQuestion: {$numberToAsk}";

    return ["question" => $questionString, "answer" => $correctAnswer];
}

function isEven(int $number): bool
{
    return (($number & 1) === 0);
}

function play(): void
{
    $gameResults = [];
    for ($i = 0; $i < \BrainGames\Engine\GAME_ROUND_COUNT; $i++) {
        $gameResults[] = askQuestion();
    }

    \BrainGames\Engine\play($gameResults);
}
