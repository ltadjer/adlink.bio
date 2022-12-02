<?php

namespace App\Entity;

use App\Repository\SectionCompanyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionCompanyRepository::class)
 */
class SectionCompany
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
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $baseline;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bgColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $baselineColor;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;


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
