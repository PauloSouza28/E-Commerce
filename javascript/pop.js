$(document).ready(function() {
    // Mostrar o pop-up automaticamente ao carregar a página
    $("#popup").show();

    // Fechar o pop-up
    $(".close").click(function() {
        $("#popup").hide();
    });

    // Redirecionar ao clicar na imagem
    $("#popup-image").click(function() {
        // Substitua a URL abaixo pela URL desejada
        window.location.href = "https://www.instagram.com/";
    });

    // Fechar o pop-up ao clicar fora do conteúdo
    $(window).click(function(event) {
        if ($(event.target).is("#popup")) {
            $("#popup").hide();
        }
    });
});
