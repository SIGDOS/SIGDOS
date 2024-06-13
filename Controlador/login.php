<?php

    if (is_file("Vista/".$p.".php")) {
        if (is_file("Modelo/".$p.".php")) {
            include_once("Modelo/".$p.".php");
        }
        else{
            echo "FALTA MODELO";
        }
        include_once("Vista/".$p.".php");
    }
    else{
        echo "FALTA LA VISTA";
    }

?>