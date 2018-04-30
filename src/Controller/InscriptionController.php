<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response;


class InscriptionController extends AbstractController{
    /**
     * @Route("/inscription", name="inscription")
     * @return Response 
     */
    
    public function inscription(){
        return $this->render('home/inscription.html.twig');
    }
}