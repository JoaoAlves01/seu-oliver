<?php 

	// Estrutura de perguntas
	function modeloPergunta($pergunta, $anuncio){

		// Modelo de perguntas básicas
		$modeloPerguntaBasica = [
			"fiscal" => [
				"nota fiscal",
			],
			"original" => [
				"e original", "original", "tem original",
			],
			"garantia" => [
				"tem garantia", "garantia",
			],
			"preco" => [
				"custa", "preço", "preco", "valor"
			],
			"frete" => [
				"frete é gratis", "frete", "valor do frete", "frete valor",
			],
			"cores" => [
				"cores", "cor", "quais cores", "qual cor", "preto", "vermelho", "azul", "amarelo",
				"branco", "cinza",
			],
			"usado" => [
				"quanto tempo", "e usado", "usado", "novo", "uso", "tempo uso",
			],
			"formasPagamento" => [
				"aceita mercado pago", "mercadopago", "mercado pago", "dinheiro", "cheque", "cartao", "boleto", "boleto bancario",
			],
			"marca" => [
				"marca", "brand", "dell", "samsung", "modelo",
			],
			"quantidade" => [
				"estoque", "ainda tem",
			],
			"lancamento" => [
				"ano", "lancamento", "lançamento", "ano de lançamento", "ano lancamento", "ano de lancamento",
			],
			"remessa" => [
				"remessa", "tirar no local", "retirar", "retirar no local", "retirar local",
			],
		];

		// Modelo de perguntas bola - MLB6852
		$modeloPerguntaBola = [
			"tipoSuperficie" => [
				"superficie",
			],
			"material" => [
				"material",
			],
			"futebol" => [
				"futebol", "futebol americano", "baseball",
			],

		];

		// Modelo de perguntas chuteira - MLB6851
		$modeloPerguntaChuteira = [
			"tamanho" => [
				"tamanho", "medidas",
			],
			"material" => [
				"material",
			],
			"superficie" => [
				"superficie",
			],
			"idade" => [
				"qual a idade", "idade", "quantos anos", "anos", "adulto", "jovem", "crianca", "criança",
			],
			"tipoCalçado" => [
				"calcado", "calçado", "tipo de calçado",
			],
			"tipoSuperficie" => [
				"superficie",
			],
			"tipoSola" => [
				"sola",
			],
		];

		// Modelo de perguntas computador - MLB1649
		$modeloPerguntaComputador = [
			"tamanhoTela" => [
				"tamanho da tela", "tela", "polegadas", "medidas",
			],
			"tamanhoHd" => [
				"hd", "tamanho hd", "hard drive", "quantidade de hd",
			],
			"s.o" => [
				"qual o so", "qual so", "sistema operacional", "qual sistema", "sistema", "s.o", "s,o",
			],
			"processador" => [
				"processador", "procesador", "i3", "i5", "i7", "intel", "amd",
			],
			"memoriaRam" => [
				"memoria", "ram", "memoria ram", "gigas", "quantos gigas",
			],
		];

		//Quebra a pergunta para fazer a comparação
		$pergunta = rmAcentos($pergunta);
		$frases = explode(" ", $pergunta);
		$frasesEncontradas = array();

		// Carrega as frases das perguntas básicas
		foreach ($frases as $frase) {

			// Carrega as perguntas basicas
			foreach ($modeloPerguntaBasica as $frasePerguntaBasica => $valorPerguntaBasica) {

				// Corre o vetor de perguntas a
				foreach ($valorPerguntaBasica as $valor) {

					// Verifica se é igual a alguma
					if ($frase == $valor) {
						array_push($frasesEncontradas, $frasePerguntaBasica);
					}
				}				
			}
		}

		// Chuteira
		if ($anuncio['categoria_id'] == 'MLB6851') {
		
			// Carrega as frases da pergunta
			foreach ($frases as $frase) {

				// Carrega as perguntas basicas
				foreach ($modeloPerguntaChuteira as $frasePerguntaChuteira => $valorPerguntaChuteira) {

					// Corre o vetor de perguntas a
					foreach ($valorPerguntaChuteira as $valor) {

						// Verifica se é igual a alguma
						if ($frase == $valor) {
							array_push($frasesEncontradas, $frasePerguntaChuteira);
						}
					}				
				}
			}
		}

		// Bola
		if ($anuncio['categoria_id'] == 'MLB6852') {
		
			// Carrega as frases da pergunta
			foreach ($frases as $frase) {

				// Carrega as perguntas basicas
				foreach ($modeloPerguntaBola as $frasePerguntaBola => $valorPerguntaBola) {

					// Corre o vetor de perguntas a
					foreach ($valorPerguntaBola as $valor) {
						// Verifica se é igual a alguma
						if ($frase == $valor) {
							array_push($frasesEncontradas, $frasePerguntaBola);
						}
					}				
				}
			}
		}

		// computador
		if ($anuncio['categoria_id'] == 'MLB1649') {
		
			// Carrega as frases da pergunta
			foreach ($frases as $frase) {

				// Carrega as perguntas basicas
				foreach ($modeloPerguntaComputador as $frasePerguntaComputador => $valorPerguntaComputador) {

					// Corre o vetor de perguntas a
					foreach ($valorPerguntaComputador as $valor) {
						// Verifica se é igual a alguma
						if ($frase == $valor) {
							array_push($frasesEncontradas, $frasePerguntaComputador);
						}
					}				
				}
			}
		}

		return $frasesEncontradas;
	}

	//Verifica qual metodo chamar para responder o usuario
    function escolherResposta($vetores, $anuncio){

    	// Corre os vetores de intencoes para responder
        foreach ($vetores as $key => $value) {

        	// Define o inicio a mensagem como olá.
        	$msg = 'Olá,';

        	//INTENÇÕES BÁSICAS

        	// Nota fiscal
        	if ($value == 'fiscal') {
        		$msg .= ' possuimos nota fiscal';
			}
			
        	// original
        	if ($value == 'original') {
        		$msg .= ' todos os produtos são originais';
			}
			
        	// garantia
        	if ($value == 'garantia') {

        		// Verifica se tem garantia
        		if ($anuncio['garantia'] == 'Sem garantia') {
        			$msg .= ' infelizmente não temos garantia para esse produto,';
				} 
				
				else {
        			$msg .= ' temos garantia para esse produto,';
        		}        		
        	}

        	if (isset($vetores[1])) {

	        	// preco
	        	if ($vetores[0] == 'preco') {
	        		$msg .= " o valor do produto é R$ ".$anuncio['preco'].",00";
	        	}

	        	// frete
	        	if ($vetores[1] == 'frete') {
	        		$msg .= ' enviamos pelos correios, para calcular o frete utilize o calculo do lado do botão de comprar';
	        	}
	        }

        	// cores
        	if ($value == 'cores') {

        		// Verifica se tem cores
        		$msg .= " temos";
				$aux = 1;
				
        		foreach ($anuncio['cores'] as $valor) {

        			// Converte o texto para minusculo
        			$valor = minusculo($valor);
        			$msg .= " $valor,";
	      			$aux++;
	      		}

	      		// verifica se é uma ou mais cores.
	      		if ($aux >=2) {
	      			$msg .= ' essas cores';
				} 
				  
				else {
	      			$msg .= ' essa cor';
	      		}      		
        	}

        	// usado
        	if ($value == 'usado') {

        		// verifica se é usado
        		if ($anuncio['usado'] == 'new') {
        			$msg .= ' o produto é novo';
				}
				
				else {
        			$msg .= ' o produto é usado, mas está em ótimas condições';
        		}
        	}

        	// formasPagamento
        	if ($value == 'formasPagamento') {
        		if ($anuncio['aceita_mercadopago'] == 1) {
        			$msg .= ' aceitamos dinheiro, cartões de crédito, boleto e mercado pago';
        		} else {
        			$msg .= ' aceitamos dinheiro, cartões de crédito e boleto';
        		}
        	}

        	// marca
        	if ($value == 'marca') {
        		$msg .= " a marca é ".$anuncio['atributos']['brand'];
        	}

        	// quantidade
        	if ($value == 'quantidade') {
        		if ($anuncio['quantidade'] >0) {
        			$msg .= ' ainda temos em estoque';
        		}
        	}

        	// lancamento
        	if ($value == 'lancamento') {        		
        		$msg .= ' o ano de lançamento foi '.$anuncio['atributos']['ano_lancamento'];
        	}

        	// remessa
        	if ($value == 'remessa') {        		
        		if ($anuncio['atributos']['retirada_local'] == 'sim') {
        			$msg .= ' pode retirar o produto em nossa lojas';
				} 
				
				else {
        			$msg .= ' infelizmente só enviamos pelo correio';
        		}

        		if ($anuncio['atributos']['envio_gratis'] == 'sim') {
        			$msg .= ' envio pelo correio grátis';
				} 
				
				else {
        			$msg .= ' infelizmente não temos envio grátis';
        		}
        	}

        	//Modelo bola
        	// tipoSuperficie
        	if ($value == 'tipoSuperficie') {
        		$msg .= ' a superficie é '.$anuncio['atributos']['tipo_superficie'];
        	}

        	// material
        	if ($value == 'material') {
        		$msg .= ' o material é '.$anuncio['atributos']['material'];
        	}

        	// futebol
        	if ($value == 'futebol') {
        		$msg .= ' bola de futebol';
        	}

        	// Modelo Chuteira
        	// tamanho
        	if ($value == 'tamanho') {

        		$msg .= " temos";
        		$aux = 1;

        		foreach ($anuncio['cores'] as $valor) {

        			// Converte o texto para minusculo
        			$valor = minusculo($valor);

        			if ($aux % 2 == 1) {
        				$msg .= " $valor -";
        			} else {
        				$msg .= " $valor,";
        			}
	      			
	      			$aux++;
	      		}

	      		// verifica se é uma ou mais cores.
	      		if ($aux >=2) {
	      			$msg .= ' nessas cores e tamanhos';
	      		} else {
	      			$msg .= ' nessa cor e tamanho';
	      		}
	        }

        	// material
        	
        	// superficie
        	if ($value == 'superficie') {
        		$msg .= ' a superficie é '.$anuncio['atributos']['tipo_superficie'];
        	}

        	// idade
        	if ($value == 'idade') {
        		$msg .= ' para '.$anuncio['atributos']['idade'];
        	}

        	// tipoCalçado
        	if ($value == 'tipoCalçado') {
        		$msg .= ' calçado do tipo '.$anuncio['atributos']['tipo_calcado'];
        	}

        	// tipoSola
        	if ($value == 'tipoSola') {
        		$msg .= ' o tipo da sola '.$anuncio['atributos']['tipo_sola'];
        	}

        	//Modelo computador
        	// tamanhoTela
        	if ($value == 'tamanhoTela') {
        		$msg .= ' o tamanho da tela é de '.$anuncio['atributos']['tamanho_tela'].'"';
        	}

        	// tamanhoHd
        	if ($value == 'tamanhoHd') {
        		$msg .= ' a quantidade de HD é '.$anuncio['atributos']['tamanho_hd'];
        	}

        	// s.o
        	if ($value == 's.o') {
        		$msg .= ' o Sistema operacional é '.$anuncio['atributos']['so'];
        	}

        	// processador
        	if ($value == 'processador') {
        		$msg .= ' o processador é '.$anuncio['atributos']['processador'];
        	}

        	// memoriaRam
        	if ($value == 'memoriaRam') {
        		$msg .= ' a quantidade de memoria ram é '.$anuncio['atributos']['memoria_ram'];
        	}


        	$msg .= ', esperamos a sua compra. - Oliver<br>';	    			
        	return $msg;
        }
    }
?>