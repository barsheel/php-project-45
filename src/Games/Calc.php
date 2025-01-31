<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAME_ROUND_COUNT;

const MAX_NUMBER_TO_ASK = 100;
const QUESTION = "What is the result of the expression?";

/**
 * Create an array of questions and answers, and run game
 *
 * @throws \Exception If an appropriate source of randomness in function random_int() cannot be found
 */
function play(): void
{
    $gameResults = [];
    for ($i = 0; $i < GAME_ROUND_COUNT; $i++) {
        $operand1 = random_int(0, MAX_NUMBER_TO_ASK);
        $operand2 = random_int(0, MAX_NUMBER_TO_ASK);
        $operations = ["-", "+", "*"];
        $operation = $operations[array_rand($operations)];
        $correctAnswer = calculate($operation, $operand1, $operand2);
        $expressionToAsk = "{$operand1} {$operation} {$operand2}";

        $gameResults[] =  ["question" => $expressionToAsk, "answer" => $correctAnswer];
    }
    runGame(QUESTION, $gameResults);
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
            throw new \Exception("Unknown operation");
    }
}
