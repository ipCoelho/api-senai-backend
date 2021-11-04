<?php
    #Datebase Authentication file import.
    include('connection.php');

    #Function to read the Date.
    function read($link) {
        $query = "SELECT * FROM tbl_pessoa";

        if ($sqlObject = mysqli_query($link, $query)) {
            $arrayPessoa = mysqli_fetch_all($sqlObject);

            #json_encode() is a method that converts array to json.
            echo json_encode( 
                array(
                    "status" => "sucess",
                    "data" => $arrayPessoa
                ) 
            );
        }
        else {
            echo json_encode(
                array(
                    "status" => "failed",
                    "data" => mysqli_error($link)
                )
            );
        }
    }

    function create($NOME, $SOBRENOME, $EMAIL, $CELULAR, $FOTOGRAFIA, $link) {
        $query = "INSERT INTO tbl_pessoa(nome, sobrenome, email, celular, fotografia) VALUES ('$NOME', '$SOBRENOME', '$EMAIL', '$CELULAR', '$FOTOGRAFIA');";

        if (mysqli_query($link, $query)) {
            echo json_encode( 
                array(
                    "status"=>"sucess",
                    "data"=>"Dados inseridos com sucesso"
                ) 
            );
        } 
        else {
            echo json_encode(
                array(
                    "status"=>"error",
                    "data"=>"Erro ao inserir dados no banco"
                ) 
            );
        }
    }
?>