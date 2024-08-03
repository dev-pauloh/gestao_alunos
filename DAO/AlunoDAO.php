<?php
class AlunoDAO
{
    private $conexao;

    /**
     * Define a conexão com o bd no construtor
     */
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=escola';
        $this->conexao = new PDO($dsn, 'root', 'root');
    }

    public function insert(AlunoModel $model)
    {
        $sql = 'INSERT INTO alunos (nome, email, telefone, valor_mensalidade, senha, situacao, observacao) VALUES (?, ?, ?, ?, ?, ?, ?)';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->valor_mensalidade);
        $stmt->bindValue(5, $model->senha);
        $stmt->bindValue(6, $model->situacao);
        $stmt->bindValue(7, $model->observacao);

        $stmt->execute();
    }

    public function update(AlunoModel $model)
    {
        $sql = 'UPDATE alunos SET nome=?, email=?, telefone=?, valor_mensalidade=?, senha=?, situacao=?, observacao=? WHERE id=?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->valor_mensalidade);
        $stmt->bindValue(5, $model->senha);
        $stmt->bindValue(6, $model->situacao);
        $stmt->bindValue(7, $model->observacao);
        $stmt->bindValue(8, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = 'SELECT * FROM alunos';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once 'Model/AlunoModel.php';

        $sql = 'SELECT * FROM alunos WHERE id=?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject('AlunoModel');
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM alunos WHERE id=?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
