<?php

namespace App\Controller;

use App\Entity\User;
use http\Client\Request;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Response;
use App\Form\Type\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

class UserController extends AbstractController
{
    /**
     * @Route("/user/register", name="register_user")
     *
     * @param Environment $twig
     */

    public function registerUserPage(Environment $twig, Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return new Response('Saved new user named: '. $user->getUserName());
        } else {
            $form = $form->createView();
            return new Response($twig->render('user/register_user.html.twig',
                ['form' => $form]));
        }
    }
}