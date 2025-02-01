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
 * @param string $questionString - question text
 * @param array $gameResults - array with game data
 */
function runGame(string $questionString, array $gameResults): void
{
    line("Welcome to the Brain Games!\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);

    foreach ($gameResults as $gameResult) {
        $question = $gameResult["question"];
        line("{$questionString} \nQuestion: {$question}");
        $correctAnswer = $gameResult["answer"];
        $userAnswer = prompt("Your answer");

        if (!checkAnswer($userAnswer, $correctAnswer)) {
            line("'{$userAnswer}' is wrong answer ;(. 
            Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
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
