<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
// use Alura\Cursos\Controller\ControllerHtml;
use Alura\Cursos\Helper\RenderizadorHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

// ControllerHtml Substituido pela Trait
// class FormularioEdicao extends ControllerHtml implements InterfaceControladorRequisicao
class FormularioEdicao implements InterfaceControladorRequisicao
{
    use RenderizadorHtmlTrait;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $repositorioCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        // Pegar o id passado pela requisição
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // Valida o parametro passado, caso falso ou null vai para lista
        if ( is_null($id) || $id === false ) {
            header('Location: /listar-cursos', true, 301);
            return;
        }

        // Pegar os curso no repositorio
        $curso = $this->repositorioCursos->find($id);
        // $titulo = 'Editar Curso '. $curso->getDescricao();
        // Chamar a view
        // require __DIR__ . '/../../view/cursos/formulario.php';

        // Utilizando a Classe de controle do Html e dados
        echo $this->renderizaHtml('cursos/formulario.php', [
            'curso' => $curso,
            'titulo' => 'Editar Curso '. $curso->getDescricao()
        ]);


    }
}