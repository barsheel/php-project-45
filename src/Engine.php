<?php

/**
 * Game functions
 */

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\printWrongAnswerMessage;
use function BrainGames\Cli\printCorrectAnswerMessage;
use function BrainGames\Cli\printWinMessage;
use function BrainGames\Cli\printLoseMessage;
use function BrainGames\Cli\askName;

require_once __DIR__ . '/../vendor/autoload.php';


/**
 * Main cycle of game. User have to introduce himself and answer for questions.
 *
 * @param int $questionCount
 * @param string $callbackQuestion - callback function for question
 */
function play(int $questionCount, string $callbackQuestion): void
{
    $name = askName();

    for ($i = 0; $i < $questionCount; $i++) {
        if (!$callbackQuestion()) {
            printLoseMessage($name);
            return;
        }
    }
    printWinMessage($name);
}
