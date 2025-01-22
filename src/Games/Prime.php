<?php

/**
 * Brain-Prime game
 *
 * The user guesses the number is prime or not
 */

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

const MAX_NUMBER_TO_ASK = 1000;

/**
 * Ask a question, print message and return boolean result
 *
 * @return bool - correct or wrong answer
 */
function askQuestion(): array
{
    $numberToAsk = random_int(0, MAX_NUMBER_TO_ASK);

    $correctAnswer = isPrime($numberToAsk) ? "yes" : "no";

    $questionString =
        "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\nQuestion: {$numberToAsk}";

    return ["question" => $questionString, "answer" => $correctAnswer];
}

function isPrime(int $number): bool
{
    if ($number === 1) {
        return false;
    }
    $n = sqrt($number);
    for ($i = 2; $i < $n; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
