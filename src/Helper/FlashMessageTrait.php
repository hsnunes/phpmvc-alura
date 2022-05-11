<?php

namespace Alura\Cursos\Helper;

/**
 * FlashMessage
 */
trait FlashMessageTrait
{
    // Centralizando as mensagem e prevenindo que nada possa sair errado
    public function defineMensagem(string $mensagem, string $tipo): void
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
    }
}
