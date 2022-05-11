<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Exclusao implements InterfaceControladorRequisicao
{
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        // Pegar o id passado pela requisição
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // Valida o parametro passado, caso falso ou null vai para lista
        if ( is_null($id) || $id === false ) {
            $_SESSION['mensagem'] = 'Curso Desconhecido!';
            $_SESSION['tipo_mensagem'] = 'danger';
            header('Location: /listar-cursos', true, 301);
            return;
        }

        // Pegar a referencia do curso com o EntityManager e o ID
        $curso = $this->entityManager->getReference(Curso::class, $id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        $_SESSION['mensagem'] = 'Curso Excluido com sucesso!';
        $_SESSION['tipo_mensagem'] = 'info';
        header('Location: /listar-cursos');

    }
}