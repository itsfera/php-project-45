<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;

function getName(): string
{
    cliLine("Welcome to the Brain Games!");
    $sName = cliPrompt('May I have your name?');
    cliLine("Hello, %s!", $sName);
    return $sName;
}

function printWrongAnswer(string $sWrong, string $sRight, string $sName)
{
    cliLine("'{$sWrong}' is wrong answer ;(. Correct answer was '{$sRight}'.");
    cliLine("Let's try again, {$sName}!");
    return;
}

function printCorrectAnswer()
{
    cliLine("Correct!");
    return;
}

function printCongratulations($sName)
{
    cliLine("Congratulations, {$sName}!");
    return;
}
