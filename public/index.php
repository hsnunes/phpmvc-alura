<?php

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;

require __DIR__ . '/../vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'];

switch ($pathInfo) {
    case '/listar-cursos':
        $controlador = new ListarCursos();
        $controlador->processaRequisicao();
        break;
    case '/novo-curso':
        $controlador = new FormularioInsercao();
        $controlador->processaRequisicao();
        break;
        
    default:
        echo "Erro 404";
        break;
}
