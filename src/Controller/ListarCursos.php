<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Controller\ControllerHtml;
use Alura\Cursos\Helper\RenderizadorHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

// class ListarCursos extends ControllerHtml implements InterfaceControladorRequisicao
class ListarCursos implements InterfaceControladorRequisicao
{

    use RenderizadorHtmlTrait;

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $cursos = $this->repositorioDeCursos->findAll();
        // $titulo = 'Lista de Cursos';
        // require __DIR__ . '/../../view/cursos/listar-cursos.php';

        // Método tbm da Trait RenderizdorHtml
        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos' => $cursos,
            'titulo' => 'Lista de Cursos'
        ]);
    }
}