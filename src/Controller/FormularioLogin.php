<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\ControllerHtml;

class FormularioLogin extends ControllerHtml implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login'
        ]);
    }
}