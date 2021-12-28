<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityFormType;
use Doctrine\ORM\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ActivityFormController extends AbstractController
{
    /**
     * @Route("/activity/form", name="activity_form")
     */
    public function index(Request $request)
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityFormType::class, $activity);

        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){

           $activity->setUserId($this->getUser());
           $activity->setType(1);

           $someNewFilename = uniqid(); 

           $directory = '../public/uploads';

            $file = $form['main_picture']->getData();
            $extension = $file->guessExtension();

            if (!$extension) {
                $extension = 'bin';
            }
            $file->move($directory, $someNewFilename.'.'.$extension);

            $activity->setMainPicture($someNewFilename.'.'.$extension);

            $em = $this->getDoctrine()->getManager();

            $em ->persist($activity);

            $em ->flush();

            return $this->redirectToRoute('voyage_form'); 


        }

        return $this->render('activity_form/index.html.twig', [
            'controller_name' => 'ActivityFormController',
            'navbartitle' => true,
            'nav' => true,
            'ActivityForm' =>  $form->createView()
        ]);
    }
      
}
