<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/user/register", name="register_user")
     *
     * @param Environment $twig
     */

    public function registerUserPage(Environment $twig, Request $request) : Response {
        $user = new User();
        $form = $this->createFormBuilder($user);
        $form->add('first_name', TextType::class);
        $form->add('last_name', TextType::class);
        $form->add('username', TextType::class);
        $form->add('email', TextType::class);
        $form->add('phone', TextType::class);
        $form->add('password', TextType::class);
        $form = $form->getForm();
        $form = $form->createView();

        return new Response($twig->render('user/register_user.html.twig', ['form' => $form]));
    }
}