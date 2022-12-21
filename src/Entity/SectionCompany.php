<?php

namespace App\Entity;

use App\Repository\SectionCompanyRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionCompanyRepository::class)]
#[Vich\Uploadable]
class SectionCompany
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

 
    #[Vich\UploadableField(mapping: 'logo_user', fileNameProperty: 'logo')]
    private ?File $logoFile = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $baseline = null;

    #[ORM\Column(length: 255)]
    private ?string $bgColor = null;

    #[ORM\Column(length: 255)]
    private ?string $titleColor = null;

    #[ORM\Column(length: 255)]
    private ?string $baselineColor = null;

    #[ORM\OneToOne(inversedBy: 'sectionCompany', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setLogoFile(?File $logoFile = null): void
    {
        $this->logoFile = $logoFile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
    }

    public function getLogoFile(): ?File
    {
        return $this->logoFile; 
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(string $baseline): self
    {
        $this->baseline = $baseline;

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

    public function getTitleColor(): ?string
    {
        return $this->titleColor;
    }

    public function setTitleColor(string $titleColor): self
    {
        $this->titleColor = $titleColor;

        return $this;
    }

    public function getBaselineColor(): ?string
    {
        return $this->baselineColor;
    }

    public function setBaselineColor(string $baselineColor): self
    {
        $this->baselineColor = $baselineColor;

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
