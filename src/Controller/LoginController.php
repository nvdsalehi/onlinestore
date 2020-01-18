<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{
    /**
     * @Route("/api/login", name="app_api_login")
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
        return $this->json($user, 200, [],['groups' => ['main']]);
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
