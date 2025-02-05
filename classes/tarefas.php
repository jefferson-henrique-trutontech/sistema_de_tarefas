<?php

class Tarefas{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function get_categoria(string $categoria){
        trim($categoria);
        $stmt = $this->db->prepare("SELECT nome, id_categoria FROM categorias WHERE nome = :categoria");
        $stmt->bindParam(':categoria', $categoria);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_categorias(){
        $stmt = $this->db->prepare("SELECT nome, id_categoria FROM categorias");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function categoria_existente(string $categoria){
        $stmt = $this->get_categoria($categoria);
        return $stmt;
    }

    public function criar_categoria(string $titulo){
        $stmt = $this->db->prepare("INSERT INTO categorias(nome) VALUES(:titulo)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function inserir_tarefa(string $titulo, string $data, string $categoria, string $data_conclusao = ''){
        $stmt = $this->db->prepare("INSERT INTO tarefas(titulo, `data`, categoria, data_conclusao) VALUES(:titulo, :data, :categoria, :data_conclusao)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':data_conclusao', $data_conclusao);

        if($this->categoria_existente($categoria)){
            $categoria_id = $this->get_categoria($categoria)['id_categoria'];
            $stmt->bindParam(':categoria', $categoria_id);
        }else{
            $categoria_id = $this->criar_categoria($categoria);
            $stmt->bindParam(':categoria', $categoria_id);
        }

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function get_tarefas(){
        $stmt = $this->db->prepare("SELECT * FROM tarefas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}