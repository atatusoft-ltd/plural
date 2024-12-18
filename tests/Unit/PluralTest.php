<?php

use Atatusoft\Plural\Plural;

beforeAll(function() {
  Plural::loadLanguage('en');
});

it('can change regular singulars plural', function () {
  Plural::loadLanguage('en');
  expect(Plural::pluralize('matrix'))->toEqual('matrices')
    ->and(Plural::pluralize('quiz'))->toEqual('quizzes')
    ->and(Plural::pluralize('glass'))->toEqual('glasses')
    ->and(Plural::pluralize('match'))->toEqual('matches')
    ->and(Plural::pluralize('hero'))->toEqual('heroes')
    ->and(Plural::pluralize('cherry'))->toEqual('cherries')
    ->and(Plural::pluralize('diagnosis'))->toEqual('diagnoses')
    ->and(Plural::pluralize('mouse'))->toEqual('mice')
    ->and(Plural::pluralize('medium'))->toEqual('media')
    ->and(Plural::pluralize('knife'))->toEqual('knives')
    ->and(Plural::pluralize('shelf'))->toEqual('shelves')
    ->and(Plural::pluralize('syllabus'))->toEqual('syllabi')
    ->and(Plural::pluralize('octopus'))->toEqual('octopi')
    ->and(Plural::pluralize('axis'))->toEqual('axes')
    ->and(Plural::pluralize('dogs'))->toEqual('dogs')
    ->and(Plural::pluralize('dog'))->toEqual('dogs');
});

it('can change irregular singulars plural', function () {
  expect(Plural::pluralize('bus'))->toEqual('busses')
    ->and(Plural::pluralize('child'))->toEqual('children')
    ->and(Plural::pluralize('man'))->toEqual('men')
    ->and(Plural::pluralize('person'))->toEqual('people')
    ->and(Plural::pluralize('news'))->toEqual('news')
    ->and(Plural::pluralize('money'))->toEqual('money')
    ->and(Plural::pluralize('rice'))->toEqual('rice')
    ->and(Plural::pluralize('sheep'))->toEqual('sheep')
    ->and(Plural::pluralize('fish'))->toEqual('fish')
    ->and(Plural::pluralize('species'))->toEqual('species');
});

# Singulars
it('can change plurals singular', function () {
  expect(Plural::singularize('matrices'))->toEqual('matrix')
    ->and(Plural::singularize('quizzes'))->toEqual('quiz')
    ->and(Plural::singularize('glasses'))->toEqual('glass')
    ->and(Plural::singularize('matches'))->toEqual('match')
    ->and(Plural::singularize('heroes'))->toEqual('hero')
    ->and(Plural::singularize('cherries'))->toEqual('cherry')
    ->and(Plural::singularize('diagnoses'))->toEqual('diagnosis')
    ->and(Plural::singularize('mice'))->toEqual('mouse')
    ->and(Plural::singularize('media'))->toEqual('medium')
    ->and(Plural::singularize('knives'))->toEqual('knife')
    ->and(Plural::singularize('shelves'))->toEqual('shelf')
    ->and(Plural::singularize('syllabi'))->toEqual('syllabus')
    ->and(Plural::singularize('octopi'))->toEqual('octopus')
    ->and(Plural::singularize('axes'))->toEqual('axis')
    ->and(Plural::singularize('dogs'))->toEqual('dog');
});

it('can change irregular plurals singular', function () {
  expect(Plural::singularize('busses'))->toEqual('bus')
    ->and(Plural::singularize('children'))->toEqual('child')
    ->and(Plural::singularize('men'))->toEqual('man')
    ->and(Plural::singularize('people'))->toEqual('person')
    ->and(Plural::singularize('news'))->toEqual('news')
    ->and(Plural::singularize('money'))->toEqual('money')
    ->and(Plural::singularize('rice'))->toEqual('rice')
    ->and(Plural::singularize('sheep'))->toEqual('sheep')
    ->and(Plural::singularize('fish'))->toEqual('fish')
    ->and(Plural::singularize('species'))->toEqual('species');
});