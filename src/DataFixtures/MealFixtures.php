<?php

namespace App\DataFixtures;

use App\Entity\Meal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MealFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 7; $i++){
            $lunch = new Meal();
            $lunch->setCategory('Déjeuner');
            $manager->persist($lunch);
            $this->addReference('lunch_' . $i, $lunch);
            $dinner = new Meal();
            $dinner->setCategory('Dîner');
            $manager->persist($dinner);
            $this->addReference('dinner_' . $i, $dinner);
        }

        $manager->flush();
    }
}
