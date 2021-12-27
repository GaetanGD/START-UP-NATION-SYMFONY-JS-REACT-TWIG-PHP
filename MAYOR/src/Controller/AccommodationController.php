<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activity;
use App\Form\AccommodationFormType;

class AccommodationController extends AbstractController
{
    /**
 * @Route("/home", name="home")
 */
 #public function eventHomeAction()
#{
    // ...
#}

    /**
     * @Route("/accommodationdetails/{id}", name="accommodation")
     */
    public function index($id): Response
    {
        $em = $this->getDoctrine();

        $accommodation = $em ->getRepository(Activity::class)->findOneById($id);
        $accommodationFormType = new AccommodationFormType();

        return $this->render('accommodation/index.html.twig', [
            'Accommodation' => $accommodation,
           'accommodationForm' => $accommodationFormType
        ]);
    }
}
