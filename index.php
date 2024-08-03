<?php
include 'Controller/AlunoController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


/**
 * Switch que gere as rotas do sistema
 */
switch ($url) {
    case '/':
        AlunoController::index();
        break;

    case '/aluno':
        echo 'pagina aluno';
        break;

    case '/aluno/form':
        AlunoController::form();
        break;

    case '/aluno/form/save':
        AlunoController::save();
        break;

    case '/aluno/delete':
        AlunoController::delete();
        break;

    default:
        echo 'Erro 404';
        break;
}
