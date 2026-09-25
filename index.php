<?php

require_once __DIR__ . '/controllers/LivroController.php';

$controller = new LivroController();

$acao = $_GET['acao'] ?? 'listar';

switch ($acao) {
    case 'criar':
        $controller->criar();
        break;

    case 'editar':
        $controller->editar();
        break;

    case 'excluir':
        $controller->excluir();
        break;

    default:
        $controller->index();
        break;
}