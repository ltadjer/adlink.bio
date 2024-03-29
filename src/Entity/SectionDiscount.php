<?php

namespace App\Entity;

use App\Repository\SectionDiscountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionDiscountRepository::class)]
class SectionDiscount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bgColor = null;

    #[ORM\Column(length: 255)]
    private ?string $bgCodeColor = null;

    #[ORM\Column(length: 255)]
    private ?string $textCodeColor = null;

    #[ORM\Column(length: 255)]
    private ?string $bgCardColor = null;

    #[ORM\Column(length: 255)]
    private ?string $textCardColor = null;

    #[ORM\OneToOne(inversedBy: 'sectionDiscount', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

    #[ORM\Column(type: 'boolean')]
    private $visible;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBgColor(): ?string
    {
        return $this->bgColor;
    }

    public function setBgColor(string $bgColor): self
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    public function getBgCodeColor(): ?string
    {
        return $this->bgCodeColor;
    }

    public function setBgCodeColor(string $bgCodeColor): self
    {
        $this->bgCodeColor = $bgCodeColor;

        return $this;
    }

    public function getTextCodeColor(): ?string
    {
        return $this->textCodeColor;
    }

    public function setTextCodeColor(string $textCodeColor): self
    {
        $this->textCodeColor = $textCodeColor;

        return $this;
    }

    public function getBgCardColor(): ?string
    {
        return $this->bgCardColor;
    }

    public function setBgCardColor(string $bgCardColor): self
    {
        $this->bgCardColor = $bgCardColor;

        return $this;
    }

    public function getTextCardColor(): ?string
    {
        return $this->textCardColor;
    }

    public function setTextCardColor(string $textCardColor): self
    {
        $this->textCardColor = $textCardColor;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }
}
