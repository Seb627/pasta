<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 */
class Recipe
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
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="integer")
     */
    private $Cooking_time;

    /**
     * @ORM\Column(type="integer")
     */
    private $Baking_time;

    /**
     * @ORM\Column(type="integer")
     */
    private $Price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="recipes")
     */
    private $Utensil;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recipe", mappedBy="Utensil")
     */
    private $recipes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ingredients", inversedBy="recipes")
     */
    private $Ingredients;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Steps", mappedBy="recipe")
     */
    private $Steps;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Tag", cascade={"persist", "remove"})
     */
    private $Tag;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
        $this->Ingredients = new ArrayCollection();
        $this->Steps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->Cooking_time;
    }

    public function setCookingTime(int $Cooking_time): self
    {
        $this->Cooking_time = $Cooking_time;

        return $this;
    }

    public function getBakingTime(): ?int
    {
        return $this->Baking_time;
    }

    public function setBakingTime(int $Baking_time): self
    {
        $this->Baking_time = $Baking_time;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getUtensil(): ?self
    {
        return $this->Utensil;
    }

    public function setUtensil(?self $Utensil): self
    {
        $this->Utensil = $Utensil;

        return $this;
    }


    /**
     * @return Collection|Ingredients[]
     */
    public function getIngredients(): Collection
    {
        return $this->Ingredients;
    }

    public function addIngredient(Ingredients $ingredient): self
    {
        if (!$this->Ingredients->contains($ingredient)) {
            $this->Ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredients $ingredient): self
    {
        if ($this->Ingredients->contains($ingredient)) {
            $this->Ingredients->removeElement($ingredient);
        }

        return $this;
    }

    /**
     * @return Collection|Steps[]
     */
    public function getSteps(): Collection
    {
        return $this->Steps;
    }

    public function addStep(Steps $step): self
    {
        if (!$this->Steps->contains($step)) {
            $this->Steps[] = $step;
            $step->setRecipe($this);
        }

        return $this;
    }

    public function removeStep(Steps $step): self
    {
        if ($this->Steps->contains($step)) {
            $this->Steps->removeElement($step);
            // set the owning side to null (unless already changed)
            if ($step->getRecipe() === $this) {
                $step->setRecipe(null);
            }
        }

        return $this;
    }

    public function getTag(): ?Tag
    {
        return $this->Tag;
    }

    public function setTag(?Tag $Tag): self
    {
        $this->Tag = $Tag;

        return $this;
    }
}
