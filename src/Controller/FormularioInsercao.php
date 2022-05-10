<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\ControllerHtml;

class FormularioInsercao extends ControllerHtml implements InterfaceControladorRequisicao
{
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