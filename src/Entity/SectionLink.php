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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bg_color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bg_btn_color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text_btn_color;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getBgColor(): ?string
    {
        return $this->bg_color;
    }

    public function setBgColor(?string $bg_color): self
    {
        $this->bg_color = $bg_color;

        return $this;
    }

    public function getBgBtnColor(): ?string
    {
        return $this->bg_btn_color;
    }

    public function setBgBtnColor(?string $bg_btn_color): self
    {
        $this->bg_btn_color = $bg_btn_color;

        return $this;
    }

    public function getTextBtnColor(): ?string
    {
        return $this->text_btn_color;
    }

    public function setTextBtnColor(?string $text_btn_color): self
    {
        $this->text_btn_color = $text_btn_color;

        return $this;
    }
}
