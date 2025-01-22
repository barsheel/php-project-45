<?php

/**
 * Game functions
 */

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUND_COUNT = 3;

/**
 * Main cycle of game. User have to introduce himself and answer questions.
 *
 * @param callable $callbackQuestion - callback function question
 */
function play(callable $callbackQuestion): void
{
    line("Welcome to the Brain Games!\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);

    for ($i = 0; $i < GAME_ROUND_COUNT; $i++) {
        $gameResult = $callbackQuestion();

        $question = $gameResult["question"];
        line($question);

        $correctAnswer = $gameResult["answer"];
        $userAnswer = prompt("Your answer");

        if (checkAnswer($userAnswer, $correctAnswer)) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. 
                Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}


/**
 * Compare user's answer and correct answer and print message
 */
function checkAnswer(string $userAnswer, string|int $correctAnswer): bool
{
    return $userAnswer === (string)$correctAnswer;
}
