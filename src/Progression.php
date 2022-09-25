<?php

namespace BrainGames\Progression;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\printWrongAnswer;
use function BrainGames\Engine\printCorrectAnswer;
use function BrainGames\Engine\printCongratulations;

function makeRandomProgression()
{
    $iStart = rand(0, 10);
    $iApplicator = rand(1, 10);
    $arProgression = [];
    $i = 0;
    for ($i == 0; $i < 10; $i++) {
        $iStart = $iStart + $iApplicator;
        $arProgression[] = $iStart;
    }
    return $arProgression;
}

function startGame()
{
    $iMaxQuestion = 3;
    $iQuestionCounter = 1;

    $sName = getName();
    cliLine('What number is missing in the progression?');
    $bUserResult = false;

    do {
        $arProgression = makeRandomProgression();
        $iQuestionIndex = rand(0, 9);
        $iCorrectAnswer = $arProgression[$iQuestionIndex];
        $arProgression[$iQuestionIndex] = "..";

        cliLine("Question number {$iQuestionCounter}: " . implode(" ", $arProgression));
        do {
            $sUserGuess = (int)cliPrompt('Your answer');
        } while ((int)$sUserGuess < 0);

        $bUserResult = $iCorrectAnswer === $sUserGuess;

        if ($bUserResult === true) {
            printCorrectAnswer();
        } else {
            printWrongAnswer($sUserGuess, $iCorrectAnswer, $sName);
            return;
        }
        $iQuestionCounter++;
    } while ($bUserResult === true && $iQuestionCounter <= $iMaxQuestion);
    printCongratulations($sName);
    return;
}
