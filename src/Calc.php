<?php

namespace BrainGames\Calc;

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
    $arEquations = ["+" , "-", "*"];

    $sName = getName();
    cliLine('What is the result of the expression?');
    $bUserResult = false;

    do {
        $sOperation = $arEquations[rand(0, 2)];
        $iOperand1 = rand(1, 10);
        do {
            $iOperand2 = rand(1, 10);
        } while ($iOperand2 > $iOperand1);

        cliLine("Question: {$iOperand1} {$sOperation} {$iOperand2}");
        do {
            $sUserGuess = (int)cliPrompt('Your answer');
        } while ($sUserGuess < 0);

        $iCorrectAnswer = eval('return ' . $iOperand1 . $sOperation . $iOperand2 . ';');
        $bUserResult = (int)$iCorrectAnswer === $sUserGuess;

        if ($bUserResult === true) {
            printCorrectAnswer();
        } else {
            printWrongAnswer((string)$sUserGuess, (string)$iCorrectAnswer, $sName);
            return;
        }
        $iQuestionCounter++;
    } while ($bUserResult == true && $iQuestionCounter <= $iMaxQuestion);
    printCongratulations($sName);
    return;
}
