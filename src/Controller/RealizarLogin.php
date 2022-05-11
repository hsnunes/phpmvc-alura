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
            $_SESSION['tipo_mensagem'] = 'danger';
            $_SESSION['mensagem'] = "Email invalido!";
            header('Location: /login');
            exit;
        }

        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

        // Pegar usuario no banco com repository
        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuario->findOneBy([
            'email' => $email
        ]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $_SESSION['tipo_mensagem'] = 'danger';
            $_SESSION['mensagem'] = 'Email ou Senha incorretos';
            header('Location: /login');
            return;
        }

        session_start();
        $_SESSION['logado'] = true;

        header('Location: /listar-cursos');

    }
    
}