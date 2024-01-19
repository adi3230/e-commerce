<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    //
    /**
     * Render homepage, get featured products and pass them to view.
     *
     * #[Route('/')]
     *
     * @param Environment $twig
     * @return Response
     */

    public function index(Environment $twig) : Response {
        return new Response($twig->render('/home/home.html.twig'));
    }
}