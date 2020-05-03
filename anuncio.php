<?php

require 'lib/controle.php';
$anuncio = listarAnuncio($_GET['f']);


if($anuncio->category_id == "MLB6851"){
    $titulo = "Chuteira Nike";
}

else if($anuncio->category_id == "MLB6852"){
    $titulo = "Bola Topper";
}

else{
    $titulo = "Notebook Dell";
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<title>Seu Oliver</title>
    <link rel="stylesheet" href="lib/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="lib/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="lib/font-awesome/css/brands.min.css">
    <link rel="stylesheet" href="lib/chart-js/dist/apexcharts.css">
	<link rel="stylesheet" type="text/css" href="lib/css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/css/style_mobile.css">
    <script src="lib/js/jquery.js"></script>
    <script src="lib/jqueryKnob/js/jquery.knob.js"></script>
    <script src="lib/chart-js/dist/apexcharts.js"></script>
    <script src="lib/js/controle.js"></script>
	<link rel="icon" type="image/x-icon" href="lib/images/favicon.ico">
</head>
    <body class="<?php echo isset($_SESSION['contraste'])?'constraste_css':' ' ?>" >
        <section id="sec_principal" class="box_principal">

            <div class="box_menu">
                <ul>
                    <li id="dashboard"><a href="seuOliver.php"><i class="fas fa-chart-area"></i></a></li>
                    <li id="config"><a href="configuracoes.php"><i class="fas fa-cogs"></i></a></li>
                    <li id="acessibilidade"><a href="contraste.php"><i class="fas fa-eye"></i></a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li> 
                </ul>
            </div>

            <!-- SEU OLIVER AVATAR -->
            <div class="box_seuOliver">
                <div class="balao">
                    <span id="mensagem_oliver">Olá Ricardo, tudo bem?
                    </span>
                </div>
                <img src="lib/images/SeuOliver.png" class="ajuste_img_contain">
            </div>

            <section id="sec_container">
                
                <!-- BLOCO COM OS CARD DE ESTATISTICAS -->
                <div class="container_estatisticas">
                    <div class="box_perfil">
                        <div class="linha">
                            <span>Olá, Ricardo</span>
                            
                            <div class="box_circulo">
                                <img src="lib/images/perfil-ricardo.jpg" class="ajuste_img_cover">
                            </div>
                        </div>
                    </div>

                    <h2 class="titulo_principal"><?php echo $titulo; ?><h2>

                    <?php

                    if($anuncio->category_id == "MLB6851"){
                        ?>
                            <div id="box_cards">
                                <ul class="lista_cards">
                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="far fa-comments"></i>
                                            </div>

                                            <h2>Perguntas</h2>

                                            <ul class="blocos">
                                                <li>
                                                    500 <small>Perguntas feitas no mês</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    3.020 <small>Perguntas feitas na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="fas fa-headphones-alt"></i>
                                            </div>

                                            <h2>Atendimentos</h2>

                                            <ul class="blocos">
                                                <li>
                                                    180 <small>Respostas feitas no mês</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    2.777 <small>Respostas feitas na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="far fa-smile-wink"></i>
                                            </div>

                                            <h2>Compras</h2>

                                            <ul class="blocos">
                                                <li>
                                                    1.051 <small>Visitas na história</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    200 <small>Compras na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>

                                            <h2 class="menor">Porcentagem nas vendas</h2>
                                            <input type="text" value="0" class="dial">
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        <?php
                    }

                    else if($anuncio->category_id == "MLB6852"){
                        ?>
                            <div id="box_cards">
                                <ul class="lista_cards">
                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="far fa-comments"></i>
                                            </div>

                                            <h2>Perguntas</h2>

                                            <ul class="blocos">
                                                <li>
                                                    300 <small>Perguntas feitas no mês</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    1.020 <small>Perguntas feitas na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="fas fa-headphones-alt"></i>
                                            </div>

                                            <h2>Atendimentos</h2>

                                            <ul class="blocos">
                                                <li>
                                                    500 <small>Respostas feitas no mês</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    2.982 <small>Respostas feitas na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="far fa-smile-wink"></i>
                                            </div>

                                            <h2>Compras</h2>

                                            <ul class="blocos">
                                                <li>
                                                    1.051 <small>Visitas na história</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    200 <small>Compras na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>

                                            <h2 class="menor">Porcentagem nas vendas</h2>
                                            <input type="text" value="0" class="dial">
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        <?php
                    }

                    else{
                        ?>
                            <div id="box_cards">
                                <ul class="lista_cards">
                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="far fa-comments"></i>
                                            </div>

                                            <h2>Perguntas</h2>

                                            <ul class="blocos">
                                                <li>
                                                    150 <small>Perguntas feitas no mês</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    3.000 <small>Perguntas feitas na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="fas fa-headphones-alt"></i>
                                            </div>

                                            <h2>Atendimentos</h2>

                                            <ul class="blocos">
                                                <li>
                                                    150 <small>Respostas feitas no mês</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    2.320 <small>Respostas feitas na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="far fa-smile-wink"></i>
                                            </div>

                                            <h2>Compras</h2>

                                            <ul class="blocos">
                                                <li>
                                                    1.001 <small>Visitas na história</small>
                                                </li>

                                                <li class="icon">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    805 <small>Compras na história</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="card">
                                            <div class="min_bloco">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>

                                            <h2 class="menor">Porcentagem nas vendas</h2>
                                            <input type="text" value="0" class="dial">
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- BLOCO DA GRAFICO DE CRESCIMENTO MENSAL -->
                <div class="container_crescimento">
                    <div id="chart"></div>
                </div>

                <!-- BLOCO DOS ANUNCIOS -->
                <div class="container_anuncio"> 

                    <?php
                    if($anuncio->category_id == "MLB6851"){
                        ?>
                            <div class="box_anuncio">
                                <div class="box_img_anuncio">
                                    <img src="<?php echo $anuncio->pictures[0]->url ?>" class="ajuste_img_cover">
                                </div>

                                <div class="box_info">
                                    <h2 class="titulo_principal">Informações<h2>

                                    <div class="box_informacao">
                                        <label>Titulo: <small> <?php echo $titulo; ?> </small></label>
                                        <label>Preço: <small> R$ <?php echo number_format($anuncio->variations[0]->price, "2", ",", "."); ?> </small></label>
                                        <label>Marca: <small> <?php echo $anuncio->attributes[1]->value_name; ?> </small></label>
                                        <label>Modelo: <small> <?php echo $anuncio->attributes[5]->value_name; ?> </small></label>
                                        <label>Lançamento: <small> <?php echo $anuncio->attributes[7]->value_name; ?> </small></label>
                                        <label>Tipo: <small> <?php echo$anuncio->attributes[2]->value_name; ?> </small></label>
                                        <label>Superficie: <small> <?php echo$anuncio->attributes[3]->value_name; ?> </small></label>
                                        <label>Quantidade: <small> 45 </small></label>
                                        <label>Condição: <small>Novo </small></label>
                                        <label>Garantia: <small> <?php echo $anuncio->warranty; ?> </small></label>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }

                    else if($anuncio->category_id == "MLB6852"){
                        ?>
                            <div class="box_anuncio">
                                <div class="box_img_anuncio">
                                    <img src="<?php echo $anuncio->pictures[0]->url ?>" class="ajuste_img_cover">
                                </div>

                                <div class="box_info">
                                    <h2 class="titulo_principal">Informações<h2>

                                    <div class="box_informacao">
                                        <label>Titulo: <small> <?php echo $titulo; ?> </small></label>
                                        <label>Preço: <small> R$ <?php echo number_format($anuncio->variations[0]->price, "2", ",", "."); ?> </small></label>
                                        <label>Marca: <small> <?php echo $anuncio->attributes[1]->value_name; ?> </small></label>
                                        <label>Modelo: <small> <?php echo $anuncio->attributes[5]->value_name; ?> </small></label>
                                        <label>Lançamento: <small> <?php echo $anuncio->attributes[7]->value_name; ?> </small></label>
                                        <label>Tipo: <small> <?php echo$anuncio->attributes[2]->value_name; ?> </small></label>
                                        <label>Superficie: <small> <?php echo$anuncio->attributes[3]->value_name; ?> </small></label>
                                        <label>Quantidade: <small> 45 </small></label>
                                        <label>Condição: <small>Novo </small></label>
                                        <label>Garantia: <small> <?php echo $anuncio->warranty; ?> </small></label>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }

                    else{
                        ?>
                        <div class="box_anuncio">
                            <div class="box_img_anuncio">
                                <img src="lib/images/anuncio/notebook/notebook.jpg" class="ajuste_img_cover">
                            </div>

                            <div class="box_info">
                                <h2 class="titulo_principal">Informações<h2>

                                <div class="box_informacao">
                                    <label>Titulo: <small> Notebook Dell </small></label>
                                    <label>Preço: <small> R$ 3.000,00 </small></label>
                                    <label>Marca: <small> Dell </small></label>
                                    <label>Modelo: <small> 2018 </small></label>
                                    <label>Processador: <small> Intel 5º Geração </small></label>
                                    <label>Quantidade: <small> 150 </small></label>
                                    <label>Condição: <small>Novo </small></label>
                                    <label>Garantia: <small> 1 anos pelo fabricante </small></label>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- PERGUNTAS AINDA NAO RESPONDIDAS -->
                <div class="container_anuncio"> 
                    <div class="box_anuncio">
                        <h2 class="titulo_principal">Perguntas ainda não respondidas<h2><br>
                        <div class="">

                            <?php
                            if($anuncio->category_id == "MLB6851"){
                                ?>
                                <div class="box_perg">
                                    <label>Olá, gostaria de saber a disponibilidade para entrega no RJ?</label>
                                    <textarea row="4" class="field_form"></textarea>

                                    <div class="">
                                        <button type="button" class="btn">Responder</button>
                                    </div>
                                </div>

                                <div class="box_perg">

                                    <label>Boa noite, na compra de 3 teria algum desconto?</label>
                                    <textarea row="4" class="field_form"></textarea>

                                    <div class="">
                                        <button type="button" class="btn">Responder</button>
                                    </div>
                                </div>
                                <?php
                            }

                            else if($anuncio->category_id == "MLB6852"){
                                ?>
                                    <div class="box_perg">
                                        <label>Olá, possuem outras marcas?</label>
                                        <textarea row="4" class="field_form"></textarea>

                                        <div class="">
                                            <button type="button" class="btn">Responder</button>
                                        </div>
                                    </div>
                                <?php
                            }

                            else{
                                ?>
                                <div class="box_perg">
                                    <label>Olá, gostaria de saber se teria com sistema Operacional Windows?</label>
                                    <textarea row="4" class="field_form"></textarea>

                                    <div class="">
                                        <button type="button" class="btn">Responder</button>
                                    </div>
                                </div>

                                <div class="box_perg">

                                    <label>Boa noite, ainda tem em estoque com HD de 1T?</label>
                                    <textarea row="4" class="field_form"></textarea>

                                    <div class="">
                                        <button type="button" class="btn">Responder</button>
                                    </div>
                                </div>

                                <div class="box_perg">

                                    <label>Existe a posibilidade de ter alguma com a tela de 19 polegadas?</label>
                                    <textarea row="4" class="field_form"></textarea>

                                    <div class="">
                                        <button type="button" class="btn">Responder</button>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <input type="hidden" id="tp_anuncio" value="<?php echo $anuncio->category_id; ?>">
        </section>

    <script>
        $(document).ready(function(){

            let tipo = $("#tp_anuncio").val();
            if(tipo == "MLB6851"){

                $(".dial").knob({
                    min: 0,
                    max: 100,
                    width: 100,
                    height: 100,
                    displayInput: true,
                    readOnly: true,
                    linecap: 'round',
                    fgColor:"#0DC78B",
                    skin: 'tron',
                    thickness: .2,
                    displayPrevious: true
                    }).animate({
                        animatedVal: 25
                    },{
                        duration: 1000,
                        easing: "swing", 
                        step: function() { 
                            $(".dial").val(Math.ceil(this.animatedVal)).trigger("change"); 
                        }
                    });

                    var options = {
                        series: [
                            {
                                name: "Chuteira Nike",
                                data: [20, 25, 25, 30, 40]
                            }
                        ],
                        chart: {
                        height: 350,
                        type: 'area',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    title: {
                        text: 'Crescimento nos últimos meses',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                    categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
                    }
                };
            }

            else if(tipo == "MLB6852"){

                $(".dial").knob({
                    min: 0,
                    max: 100,
                    width: 100,
                    height: 100,
                    displayInput: true,
                    readOnly: true,
                    linecap: 'round',
                    fgColor:"#0DC78B",
                    skin: 'tron',
                    thickness: .2,
                    displayPrevious: true
                    }).animate({
                        animatedVal: 30
                    },{
                        duration: 1000,
                        easing: "swing", 
                        step: function() { 
                            $(".dial").val(Math.ceil(this.animatedVal)).trigger("change"); 
                        }
                    });

                    var options = {
                        series: [
                            {
                                name: "Bola Topper",
                                data: [50, 55, 40, 30, 35]
                            }
                        ],
                        chart: {
                        height: 350,
                        type: 'area',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    title: {
                        text: 'Crescimento nos últimos meses',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
                    }
                };
            }

            else{
                $(".dial").knob({
                    min: 0,
                    max: 100,
                    width: 100,
                    height: 100,
                    displayInput: true,
                    readOnly: true,
                    linecap: 'round',
                    fgColor:"#0DC78B",
                    skin: 'tron',
                    thickness: .2,
                    displayPrevious: true
                    }).animate({
                        animatedVal: 47
                    },{
                        duration: 1000,
                        easing: "swing", 
                        step: function() { 
                            $(".dial").val(Math.ceil(this.animatedVal)).trigger("change"); 
                        }
                    });

                    var options = {
                        series: [
                            {
                                name: "Notebook Dell",
                                data: [50, 25, 30, 35, 30]
                            }
                        ],
                        chart: {
                        height: 350,
                        type: 'area',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    title: {
                        text: 'Crescimento nos últimos meses',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
                    }
                };
            }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        });
    </script>

    </body>
</html>