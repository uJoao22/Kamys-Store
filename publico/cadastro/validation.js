let validation = {nivel: $(".nivel").val(), }

$(".nome").blur(function() {
    let nome = $(this).val();
    if (nome.length > 1) {
        validation.nome = nome;
        $(".icon-nome").css("display", "none");
        $(".nome").css("border", "1px solid #CED4DA");
    }
    if (nome.length <= 1) {
        delete validation.nome;
        $(".icon-nome").css("display", "block");
        $(".nome").css("border", "1px solid red");
    }
});

$(".email").blur(function () {
    let email = $(this).val();
    if (email.length >= 10 && email.indexOf("@") != -1){
        $.ajax({
            url: 'verificaEmail.php',
            type: 'POST',
            data: {"email": email },
            async: false
        }).done(function(data){
            data = JSON.parse(data);
            $("#verificaEmail").html(data.email);
            if (data.verification == "0"){
                validation.email = email;
                $(".icon-email").css("display", "none");
                $(".email").css("border", "1px solid #CED4DA");
            } 
            if(data.verification == "1") {
                $(".icon-email").css("display", "none");
                $(".email").css("border", "1px solid red");
            }
        }).fail(function() {
            console.log("Deu erro");
        });
    }
    if (email.length < 10 || email.indexOf("@") == -1){
        delete validation.email;
        $(".icon-email").css("display", "block");
        $(".email").css("border", "1px solid red");
    }
});

$(".usuario").blur(function () {
    let usuario = $(this).val();
    if (usuario.length >= 2){
        $.ajax({
            url: 'verificaUsuario.php',
            type: 'POST',
            data: {"usuario": usuario },
            async: false
        }).done(function(data){
            data = JSON.parse(data);
            $("#verificaUsuario").html(data.usuario);
            if (data.verification == "0"){
                $(".icon-usuario").css("display", "none");
                $(".usuario").css("border", "1px solid #CED4DA");
                validation.usuario = usuario;
            }
            if (data.verification == "1"){
                $(".icon-usuario").css("display", "none");
                $(".usuario").css("border", "1px solid red");
                validation.usuario = usuario;
            }
        }).fail(function() {
            console.log("Deu erro");
        });
    }
    if (usuario.length < 2){
        delete validation.usuario;
        $(".icon-usuario").css("display", "block");
        $(".usuario").css("border", "1px solid red");
    }
});

$(".senha").blur(function() {
    let senha = $(this).val();
    if (senha.length >= 6) {
        validation.senha = senha;
        $(".icon-senha").css("display", "none");
        $(".senha").css("border", "1px solid #CED4DA");
    }
    if (senha.length < 6) {
        delete validation.senha;
        $(".icon-senha").css("display", "block");
        $(".senha").css("border", "1px solid red");
    }
});

$(".ddd").blur(function() {
    let ddd = $(this).val();
    ddd = ddd.replace("(", "");
    ddd = ddd.replace(")", "");
    if (ddd.length == 3) {
        validation.ddd = ddd;
        $(".icon-ddd").css("display", "none");
        $(".ddd").css("border", "1px solid #CED4DA");
    }
    if (ddd.length < 3) {
        delete validation.ddd;
        $(".icon-ddd").css("display", "block");
        $(".ddd").css("border", "1px solid red");
    }
});

$(".celular").blur(function() {
    let celular = $(this).val();
    celular = celular.replace(" ", "");
    if (celular.length == 10) {
        validation.celular = celular;
        $(".icon-celular").css("display", "none");
        $(".celular").css("border", "1px solid #CED4DA");
    }
    if (celular.length < 10) {
        delete validation.celular;
        $(".icon-celular").css("display", "block");
        $(".celular").css("border", "1px solid red");
    }
});

$(".cep").blur(function() {
    let cep = $(this).val();
    if (cep.length == 9) {
        validation.cep = cep;
        $(".icon-cep").css("display", "none");
        $(".cep").css("border", "1px solid #CED4DA");
    }
    if (cep.length < 9) {
        delete validation.cep;
        $(".icon-cep").css("display", "block");
        $(".cep").css("border", "1px solid red");
    }
});

$(".estado").blur(function() {
    let estado = $(this).val();
    estado = formatarEstado(estado);
    if (estado.length == 1 || estado.length == 2) {
        validation.estado = estado;
        $(".icon-estado").css("display", "none");
        $(".estado").css("border", "1px solid #CED4DA");
    } else {
        delete validation.estado;
        $(".icon-estado").css("display", "block");
        $(".estado").css("border", "1px solid red");
    }
});

$(".cidade").blur(function() {
    let cidade = $(this).val();
    if (cidade.length >= 1); {
        validation.cidade = cidade;
        $(".icon-cidade").css("display", "none");
        $(".cidade").css("border", "1px solid #CED4DA");
    }
    if (cidade.length < 1) {
        delete validation.cidade;
        $(".icon-cidade").css("display", "block");
        $(".cidade").css("border", "1px solid red");
    }
});

$(".endereco").blur(function() {
    let endereco = $(this).val();
    if (endereco.length >= 1); {
        validation.endereco = endereco;
        $(".icon-endereco").css("display", "none");
        $(".endereco").css("border", "1px solid #CED4DA");
    }
    if (endereco.length < 1) {
        delete validation.endereco;
        $(".icon-endereco").css("display", "block");
        $(".endereco").css("border", "1px solid red");
    }
});

$(".numero").blur(function() {
    let numero = $(this).val();
    if (numero.length >= 1); {
        validation.numero = numero;
        $(".icon-numero").css("display", "none");
        $(".numero").css("border", "1px solid #CED4DA");
    }
    if (numero.length < 1) {
        delete validation.numero;
        $(".icon-numero").css("display", "block");
        $(".numero").css("border", "1px solid red");
    }
});

$(".complemento").blur(function() {
    let complemento = $(this).val();
    if (complemento.length >= 1); {
        validation.complemento = complemento;
    }
    if (complemento.length < 1) {
        delete validation.complemento;
    }
});

$(".criar").click(function(e) {
    e.preventDefault();
    console.log(Object.keys(validation).length);

    if (validation.nome == undefined) {
        $(".nome").css("border", "1px solid red");
        $(".icon-nome").css("display", "block");
    } 
    if (validation.email == undefined) {
        $(".email").css("border", "1px solid red");
        $(".icon-email").css("display", "block");
    } 
    if (validation.usuario == undefined) {
        $(".usuario").css("border", "1px solid red");
        $(".icon-usuario").css("display", "block");
    } 
    if (validation.senha == undefined) {
        $(".senha").css("border", "1px solid red");
        $(".icon-senha").css("display", "block");
    }
    if (validation.ddd == undefined) {
        $(".ddd").css("border", "1px solid red");
        $(".icon-ddd").css("display", "block");
    } 
    if (validation.celular == undefined) {
        $(".celular").css("border", "1px solid red");
        $(".icon-celular").css("display", "block");
    } 
    if (validation.cep == undefined) {
        $(".cep").css("border", "1px solid red");
        $(".icon-cep").css("display", "block");
    } 
    if (validation.estado == undefined) {
        $(".estado").css("border", "1px solid red");
        $(".icon-estado").css("display", "block");
    } 
    if (validation.cidade == undefined) {
        $(".cidade").css("border", "1px solid red");
        $(".icon-cidade").css("display", "block");
    } 
    if (validation.endereco == undefined) {
        $(".endereco").css("border", "1px solid red");
        $(".icon-endereco").css("display", "block");
    } 
    if (validation.numero == undefined) {
        $(".numero").css("border", "1px solid red");
        $(".icon-numero").css("display", "block");
    }

    if (Object.keys(validation).length >= 12) {
        //$("#cadastrar").submit();
        $("#cadastrar").click(function(){
            $.ajax({
                url: 'cadastro.php',
                type: 'POST',
                data: validation,
                async: false
            }).done(function() {
                console.log("Formulario enviado com sucesso");
                window.location.assign("../conta/conta.php?c=1");
            }).fail(function() {
                console.log("Formulario ERRO");
            });
        });
    }
});