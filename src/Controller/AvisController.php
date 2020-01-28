<?php

namespace App\Controller;
use App\Entity\commande ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\AvisRepository;


class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="avis")
     * @param AvisRepository $avisRepository
     * @return Response
     */
    public function index(AvisRepository $avisRepository)
    {
        $aviss = $avisRepository->findAll();
       

        return $this->render('avis/index.html.twig', [
           "aviss" => $aviss
        ]);
    }

    
    /**
         * @Route("/avis/create", name="create")
         * @param Request $request
         * @return Response 
         */

        public function create(Request $request){
            $avis = new Avis();

            $em = $this->getDoctrine()->getManager();
            $em->persist($avis);
            $em->flush();
            $number =5 ;

           return new Response( 'jhskl');

         }
            /**

         * @Route("/avis/show/", name="show")
         * @param Request $request
         * @return Response 
         */

         
        public function show($id,AvisRepository $avisRepository){


                    $avis= $avisRepository->find($id);
                    dump($avis);die;
            return $this->render('avis/show.html.twig',[
                'avis'=>$avis
            ]);
         }

}



