<?php

/**
 * Brain-Even game
 *
 * The user guesses the missing number in progression
 */

namespace BrainGames\Games\Prog;

use function cli\line;
use function cli\prompt;

const MIN_PROGRESSION_LENGTH = 5;
const MAX_PROGRESSION_LENGTH = 10;
const MAX_DIFFERENCE_BETWEEN_ELEMENTS = 100;
const MAX_FIRST_ELEMENT_VALUE = 100;

/**
 * Ask a question, print message and return boolean result
 *
 * @return array - returns array of question string and correct answer
 */
function askQuestion(): array
{
    //fill progression to ask
    $progressionLength = random_int(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH);
    $firstElement = random_int(0, MAX_FIRST_ELEMENT_VALUE);
    $difference = random_int(1, MAX_DIFFERENCE_BETWEEN_ELEMENTS);
    $progression = [$firstElement];
    for ($i = 1; $i < $progressionLength; $i++) {
        $progression[] = $progression[$i - 1] + $difference;
    }

    //select element to ask
    $elementToAskIndex = random_int(0, $progressionLength - 1);
    $correctAnswer = $progression[$elementToAskIndex];
    $progression[$elementToAskIndex] = "..";

    //create progression string
    $progressionToAsk = implode(" ", $progression);

    $questionString = "What number is missing in the progression?\nQuestion: {$progressionToAsk}";

    return ["question" => $questionString, "answer" => $correctAnswer];
}
