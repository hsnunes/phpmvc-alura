<?php

namespace Alura\Cursos\Controller;

// Como nunca vai ser instanciada, fica como abstract
abstract class ControllerHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../../view/' . $caminhoTemplate;
        return ob_get_clean();
    }
}