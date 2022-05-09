<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao implements InterfaceControladorRequisicao
{
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
        $titulo = 'Editar Curso '. $curso->getDescricao();
        // Chamar a view
        require __DIR__ . '/../../view/cursos/formulario.php';


    }
}