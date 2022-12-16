<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Code::class)]
    private Collection $codes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Network::class)]
    private Collection $networks;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Link::class)]
    private Collection $links;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionCompany $sectionCompany = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionVideo $sectionVideo = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionDiscount $sectionDiscount = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionLink $sectionLink = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionNetwork $sectionNetwork = null;

    public function __construct()
    {
        $this->codes = new ArrayCollection();
        $this->networks = new ArrayCollection();
        $this->links = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Code>
     */
    public function getCodes(): Collection
    {
        return $this->codes;
    }

    public function addCode(Code $code): self
    {
        if (!$this->codes->contains($code)) {
            $this->codes->add($code);
            $code->setUser($this);
        }

        return $this;
    }

    public function removeCode(Code $code): self
    {
        if ($this->codes->removeElement($code)) {
            // set the owning side to null (unless already changed)
            if ($code->getUser() === $this) {
                $code->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Network>
     */
    public function getNetworks(): Collection
    {
        return $this->networks;
    }

    public function addNetwork(Network $network): self
    {
        if (!$this->networks->contains($network)) {
            $this->networks->add($network);
            $network->setUser($this);
        }

        return $this;
    }

    public function removeNetwork(Network $network): self
    {
        if ($this->networks->removeElement($network)) {
            // set the owning side to null (unless already changed)
            if ($network->getUser() === $this) {
                $network->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Link>
     */
    public function getLinks(): Collection
    {
        return $this->links;
    }

    public function addLink(Link $link): self
    {
        if (!$this->links->contains($link)) {
            $this->links->add($link);
            $link->setUser($this);
        }

        return $this;
    }

    public function removeLink(Link $link): self
    {
        if ($this->links->removeElement($link)) {
            // set the owning side to null (unless already changed)
            if ($link->getUser() === $this) {
                $link->setUser(null);
            }
        }

        return $this;
    }

    public function getSectionCompany(): ?SectionCompany
    {
        return $this->sectionCompany;
    }

    public function setSectionCompany(SectionCompany $sectionCompany): self
    {
        $this->sectionCompany = $sectionCompany;

        return $this;
    }

    public function getSectionVideo(): ?SectionVideo
    {
        return $this->sectionVideo;
    }

    public function setSectionVideo(SectionVideo $sectionVideo): self
    {
        $this->sectionVideo = $sectionVideo;

        return $this;
    }

    public function getSectionDiscount(): ?SectionDiscount
    {
        return $this->sectionDiscount;
    }

    public function setSectionDiscount(SectionDiscount $sectionDiscount): self
    {
        $this->sectionDiscount = $sectionDiscount;

        return $this;
    }

    public function getSectionLink(): ?SectionLink
    {
        return $this->sectionLink;
    }

    public function setSectionLink(SectionLink $sectionLink): self
    {
        $this->sectionLink = $sectionLink;

        return $this;
    }

    public function getSectionNetwork(): ?SectionNetwork
    {
        return $this->sectionNetwork;
    }

    public function setSectionNetwork(SectionNetwork $sectionNetwork): self
    {
        $this->sectionNetwork = $sectionNetwork;

        return $this;
    }
}
