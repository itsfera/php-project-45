<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;

function getName(): string
{
    cliLine("Welcome to the Brain Game!");
    $sName = cliPrompt('May I have your name?');
    cliLine("Hello, %s!", $sName);
    return $sName;
}

function printWrongAnswer(string $sWrong, string $sRight, string $sName): bool
{
    cliLine("'{$sWrong}' is wrong answer ;(. Correct answer was '{$sRight}'.");
    cliLine("Let's try again, {$sName}!");
    return true;
}

function printCorrectAnswer(): bool
{
    cliLine("Correct!");
    return true;
}

function printCongratulations(string $sName): bool
{
    cliLine("Congratulations, {$sName}!");
    return true;
}
