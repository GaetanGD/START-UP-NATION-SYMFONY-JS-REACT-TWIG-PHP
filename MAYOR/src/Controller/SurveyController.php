<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class SurveyController extends AbstractController
{
    /**
     * @Route("/survey", name="survey")
     */
    public function index(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();

        return $this->render('survey/index.html.twig', [
            'controller_name' => 'SurveyController',
        ]);
    }

    /**
     * @Route("/survey/question1/{id}", name="surveyquestion1")
     */ 

    public function showQuestion1(Request $request, UserInterface $user): Response
    {
// https://blog.netinfluence.ch/2019/04/12/recuperer-plus-simplement-lutilisateur-dans-un-controleur-symfony/ se base sur le user name faudra à l'addapter à l'id et modifier les id déjà ajouté
        $id = $user->getId();
        $em = $this->getDoctrine();

        $question1 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(SurveyType::class, $question1);
        $form->handleRequest($request); 

        if($form-isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion2'));
        }

        return $this->render('/survey/question1.html.twig', [
            'form' => $form->createView()
        ]);
    }

        /**
     * @Route("/survey/question2/{id}", name="surveyquestion2")
     */

    public function showQuestion2(): Response
    {
        return $this->render('/survey/question1.html.twig', [
            'question1' => $question1,
        ]);
    }

}
