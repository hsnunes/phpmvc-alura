<?php require __DIR__ . '/../inicio-html.php'; ?>

    <form action="/realiza-login" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" id="email" class="form-control" type="email">
        </div>
        <div>
            <label for="senha">Senha</label>
            <input name="senha" id="senha" class="form-control" type="password">
        </div>
        <button class="btn btn-primary">Entrar</button>

    </form>

<?php require __DIR__ . '/../fim-html.php'; ?>