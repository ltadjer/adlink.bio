<?php

namespace App\Entity;

use App\Repository\SectionLinkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionLinkRepository::class)]
class SectionLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bgColor = null;

    #[ORM\Column(length: 255)]
    private ?string $bgBtnColor = null;

    #[ORM\Column(length: 255)]
    private ?string $textBtnColor = null;

    #[ORM\OneToOne(inversedBy: 'sectionLink', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

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

    public function getBgBtnColor(): ?string
    {
        return $this->bgBtnColor;
    }

    public function setBgBtnColor(string $bgBtnColor): self
    {
        $this->bgBtnColor = $bgBtnColor;

        return $this;
    }

    public function getTextBtnColor(): ?string
    {
        return $this->textBtnColor;
    }

    public function setTextBtnColor(string $textBtnColor): self
    {
        $this->textBtnColor = $textBtnColor;

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
}
