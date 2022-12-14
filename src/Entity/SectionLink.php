<?php

namespace App\Entity;

use App\Repository\SectionLinkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionLinkRepository::class)
 */
class SectionLink
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
    private $iconColor;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="sectionLink", cascade={"persist", "remove"})
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

    public function getIconColor(): ?string
    {
        return $this->iconColor;
    }

    public function setIconColor(string $iconColor): self
    {
        $this->iconColor = $iconColor;

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
            $this->user->setSectionLink(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getSectionLink() !== $this) {
            $user->setSectionLink($this);
        }

        $this->user = $user;

        return $this;
    }


}
