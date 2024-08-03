<?php
class AlunoController
{
    /**
     * Exibe a página principal buscando todos os registros
     */
    public static function index()
    {
        include 'Model/AlunoModel.php';

        $model = new AlunoModel();
        
        $model->getAllRows();

        include 'View/lista.php';
    }

    /**
     * Exibe o formulário de cadastro e edição de registros
     */
    public static function form()
    {
        include 'Model/AlunoModel.php';

        $model = new AlunoModel();

        $model = $model->getById((int) $_GET['id']); // Faz o parse da string vinda do get para int e passa como parâmetro

        include 'View/form.php';
    }

    /**
     * Salva os dados do formulário de cadastro e edição e redireciona para página principal
     */
    public static function save()
    {
        include 'Model/AlunoModel.php';

        $model = new AlunoModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->telefone = $_POST['telefone'];
        $model->valor_mensalidade = $_POST['valor_mensalidade'];
        $model->senha = $_POST['senha'];
        $model->situacao = isset($_POST['situacao']) ? 1 : 0; //Verifica checkbox atribuindo 0 para desabilitado e 1 para habilitado
        $model->observacao = $_POST['observacao'];

        $model->save();

        header('Location: /');
    }

    /**
     * Deleta um registro e redireciona para página principal
     */
    public static function delete()
    {
        include 'Model/AlunoModel.php';

        $model = new AlunoModel();

        $model->delete((int) $_GET['id']); // Faz o parse da string vinda do get para int e passa como parâmetro

        header('Location: /');
    }
}
