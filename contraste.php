<?php

    session_start();

    if(isset($_SESSION['contraste'])){
        unset($_SESSION['contraste']);
    }

    else{
        $_SESSION['contraste'] = "ativado";
    }

    header("location: seuOliver.php");

?>