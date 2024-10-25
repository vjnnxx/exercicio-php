<?php
    if(!isset($_COOKIE["logged_user"])){
        echo("Por favor, faça login!");
    } else {
        echo("Seja bem vindo(a), ".$_COOKIE["logged_user"]);
    }
?>