<?php

namespace App\Controller;
use App\Entity\membre ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\MembreRepository;


class MembreController extends AbstractController
{
    /**
     * @Route("/membre", name="membre")
     * @param MembreRepository $membreRepository
     * @return Response
     */
    public function index(MembreRepository $membreRepository)
    {
        $membres = $membreRepository->findAll();
       

        return $this->render('membre/index.html.twig', [
           "membres" => $membres
        ]);
    }

    
    /**
         * @Route("/membre/create", name="create")
         * @param Request $request
         * @return Response 
         */

        public function create(Request $request){
            $membre = new membre();

            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();
            $number =5 ;

           return new Response( 'jhskl');

         }
            /**

         * @Route("/membre/show/", name="show")
         * @param Request $request
         * @return Response 
         */

         
        public function show($id,MembreRepository $membreRepository){


                    $membre= $MembreRepository->find($id);
                    dump($membre);die;
            return $this->render('membre/show.html.twig',[
                'membre'=>$membre
            ]);
         }

}



