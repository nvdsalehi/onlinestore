<?php


namespace App\Controller;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(EntityManagerInterface $em)
    {
        $users = $em->getRepository(User::class)->findAll();
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/test2")
     */
    public function test(){
        return new JsonResponse(['navid' => 1, 'ali' => 2]);
    }
}