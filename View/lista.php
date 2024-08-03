<?php
include 'includes/head.php';
?>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Observação</th>
            <th>Situação</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model->rows as $key => $item) :?>
        <tr>
            <td class="container-content-item">
                <a href="/aluno/form?id=<?= $item->id ?>"><?= $item->nome;?></a> 
            </td>
            <td class="container-content-item"><?= $item->observacao;?></td>
            <td class="container-content-item">
                <form id="form_<?= $item->id ?>" method="post" action="/aluno/form/save" onclick="document.getElementById('form_<?= $item->id ?>').submit()">
                    <input type="hidden" name="id" value="<?= $item->id ?>">    
                    <input type="checkbox" name="situacao" <?= $item->situacao == 1 ? 'checked' : ''?>>
                </form>
            </td>
            <td><a href="/aluno/delete?id=<?= $item->id ?>">Excluir</a></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?php
include 'includes/footer.php';
?>