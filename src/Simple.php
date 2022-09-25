<?php

namespace BrainGames\Simple;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;

function startGame(): string
{
    cliLine("Welcome to the Brain Games!");
    $sName = cliPrompt('May I have your name?');
    cliLine("Hello, %s!", $sName);
    return $sName;
}
