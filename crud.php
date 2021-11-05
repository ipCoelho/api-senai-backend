<?php
    #Datebase Authentication file import.
    include('connection.php');

    #Functions with ID criterion.
    function readID($cod_pessoa, $link) {
        $query = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = '$cod_pessoa';";

        if ($sqlObject = mysqli_query($link, $query)) {
            $arrayPessoa = mysqli_fetch_all($sqlObject);

            if (!count($arrayPessoa) <= 0) {
                echo json_encode(array(
                    "status" => "sucess",
                    "data" => $arrayPessoa
                ));
            } else {
                echo json_encode(array(
                    "status" => "expection",
                    "data" => "Array nulo no banco de dados"
                ));
            }
            
        } else {
            echo json_encode(array(
                    "status"=>"error",
                    "data"=>"Erro ao inserir dados no banco"
                ) 
            );
        }
    }

    ################################################################################################

    #Function to read the Date.
    function read($link) {
        $query = "SELECT * FROM tbl_pessoa";
        $sqlObject = mysqli_query($link, $query);
        $arrayPessoa = null;

        if (!$sqlObject === false) {
            $arrayPessoa = mysqli_fetch_all($sqlObject);

            echo json_encode( 
                array(
                    "status" => "sucess",
                    "data" => $arrayPessoa
                ) 
            );
        } else {
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

        if (!mysqli_query($link, $query) === false) {
            echo json_encode( 
                array(
                    "status"=>"sucess",
                    "data"=>"Dados inseridos com sucesso"
                ) 
            );
        } else {
            echo json_encode(
                array(
                    "status"=>"error",
                    "data"=>"Erro ao inserir dados no banco"
                ) 
            );
        }
    }
?>