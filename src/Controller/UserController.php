<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="app_user_profile")
     */
    public function index()
    {
        return $this->render('user/profile.html.twig', [

        ]);
    }
}
