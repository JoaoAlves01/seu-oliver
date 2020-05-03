<?php
require 'lib/controle.php';

$arquivo = "responder_pesquisa.txt";
$fp = fopen($arquivo, "a+");
$vetor = [];

$rawData = file_get_contents("php://input"); 

foreach (explode('&', $rawData) as $chunk) {

    $param = explode("=", $chunk);
    array_push($vetor, [urldecode($param[0]) => urldecode($param[1])]);
}

$msg = json_encode($vetor);
$msg = json_decode($msg);

$destinatario = $msg[9]->From;
$mensagem = "Obrigado!";

//Verificando se o cliente gostou
if($msg[4]->Body == 1){
	$mensagem = "Obrigado! E volte sempre! 😁";
}

else if($msg[4]->Body == 0){
	$mensagem = "Que pena, iremos trabalhar para melhor isso! 😓";
}

else{
	$mensagem = "Desculpe, não entendi! 🤔";
}

responderZap($destinatario, $mensagem);

	  
fwrite($fp, json_encode($vetor));
fclose($fp);

?>