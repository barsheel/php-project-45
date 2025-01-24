<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Calc;

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
        default:
            return 0;
    }
}

function play(): void
{
    $gameResults = [];
    for ($i = 0; $i < \BrainGames\Engine\GAME_ROUND_COUNT; $i++) {
        $gameResults[] = askQuestion();
    }

    \BrainGames\Engine\play($gameResults);
}
