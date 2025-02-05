<?php
include "../classes/database.php";
include "../classes/tarefas.php";

$tarefas = new Tarefas((new Database)->getConnection());

switch($_SERVER['REQUEST_METHOD']){
    case "GET":
        echo "Funfa";
    break;
    
    case "POST":
        if(isset($_POST['categoria'], $_POST['titulo'], $_POST['data'])){
            $tarefas->inserir_tarefa(
                $_POST['titulo'],
                $_POST['data'],
                $_POST['categoria'],
                $_POST['data_conclusao'] ?: ''
            );
            header('Location: ../public/pages/home.php');
        }
    break;

    default:

    break;
}