<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignUpFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logoutApi()
    {
        return new JsonResponse();
    }


    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function loginPage(AuthenticationUtils $authenticationUtils)
    {
        $user = $this->getUser();
        if($user){
           return new RedirectResponse($this->generateUrl('app_user_profile'));
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('auth/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("signup", name="app_signup")
     */
    public function signUpPage(Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $user = $this->getUser();
        if($user){
            return new RedirectResponse($this->generateUrl('app_user_profile'));
        }

        $form = $this->createForm(SignUpFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /** @var User $user */
            $user = $form->getData();
            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $form['plainPassword']->getData()
            ));
            dd($user);

        }

        return $this->render('auth/signup.html.twig', [
            'signUpForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/test", name="app_admin_test")
     * @return Response
     */
    public function adminTest()
    {
        return new Response('<h1>hi</h1>');
    }


}
