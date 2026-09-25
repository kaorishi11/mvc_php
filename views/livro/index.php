<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="/MVC/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Biblioteca</h1>
    </div>
</header>

<main>
    <div class="container">

        <div class="topo">
            <h2>Livros</h2>
            <a href="/MVC/index.php?acao=criar" class="btn">Novo livro</a>
        </div>

        <form method="GET" action="/MVC/index.php" class="busca">
            <input type="hidden" name="acao" value="listar">

            <input
                type="text"
                name="busca"
                placeholder="Buscar por título ou autor"
                value="<?= htmlspecialchars($busca) ?>"
            >

            <button type="submit" class="btn">Buscar</button>
        </form>

        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Gênero</th>
                    <th>Ano</th>
                    <th>Quantidade</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($livros)): ?>

                    <tr>
                        <td colspan="8" class="vazio">
                            Nenhum livro encontrado.
                        </td>
                    </tr>

                <?php else: ?>

                    <?php foreach ($livros as $livro): ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($livro['id']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($livro['titulo']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($livro['autor']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($livro['genero']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($livro['ano_publicacao']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($livro['quantidade']) ?>
                            </td>

                            <td>
                                <?php if ($livro['quantidade'] == 0): ?>

                                    <span class="indisponivel">
                                        Indisponível
                                    </span>

                                <?php else: ?>

                                    <span class="disponivel">
                                        Disponível
                                    </span>

                                <?php endif; ?>
                            </td>

                            <td class="acoes">

                                <a href="/MVC/index.php?acao=editar&id=<?= htmlspecialchars($livro['id']) ?>">
                                    Editar
                                </a>

                                <a
                                    href="/MVC/index.php?acao=excluir&id=<?= htmlspecialchars($livro['id']) ?>"
                                    onclick="return confirm('Tem certeza que deseja excluir este livro?')"
                                >
                                    Excluir
                                </a>

                            </td>
                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>
            </tbody>
        </table>

    </div>
</main>

</body>
</html>