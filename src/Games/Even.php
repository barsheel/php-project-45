<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const MAX_NUMBER_TO_ASK = 100;

/**
 * Ask a question, print message and return boolean result
 *
 * @return bool - correct or wrong answer
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
    return $number % 2 === 0;
}
