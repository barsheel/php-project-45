<?php

/**
 * Brain-Prime game
 *
 * The user guesses the number is prime or not
 */

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAME_ROUND_COUNT;

const MAX_NUMBER_TO_ASK = 1000;
const QUESTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

/**
 * Create an array of questions and answers, and run game
 *
 * @throws \Exception If an appropriate source of randomness in function random_int() cannot be found
 */
function play(): void
{
    $gameResults = [];
    for ($i = 0; $i < GAME_ROUND_COUNT; $i++) {
        $numberToAsk = random_int(0, MAX_NUMBER_TO_ASK);
        $correctAnswer = isPrime($numberToAsk) ? "yes" : "no";

        $gameResults[] =  ["question" => (string)$numberToAsk, "answer" => $correctAnswer];
    }
    runGame(QUESTION, $gameResults);
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
