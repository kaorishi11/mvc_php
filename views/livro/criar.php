<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="/MVC/css/style.css">
</head>
<body>

<h1>Cadastrar Livro</h1>

<?php if ($erro): ?>
    <p><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST">

    <label>Título:</label>
    <input type="text" name="titulo" required>

    <br><br>

    <label>Autor:</label>
    <input type="text" name="autor" required>

    <br><br>

    <label>Gênero:</label>
    <input type="text" name="genero">

    <br><br>

    <label>Ano de publicação:</label>
    <input type="number" name="ano_publicacao">

    <br><br>

    <label>Quantidade de exemplares:</label>
    <input type="number" name="quantidade" min="0" value="0">

    <br><br>

    <button type="submit">Cadastrar</button>

</form>

<br>

<a href="index.php">Voltar</a>

</body>
</html>