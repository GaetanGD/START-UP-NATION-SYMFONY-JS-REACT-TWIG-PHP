<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\VoyageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyageController extends AbstractController
{
    /**
     * @Route("/voyage", name="voyage")
     */
    public function voyage(): Response
    {
        $activity = new Activity();
        $form = $this->createForm(VoyageType::class, $activity);

        return $this->render('voyage/voyage.html.twig', [
            'form' =>  $form->createView()
        ]);
    }
}
