<?php

/**
 * Brain-Even game
 *
 * The user have to find the greatest common divisor of given numbers.
 */

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\printWrongAnswerMessage;
use function BrainGames\Cli\printCorrectAnswerMessage;
use function BrainGames\Engine\play;

/**
 * Ask a question, print message and return boolean result
 *
 * @return bool - correct or wrong answer
 */
function askQuestion(): bool
{
    $number1 = random_int(0, 100);
    $number2 = random_int(0, 100);
    $correctAnswer = getGcd($number1, $number2);
    line("Find the greatest common divisor of given numbers.");
    line("Question: {$number1} {$number2}");
    $answer = prompt("Your answer");

    if ((int)$answer === $correctAnswer) {
        printCorrectAnswerMessage();
        return true;
    } else {
        printWrongAnswerMessage($correctAnswer, $answer);
        return false;
    }
}

function getGcd(int $number1, int $number2): int
{
    if ($number1 === 0 || $number2 === 0) {
        return $number1 + $number2;
    }

    if ($number1 > $number2) {
        $number1 = $number1 % $number2;
        return getGcd($number1, $number2);
    } else {
        $number2 = $number2 % $number1;
        return getGcd($number1, $number2);
    }
}
