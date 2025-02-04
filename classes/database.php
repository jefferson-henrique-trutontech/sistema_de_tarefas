<?php

class Database{
    private $con;

    public function getConnection(){
        $this -> con = null;

        try{
            $this -> con = new PDO("mysql:host=localhost;dbname=tarefas", 'root', '');
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Connection Error: '. $e->getMessage();
        }

        return $this->con;
    }
}