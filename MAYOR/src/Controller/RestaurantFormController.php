<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\RestaurantFormType;
use Doctrine\ORM\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RestaurantFormController extends AbstractController
{
    /**
     * @Route("/restaurant/form", name="restaurant_form")
     */
    public function index(Request $request)
    {
        $restaurant = new Activity();
        $form = $this->createForm(RestaurantFormType::class, $restaurant);


        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){

            $restaurant->setUserId($this->getUser());
            $restaurant->setType(3);

            $someNewFilename = uniqid(); 

            $directory = '../public/uploads';

            $file = $form['main_picture']->getData();
            $extension = $file->guessExtension();

            if (!$extension) {
                $extension = 'bin';
            }
            $file->move($directory, $someNewFilename.'.'.$extension);

            $restaurant->setMainPicture($someNewFilename.'.'.$extension);

            #$restaurant->setUserId();

            $em = $this->getDoctrine()->getManager();

            $em ->persist($restaurant);

            $em ->flush();

            return $this->redirectToRoute('voyage_form'); 


        }


        return $this->render('restaurant_form/index.html.twig', [
            'controller_name' => 'RestaurantFormController',

            'RestaurantForm' =>  $form->createView()
        ]);
    }
}
