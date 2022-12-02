<?php

namespace App\Entity;

use App\Repository\SectionVideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionVideoRepository::class)
 */
class SectionVideo
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
    private $bgCOlor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $altVideo;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="sectionVideo", cascade={"persist", "remove"})
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

    public function getBgCOlor(): ?string
    {
        return $this->bgCOlor;
    }

    public function setBgCOlor(string $bgCOlor): self
    {
        $this->bgCOlor = $bgCOlor;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setSectionVideo(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getSectionVideo() !== $this) {
            $user->setSectionVideo($this);
        }

        $this->user = $user;

        return $this;
    }


}
