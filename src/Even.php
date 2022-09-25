<?php

namespace BrainGames\Even;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;

function isEven(int $iNumber)
{
    return $iNumber % 2 === 0;
}

function startGame()
{
    $iMaxQuestion = 3;
    cliLine("Welcome to the Brain Games!");
    $sName = cliPrompt('May I have your name?');
    cliLine("Hello, %s!", $sName);
    cliLine('Answer "yes" if the number is even, otherwise answer "no".');
    $iQuestionCounter = 1;
    $bUserResult = false;
    do {
        $iQuestion = rand(1, 100);
        cliLine("Question number {$iQuestionCounter}: {$iQuestion}");
        do {
            $sUserGuess = cliPrompt('Your answer');
        } while ($sUserGuess !== "yes" && $sUserGuess !== "no");
        $bUserGuess = $sUserGuess === "yes" ? true : false;
        $bUserResult = isEven($iQuestion) === $bUserGuess;
        if ($bUserResult === true) {
            cliLine("Correct!");
        } else {
            $sCorrectAnswer = $sUserGuess === "yes" ? "no" : "yes";
            cliLine("'{$sUserGuess}' is wrong answer ;(. Correct answer was '{$sCorrectAnswer}'.");
            cliLine("Let's try again, {$sName}!");
            return;
        }
        $iQuestionCounter++;
    } while ($bUserResult === true && $iQuestionCounter <= $iMaxQuestion);
    cliLine("Congratulations, {$sName}!");
    return;
}

/*
Question: 15
Your answer: no
Correct!
Question: 6
Your answer: yes
Correct!
Question: 7
Your answer: no
Correct!
Congratulations, Sam!
*/