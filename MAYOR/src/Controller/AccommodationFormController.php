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

        if($form->isSubmitted()&& $form->isValid()){

            $accommodation->setUserId($this->getUser());
           $accommodation->setType(2);

            #$accommodation->setUserId();

            $someNewFilename = uniqid(); 

            $directory = '../../public/uploads';

            $file = $form['main_picture']->getData();
            $extension = $file->guessExtension();

            if (!$extension) {
                $extension = 'bin';
            }
            $file->move($directory, $someNewFilename.'.'.$extension);

            $accommodation->setMainPicture($someNewFilename.'.'.$extension);

            $em = $this->getDoctrine()->getManager();

            $em ->persist($accommodation);

            $em ->flush();

            return $this->redirectToRoute('voyage_form'); 


        }

        return $this->render('accommodation_form/index.html.twig', [
            'controller_name' => 'AccommodationFormController',

            'AccommodationForm' =>  $form->createView()
        ]);
    }
}
