<?php
$title = 'Início';
$css = 'inicio.css';
include "../components/head.php";
?>

<form action="" method="post">
    <fieldset>
        <legend>Nova tarefa</legend>

        <datalist id='categorias'>
            <option value="Teste">Teste</option>
        </datalist>
        <label for="categoria">Categoria</label>
        <input type="text" id="categoria" autocomplete="on" list="categorias"><br>

        <label for="nova_tarefa">Título: </label>
        <input type="text" id="nova_tarefa"><br>

        <label for="data_tarefa">Data: </label>
        <input type="date" value="<?= date('Y-m-d') ?>"><br>

        <label for="conclusao_ate">Data de conclusão: </label>
        <input type="date" id="conclusao_ate"><br>

        <input type="submit">
    </fieldset>
</form>

<ul id="tarefas">

</ul>

<?php
include "../components/footer.php"
    ?>