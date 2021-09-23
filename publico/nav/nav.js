function abriuDROP() {
    $('.dropLateral').css("display", "block").css("transition", "0.5s ease-out");
    if (window.matchMedia("(min-width: 800px)").matches) {
        setTimeout(function() {$('.dropLateral').css("width", "25%"); }, 0 );
        setTimeout(function() { $('.category ul li').css("display", "block"); }, 100);
    } else {
        setTimeout(function() {$('.dropLateral').css("width", "45%"); }, 0 );
        setTimeout(function() { $('.category ul li').css("display", "block"); }, 200);
    }
    setTimeout(function() { $('.category ul li').css("color", "rgb(90, 90, 90)"); }, 100);
}

function fechouDROP() {
    $('.dropLateral').css("width", "0%").css("transition", "0.5s ease-out");
    if (window.matchMedia("(min-width: 800px)").matches) { 
        setTimeout(function() { $('.dropLateral').css("display", "none"); }, 450);
        setTimeout(function() { $('.category ul li').css("display", "none"); }, 200);
    } else {
        setTimeout(function() { $('.dropLateral').css("display", "none"); }, 400);
        setTimeout(function() { $('.category ul li').css("display", "none"); }, 180);
    }
    setTimeout(function() { $('.category ul li').css("color", "white"); }, 50);
}

$(function(e) {
    $('.menuBarra').on("click", abriuDROP);
    $('.xClose').on("click", fechouDROP);

    $('#pesquisa').focus( function() {
        $('#formPesquisa').css("transform", "scale(1.01)").css("transition", "0.1s").css("box-shadow", "5px 5px 10px rgba(163, 116, 194, 0.4)");
    });

    $('#pesquisa').blur( function() {
        $('#formPesquisa').css("transform", "scale(1)").css("box-shadow", "5px 5px 10px rgba(0, 0, 0, 0.4)");
    });
});