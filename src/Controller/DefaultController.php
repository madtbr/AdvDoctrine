<?php

namespace App\Controller;

use App\Service\Mensagem;
use Psr\Log\LoggerInterface;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
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
        //$session->remove('frase');
        echo $session->get('frase');
        //echo $session->get('frase','nooooooooooooooo');exit;
    }
     /**
     * @Route("/escrever-msg")
     * Mensagem $mensagem
     */
    public function escreverMensagem()
    {
        $mensagem = $this->get('mensagem');
        echo $mensagem->escreverMensagem();
        //nao esquecer de dar o exit pra n dar erro
        
        exit;
    }
 /**
     * @Route("/email")
     *
     */
    public function email(\Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Symfony 4'))
            ->setFrom('noreplay@email.com')
            ->setTo(['madtbr@gmail.com' => "School of Net"])
            ->setBody($this->renderView('default/index.html.twig', [
                'controller_name' => "DefaultController",
            ]), 'text/html');
            $mailer->send($message);
        return new Response("Enviado!");
    }

    /**
     * @Route("/logger")
     */
    public function logger(LoggerInterface $logger){
        $logger->info('somente uma informação');
        $logger->error('deu erro em alguma coisa');
        $logger->critical("erro critico", ['motivo' => "erro no sistema!"]);
        return new Response('logger executado!');
    }

    /**
     * @Route("/filesystem")
     */
    public function filesystem()
    {
        $fs = new Filesystem();
        $dir = $this->getParameter('kernel.project_dir');
        $fs->mkdir($dir . '/teste');
        $fs->touch($dir. '/teste/fs.txt');
        return new Response('File System');
    }
    /**
     * @Route("/oi")
     */
    public function oi()
    {
        return new Response('oi');
    }

}
