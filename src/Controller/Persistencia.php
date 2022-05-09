<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        // Pegar dados do form
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Pegar o id passado pela requisição
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // Valida o parametro passado, caso falso ou null vai para lista
        if ( !is_null($id) && $id !== false ) {
            $curso = $this->entityManager->find(Curso::class, $id);
            $curso->setDescricao($descricao);
            // $this->entityManager->merge($curso);
        } else {
            // Montar modelo curso
            $curso = new Curso();
            $curso->setDescricao($descricao);
            // Inserir os dados no banco
            $this->entityManager->persist($curso);            
        }
        $this->entityManager->flush();

        header('Location: /listar-cursos', true, 302);
        
    }
    
}