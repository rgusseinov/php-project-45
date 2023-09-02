<?php

namespace Php\Project\Games\Progression;

use function Php\Project\Engine\startGame;

use const Php\Project\Engine\NUMBER_OF_QUESTIONS;

const RESPONSE_LABEL = 'What number is missing in the progression?';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $numOfElementsFrom = 6;
        $numOfElementsTo = 12;
        $numOfElements = rand($numOfElementsFrom, $numOfElementsTo);

        $randomFrom = 1;
        $randomTo = 100;
        $firstElement = rand($randomFrom, $randomTo);
        $delta = rand($randomFrom, $randomTo);

        $progression = getProgression($numOfElements, $firstElement, $delta);

        $missedElement = rand(0, $numOfElements - 1);
        $correctAnswer = (string) $progression[$missedElement];

        $progression[$missedElement] = '..';
        $question = implode(' ', $progression);

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    startGame($questionsAndAnswers, NUMBER_OF_QUESTIONS);
}

function getProgression(int $elementsNum, int $firstElement, int $delta): array
{
    $progression = [];
    for (
        $i = 0, $element = $firstElement;
        $i < $elementsNum;
        $i++, $element += $delta
    ) {
        $progression[] = $element;
    }

    return $progression;
}

