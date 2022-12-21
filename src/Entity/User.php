<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $pseudo = null;
    
    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $font;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Code::class)]
    private Collection $codes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Link::class)]
    private Collection $links;


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
    private $createdAt;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function setNetwork(Network $network): self
    {
        // set the owning side of the relation if necessary
        if ($network->getUser() !== $this) {
            $network->setUser($this);
        }

        $this->network = $network;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTimeImmutable();
    }
}
