<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityFormType;
use Doctrine\ORM\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityFormController extends AbstractController
{
    /**
     * @Route("/activity/form", name="activity_form")
     */
    public function index(): Response
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityFormType::class, $activity);

        return $this->render('activity_form/index.html.twig', [
            'controller_name' => 'ActivityFormController',

            'ActivityForm' =>  $form->createView()
        ]);
    }
}
