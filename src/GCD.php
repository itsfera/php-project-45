<?php

namespace BrainGames\GCD;

use function BrainGames\Cli\cliLine;
use function BrainGames\Cli\cliPrompt;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\printWrongAnswer;
use function BrainGames\Engine\printCorrectAnswer;
use function BrainGames\Engine\printCongratulations;

function findDivisors(int $iNumber)
{
    $arResult = [];
    for ($i = 1; $i <= $iNumber; $i++) {
        if ($iNumber % $i == 0) {
            $arResult[] = $i;
        }
    }
    return $arResult;
}

function startGame()
{
    $iMaxQuestion = 3;
    $iQuestionCounter = 1;

    $sName = getName();
    cliLine('Find the greatest common divisor of given numbers.');
    $bUserResult = false;

    do {
        $iOperand1 = rand(1, 100);
        $iOperand2 = rand(1, 100);

        cliLine("Question: {$iOperand1} {$iOperand2}");
        do {
            $sUserGuess = (int)cliPrompt('Your answer');
        } while ((int)$sUserGuess < 1);

        $arCommon = array_intersect(findDivisors($iOperand1), findDivisors($iOperand2));
        rsort($arCommon);
        $iCorrectAnswer = $arCommon[0];
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
