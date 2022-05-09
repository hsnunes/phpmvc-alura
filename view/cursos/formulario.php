
<?php require __DIR__ . '/../inicio-html.php'; ?>

    <form action="/salvar-curso<?= isset($curso) ? '?id='.$curso->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input name="descricao"
                 id="descricao" 
                 type="text" 
                 type="text" 
                 class="form-control" 
                 value="<?= isset($curso) ? $curso->getDescricao(): ''; ?>"
            >
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>

<?php require __DIR__ . '/../fim-html.php'; ?>