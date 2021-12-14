<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyageFormController extends AbstractController
{
    /**
     * @Route("/voyage/form", name="voyage_form")
     */
    public function index(): Response
    {
        return $this->render('voyage_form/index.html.twig', [
            'controller_name' => 'VoyageFormController',
        ]);
    }
}
