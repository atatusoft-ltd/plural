<?php

use Atatusoft\Plural\Plural;

Plural::setLanguage(basename(__FILE__, '.php'));

# each rule is a regular expression and its replacement
Plural::addRules([
    '/(matr|vert|ind)(ix|ex)$/i'    => '\1ices',    # matrix, vertex, index
    '/(ss|sh|ch|x|z)$/i'            => '\1es',      # sibilant rule (no ending e)
    '/([^aeiou])o$/i'               => '\1oes',     # -oes rule
    '/([^aeiou]|qu)y$/i'            => '\1ies',     # -ies rule
    '/sis$/i'                       => 'ses',       # synopsis, diagnosis
    '/(m|l)ouse$/i'                 => '\1ice',     # mouse, louse
    '/(t|i)um$/i'                   => '\1a',       # datum, medium
    '/([li])fe?$/i'                 => '\1ves',     # knife, life, shelf
    '/(octop|vir|syllab)us$/i'      => '\1i',       # octopus, virus, syllabus
    '/(ax|test)is$/i'               => '\1es',      # axis, testis
    '/([a-rt-z])$/i'                => '\1s'        # not ending in s
]);

# words that don't follow any pluralization rules
Plural::addIrregulars([
    'bus'           => 'busses',
    'child'         => 'children',
    'man'           => 'men',
    'person'        => 'people',
    'quiz'          => 'quizzes',
    # words whose singular and plural forms are the same
    'equipment'     => 'equipment',
    'fish'          => 'fish',
    'information'   => 'information',
    'money'         => 'money',
    'moose'         => 'moose',
    'news'          => 'news',
    'rice'          => 'rice',
    'series'        => 'series',
    'sheep'         => 'sheep',
    'species'       => 'species'
]);

Plural::addSingularRules([
    '/(matr|vert|ind)(ices)$/i'     => '\1ix',      # matrix, vertex, index
    '/(ax|test)es$/i'               => '\1is',      # axis, testis
    '/(ss|sh|ch|x|z)es$/i'          => '\1',        # sibilant rule (no ending e)
    '/([^aeiou])oes$/i'             => '\1o',       # -oes rule
    '/([^aeiou]|qu)ies$/i'          => '\1y',       # -ies rule
    '/ses$/i'                       => 'sis',       # synopsis, diagnosis
    '/([ml])ice$/i'                 => '\1ouse',    # mouse, louse
    '/(t|a)$/i'                     => 'um',        # datum, medium
    '/([li])ves$/i'                 => '\1fe',      # knife, life, shelf
    '/(octop|vir|syllab)i$/i'       => '\1us',      # octopus, virus, syllabus
    '/([a-rt-z])s$/i'               => '\1'         # not ending in s
]);

Plural::addSingularIrregulars([
    'busses'        => 'bus',
    'children'      => 'child',
    'men'           => 'man',
    'people'        => 'person',
    'quizzes'       => 'quiz',
    # words whose singular and plural forms are the same
    'equipment'     => 'equipment',
    'fish'          => 'fish',
    'information'   => 'information',
    'money'         => 'money',
    'moose'         => 'moose',
    'news'          => 'news',
    'rice'          => 'rice',
    'series'        => 'series',
    'sheep'         => 'sheep',
    'species'       => 'species',
    'shelves'       => 'shelf'
]);
