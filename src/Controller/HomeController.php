<?php

namespace App\Controller;

use App\Repository\DayRepository;
use App\Repository\DishListRepository;
use App\Repository\DishRepository;
use App\Repository\MealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(DayRepository $dayRepository, DishRepository $dishRepository, MealRepository $mealRepository): Response
    {
        $days = $dayRepository->findAll();
        $dishes = $dishRepository->findAll();
        $list = $mealRepository->findOneBy(['name'=>'current']);
        return $this->render('home/index.html.twig', [
            'days' => $days,
            'dishes' => $dishes,
            'list' => $list,
        ]);
    }
}
