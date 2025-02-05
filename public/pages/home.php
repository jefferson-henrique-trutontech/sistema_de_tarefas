<?php
$title = 'Início';
$css = 'inicio.css';
include "../components/head.php";
include "../../classes/database.php";
include "../../classes/tarefas.php";

$tarefas = new Tarefas((new Database)->getConnection());
?>

<form action="../../routes/tarefas.php" method="post">
    <fieldset>
        <legend>Nova tarefa</legend>

        <datalist id='categorias'>
            <?php foreach ($tarefas->get_categorias() as $categoria): ?>
                <option value="<?= $categoria['nome'] ?>"></option>
            <?php endforeach ?>
        </datalist>
        <label for="categoria">Categoria: </label>
        <input type="text" id="categoria" name="categoria" autocomplete="off" list="categorias" required><br>

        <label for="nova_tarefa">Título: </label>
        <input type="text" id="nova_tarefa" name="titulo" autocomplete="off" required><br>

        <label for="data_tarefa">Data: </label>
        <input type="date" value="<?= date('Y-m-d') ?>" name="data" required><br>

        <label for="conclusao_ate">Data de conclusão: </label>
        <input type="date" id="conclusao_ate" name="data_conclusao"><br>

        <input type="submit">
    </fieldset>
</form>

<h2>Tarefas</h2>
<?php foreach ($tarefas->get_categorias() as $categoria): ?>
    <h3><?= $categoria['nome'] ?></h3>

    <ul>
        <li class="header">
            <span>Título</span>
            <span>Data</span>
            <span>Data de conclusão</span>
        </li>
        <?php foreach ($tarefas->get_tarefas() as $tarefa): ?>

            <?php if ($tarefa['categoria'] === $categoria['id_categoria']): ?>
                <li>
                    <span><?= $tarefa['titulo'] ?></span>
                    <span><?= $tarefa['data'] ?></span>
                    <span><?= $tarefa['data_conclusao'] ?></span>
                </li>
            <?php endif ?>

        <?php endforeach ?>
    </ul>
<?php endforeach ?>

<?php
include "../components/footer.php"
    ?>