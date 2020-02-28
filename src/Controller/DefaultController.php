<?php


namespace App\Controller;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em)
    {
        $users = $em->getRepository(User::class)->findAll();
        return $this->render('base.html.twig');
    }

    /**
     *
     * @Route("/email", name="app_email")
     */
    public function sendTestEmail(MailerInterface $mailer)
    {
        $email = new Email();
        $email->to('nvdsalehi@gmail.com')
            ->from('me@example.com')
            ->text('Hi this is test mail');

        $mailer->send($email);

        return new Response('down');
    }

}