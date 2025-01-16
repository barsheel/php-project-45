<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Prog;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\printWrongAnswerMessage;
use function BrainGames\Cli\printCorrectAnswerMessage;
use function BrainGames\Engine\play;
use function BrainGames\Engine\checkAnswer;

/**
 * Ask a question, print message and return boolean result
 *
 * @return bool - correct or wrong answer
 */
function askQuestion(): bool
{
    $progressionLength = random_int(5, 10);
    $delta = random_int(1, 100);
    $progression[] = random_int(0, 100);
    for ($i = 1; $i < $progressionLength; $i++) {
        $progression[] = $progression[$i - 1] + $delta;
    }

    $elementToAskIndex = random_int(0, $progressionLength - 1);
    $correctAnswer = $progression[$elementToAskIndex];
    $progression[$elementToAskIndex] = "..";

    $progressionToAsk = implode(" ", $progression);

    line("What number is missing in the progression?");
    line("Question: {$progressionToAsk}");
    $answer = prompt("Your answer");
    
    return checkAnswer($answer, $correctAnswer);
}
