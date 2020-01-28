<?php

namespace App\Controller;
use App\Entity\Salle ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\SalleRepository;


class SalleController extends AbstractController
{
    /**
     * @Route("/salle", name="salle")
     * @param SalleRepository $salleRepository
     * @return Response
     */
    public function index(SalleRepository $salleRepository)
    {
        $salles = $salleRepository->findAll();
       

        return $this->render('salle/index.html.twig', [
           "salles" => $salles
        ]);
    }

    
    /**
         * @Route("/salle/create", name="create")
         * @param Request $request
         * @return Response 
         */

        public function create(Request $request){
            $salle = new Salle();

            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();
            $number =5 ;

           return new Response( 'jhskl');

         }
            /**

         * @Route("/salle/show/", name="show")
         * @param Request $request
         * @return Response 
         */

         
        public function show($id,SalleRepository $salleRepository){


                    $salle= $salleRepository->find($id);
                    dump($salle);die;
            return $this->render('salle/show.html.twig',[
                'salle'=>$salle
            ]);
         }

}



