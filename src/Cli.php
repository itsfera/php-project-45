<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function makePrompt()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return;
}

function cliLine(string $sLine, string $sExtra = null)
{
    if ($sExtra) {
        line($sLine, $sExtra);
    } else {
        line($sLine);
    }
    return true;
}

function cliPrompt(string $sQuestion)
{
    return prompt($sQuestion);
}
