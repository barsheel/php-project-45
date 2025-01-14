<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Calc;

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
    $operand1 = random_int(0, 100);
    $operand2 = random_int(0, 100);
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

    if ((int)$answer === $correctAnswer) {
        printCorrectAnswerMessage();
        return true;
    } else {
        printWrongAnswerMessage($correctAnswer, $answer);
        return false;
    }
}
