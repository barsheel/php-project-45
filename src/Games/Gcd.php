<?php

/**
 * Brain-Even game
 *
 * The user have to find the greatest common divisor of given numbers.
 */

namespace BrainGames\Games\Gcd;

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
    $number1 = random_int(1, MAX_NUMBER_TO_ASK);
    $number2 = random_int(1, MAX_NUMBER_TO_ASK);
    $correctAnswer = getGcd($number1, $number2);

    $questionString = "Find the greatest common divisor of given numbers.\nQuestion: {$number1} {$number2}";

    return ["question" => $questionString, "answer" => $correctAnswer];
}

function getGcd(int $number1, int $number2): int
{
    if ($number2 === 0) {
        return $number1;
    }
    return getGcd($number2, $number1 % $number2);
}
