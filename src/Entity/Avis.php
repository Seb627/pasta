<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="avis")
     */
    private $recipe;

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

    /**
     * Get the value of recipe
     */ 
    public function getRecipe()
    {
        return $this->recipe;
    }

    /**
     * Set the value of recipe
     *
     * @return  self
     */ 
    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;

        return $this;
    }
}
