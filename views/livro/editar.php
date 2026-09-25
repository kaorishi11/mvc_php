<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="/MVC/css/style.css">
</head>
<body>

<h1>Editar Livro</h1>

<?php if ($erro): ?>
    <p><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST">

    <label>Título:</label>
    <input
        type="text"
        name="titulo"
        value="<?= htmlspecialchars($livro['titulo']) ?>"
        required
    >

    <br><br>

    <label>Autor:</label>
    <input
        type="text"
        name="autor"
        value="<?= htmlspecialchars($livro['autor']) ?>"
        required
    >

    <br><br>

    <label>Gênero:</label>
    <input
        type="text"
        name="genero"
        value="<?= htmlspecialchars($livro['genero']) ?>"
    >

    <br><br>

    <label>Ano de publicação:</label>
    <input
        type="number"
        name="ano_publicacao"
        value="<?= htmlspecialchars($livro['ano_publicacao']) ?>"
    >

    <br><br>

    <label>Quantidade de exemplares:</label>
    <input
        type="number"
        name="quantidade"
        min="0"
        value="<?= htmlspecialchars($livro['quantidade']) ?>"
    >

    <br><br>

    <button type="submit">Salvar alterações</button>

</form>

<br>

<a href="index.php">Voltar</a>

</body>
</html>