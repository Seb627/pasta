<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Pseudo;

    /**
     * @ORM\Column(type="text")
     */
    private $Commentary;

    /**
     * @ORM\Column(type="integer")
     */
    private $Rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getCommentary(): ?string
    {
        return $this->Commentary;
    }

    public function setCommentary(string $Commentary): self
    {
        $this->Commentary = $Commentary;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->Rate;
    }

    public function setRate(int $Rate): self
    {
        $this->Rate = $Rate;

        return $this;
    }
}
