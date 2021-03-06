<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profil", name="user")
     */
    public function index(): Response
    {

        return $this->render('user/profil.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
