<?php

namespace App\Controller;

use App\Service\mailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index(Request $request, mailerService $mailer, SessionInterface $session)
    {
        $data = json_decode($request->getContent(), true);

        $message = $data['message'];
        $captcha = $data['captcha'];

        // Si le nombre de caractere du message est plus petit que 2001 ET que le catcha est totalement egale
        if ((strlen($message) < 2001 && strlen($message) !== 0) && $captcha === $session->get('captcha')){
            // J'envois mon mail
            $mailer->sendMail(
                'Contact sur dg-web',
                strip_tags($message),
                "mailTemplate/mail.html.twig"
            );
        }   else {
            // Sinon je retourne mon message d'erreur
            return new Response('Un problème est survenu !');
        }

        $session->clear();
        return new Response('Le message a bien été envoyé !');
    }
}
