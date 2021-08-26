<?php

namespace App\Entity;

use App\Repository\DishRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DishRepository::class)
 */
class Dish
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Meal::class, mappedBy="dishes")
     */
    private $meals;

    /**
     * @ORM\ManyToMany(targetEntity=DishList::class, mappedBy="dishes")
     */
    private $dishLists;

    public function __construct()
    {
        $this->meals = new ArrayCollection();
        $this->dishLists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Meal[]
     */
    public function getMeals(): Collection
    {
        return $this->meals;
    }

    public function addMeal(Meal $meal): self
    {
        if (!$this->meals->contains($meal)) {
            $this->meals[] = $meal;
            $meal->addDish($this);
        }

        return $this;
    }

    public function removeMeal(Meal $meal): self
    {
        if ($this->meals->removeElement($meal)) {
            $meal->removeDish($this);
        }

        return $this;
    }

    /**
     * @return Collection|DishList[]
     */
    public function getDishLists(): Collection
    {
        return $this->dishLists;
    }

    public function addDishList(DishList $dishList): self
    {
        if (!$this->dishLists->contains($dishList)) {
            $this->dishLists[] = $dishList;
            $dishList->addDish($this);
        }

        return $this;
    }

    public function removeDishList(DishList $dishList): self
    {
        if ($this->dishLists->removeElement($dishList)) {
            $dishList->removeDish($this);
        }

        return $this;
    }
}
