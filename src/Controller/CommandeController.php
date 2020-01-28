<?php

namespace App\Controller;
use App\Entity\Commande ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\CommandeRepository;


class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     * @param CommandeRepository $commandeRepository
     * @return Response
     */
    public function index(CommandeRepository $commandeRepository)
    {
        $commandes = $commandeRepository->findAll();
       

        return $this->render('commande/index.html.twig', [
           "commandes" => $commandes
        ]);
    }

    
    /**
         * @Route("/commande/create", name="create")
         * @param Request $request
         * @return Response 
         */

        public function create(Request $request){
            $commande = new Commande();

            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            $number =5 ;

           return new Response( 'jhskl');

         }
            /**

         * @Route("/commande/show/", name="show")
         * @param Request $request
         * @return Response 
         */

         
        public function show($id,CommandeRepository $commandeRepository){


                    $commande= $commandeRepository->find($id);
                    dump($commande);die;
            return $this->render('commande/show.html.twig',[
                'commande'=>$commande
            ]);
         }

}



