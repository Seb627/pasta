<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    /**
     * @Route("/recipes")
     */
    public function show()
    {
        $number = random_int(0, 100);

        return $this->render('recipes/index.html.twig', [
            'number' => $number,
        ]);
    }

    public function index()
    {
        
    }
}