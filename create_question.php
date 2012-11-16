<?php

die;

spl_autoload_register();

use App\Models\Question;
use App\Mappers\QuestionMapper;

$question = new Question;
$mapper   = new QuestionMapper;

$question->setId(NULL);
$question->init(1, "Avez-vous enrichi votre culture générale personnelle en assistant aux cours ?");
$mapper->save($question);

$question->setId(NULL);
$question->init(2, "Si vous avez répondu non à la question précédente, expliquez brièvement pourquoi :");
$mapper->save($question);

$question->setId(NULL);
$question->init(3, "Quelle note donneriez-vous à ces cours de culture générale ?");
$mapper->save($question);

$question->setId(NULL);
$question->init(4, "Que pensez-vous de la manière dont le cours est présenté, de la manière dont il se déroule ?");
$mapper->save($question);

$question->setId(NULL);
$question->init(5, "Avez-vous des suggestions pour améliorer le cours ? De quels autres sujets aimeriez-vous débattre ?");
$mapper->save($question);

$question->setId(NULL);
$question->init(6, "Autres remarques :");
$mapper->save($question);

echo "Questions has been created.\n";