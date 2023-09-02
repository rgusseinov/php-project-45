<?php

namespace Php\Project\Games\Prime;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const RESPONSE_LABEL = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $randomFrom = 1;
        $randomTo = 100;
        $randomNum = rand($randomFrom, $randomTo);

        $questionsAndAnswers [] = [
            $randomNum,
            isPrime($randomNum) ? 'yes' : 'no'
        ];
    }

    startGame($questionsAndAnswers, RESPONSE_LABEL);
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    if ($num == 2 || $num == 3) {
        return true;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
