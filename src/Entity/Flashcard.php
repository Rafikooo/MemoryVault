<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FlashcardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlashcardRepository::class)
 */
#[ApiResource]
class Flashcard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $information;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $hint;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="flashcards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     */
    private $answer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="flashcards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getHint(): ?string
    {
        return $this->hint;
    }

    public function setHint(string $hint): self
    {
        $this->hint = $hint;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
