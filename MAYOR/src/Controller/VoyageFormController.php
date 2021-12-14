<?php

namespace App\Controller;

use App\Form\VoyageFormType;
use App\Entity\Travel;
use Doctrine\ORM\Entity;
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
        $travel = new Travel();
        $form = $this->createForm(VoyageFormType::class, $travel);

        return $this->render('voyage_form/index.html.twig', [
            'controller_name' => 'VoyageFormController',
            'VoyageForm' =>  $form->createView()
        ]);
    }
}

