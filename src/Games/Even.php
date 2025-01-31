<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAME_ROUND_COUNT;

const MAX_NUMBER_TO_ASK = 100;
const QUESTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

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
        isEven($numberToAsk) ? $correctAnswer  = "yes" : $correctAnswer  = "no";

        $gameResults[] =  ["question" => (string)$numberToAsk, "answer" => $correctAnswer];
    }
    runGame(QUESTION, $gameResults);
}

function isEven(int $number): bool
{
    return (($number & 1) === 0);
}
