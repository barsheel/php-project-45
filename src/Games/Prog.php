<?php

/**
 * Brain-Even game
 *
 * The user guesses the missing number in progression
 */

namespace BrainGames\Games\Prog;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAME_ROUND_COUNT;

const MIN_PROGRESSION_LENGTH = 5;
const MAX_PROGRESSION_LENGTH = 10;
const MAX_DIFFERENCE_BETWEEN_ELEMENTS = 100;
const MAX_FIRST_ELEMENT_VALUE = 100;
const QUESTION = "What number is missing in the progression?";

/**
 * Create an array of questions and answers, and run game
 *
 * @throws \Exception If an appropriate source of randomness in function random_int() cannot be found
 */
function play(): void
{
    $gameResults = [];
    for ($i = 0; $i < GAME_ROUND_COUNT; $i++) {
        //fill progression to ask
        $progressionLength = random_int(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH);
        $firstElement = random_int(0, MAX_FIRST_ELEMENT_VALUE);
        $difference = random_int(1, MAX_DIFFERENCE_BETWEEN_ELEMENTS);
        $progression = [$firstElement];
        for ($j = 1; $j < $progressionLength; $j++) {
            $progression[] = $progression[$j - 1] + $difference;
        }

        //select element to ask
        $elementToAskIndex = random_int(0, $progressionLength - 1);
        $correctAnswer = $progression[$elementToAskIndex];
        $progression[$elementToAskIndex] = "..";

        //create progression string
        $progressionToAsk = implode(" ", $progression);

        $gameResults[] =  ["question" => $progressionToAsk, "answer" => $correctAnswer];
    }
    runGame(QUESTION, $gameResults);
}
