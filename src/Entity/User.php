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

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Link::class)]
    private Collection $links;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $font;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: SectionCompany::class, cascade: ['persist', 'remove'])]
    private $sectionCompany;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: SectionDiscount::class, cascade: ['persist', 'remove'])]
    private $sectionDiscount;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: SectionLink::class, cascade: ['persist', 'remove'])]
    private $sectionLink;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: SectionNetwork::class, cascade: ['persist', 'remove'])]
    private $sectionNetwork;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: SectionVideo::class, cascade: ['persist', 'remove'])]
    private $sectionVideo;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: Network::class, cascade: ['persist', 'remove'])]
    private $network;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createAt;


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

    public function getFont(): ?string
    {
        return $this->font;
    }

    public function setFont(?string $font): self
    {
        $this->font = $font;

        return $this;
    }

    public function getSectionCompany(): ?SectionCompany
    {
        return $this->sectionCompany;
    }

    public function setSectionCompany(?SectionCompany $sectionCompany): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionCompany === null && $this->sectionCompany !== null) {
            $this->sectionCompany->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionCompany !== null && $sectionCompany->getUser() !== $this) {
            $sectionCompany->setUser($this);
        }

        $this->sectionCompany = $sectionCompany;

        return $this;
    }

    public function getSectionDiscount(): ?SectionDiscount
    {
        return $this->sectionDiscount;
    }

    public function setSectionDiscount(?SectionDiscount $sectionDiscount): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionDiscount === null && $this->sectionDiscount !== null) {
            $this->sectionDiscount->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionDiscount !== null && $sectionDiscount->getUser() !== $this) {
            $sectionDiscount->setUser($this);
        }

        $this->sectionDiscount = $sectionDiscount;

        return $this;
    }

    public function getSectionLink(): ?SectionLink
    {
        return $this->sectionLink;
    }

    public function setSectionLink(?SectionLink $sectionLink): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionLink === null && $this->sectionLink !== null) {
            $this->sectionLink->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionLink !== null && $sectionLink->getUser() !== $this) {
            $sectionLink->setUser($this);
        }

        $this->sectionLink = $sectionLink;

        return $this;
    }

    public function getSectionNetwork(): ?SectionNetwork
    {
        return $this->sectionNetwork;
    }

    public function setSectionNetwork(?SectionNetwork $sectionNetwork): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionNetwork === null && $this->sectionNetwork !== null) {
            $this->sectionNetwork->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionNetwork !== null && $sectionNetwork->getUser() !== $this) {
            $sectionNetwork->setUser($this);
        }

        $this->sectionNetwork = $sectionNetwork;

        return $this;
    }

    public function getSectionVideo(): ?SectionVideo
    {
        return $this->sectionVideo;
    }

    public function setSectionVideo(?SectionVideo $sectionVideo): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionVideo === null && $this->sectionVideo !== null) {
            $this->sectionVideo->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionVideo !== null && $sectionVideo->getUser() !== $this) {
            $sectionVideo->setUser($this);
        }

        $this->sectionVideo = $sectionVideo;

        return $this;
    }

    public function getNetwork(): ?Network
    {
        return $this->network;
    }

    public function setNetwork(?Network $network): self
    {
        // unset the owning side of the relation if necessary
        if ($network === null && $this->network !== null) {
            $this->network->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($network !== null && $network->getUser() !== $this) {
            $network->setUser($this);
        }

        $this->network = $network;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }
}
