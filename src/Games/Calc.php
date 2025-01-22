<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Calc;

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
    $operand1 = random_int(0, MAX_NUMBER_TO_ASK);
    $operand2 = random_int(0, MAX_NUMBER_TO_ASK);

    $operations = ["-", "+", "*"];
    $operation = $operations[array_rand($operations)];

    $correctAnswer = calculate($operation, $operand1, $operand2);

    $expressionToAsk = "{$operand1} {$operation} {$operand2}";
    $questionString = "What is the result of the expression?\nQuestion: {$expressionToAsk}";

    return ["question" => $questionString, "answer" => $correctAnswer];
}

function calculate(string $operation, int $operand1, int $operand2): int
{
    switch ($operation) {
        case "-":
            return $operand1 - $operand2;
        case "+":
            return $operand1 + $operand2;
        case "*":
            return $operand1 * $operand2;
    }
}
