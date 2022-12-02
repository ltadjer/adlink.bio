<?php

namespace App\Entity;

use App\Repository\SectionDiscountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionDiscountRepository::class)
 */
class SectionDiscount
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bgColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bgCodeColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textCodeColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bgCardColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textCardColor;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
}
