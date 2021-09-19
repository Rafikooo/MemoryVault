<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TranslationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TranslationRepository::class)
 */
#[ApiResource]
class Translation
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
    private $source;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $translated;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getTranslated(): ?string
    {
        return $this->translated;
    }

    public function setTranslated(string $translated): self
    {
        $this->translated = $translated;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

}
