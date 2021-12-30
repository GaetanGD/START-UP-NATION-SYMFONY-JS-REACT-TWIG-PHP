<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activity;
use App\Form\ActivityFormType;


class ActivityController extends AbstractController
{
    /**
     * @Route("/activitydetails/{id}", name="activity")
     */
    public function index($id): Response
    {
        $em = $this->getDoctrine();

        $activity = $em ->getRepository(Activity::class)->findOneById($id);
        $activityFormType = new ActivityFormType();


        return $this->render('activity/index.html.twig', [
           'Activity' => $activity,
           'activityForm' => $activityFormType,
        ]);
    }
   
    /**
     * @Route("/activity-integration", name="activity-integration")
     */
    public function activityIntégration(): Response
    {

        return $this->render('activity/activity_intégration.html.twig');
    }

}
