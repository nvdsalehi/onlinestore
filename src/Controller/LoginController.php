<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{
    /**
     * @Route("/api/login", name="app_api_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function loginApi()
    {
        return new JsonResponse('');
    }

    /**
     * @Route("/api/logout", name="app_api_logout")
     */
    public function logoutApi()
    {
        return new JsonResponse();
    }

    /**
     * @Route("/api/user")
     * @param Security $security
     * @return JsonResponse
     */
    public function getUserApi(Security $security)
    {
        $user = $security->getUser();
        return new JsonResponse(['username' => $user->getUsername(), 'password' => $user->getPassword()]);
    }

    /**
     * @Route("/login", name="app_login")
     * @return Response
     */
    public function loginPage()
    {
        return $this->render('login/index.html.twig');
    }


}
