<?php

use App\Entity\Phone;
use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]);
$student->addPhone(new Phone('(88) 9 9999-9999'));
$student->addPhone(new Phone('(21) 9 9999-9999'));

$entityManager->persist($student);
$entityManager->flush();
