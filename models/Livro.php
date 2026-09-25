<?php

require_once __DIR__ . '/../config/Database.php';

class Livro
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function listar($busca = '')
    {
        if ($busca !== '') {
            $sql = "SELECT * FROM livros
                    WHERE titulo LIKE :busca
                    OR autor LIKE :busca
                    ORDER BY id DESC";

            $stmt = $this->conn->prepare($sql);
            $termo = "%{$busca}%";
            $stmt->bindParam(':busca', $termo);
        } else {
            $sql = "SELECT * FROM livros ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM livros WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function cadastrar($dados)
    {
        $erro = $this->validar($dados);

        if ($erro) {
            return $erro;
        }

        $sql = "INSERT INTO livros
                (titulo, autor, genero, ano_publicacao, quantidade)
                VALUES
                (:titulo, :autor, :genero, :ano_publicacao, :quantidade)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':titulo', $dados['titulo']);
        $stmt->bindParam(':autor', $dados['autor']);
        $stmt->bindParam(':genero', $dados['genero']);
        $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao'], PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function editar($id, $dados)
    {
        $erro = $this->validar($dados);

        if ($erro) {
            return $erro;
        }

        $sql = "UPDATE livros SET
                titulo = :titulo,
                autor = :autor,
                genero = :genero,
                ano_publicacao = :ano_publicacao,
                quantidade = :quantidade
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':titulo', $dados['titulo']);
        $stmt->bindParam(':autor', $dados['autor']);
        $stmt->bindParam(':genero', $dados['genero']);
        $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao'], PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM livros WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }

    private function validar($dados)
    {
        if (trim($dados['titulo']) === '') {
            return 'O título não pode ficar em branco.';
        }

        if (trim($dados['autor']) === '') {
            return 'O autor não pode ficar em branco.';
        }

        if ($dados['ano_publicacao'] !== '' && $dados['ano_publicacao'] > date('Y')) {
            return 'O ano de publicação não pode ser maior que o ano atual.';
        }

        if ($dados['quantidade'] < 0) {
            return 'A quantidade de exemplares não pode ser negativa.';
        }

        return false;
    }
}