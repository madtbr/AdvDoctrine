<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionController extends AbstractController
{
    /**
     * @Route("/session", name="session")
     */
    public function index(SessionInterface $session)
    {
       $session->set('frase', 'Luke, eu sou seu pai');
       exit;

    }
}
