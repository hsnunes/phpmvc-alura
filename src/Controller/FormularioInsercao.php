<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao
{
    public function processaRequisicao()
    {
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <title>Gerência de Cursos - Novo Curso</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Novo Curso</h1>
            </div>

            <form action="">
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input name="descricao" id="descricao" type="text" type="text" class="form-control">
                </div>
                <button class="btn btn-primary">Salvar</button>
            </form>

        </div>
        </body>
        </html>
        <?php
    }
}