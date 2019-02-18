<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dress;

class DressController extends AbstractController
{
    /**
     * @Route("/dress", name="dress")
     */
    public function index()
    {
      $repo = $this->getDoctrine()->getRepository(Dress::Class);
      $dresses = $repo->findAll();

        return $this->render('dress/index.html.twig', [
            'controller_name' => 'DressController',
            'dresses' => $dresses
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
      return $this->render('index.html.twig');
    }

    /**
     * @Route("/single/{id}", name="single")
     */
    public function single($id)
    {
      $repo = $this->getDoctrine()->getRepository(Dress::Class);
      $dress = $repo->find($id);
      return $this->render('dress/single.html.twig',[
        'dress'=>$dress
      ]);
    }
}
