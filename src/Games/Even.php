<?php

/**
 * Brain-Even game
 *
 * The user guesses the number is even or not
 */

namespace BrainGames\Games\Even;

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
    $numberToAsk = random_int(0, 100);
    if ($numberToAsk % 2 === 0) {
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
    }

    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    line("Question: {$numberToAsk}");
    $answer = prompt("Your answer");

    return checkAnswer($answer, $correctAnswer);
}
