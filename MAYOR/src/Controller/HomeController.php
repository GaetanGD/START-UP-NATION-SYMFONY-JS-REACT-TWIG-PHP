<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Entity\Activity;
use App\Entity\TravelActivity;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(TravelRepository $travelRepository): Response
    {
        $travels = $travelRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'travels' => $travels,
            'navbartitle' => true,
            'searchnavbar' => true,
            'nav' => true
        ]);
    }


    /**
     * @Route("/travel/search/{query}", name="travelsearch", methods={"GET"})
     */
    public function search($query, TravelRepository $travelRepository)
    {
        $travel = $travelRepository->FindTravel($query);
        return new JsonResponse($travel);
    }

    /**
     * @Route("/travel/{travel}", name="travelfiche")
     */
    public function fiche(Travel $travel, TravelRepository $travelRepository)
    {
        $em =$this->getDoctrine()->getManager();

        $tabIdRestauration = array();
        $tabRestauration = $em->getRepository(TravelActivity::class)->findBy(['travel_id' => $travel->getId()]);
        foreach($tabRestauration as $row){
            array_push($tabIdRestauration, $row->getActivityId());
        }
        $restaurationSave = $em->getRepository(Activity::class)->findBy(['id' => $tabIdRestauration, 'type'=> 3]);
        
        $tabIdActivity = array();
        $tabActivity = $em->getRepository(TravelActivity::class)->findBy(['travel_id' => $travel->getId()]);
        foreach($tabActivity as $row){
            array_push($tabIdActivity, $row->getActivityId());
        }
        $activitySave = $em->getRepository(Activity::class)->findBy(['id' => $tabIdActivity, 'type'=> 1]);

        $tabIdHebergement = array();
        $tabHebergement = $em->getRepository(TravelActivity::class)->findBy(['travel_id' => $travel->getId()]);
        foreach($tabHebergement as $row){
            array_push($tabIdHebergement, $row->getActivityId());
        }
        $hebergementSave = $em->getRepository(Activity::class)->findBy(['id' => $tabIdHebergement, 'type'=> 2]);

        return $this->render('home/fiche.html.twig' , [
            'travel' => $travel,
            "restaurationSave" => $restaurationSave,
            "activitySave" => $activitySave,
            "hebergementSave" => $hebergementSave,
            'navbartitle' => true,
            'nav' => true
        ]);
    }
}
