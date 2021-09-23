/* VALIDAÇÃO DE INFORMAÇÕES PESSOAIS */
let validation = {
    nome: $("#inputName").val(), 
    email: $("#inputEmail").val(),
    ddd: $("#inputDDD").val(),
    cel: $("#inputCelular").val()
}

const nameInitial = $("#inputName").val();
$("#inputName").change(function(){
    let name = $(this).val();
    if(name.length >= 2){
        validation.nome = name;
    } else {
        validation.nome = nameInitial;
    }
});

const emailInitial = $("#inputEmail").val();
$("#inputEmail").change(function(){
    let email = $(this).val();
    if (email.length >= 10 && email.indexOf("@") != -1){
        $.ajax({
            url: 'verificaEmail.php',
            type: 'POST',
            data: {"email": email },
            async: false
        }).done(function(data){
            data = JSON.parse(data);
            if(data.verification == "1"){
                $("#verificationEmail").html(data.email);
                validation.email = emailInitial;
            } else {
                $("#verificationEmail").html(data.email);
                validation.email = email;
            }
        }).fail(function(){
            console.log("Deu erro");
        });
    } else {
        validation.email = emailInitial;
    }
});

const dddInitial = $("#inputDDD").val();
$("#inputDDD").change(function() {
    let ddd = $(this).val();
    if (ddd.length == 5) {
        validation.ddd = ddd;
    } else {
        validation.ddd = dddInitial;
    }
});

const celInitial = $("#inputCelular").val();
$("#inputCelular").change(function() {
    let cel = $(this).val();
    if (cel.length == 10) {
        validation.cel = cel;
    }else {
        validation.cel = celInitial;
    }
});

$(".saveInfo").click(function(){
    validation.ddd = validation.ddd.replace("(", "");
    validation.ddd = validation.ddd.replace(")", "");
    $.ajax({
        url: 'conta.php',
        type: 'POST',
        data: validation,
        async: false
    }).done(function(data){
        console.log("Formulario enviado com sucesso");
        window.location.assign("conta.php?c=1");
    }).fail(function(){
        console.log("Deu erro");
    });
});