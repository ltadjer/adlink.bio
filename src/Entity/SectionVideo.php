<?php

namespace App\Entity;

use App\Repository\SectionVideoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionVideoRepository::class)]
class SectionVideo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column(length: 255)]
    private ?string $altVideo = null;

    #[ORM\Column(length: 255)]
    private ?string $bgColor = null;

    #[ORM\OneToOne(inversedBy: 'sectionVideo', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getAltVideo(): ?string
    {
        return $this->altVideo;
    }

    public function setAltVideo(string $altVideo): self
    {
        $this->altVideo = $altVideo;

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
