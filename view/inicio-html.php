<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerência de Cursos - Novo Curso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php if ( isset($_SESSION['logado']) ): ?>
<nav class="navbar navbar-dark bg-dark mb-2">
    <div class="container">
        <a href="/listar-cursos" class="navbar-brand">Home</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a href="/logout" class="nav-link">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<?php endif; ?>
    <div class="container">
        <div class="jumbotron">
            <h1><?= $titulo ?></h1>
        </div>
