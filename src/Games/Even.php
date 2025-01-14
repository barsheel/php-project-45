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

require_once __DIR__ . '/../../vendor/autoload.php';

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
        $wrongAnswer = "no";
    } else {
        $correctAnswer = "no";
        $wrongAnswer = "yes";
    }

    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    line("Question: {$numberToAsk}");
    $answer = prompt("Your answer");

    if ($answer === $correctAnswer) {
        printCorrectAnswerMessage();
        return true;
    } else {
        printWrongAnswerMessage($correctAnswer, $wrongAnswer);
        return false;
    }
}
