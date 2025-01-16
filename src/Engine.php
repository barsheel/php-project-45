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
    $name = askUserName();
    for ($i = 0; $i < GAME_ROUND_COUNT; $i++) {
        if (!$callbackQuestion()) {
            printLoseMessage($name);
            return;
        }
    }
    printWinMessage($name);
}


/**
 * Compare user's answer and correct answer and print message
 */
function checkAnswer(string|int $userAnswer, string|int $correctAnswer): bool
{
    if ((string)$userAnswer === (string)$correctAnswer) {
        printCorrectAnswerMessage();
        return true;
    } else {
        printWrongAnswerMessage($correctAnswer, $userAnswer);
        return false;
    }
}


/**
 * Greetings function - say hello and get name
 */
function askUserName(): string
{
    line("Welcome to the Brain Games!\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}


function printWrongAnswerMessage(string|int $correctAnswer, string|int $wrongAnswer): void
{
    line("'{$wrongAnswer}' is wrong answer ;(. 
        Correct answer was '{$correctAnswer}'.");
}


function printLoseMessage(string $name): void
{
    line("Let's try again, {$name}!");
}


function printCorrectAnswerMessage(): void
{
    line("Correct!");
}


function printWinMessage(string $name): void
{
    line("Congratulations, {$name}!");
}
