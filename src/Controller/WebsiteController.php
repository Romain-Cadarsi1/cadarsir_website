<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;

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

    /**
     * @Route("/wrsomething", name="write")
     */
    public function write()
    {
    	$entityManager = $this->getDoctrine()->getManager();
    	$user = new Users();
    	$user->setNom("Cadarsi");
    	$user->setPrenom("Romain");
    	$user->setAge(19);
    	$entityManager->persist($user);
    	$entityManager->flush();
        return $this->render('website/message.html.twig', [
        	'message' => "Je crois c'est ok"
        ]);
    }
}
