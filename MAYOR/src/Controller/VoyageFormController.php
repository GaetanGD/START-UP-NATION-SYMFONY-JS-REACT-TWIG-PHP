<?php

namespace App\Controller;

use App\Form\VoyageFormType;
use App\Entity\Travel;
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

        if ($form->isSubmitted() && $form->isValid()) {

            $someNewFilename = uniqid(); 
            
            $directory = '/public/uploads';

            $file = $form['main_picture']->getData();
            $extension = $file->guessExtension();
    
            if (!$extension) {
                $extension = 'bin';
            }
            $file->move($directory, $someNewFilename.'.'.$extension);

            $travel->setMainPicture($someNewFilename.'.'.$extension);

            $em =$this->getDoctrine()->getManager();
            $em->persist($travel);
            $em->flush();
    
        }

        return $this->render('voyage_form/index.html.twig', [
            'controller_name' => 'VoyageFormController',
            'VoyageForm' =>  $form->createView()
        ]);
    }
}
