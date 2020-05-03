$(document).ready(function(){

    var base_url = window.location.pathname;
    var page = base_url.split("/")[base_url.split("/").length -1];

    if(page == "seuOliver.php"){
        $("#dashboard").css("background", "#EFF7FD");
        $("#dashboard a").css("color", "#0DC78B");
    }

    else if(page == "configuracoes.php"){
        $("#config").css("background", "#EFF7FD");
        $("#config a").css("color", "#0DC78B");
    }

    var mensagensOliver = [
        "Recebemos uma nova pergunta!",
        "Um nova compra foi realizada pelo canal 'Mercado Livre'",
        "Batemos a meta de vendas!",
        "A uma nova sugestão de produto, agendado para validação.",
        "Batemos a meta de vendas!",
        "Um nova compra foi realizada pelo canal 'Americanas'",
    ];

    setInterval(function() {

        let mensagem = Math.floor(Math.random() * 6 + 1);

        $(".balao").css("opacity", 1);
        $("#mensagem_oliver").text(mensagensOliver[mensagem]);

        // console.log(mensagem);

    }, 12000);

    setInterval(function(){

        console.log("apagar");
        $(".balao").css("opacity", 0);
        $(".balao").css("animation-fill-mode", "none");
    
    }, 10000);


    $(".box_bar").click(function(){

        $(".box_menu").css("left", 0);
    });

    $(".box_fechar").click(function(){

        $(".box_menu").css("left", "-100%");
    });
});