<?php

switch($_SERVER['REQUEST_METHOD']){
    case "GET":
        echo "Funfa";
    break;
    
    case "POST":
        echo json_encode($_POST);
    break;

    default:
    break;
}