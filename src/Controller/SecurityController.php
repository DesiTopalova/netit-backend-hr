<?php

namespace App\Controller;

use App\Form\LoginType;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
       //  if ($this->getUser()) {
           // return $this->redirectToRoute('login_page');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $email = $authenticationUtils->getLastUsername();
        //$email = $authenticationUtils->getLastUsername();
        //$form = $this->createForm(LoginType::class);


        return $this->render('security/login.html.twig', [
            '_username' => $email,
            'error'         => $error,
            //'form'          => $form->createView(),
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
