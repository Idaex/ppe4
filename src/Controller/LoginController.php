<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController {
    /**
     * @Route("/login", name="login")
     */
    
    public function login( AuthenticationUtils $auth) {
        $erreur = $auth->getLastAuthenticationError();
        $lastUserName = $auth->getLastUserName();
        
        return $this->render('login/login.html.twig', array(
            'last_username' => $lastUserName, 'error'=>$erreur
        ));
    }
}

