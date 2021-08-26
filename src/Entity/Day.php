<?php

namespace App\Entity;

use App\Repository\DayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DayRepository::class)
 */
class Day
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Meal::class, mappedBy="day")
     */
    private $Meals;

    public function __construct()
    {
        $this->Meals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Meal[]
     */
    public function getMeals(): Collection
    {
        return $this->Meals;
    }

    public function addMeal(Meal $meal): self
    {
        if (!$this->Meals->contains($meal)) {
            $this->Meals[] = $meal;
            $meal->setDay($this);
        }

        return $this;
    }

    public function removeMeal(Meal $meal): self
    {
        if ($this->Meals->removeElement($meal)) {
            // set the owning side to null (unless already changed)
            if ($meal->getDay() === $this) {
                $meal->setDay(null);
            }
        }

        return $this;
    }
}
