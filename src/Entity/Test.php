<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
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
    private $test_test;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestTest(): ?string
    {
        return $this->test_test;
    }

    public function setTestTest(string $test_test): self
    {
        $this->test_test = $test_test;

        return $this;
    }
}
