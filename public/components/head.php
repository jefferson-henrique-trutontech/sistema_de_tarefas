<?php
include "../../classes/system.php";
$sistema = new System();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/main.css">
    <link rel="shortcut icon" href="../../src/img/logo.webp" type="image/x-icon">
    <?= isset($css) ? "<link rel='stylesheet' href='../../src/css/$css'>" : '' ?>
    <title>Organizador de Tarefas - <?=$title?></title>
</head>
<body>
<nav>
    <div id="brand">
        <img src="../../src/img/logo.webp" alt="" width="50" height="50">
        <span>
            Truton<br>
            Tarefas
        </span>
    </div>

    <ul>
        <li><a href="home.php">Início</a></li>
    </ul>
</nav>

<main>
