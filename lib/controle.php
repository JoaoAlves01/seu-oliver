<?php
    session_start();
    
    use Twilio\Rest\Client;
    require 'conexao.php';
    require 'Meli/meli.php';
    require 'configApp.php';
    require 'estruturaPerguntas.php';



    if(isset($_GET['f']))
    {
        $function = $_GET['f'];

        if(function_exists($function))
        {
            call_user_func($function);
            exit();
        }
    }   

    function dadosVendedor(){
  
        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get('/users/me', array('access_token' => $_SESSION['access_token']));
        
        $arrayVendedor = [
            "id" => $response['body']->id,
            "first_name" => $response['body']->first_name,
            "last_name" => $response['body']->last_name,
            "email" => $response['body']->email,
            "perfil" => $response['body']->permalink,
            "registro" => $response['body']->registration_date
        ];

        salvarUsuario($arrayVendedor);
        return $arrayVendedor;
    }

    function buscarUsuario($idUsuario){

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get('users/' . $idUsuario, array('access_token' => $_SESSION['access_token']));
        
        return $response;
    }

    function idAnuncios(){

        $dadosVendedor = dadosVendedor();
        $url = '/users/' . $dadosVendedor['id'] . '/items/search';

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));
        $anuncios = $response['body']->results;

        return $anuncios;

    }

    function listarAnuncios(){

        $anuncios = idAnuncios();
        $itens = [];

        if (!empty($anuncios) && is_array($anuncios)) {
            
            foreach ($anuncios as $key => $anuncio) {

                $produto = array();
                $url = '/items/' . $anuncio;
                $response = "";

                global $appId, $secretKey;
                $meli = new Meli($appId, $secretKey);
                $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));
                
                //return $response['body'];
        
                if ($response['body']->id) {

                    $produto = [
                        "id" => $response['body']->id,
                        "titulo" => $response['body']->title,
                        "img_mini" => $response['body']->thumbnail,
                        "img" => isset($response['body']->pictures[0]->url) ? $response['body']->pictures[0]->url : '',
                        "preco" => $response['body']->price,
                        "linkMl" => $response['body']->permalink,
                    ];
                }
        
                if (!empty($produto)){

                    array_push($itens, $produto);
                }
            }

            return $itens;
        }
    }

    function listarAnuncio($idAnuncio){

        $produto = array();
        $url = '/items/' . $idAnuncio;
        $response = "";

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));
        
        return $response['body'];
    }

    function listarPerguntas(){

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get('/users/me', array('access_token' => $_SESSION['access_token']));
        $id_conta = $response['body']->id;

        $url = 'questions/search';
        $response = "";
        $params = [
            'seller_id' => $id_conta,
            'status' => 'UNANSWERED',
            'access_token' => $_SESSION['access_token'],
        ];
        $response = $meli->get($url, $params);

        $qtd_perguntas = $response['body']->total;
        $perguntas = $response['body']->questions;  

        return $perguntas;
    }

    function listarPerguntaEspecifica($idPergunta){
        
            
        global $appId, $secretKey;$url = "/questions/" . $idPergunta;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));

        return $response;
    }

    function capturarPergunta($objeto){
        
        foreach($objeto as $pergunta){
            $pergunta = $pergunta->text;
        }

        return $pergunta;
    }

    function enviarReposta($idPergunta, $resposta){
        
        $arrayResposta = [
            "question_id" => $idPergunta,
            "text" => $resposta
        ];

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->post('/answers', $arrayResposta, array('access_token' => $_SESSION['access_token']));

        if(isset($response['body']->status) && isset($response['body']->error) && $response['body']->status != 200){
            throw new Exception($response['body']->message);
        }

        return $response;
    }

    function totalPerguntasPorAnuncio($idAnuncio, $dataInicio, $dataFim){

            
        global $appId, $secretKey;$url = "/".$idAnuncio."/contacts/questions?date_from=".$dataInicio."&date_to=".$dataFim;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));

        return $response;
    }

    function calcularTempoResposta(){

        $dadosVendedor = dadosVendedor();

            
        global $appId, $secretKey;$url = "users/".$dadosVendedor['id']."/questions/response_time?access_token=".$_SESSION['access_token'];
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));

        return $response;
    }

    function totalVisitaPorAnuncio(){

        $dadosVendedor = dadosVendedor();
        $url = "users/".$dadosVendedor['id']."/items_visits/time_window?last=2&unit=day";

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));

        return $response;
    }

    function enviarZap($destinatario, $mensagem){

        require "Twilio/autoload.php";

        $numeroTwilio = "14155238886";
        $sid = 'AC34df7a2eacb73132cf772f70f71c1ab4';
        $token = '5bb856134dc48c066e0f3343dfcae438';
        $client = new Client($sid, $token);

        $message = $client->messages->create("whatsapp:+" . $destinatario,
        [
            "body" => $mensagem,
            "from" => "whatsapp:+" . $numeroTwilio
        ]);

        if(!empty($message)){
            return $message;
        }

        else{
            return 'erro';
        }
    }

    function responderZap($destinatario, $mensagem){

        require "Twilio/autoload.php";

        $numeroTwilio = "14155238886";
        $sid = 'AC34df7a2eacb73132cf772f70f71c1ab4';
        $token = '5bb856134dc48c066e0f3343dfcae438';
        $client = new Client($sid, $token);

        $message = $client->messages->create($destinatario,
        [
            "body" => $mensagem,
            "from" => "whatsapp:+" . $numeroTwilio
        ]);

        if(!empty($message)){
            return $message;
        }

        else{
            return 'erro';
        }
    }

    function salvarUsuario($objeto){
        
        $conexao = conexao();
        extract($_POST);

        $buscar = "SELECT * FROM user WHERE id = '" . $objeto['id'] . "' ";
        $resultadoBusca = $conexao->query($buscar); 

        if(!$resultadoBusca->num_rows){
            $sql_insert = "INSERT INTO user (id, nome, sobrenome, email) VALUES ('".$objeto['id']."', '".$objeto['first_name']."', '".$objeto['last_name']."', '".$objeto['email']."')";
            $resultado = $conexao->query($sql_insert); 
            return $resultado;
        }
    }

    function salvarConfiguracao(){
        
        $conexao = conexao();
        extract($_POST);

        $pesquisaSatisfacao = [
            "realizar" => $satisfacao,
            "mensagem" => $satisfacao_texto
        ];

        $meios_comunicacao = [
            "sms" => $comunicacao[0] == 'sms' ? 'sim' : 'nao',
            "zap" => $comunicacao[1] == 'zap' ? 'sim' : 'nao'
        ];

        $sql = "UPDATE configuracao_oliver SET tipo_comunicacao = '".json_encode($meios_comunicacao)."', assinatura = '".$assinatura."', satisfacao = '".serialize($pesquisaSatisfacao)."' WHERE id = 1  ";
        $resultado = $conexao->query($sql); 
        header("location: ../configuracoes.php?f=sucesso");
    }

    function buscarConfiguracao(){

        $conexao = conexao();
        extract($_POST);

        $buscar = "SELECT * FROM configuracao_oliver WHERE id = 1 ";
        $resultado = $conexao->query($buscar); 
        
        if($resultado->num_rows){

            $config = $resultado->fetch_array(MYSQLI_NUM);
            $config = [
                "id" => $config[0],
                "meios_comunicacao" => json_decode($config[1]),
                "assinatura" => $config[2],
                "satisfacao" => unserialize($config[3])
            ];

            return $config;
        }
    }

    function notificacoes(){ 

        $perguntas = listarPerguntas();
        
        if(!empty($perguntas)){

            foreach ($perguntas as $pergunta) {
                
                $idPergunta = $pergunta->id;
                $perguntaBuscado = listarPerguntaEspecifica($idPergunta);
                
                //Verificar se esta respondida ou nao
                if($perguntaBuscado['body']->status = "UNANSWERED"){
                
                    //Retorna todos os dados do anuncio da pergunta
                    $anuncio = listarAnuncioEspecifico($perguntaBuscado['body']->item_id);
                
                    //Pegando informacoes da pergunta
                    $pegarPergunta = $perguntaBuscado['body']->text;

                    //Validar se o cliente possui telefone cadastrado
                    if(isset($perguntaBuscado['body']->from->phone->number) && $perguntaBuscado['body']->from->first_name){

                        $numeroTelefone = "55" . $perguntaBuscado['body']->from->phone->area_code . $perguntaBuscado['body']->from->phone->number;
                        $nomeSolicitante = $perguntaBuscado['body']->from->first_name;
                    }

                    else{
                        $numeroTelefone = "5521965203233";
                        $nomeSolicitante = "caro cliente";
                    }

                    // Verifica se é uma pergunta possivel de ser respondida baseada nos dados do anuncio
                    $perguntaResposta = modeloPergunta($pegarPergunta, $anuncio);
                    
                    if ($perguntaResposta){
                        
                        $resposta = escolherResposta($perguntaResposta, $anuncio);
                        enviarReposta($idPergunta, $resposta);
                        
                        $mensagem = "Olá ".$nomeSolicitante.", sua pergunta sobre o produto foi respondida, esperamos sua compra! 😉";
                        enviarZap($numeroTelefone, $mensagem);
                    } 
                    
                    else {
                    
                        $mensagem = "Olá ".$nomeSolicitante.", em breve retornaremos seu contato. 😉";
                        enviarZap($numeroTelefone, $mensagem);
                    }
                }
            }
        }
    }

    function rmAcentos($texto){      
        // assume $str esteja em UTF-8
        $acentos = array(
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'é' => 'e', 'ê' => 'e', 'í' => 'i',
            'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u', 'ç' => 'c', 'Á' => 'A',
            'À' => 'A', 'Ã' => 'A', 'Â' => 'A', 'É' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Ó' => 'O',
            'Ô' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ü' => 'U', 'Ç' => 'C', '!' => '', '?' => '',
        );        

        $texto = strtr($texto, $acentos); // retira os acentos

        $texto = strtolower($texto); // coloca todo o texto como minusculo
        return  $texto;
    }

    function minusculo($texto){
        $texto = strtolower($texto); // coloca todo o texto como minusculo
        return  $texto;
    }

    function listarAnuncioEspecifico($idanuncio){
            
        global $appId, $secretKey;

        $url = "/items/" . $idanuncio;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));

        // Anuncio code bola - MLB6852
        if ($response['body'] && $response['body']->category_id == 'MLB6852') {

            // TODO: CORES do produto
            $cores = [];

            //Verifica quais cores o produto tem.
            foreach ($response['body']->variations as $variation) {                        
                foreach ($variation->attribute_combinations as $combination => $value_combination) {
                    array_push($cores, $value_combination->value_name);
                }
            }

            // TODO: ATRIBUTOS
            $atributos = [];

            //Verifica quais atributos o produto tem.
            foreach ($response['body']->attributes as $attribute) {

                // Tamanho do produto
                if ($attribute->id == 'BALL_SIZE') {
                    $atributos['tamanho'] = $attribute->value_name;                             
                }
                // Brand da marca
                if ($attribute->id == 'BRAND') {
                    $atributos['brand'] = $attribute->value_name;
                }
                // Tipo de superficie
                if ($attribute->id == 'GROUND_TYPE') {
                    $atributos['tipo_superficie'] = $attribute->value_name;
                }
                // Tipo de material
                if ($attribute->id == 'MATERIAL') {
                    $atributos['material'] = $attribute->value_name;
                }
                // Tipo de modelo
                if ($attribute->id == 'MODEL') {
                    $atributos['modelo'] = $attribute->value_name;
                }
                // Tipo de modelo
                if ($attribute->id == 'RELEASE_YEAR') {
                    $atributos['ano_lancamento'] = $attribute->value_name;
                }                            
            }

            // TODO: Remessa
            $remessa = [];

            // Retirar no local
            if ($response['body']->shipping->local_pick_up == 1) {
                $remessa['retirada_local'] = 'sim';
            }
            // Retirar no local
            if ($response['body']->shipping->free_shipping == 1) {
                $remessa['envio_gratis'] = 'sim';
            }

            //Monta o vetor de produtos
            $produto = [
                "id" => $response['body']->id,
                "title" => $response['body']->title,
                "preco" => $response['body']->price,
                "quantidade" => $response['body']->available_quantity,
                "garantia" => $response['body']->sale_terms[0]->value_name,
                "comgarantia" => $response['body']->warranty,
                "usado" => $response['body']->condition,
                "aceita_mercadopago" => $response['body']->accepts_mercadopago,
                "cores" => $cores,
                "atributos" => $atributos,
                "remessa" => $remessa,
                "categoria_id" => $response['body']->category_id,
            ];
        }

        // Anuncio code chuteira - MLB6851
        if ($response['body'] && $response['body']->category_id == 'MLB6851') {

            // TODO: CORES e tamanho do produto
                $cores = [];

                //Verifica quais cores e tamanho o produto tem.
                foreach ($response['body']->variations as $variation) {                        
                    foreach ($variation->attribute_combinations as $combination => $value_combination) {
                        array_push($cores, $value_combination->value_name);
                    }
                }

            // TODO: ATRIBUTOS
                 $atributos = [];

                //Verifica quais atributos o produto tem.
                foreach ($response['body']->attributes as $attribute) {

                    // Idade para usar o produto
                    if ($attribute->id == 'AGE_GROUP') {
                        $atributos['idade'] = $attribute->value_name;                             
                    }
                    // Tamanho do produto
                    if ($attribute->id == 'BALL_SIZE') {
                        $atributos['tamanho'] = $attribute->value_name;                             
                    }
                    // Brand da marca
                    if ($attribute->id == 'BRAND') {
                        $atributos['brand'] = $attribute->value_name;
                    }
                    // Tipo de calçado
                    if ($attribute->id == 'FOOTWEAR_TYPE') {
                        $atributos['tipo_calcado'] = $attribute->value_name;
                    }
                    // Tipo de superficie
                    if ($attribute->id == 'GROUND_TYPE') {
                        $atributos['tipo_superficie'] = $attribute->value_name;
                    }
                    // Tipo de material
                    if ($attribute->id == 'MATERIAL') {
                        $atributos['material'] = $attribute->value_name;
                    }
                    // Tipo de modelo
                    if ($attribute->id == 'MODEL') {
                        $atributos['modelo'] = $attribute->value_name;
                    }
                    // Tipo de ano de lançamento
                    if ($attribute->id == 'RELEASE_YEAR') {
                        $atributos['ano_lancamento'] = $attribute->value_name;
                    }
                    // Condição do item
                    if ($attribute->id == 'ITEM_CONDITION') {
                        $atributos['condicao_item'] = $attribute->value_name;
                    }
                    // tipo de sola
                    if ($attribute->id == 'OUTSOLE_TYPE') {
                        $atributos['tipo_sola'] = $attribute->value_name;
                    }                               
                }

            // TODO: Remessa
                $remessa = [];

                // Retirar no local
                if ($response['body']->shipping->local_pick_up == 1) {
                    $remessa['retirada_local'] = 'sim';
                }
                // Retirar no local
                if ($response['body']->shipping->free_shipping == 1) {
                    $remessa['envio_gratis'] = 'sim';
                }

                //print_r($remessa);

            //Monta o vetor de produtos
            $produto = [
             "id" => $response['body']->id,
             "title" => $response['body']->title,
             "preco" => $response['body']->price,
             "quantidade" => $response['body']->available_quantity,
             "garantia" => $response['body']->sale_terms[0]->value_name,
             "comgarantia" => $response['body']->warranty,
             "usado" => $response['body']->condition,
             "aceita_mercadopago" => $response['body']->accepts_mercadopago,
             "cores" => $cores,
             "atributos" => $atributos,
             "remessa" => $remessa,
             "categoria_id" => $response['body']->category_id,
            ];
        }
                
        // Anuncio code notebook - MLB1649
        if ($response['body'] && $response['body']->category_id == 'MLB1649') {

            // TODO: CORES e tamanho do produto
                $cores = [];

                //Verifica quais cores e tamanho o produto tem.
                foreach ($response['body']->variations as $variation) {                        
                    foreach ($variation->attribute_combinations as $combination => $value_combination) {
                        array_push($cores, $value_combination->value_name);
                    }
                }

            // TODO: ATRIBUTOS
                 $atributos = [];

                //Verifica quais atributos o produto tem.
                foreach ($response['body']->attributes as $attribute) {

                    // Tamanho da tela
                    if ($attribute->id == 'DISPLAY_SIZE') {
                        $atributos['tamanho_tela'] = $attribute->value_name;                             
                    }
                    // Brand da marca
                    if ($attribute->id == 'BRAND') {
                        $atributos['marca'] = $attribute->value_name;
                    }
                    // Tamanho do HDD
                    if ($attribute->id == 'HDD_SIZE') {
                        $atributos['tamanho_hd'] = $attribute->value_name;
                    }
                    // Sistema operacional
                    if ($attribute->id == 'OPERATIVE_SYSTEM') {
                        $atributos['so'] = $attribute->value_name;
                    }
                    // Tipo de modelo
                    if ($attribute->id == 'MODEL') {
                        $atributos['modelo'] = $attribute->value_name;
                    }
                    // Ano de lançamento
                    if ($attribute->id == 'RELEASE_YEAR') {
                        $atributos['ano_lancamento'] = $attribute->value_name;
                    }
                    // Tipo de processador
                    if ($attribute->id == 'PROCESSOR_TYPE') {
                        $atributos['processador'] = $attribute->value_name;
                    }
                    // Tamanho da memoria ram
                    if ($attribute->id == 'RAM_SIZE') {
                        $atributos['memoria_ram'] = $attribute->value_name;
                    }                             
                }

            // TODO: Remessa
                $remessa = [];

                // Retirar no local
                if ($response['body']->shipping->local_pick_up == 1) {
                    $remessa['retirada_local'] = 'sim';
                }
                // Retirar no local
                if ($response['body']->shipping->free_shipping == 1) {
                    $remessa['envio_gratis'] = 'sim';
                }

            //Monta o vetor de produtos
            $produto = [
             "id" => $response['body']->id,
             "title" => $response['body']->title,
             "preco" => $response['body']->price,
             "quantidade" => $response['body']->available_quantity,
             "garantia" => $response['body']->sale_terms[0]->value_name,
             "comgarantia" => $response['body']->warranty,
             "usado" => $response['body']->condition,
             "aceita_mercadopago" => $response['body']->accepts_mercadopago,
             "cores" => $cores,
             "atributos" => $atributos,
             "remessa" => $remessa,
             "categoria_id" => $response['body']->category_id,
            ];
        }

        return $produto;
    }

    function listarAnunciosProdutos(){

        $anuncios = idAnuncios();
        $itens = [];

        if (!empty($anuncios) && is_array($anuncios)) {
            
            foreach ($anuncios as $key => $anuncio) {

                $produto = array();
                $url = '/items/' . $anuncio;
                $response = "";

                global $appId, $secretKey;
                $meli = new Meli($appId, $secretKey);
                $response = $meli->get($url, array('access_token' => $_SESSION['access_token']));

                // Anuncio code bola - MLB6852
                if ($response['body'] && $response['body']->category_id == 'MLB6852') {

                    // TODO: CORES do produto
                        $cores = [];

                        //Verifica quais cores o produto tem.
                        foreach ($response['body']->variations as $variation) {                        
                            foreach ($variation->attribute_combinations as $combination => $value_combination) {
                                array_push($cores, $value_combination->value_name);
                            }
                        }

                    // TODO: ATRIBUTOS
                         $atributos = [];

                        //Verifica quais atributos o produto tem.
                        foreach ($response['body']->attributes as $attribute) {

                            // Tamanho do produto
                            if ($attribute->id == 'BALL_SIZE') {
                                $atributos['tamanho'] = $attribute->value_name;                             
                            }
                            // Brand da marca
                            if ($attribute->id == 'BRAND') {
                                $atributos['brand'] = $attribute->value_name;
                            }
                            // Tipo de superficie
                            if ($attribute->id == 'GROUND_TYPE') {
                                $atributos['tipo_superficie'] = $attribute->value_name;
                            }
                            // Tipo de material
                            if ($attribute->id == 'MATERIAL') {
                                $atributos['material'] = $attribute->value_name;
                            }
                            // Tipo de modelo
                            if ($attribute->id == 'MODEL') {
                                $atributos['modelo'] = $attribute->value_name;
                            }
                            // Tipo de modelo
                            if ($attribute->id == 'RELEASE_YEAR') {
                                $atributos['ano_lancamento'] = $attribute->value_name;
                            }                            
                        }

                    // TODO: Remessa
                        $remessa = [];

                        // Retirar no local
                        if ($response['body']->shipping->local_pick_up == 1) {
                            $remessa['retirada_local'] = 'sim';
                        }
                        // Retirar no local
                        if ($response['body']->shipping->free_shipping == 1) {
                            $remessa['envio_gratis'] = 'sim';
                        }

                    //Monta o vetor de produtos
                    $produto = [
                     "id" => $response['body']->id,
                     "title" => $response['body']->title,
                     "preco" => $response['body']->price,
                     "quantidade" => $response['body']->available_quantity,
                     "garantia" => $response['body']->sale_terms[0]->value_name,
                     "comgarantia" => $response['body']->warranty,
                     "usado" => $response['body']->condition,
                     "aceita_mercadopago" => $response['body']->accepts_mercadopago,
                     "cores" => $cores,
                     "atributos" => $atributos,
                     "remessa" => $remessa,
                     "categoria_id" => $response['body']->category_id,
                    ];
                }

                // Anuncio code chuteira - MLB6851
                if ($response['body'] && $response['body']->category_id == 'MLB6851') {

                    // TODO: CORES e tamanho do produto
                        $cores = [];

                        //Verifica quais cores e tamanho o produto tem.
                        foreach ($response['body']->variations as $variation) {                        
                            foreach ($variation->attribute_combinations as $combination => $value_combination) {
                                array_push($cores, $value_combination->value_name);
                            }
                        }

                    // TODO: ATRIBUTOS
                         $atributos = [];

                        //Verifica quais atributos o produto tem.
                        foreach ($response['body']->attributes as $attribute) {

                            // Idade para usar o produto
                            if ($attribute->id == 'AGE_GROUP') {
                                $atributos['idade'] = $attribute->value_name;                             
                            }
                            // Tamanho do produto
                            if ($attribute->id == 'BALL_SIZE') {
                                $atributos['tamanho'] = $attribute->value_name;                             
                            }
                            // Brand da marca
                            if ($attribute->id == 'BRAND') {
                                $atributos['brand'] = $attribute->value_name;
                            }
                            // Tipo de calçado
                            if ($attribute->id == 'FOOTWEAR_TYPE') {
                                $atributos['tipo_calcado'] = $attribute->value_name;
                            }
                            // Tipo de superficie
                            if ($attribute->id == 'GROUND_TYPE') {
                                $atributos['tipo_superficie'] = $attribute->value_name;
                            }
                            // Tipo de material
                            if ($attribute->id == 'MATERIAL') {
                                $atributos['material'] = $attribute->value_name;
                            }
                            // Tipo de modelo
                            if ($attribute->id == 'MODEL') {
                                $atributos['modelo'] = $attribute->value_name;
                            }
                            // Tipo de ano de lançamento
                            if ($attribute->id == 'RELEASE_YEAR') {
                                $atributos['ano_lancamento'] = $attribute->value_name;
                            }
                            // Condição do item
                            if ($attribute->id == 'ITEM_CONDITION') {
                                $atributos['condicao_item'] = $attribute->value_name;
                            }
                            // tipo de sola
                            if ($attribute->id == 'OUTSOLE_TYPE') {
                                $atributos['tipo_sola'] = $attribute->value_name;
                            }                               
                        }

                    // TODO: Remessa
                        $remessa = [];

                        // Retirar no local
                        if ($response['body']->shipping->local_pick_up == 1) {
                            $remessa['retirada_local'] = 'sim';
                        }
                        // Retirar no local
                        if ($response['body']->shipping->free_shipping == 1) {
                            $remessa['envio_gratis'] = 'sim';
                        }

                        //print_r($remessa);

                    //Monta o vetor de produtos
                    $produto = [
                     "id" => $response['body']->id,
                     "title" => $response['body']->title,
                     "preco" => $response['body']->price,
                     "quantidade" => $response['body']->available_quantity,
                     "garantia" => $response['body']->sale_terms[0]->value_name,
                     "comgarantia" => $response['body']->warranty,
                     "usado" => $response['body']->condition,
                     "aceita_mercadopago" => $response['body']->accepts_mercadopago,
                     "cores" => $cores,
                     "atributos" => $atributos,
                     "remessa" => $remessa,
                     "categoria_id" => $response['body']->category_id,
                    ];
                }

                // Anuncio code notebook - MLB1649
                if ($response['body'] && $response['body']->category_id == 'MLB1649') {

                    // TODO: CORES e tamanho do produto
                        $cores = [];

                        //Verifica quais cores e tamanho o produto tem.
                        foreach ($response['body']->variations as $variation) {                        
                            foreach ($variation->attribute_combinations as $combination => $value_combination) {
                                array_push($cores, $value_combination->value_name);
                            }
                        }

                    // TODO: ATRIBUTOS
                         $atributos = [];

                        //Verifica quais atributos o produto tem.
                        foreach ($response['body']->attributes as $attribute) {

                            // Tamanho da tela
                            if ($attribute->id == 'DISPLAY_SIZE') {
                                $atributos['tamanho_tela'] = $attribute->value_name;                             
                            }
                            // Brand da marca
                            if ($attribute->id == 'BRAND') {
                                $atributos['marca'] = $attribute->value_name;
                            }
                            // Tamanho do HDD
                            if ($attribute->id == 'HDD_SIZE') {
                                $atributos['tamanho_hd'] = $attribute->value_name;
                            }
                            // Sistema operacional
                            if ($attribute->id == 'OPERATIVE_SYSTEM') {
                                $atributos['so'] = $attribute->value_name;
                            }
                            // Tipo de modelo
                            if ($attribute->id == 'MODEL') {
                                $atributos['modelo'] = $attribute->value_name;
                            }
                            // Ano de lançamento
                            if ($attribute->id == 'RELEASE_YEAR') {
                                $atributos['ano_lancamento'] = $attribute->value_name;
                            }
                            // Tipo de processador
                            if ($attribute->id == 'PROCESSOR_TYPE') {
                                $atributos['processador'] = $attribute->value_name;
                            }
                            // Tamanho da memoria ram
                            if ($attribute->id == 'RAM_SIZE') {
                                $atributos['memoria_ram'] = $attribute->value_name;
                            }                             
                        }

                    // TODO: Remessa
                        $remessa = [];

                        // Retirar no local
                        if ($response['body']->shipping->local_pick_up == 1) {
                            $remessa['retirada_local'] = 'sim';
                        }
                        // Retirar no local
                        if ($response['body']->shipping->free_shipping == 1) {
                            $remessa['envio_gratis'] = 'sim';
                        }

                    //Monta o vetor de produtos
                    $produto = [
                     "id" => $response['body']->id,
                     "title" => $response['body']->title,
                     "preco" => $response['body']->price,
                     "quantidade" => $response['body']->available_quantity,
                     "garantia" => $response['body']->sale_terms[0]->value_name,
                     "comgarantia" => $response['body']->warranty,
                     "usado" => $response['body']->condition,
                     "aceita_mercadopago" => $response['body']->accepts_mercadopago,
                     "cores" => $cores,
                     "atributos" => $atributos,
                     "remessa" => $remessa,
                     "categoria_id" => $response['body']->category_id,
                    ];
                }                
        
                if (!empty($produto)){

                    array_push($itens, $produto);
                }
            }

            return $itens;
        }
    }

    function usuarioTeste(){
        
        $arrayResposta = [
            "site_id" => "MLB"
        ];

        global $appId, $secretKey;
        $meli = new Meli($appId, $secretKey);
        $response = $meli->post('/users/test_user', $arrayResposta, array('access_token' => $_SESSION['access_token']));

        return $response;
    }
   
?>  