<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;
use function BrainGames\Engine\checkAnswer;

const MAX_NUMBER_TO_ASK = 100;

/**
 * Ask a question, print message and return boolean result
 *
 * @return bool - correct or wrong answer
 */
function askQuestion(): bool
{
    $operand1 = random_int(0, MAX_NUMBER_TO_ASK);
    $operand2 = random_int(0, MAX_NUMBER_TO_ASK);
    $operation = random_int(0, 2);
    switch ($operation) {
        case 0:
            $operation = "-";
            $correctAnswer = $operand1 - $operand2;
            break;
        case 1:
            $operation = "+";
            $correctAnswer = $operand1 + $operand2;
            break;
        case 2:
            $operation = "*";
            $correctAnswer = $operand1 * $operand2;
            break;
    }

    $expressionToAsk = "{$operand1} {$operation} {$operand2}";

    line("What is the result of the expression?");
    line("Question: {$expressionToAsk}");
    $answer = prompt("Your answer");

    return checkAnswer($answer, $correctAnswer);
}
