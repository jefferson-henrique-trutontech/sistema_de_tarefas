<?php

class Tarefas{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function verifica_categoria(string $categoria){
        $stmt = $this->db->prepare("SELECT nome, id FROM categorias WHERE nome LIKE %:categoria%");
        $stmt->bindParam(':categoria', $categoria);
    }

    public function inserir_tarefa(string $titulo, string $data, string $categoria){
        $stmt = $this->db->prepare("INSERT INTO tarefas(titulo, `data`, categoria) VALUES :titulo, :data, :categoria");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':categoria', $categoria);
    }
}