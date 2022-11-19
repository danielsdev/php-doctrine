<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    private Student $student;

    public function __construct(
        #[Column]
        public readonly string $number
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }
}