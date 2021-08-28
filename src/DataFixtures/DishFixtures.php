<?php

namespace App\DataFixtures;
use App\Entity\Dish;
use App\Entity\DishList;
use App\Entity\Meal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DishFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dishList = new Meal();
        $dishList->setCategory('list');
        $dishList->setName('current');
        $dishList->setIsFavourite(false);
        $manager->persist($dishList);
       $dish = new Dish();
       $dish->setName('Blanquette de veau');
       $dish->setCategory('plat');
       $dishList->addDish($dish);
       $manager->persist($dish);
       $dish = new Dish();
       $dish->setName('Carottes Râpées');
       $dish->setCategory('entrée');
       $dishList->addDish($dish);
       $manager->persist($dish);
       $dish = new Dish();
       $dish->setName('Couscous');
       $dish->setCategory('plat');
       $dishList->addDish($dish);
       $manager->persist($dish);
       $dish = new Dish();
       $dish->setName('Spaghetti Carbonara');
       $dish->setCategory('plat');
       $dishList->addDish($dish);
       $manager->persist($dish);
       $dish->setName('Concombre à la crème');
       $dish->setCategory('entrée');
       $dishList->addDish($dish);
       $manager->persist($dish);
       $manager->persist($dishList);
        $manager->flush();
    }
}
