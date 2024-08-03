<?php
class AlunoModel
{
    public $id, $nome, $email, $telefone, $valor_mensalidade, $senha, $situacao, $observacao;
    public $rows;

    /**
     * Trata os dados do formulário e envia para o DAO
     */
    public function save()
    {
        include 'DAO/AlunoDAO.php';

        $dao = new AlunoDAO();

        //Verifica se o atributo id está vazio para definir insert ou update
        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            //Substitui campos vazios do formulário pelos dados já existentes no bd
            $bdValue = $this->getById($this->id);

            $this->nome = $this->nome ?? $bdValue->nome;
            $this->email = $this->email ?? $bdValue->email;
            $this->telefone = $this->telefone ?? $bdValue->telefone;
            $this->valor_mensalidade = $this->valor_mensalidade ?? $bdValue->valor_mensalidade;
            $this->senha = $this->senha ?? $bdValue->senha;
            $this->observacao = $this->observacao ?? $bdValue->observacao;

            $dao->update($this);
        }
    }

    /**
     * Envia todos os registros a serem listados para o DAO
     */
    public function getAllRows()
    {
        include 'DAO/AlunoDAO.php';

        $dao = new AlunoDAO();

        $this->rows = $dao->select();
    }

    /**
     * Envia o registro a ser buscado para DAO 
     * @param int $id
     * @return DAO
     */
    public function getById(int $id)
    {
        include_once 'DAO/AlunoDAO.php';

        $dao = new AlunoDAO();

        return $dao->selectById($id);
    }

    /**
     * Envia o registro a ser deletado para o DAO
     * @param int $id
     * @return DAO
     */
    public function delete(int $id)
    {
        include 'DAO/AlunoDAO.php';

        $dao = new AlunoDAO();

        return $dao->delete($id);
    }
}
