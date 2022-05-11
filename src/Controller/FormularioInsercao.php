<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\ControllerHtml;
use Alura\Cursos\Helper\RenderizadorHtmlTrait;

class FormularioInsercao implements InterfaceControladorRequisicao
{

    use RenderizadorHtmlTrait;

    public function processaRequisicao(): void
    {
        // $titulo = 'Novo Curso';
        // require __DIR__ . '/../../view/cursos/formulario.php';

        // Utilizando a Classe para renderizar o template e os dados
        echo $this->renderizaHtml('cursos/formulario.php', [
            'titulo' => 'Novo Curso'
        ]);
    }
}