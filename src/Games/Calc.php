<?php

namespace Php\Project\Games\Calc;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const RESPONSE_LABEL = 'What is the result of the expression?';

function runGame(): void
{
    $questionsAndAnswers = [];
    $operations = ['+', '-', '*'];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $randomFrom = 1;
        $randomTo = 10;
        $randomNum1 = rand($randomFrom, $randomTo);
        $randomNum2 = rand($randomFrom, $randomTo);
        $randomOperationKey = array_rand($operations);
        $randomOperation = $operations[$randomOperationKey];

        $questionsAndAnswers [] = [
            "{$randomNum1} {$randomOperation} {$randomNum2}",
            getOperationValue($randomOperation, $randomNum1, $randomNum2)
        ];
    }

    startGame($questionsAndAnswers, RESPONSE_LABEL);
}

function getOperationValue(string $operation, int $num1, int $num2): string
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception('Operation not found!');
    }
}
