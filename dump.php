<?php
    function dump($dumpable) {
       $pre = '<pre>'; 
       $pre2 = '</pre>';
       return var_dump($pre.$dumpable.$pre2);
    }
    $comidas = array(
        "comida1" => "feijao",
        "comida2" => "arroz"
    );

    dump($comidas);
?>