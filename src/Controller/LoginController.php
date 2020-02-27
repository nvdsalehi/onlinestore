<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
     * @Route("/logout", name="app_logout")
     */
    public function logoutApi()
    {
        return new JsonResponse();
    }

    /**
     * @Route("/api/user")
     * @param Security $security
     * @IsGranted("ROLE_USER")
     * @return JsonResponse
     */
    public function getUserApi(Security $security)
    {
        $user = $security->getUser();
        return $this->json($user, 200, [],['groups' => ['main']]);
    }

    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function loginPage(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }


}
