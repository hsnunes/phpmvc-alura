<?php

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

require __DIR__ . '/../vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if ( !array_key_exists($pathInfo, $routes) ) {
    http_response_code(404);
    exit();
}

// Recebe o valor da key passado pela rota, trazendo o nome da classe
$classeControladora = $routes[$pathInfo];
// instancia a classe controladora
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classeControladora();
$controlador->processaRequisicao();
