<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtensilRepository")
 */
class Utensil
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Recipe", mappedBy="Utensil")
     */
    private $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

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

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipe(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipes): self
    {
        if (!$this->recipes->contains($recipes)) {
            $this->recipes[] = $recipes;
            $recipes->setRecipe($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipes): self
    {
        if ($this->Steps->contains($step)) {
            $this->Steps->removeElement($step);
            // set the owning side to null (unless already changed)
            if ($recipes->getRecipe() === $this) {
                $recipes->setRecipe(null);
            }
        }

        return $this;
    }
}
