<?php

namespace BrainGames\Even;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\printWrongAnswer;
use function BrainGames\Engine\printCorrectAnswer;
use function BrainGames\Engine\printCongratulations;

function isEven(int $iNumber)
{
    return $iNumber % 2 === 0;
}

function startGame()
{
    $iMaxQuestion = 3;
    $iQuestionCounter = 1;

    $sName = getName();
    cliLine('Answer "yes" if the number is even, otherwise answer "no".');
    $bUserResult = false;
    do {
        $iQuestion = rand(1, 100);
        cliLine("Question: {$iQuestion}");
        do {
            $sUserGuess = cliPrompt('Your answer');
        } while ($sUserGuess !== "yes" && $sUserGuess !== "no");

        $bUserGuess = $sUserGuess === "yes" ? true : false;
        $bUserResult = isEven($iQuestion) === $bUserGuess;

        if ($bUserResult === true) {
            printCorrectAnswer();
        } else {
            $sCorrectAnswer = $sUserGuess === "yes" ? "no" : "yes";
            printWrongAnswer($sUserGuess, $sCorrectAnswer, $sName);
            return;
        }
        $iQuestionCounter++;
    } while ($bUserResult === true && $iQuestionCounter <= $iMaxQuestion);
    printCongratulations($sName);
    return;
}
