<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{
    private $repositorioUsuario;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuario = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    { 
        // Pega o email com validação de input post
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        
        // Veirica o email
        if (is_null($email) || $email === false) {
            echo "Email invalido";
            exit;
        }

        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

        // Pegar usuario no banco com repository
        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuario->findOneBy([
            'email' => $email
        ]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            echo 'Email ou Senha incorretos';
            return;
        }

        header('Location: /listar-cursos');

    }
    
}