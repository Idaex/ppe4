<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function dump;

class HomeController extends AbstractController{
    /**
     * @Route("/", name="home")
     * @return Response 
     */
    
    public function indexController(){
        $userRepo = $entityManager->getRepository(User::class);
        $user = $userRepo->find(1);
        return $this->render('home/index.html.twig');
    }
    
      
    /**
     * @Route("/totosclassique/{id}",name="un_toto_cla")
     */
    public function apiTotoMethodeClassique($id, EntityManagerInterface $em) {
        $unToto = $em->getRepository(User::class)->find($id);
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($unToto, 'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }
    /**
     * @Route("/ajouttoto/",name="ajout_toto",methods="post")
     */
    public function ajoutToto(Request $request, EntityManagerInterface $em) {
        
        $serializer = $this->get('serializer');
        $unToto = $serializer->deserialize($request->getContent(), User::class, 'json');
        
        $em->persist($unToto);
        $em->flush();
        
        $response = new Response("L'ajout est réalisé !");
        $response->headers->set('Content-Type', 'application/text');
        $response->headers->set('Ok', 'oui');
        return $response;
        
    }
    /**
     * @Route("/visiteur", name="visiteur")
     * @return Response
     */
    public function visiteurController(){
        return $this->render('visiteur/visiteur.html.twig');
    }
    
    /**
     * @Route("/perso", name="perso")
     * @return Response
     */
    public function persoController(){
        return $this->render('perso/perso.html.twig');
    }

}
