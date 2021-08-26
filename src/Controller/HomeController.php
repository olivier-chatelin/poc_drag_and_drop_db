<?php

namespace App\Controller;

use App\Repository\DayRepository;
use App\Repository\DishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(DayRepository $dayRepository, DishRepository $dishRepository): Response
    {
        $days = $dayRepository->findAll();
        $dishes = $dishRepository->findAll();

        return $this->render('home/index.html.twig', [
            'days' => $days,
            'dishes' => $dishes,
        ]);
    }
}
