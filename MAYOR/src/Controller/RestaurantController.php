<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activity;
use App\Form\RestaurantFormType;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurantdetails/{id}", name="restaurant")
     */
    public function index($id): Response
    {
        $em = $this->getDoctrine();

        $restaurant = $em ->getRepository(Activity::class)->findOneById($id);
        $restaurantFormType = new RestaurantFormType();

        return $this->render('restaurant/index.html.twig', [
            'Restaurant' => $restaurant,
           'restaurantForm' => $restaurantFormType
        ]);
    }
}
