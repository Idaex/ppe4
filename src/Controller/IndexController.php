<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Response;


class IndexController extends AbstractController{
    /**
     * @Route("/index", name="index")
     * @return Response 
     */
    
    public function afficheProduits(\Doctrine\ORM\EntityManagerInterface $em){
        $lesProduits = $em->getRepository(\App\Entity\Produits::class)->findAll();
        return $this->render('magasin/accueil.html.twig', compact("lesProduits"));
    }
}