<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function makePrompt(): bool
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return true;
}

function cliLine(string $sLine, string $sExtra = null): bool
{
    if (strlen($sExtra) > 0) {
        line($sLine, $sExtra);
    } else {
        line($sLine);
    }
    return true;
}

function cliPrompt(string $sQuestion): string
{
    prompt($sQuestion);
    return $sQuestion;
}
