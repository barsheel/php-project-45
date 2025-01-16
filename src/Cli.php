<?php

/**
 * Cli functions
 */

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Greetings function
 * @return string $name of the user
 */
function askName(): string
{
    line("Welcome to the Brain Games!\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function printWrongAnswerMessage(string $correctAnswer, string $wrongAnswer): void
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
