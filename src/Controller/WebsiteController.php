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
    	$entityManager = $this->getDoctrine()->getManager();
    	$users = $this->getDoctrine()->getRepository(Users::class)->findAll();
        return $this->render('website/accueil.html.twig', [
        	'users' => $users
        ]);
    }

    /**
     * @Route("/wrsomething", name="write")
     */
    public function write()
    {
    	$entityManager = $this->getDoctrine()->getManager();
    	$user = new Users();
    	$user->setNom($_POST['nom']);
    	$user->setPrenom($_POST['prenom']);
    	$user->setAge($_POST['age']);
    	$entityManager->persist($user);
    	$entityManager->flush();
        return $this->render('website/message.html.twig', [
        	'message' => "Je crois c'est ok"
        ]);
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('website/contact.html.twig', []);
    }

    /**
     * @Route("/send", name="Message envoyé")
     */
    public function envoyerMail(){
        $message = "Bonjour Romain Cadarsi, vous avez reçu un message de" . $_POST['nom'] . $_POST['prenom'] . "\n Qui dit : \n " . $_POST['message'];
        mail('dev@cadarsir.fr', 'Message client', $message);
        return $this->render('website/message.html.twig', [
            'message' => "Message envoyé, vous recevrez une réponse sous peu si une réponse est requise.",
            'slider1' => "Votre message est" , 
            'slider21' => "En cours d'envoi" ,
            'slider22' => "Envoyé" ,
            'slider23' => "Réceptionné"]);
    }

    /**
     * @Route("/bepatient", name="Page en cours d\'implémentation")
     */
    public function EnCours(){
        //$message = "Bonjour Romain Cadarsi, vous avez reçu un message de" . $_POST['nom'] . $_POST['prenom'] . "\n Qui dit : \n " . $_POST['message'];
        //mail('dev@cadarsir.fr', 'Message client', $message);
        return $this->render('website/message.html.twig', [
            'message' => "Aïe, il semble que cette page n'est pas encore terminée , revenez bientôt pour la voir ! \n La patience est une vertu.",
            'slider1' => "Oups, cette page est" , 
            'slider21' => "Non disponible" ,
            'slider22' => "En création" ,
            'slider23' => "Prévu pour bientôt"]);
    }


}
