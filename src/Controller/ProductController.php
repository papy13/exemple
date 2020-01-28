<?php

namespace App\Controller;
use App\Entity\Product ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProductRepository;


class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();
       

        return $this->render('product/index.html.twig', [
           "products" => $products
        ]);
    }

    
    /**
         * @Route("/product/create", name="create")
         * @param Request $request
         * @return Response 
         */

        public function create(Request $request){
            $product = new Product();

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            $number =5 ;

           return new Response( 'jhskl');

         }
            /**

         * @Route("/product/show/", name="show")
         * @param Request $request
         * @return Response 
         */

         
        public function show($id,ProductRepository $productRepository){


                    $product= $productRepository->find($id);
                    dump($product);die;
            return $this->render('product/show.html.twig',[
                'product'=>$product
            ]);
         }

}



