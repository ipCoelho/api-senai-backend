<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = 'bcd127';
    $dataBase = 'cadastro';
    $link = new Mysqli($serverName, $userName, $password, $dataBase);

    if ($link->connect_error) {
        die("link Error: $link->connect_error");
    }
  
    return $link;
    /* What is "->"? 
        This operator is used to sinalize a element inside of object.
        ex:
        $link->connect_error

        In this case, it sinalizes to return the element connect_error that's inside of the object $link. */

?>