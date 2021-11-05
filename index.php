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

    /* How do things work here? 

        * All the requests are being sent by the software Postman.
            -> Postman is a software that helps the backend developers, it simulates the frontend and it's requisitions.

            -> All the variables $_REQUEST[' '] are being sent by it. The key with the name 'action' sent the route that
            the code should do, which it's defined by a switch structure. */

    switch ($action) {

        case 'read':
            read($link);
        break;

         case 'readID':
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            readID($cod_pessoa, $link);
        break;

        case 'create':
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            create($nome, $sobrenome, $email, $celular, $fotografia, $link);
        break;

        case 'update':
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $link);
        break;

        case 'delete':
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            delete($cod_pessoa, $link);
        break;
    }
?>