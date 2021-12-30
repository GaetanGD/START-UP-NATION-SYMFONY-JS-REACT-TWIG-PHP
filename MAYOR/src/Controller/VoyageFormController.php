<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\VoyageFormType;
use App\Entity\Travel;
use App\Entity\TravelActivity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VoyageFormController extends AbstractController
{
    /**
     * @Route("/voyage/form", name="voyage_form")
     */
    public function index(Request $request): Response
    {
        $travel = new Travel();
        $form = $this->createForm(VoyageFormType::class, $travel);
        $form->handleRequest($request);

        $em =$this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $travel->setUserId($this->getUser());
            $someNewFilename = uniqid(); 
            
            $directory = 'uploads';

            $file = $form['main_picture']->getData();
            $extension = $file->guessExtension();
    
            if (!$extension) {
                $extension = 'bin';
            }
            $file->move($directory, $someNewFilename.'.'.$extension);

            $travel->setMainPicture($someNewFilename.'.'.$extension);

            $em->persist($travel);
            $em->flush();
            
            return $this->redirectToRoute('voyage_form_add_activities', array('travel' => $travel->getId()));
  
        }else{
            return $this->render('voyage_form/index.html.twig', [
                'controller_name' => 'VoyageFormController',
                'VoyageForm' =>  $form->createView(),
                'navbartitle' => true,
                'nav' => true
            ]);
        }

        
    }

    /**
     * @Route("/voyage/form/add-activities/{travel}", name="voyage_form_add_activities")
     */
    
    public function addActivites(Request $request, Travel $travel): Response
    {
        $form = $this->createForm(VoyageFormType::class, $travel);
        $form->handleRequest($request);

        $em =$this->getDoctrine()->getManager();

        // selection des données en fonction de l'activité
        $activities = $em->getRepository(Activity::class)->findBy(['type'=>1]);
        $hebergements = $em->getRepository(Activity::class)->findBy(['type'=>2]);
        $restaurations = $em->getRepository(Activity::class)->findBy(['type'=>3]);

        // affichage des activité selectionées
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

        // validation du formulaire et du fichier photo
        if ($form->isSubmitted() && $form->isValid()) {

            $travel->setUserId($this->getUser());
            $someNewFilename = uniqid(); 
            
            $directory = 'uploads';

            $file = $form['main_picture']->getData();
            $extension = $file->guessExtension();
    
            if (!$extension) {
                $extension = 'bin';
            }
            $file->move($directory, $someNewFilename.'.'.$extension);

            $travel->setMainPicture($someNewFilename.'.'.$extension);

            $em->persist($travel);
            $em->flush();
            

        }

        return $this->render('voyage_form/add_activities.html.twig', [
            'controller_name' => 'VoyageFormController',
            'VoyageForm' =>  $form->createView(),
            "activities" => $activities,
            "hebergements" => $hebergements,
            "restaurations" => $restaurations,
            "travel" => $travel,
            "restaurationSave" => $restaurationSave,
            "activitySave" => $activitySave,
            "hebergementSave" => $hebergementSave,
            'navbartitle' => true,
            'nav' => true
        ]);

    }

    /**
     * @Route("/voyage/form/add-activities-save/{travel}/{activity}", name="voyage_form_add_activities_save", methods={"GET"})
     */
    
    public function addActivitesSave(Request $request, Travel $travel, Activity $activity)
    {

        $em =$this->getDoctrine()->getManager();

        $travelActivity = new TravelActivity();

        $travelActivity->setActivityId($activity->getId());
        $travelActivity->setTravelId($travel->getId());
        $em->persist($travelActivity);
        $em->flush();

        return $this->redirectToRoute('voyage_form_add_activities', array('travel' => $travel->getId()));

    }

    /**
     * @Route("/voyage/form/add-activities-sup/{travel}/{activity}", name="voyage_form_sup_activities_save", methods={"GET"})
     */
    
    public function supActivitesSave(Request $request, Travel $travel, Activity $activity)
    {

        $em =$this->getDoctrine();

        $travelActivity = $em->getRepository(TravelActivity::class)->find(['travel_id' => $travel->getId(), 'activity_id' => $activity->getId()]);

        $em->getManager()->remove($travelActivity);
        $em->getManager()->flush();

        return $this->redirectToRoute('voyage_form_add_activities', array('travel' => $travel->getId(), 'activity_id' => $activity->getId()));

    }

    /**
     * @Route("/voyage/backpack", name="backpack")
     */
    public function backpack(Request $request): Response
    {
        $em = $this->getDoctrine();

        $travel = $em ->getRepository(Travel::class)->findBy([
            'user_id' => $this -> getUser() -> getID() 
        ]);

        return $this->render('voyage_form/backpack.html.twig', [
            'controller_name' => 'HomeController',
            'navbartitle' => true,
            'nav' => true,
            'Travel' => $travel,
            
        ]);
        

        
    }

}
