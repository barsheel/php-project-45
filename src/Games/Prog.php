<?php

/**
 * Brain-Even game
 *
 * The user guesses the missing number in progression
 */

namespace BrainGames\Games\Prog;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;
use function BrainGames\Engine\checkAnswer;

const MIN_PROGRESSION_LENGTH = 5;
const MAX_PROGRESSION_LENGTH = 10;
const MAX_DIFFERENCE_BETWEEN_ELEMENTS = 100;
const MAX_FIRST_ELEMENT_VALUE = 100;

/**
 * Ask a question, print message and return boolean result
 *
 * @return bool - correct or wrong answer
 */
function askQuestion(): bool
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

    line("What number is missing in the progression?");
    line("Question: {$progressionToAsk}");
    $answer = prompt("Your answer");

    return checkAnswer($answer, $correctAnswer);
}
