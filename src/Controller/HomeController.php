<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function indexHome()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/login", name="app_login")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function indexLoginPage ()
    {
        return $this->render('security/login.html.twig', [
            'controller_name' => 'LOGIN',
        ]);
    }
}
