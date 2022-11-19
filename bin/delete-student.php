<?php

use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
//$student = $entityManager->getPartialReference(Student::class, $argv[1]);
$student = $entityManager->find(Student::class, $argv[1]);

$entityManager->remove($student);
$entityManager->flush();
