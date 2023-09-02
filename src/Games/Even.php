<?php

namespace Php\Project\Games\Even;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const RESPONSE_LABEL = 'Answer "yes" if the number is even, otherwise answer "no".';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $randomFrom = 1;
        $randomTo = 100;
        $randomNum = rand($randomFrom, $randomTo);

        $questionsAndAnswers [] = [
            $randomNum,
            isEven($randomNum) ? 'yes' : 'no'
        ];
    }

    startGame($questionsAndAnswers, RESPONSE_LABEL);
}

function isEven(int $num): bool
{
    return (($num % 2) === 0);
}

