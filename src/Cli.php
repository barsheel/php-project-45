<?php

/**
 * Name
 * 
 * Description
 */

namespace BrainGames\Cli;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

/**
 * Greetings function
 */
function sayHello()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
}