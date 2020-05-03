<?php

    require 'lib/controle.php';
    notificacoes();
    // [id] => 558824642
    // [nickname] => TEST3H1XBGB6
    // [password] => qatest8289
    // [site_status] => active
    // [email] => test_user_79112534@testuser.com

    $anuncios = listarAnuncios();
    
    include('header.php'); 
    ?>
    <body class="<?php echo isset($_SESSION['contraste'])?'constraste_css':' ' ?>" >
        <section id="sec_principal" class="box_principal">

            <div class="box_bar">
                <i class="fas fa-bars"></i>
            </div>

            <div class="box_menu">
                <div class="box_fechar">
                    <i class="fas fa-times"></i>
                </div>
                <ul>
                    <li id="dashboard"><a href="seuOliver.php" title="Dashboard"><i class="fas fa-chart-area"></i></a></li>
                    <li id="config"><a href="configuracoes.php" title="Configurações Oliver"><i class="fas fa-cogs"></i></a></li>
                    <li id="acessibilidade"><a href="contraste.php" title="Contraste"><i class="fas fa-eye"></i></a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt" title="Sair"></i></a></li> 
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
                                            1.000 <small>Perguntas feitas no mês</small>
                                        </li>

                                        <li class="icon">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </li>

                                        <li>
                                            15.000 <small>Perguntas feitas na história</small>
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
                                            705 <small>Respostas feitas no mês</small>
                                        </li>

                                        <li class="icon">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </li>

                                        <li>
                                            14.000 <small>Respostas feitas na história</small>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <div class="card">
                                    <div class="min_bloco">
                                        <i class="far fa-smile-wink"></i>
                                    </div>

                                    <h2>Clientes</h2>

                                    <ul class="blocos">
                                        <li>
                                            10.000 <small>Visitas na história</small>
                                        </li>

                                        <li class="icon">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </li>

                                        <li>
                                            7.000 <small>Compras na história</small>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <div class="card">
                                    <div class="min_bloco">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>

                                    <h2 class="menor">Melhoras Após Sugestões</h2>
                                    <input type="text" value="0" class="dial">
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                <!-- BLOCO DA GRAFICO DE CRESCIMENTO MENSAL -->
                <div class="container_crescimento">
                    <!-- <h2 class="titulo_principal">Crescimento nos últimos meses<h2> -->
                    <div id="chart"></div>
                </div>

                <!-- BLOCO DOS ANUNCIOS -->
                <div class="container_anuncio">
                    <h2 class="titulo_principal">Seus Anúncios<h2>
                    
                    <div class="box_anuncio">
                        <ul>
                            <li class="primeiro_item">
                                <div class="nome">
                                    <span>Nome</span>
                                </div>
                                <div class="preco">
                                    <span>Lucro de vendas</span>
                                </div>
                                <div class="porcentagem">
                                    <span>Percentual nas vendas</span>
                                </div>
                            </li>

                            <?php
                            foreach($anuncios as $key => $anuncio){

                                if($key == 0){
                                    $titulo = "Chuteira Nike";
                                    $lucro = "R$ 3. 200,00";
                                }

                                else if($key == 1){
                                    $titulo = "Notebooke Dell";
                                    $lucro = "R$ 12.000,00";
                                }

                                else{
                                    $titulo = "Bola Topper";
                                    $lucro = "R$ 6.000,00";
                                }
                                ?>  
                                    <li>
                                        <a href="anuncio.php?f=<?php echo $anuncio['id']; ?>">
                                            <div class="nome">
                                                <div class="box_circulo">
                                                    <img src="<?php echo $anuncio['img_mini']; ?>" class="ajuste_img_cover">
                                                </div>
                                                <span><?php echo $titulo; ?> </span>
                                            </div>
                                            <div class="preco">
                                                <span><?php echo $lucro; ?> </span>
                                            </div>
                                            <div class="porcentagem">
                                                <input type="text" value="0" class="dial1">
                                            </div>
                                        </a>
                                    </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
    <script>
        $(document).ready(function(){

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
                animatedVal: 80
            },{
                duration: 1000,
                easing: "swing", 
                step: function() { 
                    $(".dial").val(Math.ceil(this.animatedVal)).trigger("change"); 
                }
            });

            $(".dial1").knob({
                min: 0,
                max: 100,
                width: 50,
                height: 50,
                displayInput: true,
                readOnly: true,
                linecap: 'round',
                fgColor:"#0DC78B",
                skin: 'tron',
                displayPrevious: true
            }).animate({
                animatedVal: 80
            },{
                duration: 1000,
                easing: "swing", 
                step: function() { 
                    $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change"); 
                }
            });

            var options = {
                series: [
                    {
                        name: "Notebook Dell",
                        data: [50, 25, 30, 35, 30]
                    },
                    {
                        name: "Celular Xiaomi",
                        data: [10, 25, 80, 83, 70]
                    },
                    {
                        name: "Bola Topper",
                        data: [50, 55, 40, 30, 35]
                    },
                    {
                        name: "Chuteira da Nike",
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

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        });
    </script>

    </body>
</html>