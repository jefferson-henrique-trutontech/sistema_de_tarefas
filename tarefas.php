<?php
    function get_arquivo(){
        $arquivo = 'data/tarefas.json';
        $pasta = dirname($arquivo);
        if(!file_exists($pasta)){
            mkdir($pasta, 077, true);
        }
        
        if(!file_exists($arquivo)){
            file_put_contents($arquivo, '[]');
        }

        return json_decode(file_get_contents($arquivo));
    }

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            print_r(get_arquivo());
        default:
            break;
    }

?>