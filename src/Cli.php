<?php

/**
 * Cli functions
 */

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Greetings function
 */
function play(): void
{
    line("Welcome to the Brain Games!\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
}
