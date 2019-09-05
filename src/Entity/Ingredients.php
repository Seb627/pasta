<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientsRepository")
 */
class Ingredients
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Quantity;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Unity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Unite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->Quantity;
    }

    public function setQuantity(string $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getUnity(): ?string
    {
        return $this->Unity;
    }

    public function setUnity(string $Unity): self
    {
        $this->Unity = $Unity;

        return $this;
    }

    public function getUnite(): ?Unite
    {
        return $this->Unite;
    }

    public function setUnite(?Unite $Unite): self
    {
        $this->Unite = $Unite;

        return $this;
    }
}
