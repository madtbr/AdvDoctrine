<?php

namespace App\Service;

class Mensagem
{
    public function escreverMensagem()
    {
        $mensagem = $this->get('mensagem');
        return $mensagem;
    }
}