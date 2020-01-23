<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/", name="Accueil")
     */
    public function index()
    {
        return $this->render('website/accueil.html.twig', [
        ]);
    }
}
