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
     * @ORM\OneToOne(targetEntity=SectionDiscount::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $sectionDiscount;

    /**
     * @ORM\OneToOne(targetEntity=SectionLink::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $sectionLink;

    /**
     * @ORM\OneToOne(targetEntity=SectionRS::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $sectionRS;

    /**
     * @ORM\OneToMany(targetEntity=RS::class, mappedBy="user")
     */
    private $RSs;

    /**
     * @ORM\OneToOne(targetEntity=SectionVideo::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $sectionVideo;

    /**
     * @ORM\OneToOne(targetEntity=SectionCompany::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $sectionCompany;

    

    public function __construct()
    {
        $this->rS = new ArrayCollection();
        $this->RSs = new ArrayCollection();
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


    public function getSectionDiscount(): ?SectionDiscount
    {
        return $this->sectionDiscount;
    }

    public function setSectionDiscount(?SectionDiscount $sectionDiscount): self
    {
        $this->sectionDiscount = $sectionDiscount;

        return $this;
    }

    public function getSectionLink(): ?SectionLink
    {
        return $this->sectionLink;
    }

    public function setSectionLink(?SectionLink $sectionLink): self
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

    /**
     * @return Collection<int, RS>
     */
    public function getRSs(): Collection
    {
        return $this->RSs;
    }

    public function addRSs(RS $rSs): self
    {
        if (!$this->RSs->contains($rSs)) {
            $this->RSs[] = $rSs;
            $rSs->setUser($this);
        }

        return $this;
    }

    public function removeRSs(RS $rSs): self
    {
        if ($this->RSs->removeElement($rSs)) {
            // set the owning side to null (unless already changed)
            if ($rSs->getUser() === $this) {
                $rSs->setUser(null);
            }
        }

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

    public function getSectionCompany(): ?SectionCompany
    {
        return $this->sectionCompany;
    }

    public function setSectionCompany(?SectionCompany $sectionCompany): self
    {
        $this->sectionCompany = $sectionCompany;

        return $this;
    }
   
}
