<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DressController extends AbstractController
{
    /**
     * @Route("/dress", name="dress")
     */
    public function index()
    {
        return $this->render('dress/index.html.twig', [
            'controller_name' => 'DressController',
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
     * @Route("/single/12", name="single")
     */
    public function single()
    {
      return $this->render('dress/single.html.twig',[

      ]);
    }
}
