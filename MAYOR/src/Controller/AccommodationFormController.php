<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\AccommodationFormType;
use Doctrine\ORM\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AccommodationFormController extends AbstractController
{
    /**
     * @Route("/accommodation/form", name="accommodation_form")
     */
    public function index(Request $request)
    {
        $accommodation = new Activity();
        $form = $this->createForm(AccommodationFormType::class, $accommodation);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $accommodation->setUserId();

            $em = $this->getDoctrine()->getManager();

            $em ->persist($accommodation);

            $em ->flush();

            return new Response('Produit ajouté !'); 


        }

        return $this->render('accommodation_form/index.html.twig', [
            'controller_name' => 'AccommodationFormController',

            'AccommodationForm' =>  $form->createView()
        ]);
    }
}
