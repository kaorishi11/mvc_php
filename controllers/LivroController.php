<?php

require_once __DIR__ . '/../models/Livro.php';

class LivroController
{
    private $livro;

    public function __construct()
    {
        $this->livro = new Livro();
    }

    public function index()
    {
        $busca = $_GET['busca'] ?? '';
        $livros = $this->livro->listar($busca);

        require __DIR__ . '/../views/livro/index.php';
    }

    public function criar()
    {
        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'] ?? '',
                'autor' => $_POST['autor'] ?? '',
                'genero' => $_POST['genero'] ?? '',
                'ano_publicacao' => $_POST['ano_publicacao'] ?? '',
                'quantidade' => $_POST['quantidade'] ?? 0
            ];

            $resultado = $this->livro->cadastrar($dados);

            if ($resultado === true) {
                header('Location: /MVC/');
                exit;
            }

            $erro = $resultado;
        }

        require __DIR__ . '/../views/livro/criar.php';
    }

    public function editar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: index.php');
            exit;
        }

        $livro = $this->livro->buscarPorId($id);

        if (!$livro) {
            header('Location: index.php');
            exit;
        }

        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'] ?? '',
                'autor' => $_POST['autor'] ?? '',
                'genero' => $_POST['genero'] ?? '',
                'ano_publicacao' => $_POST['ano_publicacao'] ?? '',
                'quantidade' => $_POST['quantidade'] ?? 0
            ];

            $resultado = $this->livro->editar($id, $dados);

            if ($resultado === true) {
                header('Location: index.php');
                exit;
            }

            $erro = $resultado;

            $livro = array_merge($livro, $dados);
        }

        require __DIR__ . '/../views/livro/editar.php';
    }

    public function excluir()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->livro->excluir($id);
        }

        header('Location: index.php');
        exit;
    }
}