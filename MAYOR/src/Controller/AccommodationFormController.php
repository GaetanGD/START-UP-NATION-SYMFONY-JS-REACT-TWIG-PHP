<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\AccommodationFormType;
use Doctrine\ORM\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccommodationFormController extends AbstractController
{
    /**
     * @Route("/accommodation/form", name="accommodation_form")
     */
    public function index(): Response
    {
        $accommodation = new Activity();
        $form = $this->createForm(AccommodationFormType::class, $accommodation);

        return $this->render('accommodation_form/index.html.twig', [
            'controller_name' => 'AccommodationFormController',

            'AccommodationForm' =>  $form->createView()
        ]);
    }
}
