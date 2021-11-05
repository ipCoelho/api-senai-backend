<?php
    #Datebase Authentication file import.
    include('connection.php');

    #Function to select a row in the DB.
    function read($SQLAUTHENTICATION) {
        $query = "SELECT * FROM tbl_pessoa";
        $sqlObject = mysqli_query($SQLAUTHENTICATION, $query);
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
                    "data" => mysqli_error($SQLAUTHENTICATION)
                )
            );
        }
    }
    #Function 'read' with ID criterion.
    function readID($cod_pessoa, $SQLAUTHENTICATION) {
        $query = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = '$cod_pessoa';";
        $sqlObject = mysqli_query($SQLAUTHENTICATION, $query);

        if (!$sqlObject === false) {
            $arrayPessoa = mysqli_fetch_all($sqlObject);

            if (!count($arrayPessoa) <= 0) {
                echo json_encode(array(
                    "status" => "sucess",
                    "data" => $arrayPessoa
                ));
            } else {
                echo json_encode(array(
                    "status" => "expection",
                    "data" => "Dados nulo no banco de dados"
                ));
            }
        }
        else {
            echo json_encode(array(
                    "status"=>"error",
                    "data"=>"Erro ao inserir dados no banco"
                ) 
            );
        }
    }
    #Function to create a row in the DB.
    function create($NOME, $SOBRENOME, $EMAIL, $CELULAR, $FOTOGRAFIA, $SQLAUTHENTICATION) {
        $query = "INSERT INTO tbl_pessoa(nome, sobrenome, email, celular, fotografia) VALUES ('$NOME', '$SOBRENOME', '$EMAIL', '$CELULAR', '$FOTOGRAFIA');";

        if (!mysqli_query($SQLAUTHENTICATION, $query) === false) {
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
    #Function to update a row in the DB.
    function update($cod_pessoa, $NOME, $SOBRENOME, $EMAIL, $CELULAR, $FOTOGRAFIA, $SQLAUTHENTICATION) {
        $query = "UPDATE tbl_pessoa SET 
            nome = '$NOME',
            sobrenome = '$SOBRENOME', 
            email = '$EMAIL', 
            celular = '$CELULAR', 
            fotografia = '$FOTOGRAFIA'
            
            WHERE cod_pessoa = '$cod_pessoa';
        ";
        $sqlObject = mysqli_query($SQLAUTHENTICATION, $query);
        
        if (!$sqlObject === false) {
            echo json_encode( 
                array(
                    "status"=>"sucess",
                    "data"=>"Dados atualizados com sucesso"
                ) 
            );
        } 
        else {
            echo json_encode(
                array(
                    "status"=>"error",
                    "data"=>"Erro ao atualizar dados no banco"
                ) 
            );
        }
    }
    #Function to delete a row in the DB.
    function delete($cod_pessoa, $SQLAUTHENTICATION) {
        $query = "DELETE FROM tbl_pessoa WHERE cod_pessoa = '$cod_pessoa';";
        $sqlResult = mysqli_query($SQLAUTHENTICATION, $query);
        
        if (!$sqlResult === false) {
            echo json_encode(array(
                "status" => "sucess",
                "data" => "Dados deletados com sucesso"
            ));
        }
        else {
            echo json_encode(
                array(
                    "status"=>"error",
                    "data"=>"Erro ao atualizar dados no banco"
                ) 
            );
        }
    }
?>