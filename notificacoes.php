<?php

require 'lib/controle.php';
$arquivo = "notificacoes.txt";
$fp = fopen($arquivo, "a+");
$rawData = file_get_contents("php://input"); 

fwrite($fp, $rawData);
fclose($fp);

notificacoes($rawData);


?>