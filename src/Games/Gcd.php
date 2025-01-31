<?php

/**
 * Brain-Even game
 *
 * The user have to find the greatest common divisor of given numbers.
 */

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAME_ROUND_COUNT;

const MAX_NUMBER_TO_ASK = 100;
const QUESTION = "Find the greatest common divisor of given numbers.";

/**
 * Create an array of questions and answers, and run game
 *
 * @throws Random\RandomException If an appropriate source of randomness in function random_int() cannot be found
 */
function play(): void
{
    $gameResults = [];
    for ($i = 0; $i < GAME_ROUND_COUNT; $i++) {
        $number1 = random_int(1, MAX_NUMBER_TO_ASK);
        $number2 = random_int(1, MAX_NUMBER_TO_ASK);
        $correctAnswer = getGcd($number1, $number2);

        $gameResults[] =  ["question" => "{$number1} {$number2}", "answer" => $correctAnswer];
    }
    runGame(QUESTION, $gameResults);
}

function getGcd(int $number1, int $number2): int
{
    while ($number2 !== 0) {
        [$number1, $number2] = [$number2, $number1 % $number2];
    }
    return $number1;
}
