<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\RestaurantFormType;
use Doctrine\ORM\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantFormController extends AbstractController
{
    /**
     * @Route("/restaurant/form", name="restaurant_form")
     */
    public function index(): Response
    {
        $restaurant = new Activity();
        $form = $this->createForm(RestaurantFormType::class, $restaurant);

        return $this->render('restaurant_form/index.html.twig', [
            'controller_name' => 'RestaurantFormController',

            'RestaurantForm' =>  $form->createView()
        ]);
    }
}
