/* VALIDAÇÃO DE DADOS DA CONTA */
let validation2 = {
    usuario: $("#inputUsuario").val(), 
    senha: $("#inputSenha").val()
}

const usuarioInitial = $("#inputUsuario").val();
$("#inputUsuario").change(function(){
    let usuario = $(this).val();
    if (usuario.length >= 2){
        $.ajax({
            url: 'verificaUsuario.php',
            type: 'POST',
            data: {"usuario": usuario },
            async: false
        }).done(function(data){
            data = JSON.parse(data);
            if(data.verification == "1"){
                $("#verificationUsuario").html(data.usuario);
                validation2.usuario = usuarioInitial;
            } else {
                $("#verificationUsuario").html(data.usuario);
                validation2.usuario = usuario;
            }
        }).fail(function(){
            console.log("Deu erro");
        });
    } else {
        validation2.usuario = usuarioInitial;
    }
});

const senhaInitial = $("#inputSenha").val();
$("#inputSenha").change(function() {
    let senha = $(this).val();
    if (senha.length >= 6) {
        validation2.senha = senha;
    } else {
        validation2.senha = senhaInitial;
    }
});

$(".saveDataAccount").click(function(){
    $.ajax({
        url: 'conta.php',
        type: 'POST',
        data: validation2,
        async: false
    }).done(function(data){
        console.log("Formulario enviado com sucesso");
        window.location.assign("conta.php?c=3");
    }).fail(function(){
        console.log("Deu erro");
    });
});