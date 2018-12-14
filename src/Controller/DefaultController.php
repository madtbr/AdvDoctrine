<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(SessionInterface $session)
    {
        $frase = $session->get('frase');
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'frase' => $frase
        ]);
    }
     /**
     * @Route("/pegar")
     */
    public function pegarSessao(SessionInterface $session)
    {
        $session->remove('frase');
        echo $session->get('frase','nooooooooooooooo');exit;
    }
}
