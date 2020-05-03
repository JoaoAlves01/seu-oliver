<?php

    function conexao()
    {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "seu_oliver";

        $conection = new mysqli($servidor, $usuario, $senha, $banco);
        $conection->set_charset("utf8");
        return $conection;
    }
?>