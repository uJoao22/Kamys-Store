$(".bi-pencil-fill").click(function(){ //Quando clicar em alterar
    $(this).css("display", "none");
    $(".bi-x-lg").css("display", "block");
    $('input').removeAttr('readonly');
    $('input').css("border", "3px solid rgba(163, 116, 194,0.5)");
    $('select').css("touch-action", "auto").css("pointer-events", "auto").css("border", "3px solid rgba(163, 116, 194,0.5)");
    $('#inputSenha').attr("type", "text");
    $('#regraSenha').css("display", "block");
    $(".save").css("display", "block");
});

$(".bi-x-lg").click(function(){ //Quando clicar em fechar
    $(this).css("display", "none");
    $(".bi-pencil-fill").css("display", "block");
    $('input').attr('readonly', 'readonly');
    $('input').css("border", "3px solid #CED4DA");
    $('select').css("touch-action", "none").css("pointer-events", "none").css("border", "3px solid #CED4DA");
    $('#inputSenha').attr("type", "password");
    $('#regraSenha').css("display", "none");
    $(".save").css("display", "none");
});


$(function() {
    $(".bi-list").click(function(e) {
        $(".list-Mobile").toggle(); 
    });

    $(".list-Mobile").hide();
});