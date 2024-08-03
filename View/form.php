<?php
include 'includes/head.php';
?>
<form method="post" action="/aluno/form/save">
    <input type="hidden" name="id" value="<?= $model->id ?>">
    <input type="text" name="nome" value="<?= $model->nome ?>" placeholder="Nome">
    <input type="text" name="email" value="<?= $model->email ?>" placeholder="Email">
    <input type="text" name="telefone" value="<?= $model->telefone ?>" placeholder="Telefone">
    <input type="text" name="valor_mensalidade" value="<?= $model->valor_mensalidade ?>" placeholder="Valor da mensalidade">
    <input type="text" name="senha" value="<?= $model->senha ?>" placeholder="Senha">
    Situação
    <input type="checkbox" name="situacao" <?= $model->situacao == 1 ? 'checked' : ''?>>
    <input type="text" name="observacao" value="<?= $model->observacao ?>" placeholder="Observação">

    <input type="submit" value="Salvar" class="botao">
</form>
<?php
include 'includes/footer.php';
?>