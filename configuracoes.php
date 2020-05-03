<?php

require 'lib/controle.php';
include('header.php');

$config = buscarConfiguracao();

$f="";
if(isset($_GET['f'])){
    
    $f = $_GET['f'];
}

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
                
                <?php
                    if($f == 'sucesso'){ ?>
                        <div class='mensagem'>
                            <span class='texto_msg'>Salvo com sucesso!</span>
                        </div>
                    <?php 
                    } 
                ?>

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

                    <div class="configuracao">
                        <h2 class="titulo_principal">Configurações do "Seu Oliver" </h2>

                        <form method="POST" action="lib/controle.php?f=salvarConfiguracao">
                            <div class="box_form">
                                
                                <span class="sub_titulo">Configuração meio de comunicação com cliente: <small>Atualmente os meios de você informar ao seu cliente que a pergunta foi respondia é atraves de Whatsapp ou SMS. Selecione qual dos meios você deseja.</small></span>
                                <div class="row box_campo">
                                    <label class="label_check"><input type="checkbox" name="comunicacao[]" value="sms" class="" <?php echo $config['meios_comunicacao']->sms == "sim" ? 'checked' : '' ?> >SMS</label>
                                    <label class="label_check"><input type="checkbox" name="comunicacao[]" value="zap" class="" <?php echo $config['meios_comunicacao']->zap == "sim" ? 'checked' : '' ?>>Whatsapp</label>
                                </div>

                                <span class="sub_titulo">Adicionar Assinatura: <small>Quanto o "Seu Oliver" responder uma pergunta, você terá a opção de enviar ou não uma assinatura</small></span>
                                <div class="row box_campo">
                                    <textarea rows="4" class="field_form" name="assinatura"><?php echo $config['assinatura']; ?></textarea>
                                </div>

                                <span class="sub_titulo">Formulário de satisfação de produto: <small>Após realizar uma compra e o cliente receber-lá o "Seu Oliver" poderá ou não realizar uma pesquisa de satisfação com o consumidor</small></span>
                                <div class="row box_campo">
                                    <label class="label_check"><input type="radio" name="satisfacao[]" value="sim" class="" <?php echo $config['satisfacao']['realizar'][0] == "sim" ? 'checked' : '' ?> >SIM</label>
                                    <label class="label_check"><input type="radio" name="satisfacao[]" value="nao" class="" <?php echo $config['satisfacao']['realizar'][0] == "nao" ? 'checked' : '' ?> >NÃO</label>
                                    <br><br>
                                    <textarea rows="4" class="field_form" name="satisfacao_texto"><?php echo $config['satisfacao']['mensagem']; ?></textarea>
                                </div>

                                <div class="">
                                    <button type="submit" class="btn">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </body>
</html>