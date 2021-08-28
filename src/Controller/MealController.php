<?php

namespace App\Controller;

use App\Repository\DishRepository;
use App\Repository\MealRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{
    /**
     * @Route("/meal", name="meal", methods={"POST"})
     */
    public function index(Request $request, EntityManagerInterface $entityManager, MealRepository $mealRepository, DishRepository $dishRepository): Response
    {
        $post = (json_decode($request->getContent()));
        $idDragged = (int)$post->idDragged;
        $idOrigin = (int)$post->idOrigin;
        $idDestination = (int)$post->idDestination;
        $dragged = $dishRepository->findOneBy(['id'=>$idDragged]);
        $origin = $mealRepository->findOneBy(['id'=>$idOrigin]);
        $destination = $mealRepository->findOneBy(['id'=>$idDestination]);
        $origin->removeDish($dragged);
        $destination->addDish($dragged);
        $entityManager->flush();
        return $this->json(['newId'=>$destination->getId()]);
    }
}
