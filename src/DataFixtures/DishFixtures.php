<?php

namespace App\DataFixtures;

use App\Entity\Dish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DishFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $dish = new Dish();
       $dish->setName('Blanquette de veau');
       $dish->setCategory('plat');
       $manager->persist($dish);
       $dish = new Dish();
       $dish->setName('Carottes Râpées');
       $dish->setCategory('entrée');
       $manager->persist($dish);
       $dish = new Dish();
       $dish->setName('Couscous');
       $dish->setCategory('plat');
       $manager->persist($dish);
       $dish = new Dish();
       $dish->setName('Spaghetti Carbonara');
       $dish->setCategory('plat');
       $manager->persist($dish);
       $dish->setName('Concombre à la crème');
       $dish->setCategory('entrée');
       $manager->persist($dish);

        $manager->flush();
    }
}
