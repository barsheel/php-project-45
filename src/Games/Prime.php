<?php

/**
 * Brain-Prime game
 *
 * The user guesses the number is prime or not
 */

namespace BrainGames\Games\Prime;

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
    $numberToAsk = random_int(0, 1000);

    if (isPrime($numberToAsk)){
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
    }

    line("Answer \"yes\" if the number is prime, otherwise answer \"no\".");
    line("Question: {$numberToAsk}");
    $answer = prompt("Your answer");

    return checkAnswer($answer, $correctAnswer);
}

function isPrime(int $number): bool
{
    $n = sqrt($number);
    for ($i = 2; $i < $n; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}