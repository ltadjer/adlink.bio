<?php

namespace App\Entity;

use App\Repository\SectionCompanyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionCompanyRepository::class)]
class SectionCompany
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $baseline = null;

    #[ORM\Column(length: 255)]
    private ?string $bgColor = null;

    #[ORM\Column(length: 255)]
    private ?string $titleColor = null;

    #[ORM\Column(length: 255)]
    private ?string $baselineColor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
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

    public function getTitleColor(): ?string
    {
        return $this->titleColor;
    }

    public function setTitleColor(string $titleColor): self
    {
        $this->titleColor = $titleColor;

        return $this;
    }

    public function getBaselineColor(): ?string
    {
        return $this->baselineColor;
    }

    public function setBaselineColor(string $baselineColor): self
    {
        $this->baselineColor = $baselineColor;

        return $this;
    }
}
