<?php

namespace App\DataFixtures;

use App\Entity\Day;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DayFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 7 ;$i ++){
            $date= new \DateTime('2021-08-' . ($i + 23));
            $day = new Day();

            $day->setDate($date);
            $day->addMeal($this->getReference('lunch_' . ($i + 1)));
            $day->addMeal($this->getReference('dinner_' . ($i + 1)));
            $manager->persist($day);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          MealFixtures::class,
        ];
    }
}
