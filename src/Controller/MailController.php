<?php

namespace App\Controller;

use App\Service\mailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index(Request $request, mailerService $mailer)
    {
        $data = json_decode($request->getContent(), true);

        $message = $data['message'];
        $captcha = $data['captcha'];

        // J'envois mon mail
        $mailer->sendMail(
            'Contact sur dg-web',
            strip_tags($message),
            "mailTemplate/mail.html.twig"
        );


        return new Response($message);
    }
}
