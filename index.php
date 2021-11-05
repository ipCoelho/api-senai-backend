<?php
    #headers.
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Content-Type: application/json");

    #imports.
    include('connection.php');
    include('crud.php');

    #Takes the action's type from the request.
    $action = $_REQUEST['action'];

    switch ($action) {
        case 'read':
            read($link);
        break;
        
        case 'create':
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            create($nome, $sobrenome, $email, $celular, $fotografia, $link);
        break;
    }
?>