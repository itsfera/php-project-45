<?php

namespace BrainGames\Prime;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\printWrongAnswer;
use function BrainGames\Engine\printCorrectAnswer;
use function BrainGames\Engine\printCongratulations;

function isSimple(int $iNumber)
{
    $bRes = true;
    for ($i = 2; $i < $iNumber; $i++) {
        if ($iNumber % $i == 0) {
            $bRes = false;
        }
    }
    return $bRes;
}

function startGame()
{
    $iMaxQuestion = 3;
    $iQuestionCounter = 1;

    $sName = getName();
    cliLine('Answer "yes" if given number is prime. Otherwise answer "no".');
    $bUserResult = false;

    do {
        $iQuestion = rand(1, 100);
        cliLine("Question number {$iQuestionCounter}: {$iQuestion}");
        do {
            $sUserGuess = cliPrompt('Your answer');
        } while ($sUserGuess !== "yes" && $sUserGuess !== "no");

        $bUserGuess = $sUserGuess === "yes" ? true : false;
        $bUserResult = isSimple($iQuestion) === $bUserGuess;

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
