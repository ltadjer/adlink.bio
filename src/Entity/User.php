<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=SectionCOmpany::class, cascade={"persist", "remove"})
     */
    private $sectionCompany;

    /**
     * @ORM\OneToOne(targetEntity=SectionDiscount::class, cascade={"persist", "remove"})
     */
    private $sectionDiscount;

    /**
     * @ORM\OneToOne(targetEntity=SectionDiscount::class, cascade={"persist", "remove"})
     */
    private $sectionLink;

    /**
     * @ORM\OneToOne(targetEntity=SectionRS::class, cascade={"persist", "remove"})
     */
    private $sectionRS;

    /**
     * @ORM\OneToOne(targetEntity=SectionVideo::class, cascade={"persist", "remove"})
     */
    private $sectionVideo;

    /**
     * @ORM\OneToMany(targetEntity=RS::class, mappedBy="user")
     */
    private $rS;

    public function __construct()
    {
        $this->rS = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSectionCompany(): ?SectionCOmpany
    {
        return $this->sectionCompany;
    }

    public function setSectionCompany(?SectionCOmpany $sectionCompany): self
    {
        $this->sectionCompany = $sectionCompany;

        return $this;
    }

    public function getSectionDiscount(): ?SectionDiscount
    {
        return $this->sectionDiscount;
    }

    public function setSectionDiscount(?SectionDiscount $sectionDiscount): self
    {
        $this->sectionDiscount = $sectionDiscount;

        return $this;
    }

    public function getSectionLink(): ?SectionDiscount
    {
        return $this->sectionLink;
    }

    public function setSectionLink(?SectionDiscount $sectionLink): self
    {
        $this->sectionLink = $sectionLink;

        return $this;
    }

    public function getSectionRS(): ?SectionRS
    {
        return $this->sectionRS;
    }

    public function setSectionRS(?SectionRS $sectionRS): self
    {
        $this->sectionRS = $sectionRS;

        return $this;
    }

    public function getSectionVideo(): ?SectionVideo
    {
        return $this->sectionVideo;
    }

    public function setSectionVideo(?SectionVideo $sectionVideo): self
    {
        $this->sectionVideo = $sectionVideo;

        return $this;
    }

    /**
     * @return Collection<int, RS>
     */
    public function getRS(): Collection
    {
        return $this->rS;
    }

    public function addR(RS $r): self
    {
        if (!$this->rS->contains($r)) {
            $this->rS[] = $r;
            $r->setUser($this);
        }

        return $this;
    }

    public function removeR(RS $r): self
    {
        if ($this->rS->removeElement($r)) {
            // set the owning side to null (unless already changed)
            if ($r->getUser() === $this) {
                $r->setUser(null);
            }
        }

        return $this;
    }

   
}
