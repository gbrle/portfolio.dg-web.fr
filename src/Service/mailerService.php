<?php

namespace App\Service;


use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class mailerService
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail($subject, $contentMail, $template)
    {
        $email = (new TemplatedEmail())
            ->from(new Address("david@dg-web.fr", "Dg Web"))
            ->to('david.gabriele@outlook.fr')
            ->subject($subject)
            ->htmlTemplate($template)
            ->context(['contentMail' => $contentMail]);

        $this->mailer->send($email);
    }

}