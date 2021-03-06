<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Survey2Type;
use App\Form\Survey3Type;
use App\Form\Survey4Type;
use App\Form\Survey5Type;
use App\Form\Survey6Type;
use App\Form\Survey7Type;
use App\Form\Survey8Type;
use App\Form\Survey9Type;
use App\Form\Survey10Type;
use App\Form\Survey11Type;
use App\Form\Survey12Type;
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
    public function index(): Response
    {
 
        if($this->getUser()==null){
            return $this->redirectToRoute('app_login');
        }
        return $this->render('survey/index.html.twig', [
            'controller_name' => 'SurveyController',
        ]);
    }

    /**
     * @Route("/survey/question1", name="surveyquestion1")
     */ 

    public function showQuestion1(Request $request, UserInterface $user): Response
    {
// https://blog.netinfluence.ch/2019/04/12/recuperer-plus-simplement-lutilisateur-dans-un-controleur-symfony/ se base sur le user name faudra à l'addapter à l'id et modifier les id déjà ajouté
        //$id = $user->getId();
        $em = $this->getDoctrine();

        $user = $em->getRepository(User::class)->find($user->getId());

        $form = $this->createForm(Survey3Type::class, $user);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('surveyquestion2');
        }

        return $this->render('/survey/question1.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/survey/question2", name="surveyquestion2")
    */

    public function showQuestion2(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $user = $em->getRepository(User::class)->findOneById($id);

        $form = $this->createForm(Survey4Type::class, $user);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {

            $em->getManager()->flush();

            return $this->redirect($this->generateUrl('surveyquestion3'));
        }

        return $this->render('/survey/question2.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/survey/question3", name="surveyquestion3")
    */

    public function showQuestion3(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question3 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey5Type::class, $question3);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion4'));
        }

        return $this->render('/survey/question3.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
    * @Route("/survey/question4", name="surveyquestion4")
    */

    public function showQuestion4(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question4 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey6Type::class, $question4);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion5'));
        }

        return $this->render('/survey/question4.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
    * @Route("/survey/question5", name="surveyquestion5")
    */

    public function showQuestion5(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question5 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey7Type::class, $question5);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion6'));
        }

        return $this->render('/survey/question5.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/survey/question6", name="surveyquestion6")
    */

    public function showQuestion6(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question6 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey8Type::class, $question6);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion7'));
        }

        return $this->render('/survey/question6.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/survey/question7", name="surveyquestion7")
    */

    public function showQuestion7(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question7 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey9Type::class, $question7);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion8'));
        }

        return $this->render('/survey/question7.html.twig', [
            'form' => $form->createView()
        ]);
    }

        /**
    * @Route("/survey/question8", name="surveyquestion8")
    */

    public function showQuestion8(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question8 = $em->getRepository(User::class)->find($id);
        
        $form = $this->createForm(Survey10Type::class, $question8);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion9'));
        }

        return $this->render('/survey/question8.html.twig', [
            'form' => $form->createView()
        ]);
    }

        /**
    * @Route("/survey/question9", name="surveyquestion9")
    */

    public function showQuestion9(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question9 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey11Type::class, $question9);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('surveyquestion10'));
        }

        return $this->render('/survey/question9.html.twig', [
            'form' => $form->createView()
        ]);
    }

        /**
    * @Route("/survey/question10", name="surveyquestion10")
    */

    public function showQuestion10(Request $request, UserInterface $user): Response
    {

        $id = $user->getId();
        $em = $this->getDoctrine();

        $question10 = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(Survey12Type::class, $question10);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render('/survey/question10.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
