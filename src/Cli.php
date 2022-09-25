<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

/**
 * makePrompt
 *
 * @return void
 */
function makePrompt()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return;
}

/**
 * cliLine
 *
 * @param  mixed $sLine
 * @return void
 */
function cliLine(string $sLine, $sExtra = null)
{
    if ($sExtra) {
        line($sLine, $sExtra);
    } else {
        line($sLine);
    }
    return true;
}

/**
 * cliPrompt
 *
 * @param  mixed $sQuestion
 * @return void
 */
function cliPrompt(string $sQuestion)
{
    return prompt($sQuestion);
}
