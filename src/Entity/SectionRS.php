<?php

namespace App\Entity;

use App\Repository\SectionRSRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRSRepository::class)
 */
class SectionRS
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
    private $bgColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bgBtnColor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textBtnColor;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="sectionRS", cascade={"persist", "remove"})
     */
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
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setSectionRS(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getSectionRS() !== $this) {
            $user->setSectionRS($this);
        }

        $this->user = $user;

        return $this;
    }


}
