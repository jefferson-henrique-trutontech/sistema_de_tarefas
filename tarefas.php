<?php
    function get_arquivo(){
        $texto = file_get_contents('data/tarefas.json');
        if(!$texto){
            file_put_contents('data/tarefas.json', '[]');
        }
        return json_decode()
    }

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            echo get_arquivo();
        default:
            break;
    }

?>