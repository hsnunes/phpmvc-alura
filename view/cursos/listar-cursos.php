<?php require __DIR__ . '/../inicio-html.php'; ?>
    <a href="/novo-curso" class="btn btn-primary mb-2">Novo Curso</a>

    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $curso->getDescricao(); ?>
                <div>
                <a href="/editar-curso?id=<?= $curso->getId(); ?>" class="btn btn-warning">Editar</a>
                <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger">Excluir</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require __DIR__ . '/../fim-html.php'; ?>
