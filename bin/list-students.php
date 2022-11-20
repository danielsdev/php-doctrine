<?php

use App\Entity\Course;
use App\Entity\Phone;
use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->studentsAndCourses();

foreach ($studentList as $student) {
    echo "ID: {$student->getId()}\nNome: {$student->getName()}";

    if ($student->phones()->count() > 0) {
        echo PHP_EOL;
        echo "Telefones: ";

        echo implode(', ', $student->phones()
            ->map(fn(Phone $phone) => $phone->number)
            ->toArray());
    }

    if ($student->courses()->count() > 0) {
        echo PHP_EOL;
        echo "Cursos: ";

        echo implode(', ', $student->courses()
            ->map(fn(Course $course) => $course->getName())
            ->toArray());
    }

    echo PHP_EOL.PHP_EOL;
}

$dql = 'SELECT COUNT(student) FROM App\Entity\Student student';
$query = $entityManager->createQuery($dql)->enableResultCache(86400);
$studentCount = $query->getSingleScalarResult();
echo $studentCount.PHP_EOL;
