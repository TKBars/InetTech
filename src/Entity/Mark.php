<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarkRepository")
 */
class Mark
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $student_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $subject_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $teacher_name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mark;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentName(): ?string
    {
        return $this->student_name;
    }

    public function setStudentName(string $student_name): self
    {
        $this->student_name = $student_name;

        return $this;
    }

    public function getSubjectId(): ?int
    {
        return $this->subject_id;
    }

    public function setSubjectId(int $subject_id): self
    {
        $this->subject_id = $subject_id;

        return $this;
    }

    public function getTeacherName(): ?string
    {
        return $this->teacher_name;
    }

    public function setTeacherName(string $teacher_name): self
    {
        $this->teacher_name = $teacher_name;

        return $this;
    }

    public function getMark(): ?int
    {
        return $this->mark;
    }

    public function setMark(int $mark): self
    {
        $this->mark = $mark;

        return $this;
    }
}
