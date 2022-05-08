<?php

// require __DIR__ . '/../vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'];

switch ($pathInfo) {
    case '/listar-cursos':
        require 'listar-cursos.php';
        break;
    case '/novo-curso':
        require 'formulario-novo-curso.php';
        break;
        
    default:
        echo "Erro 404";
        break;
}
