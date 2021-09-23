/* VALIDAÇÃO DE DADOS DE ENVIO */
let validation1 = {
    cep: $("#inputCEP").val(), 
    estado: $("#inputEstado").val(),
    cidade: $("#inputCidade").val(),
    endereco: $("#inputEndereco").val(),
    numero: $("#inputNumero").val(),
    complemento: $("#inputComplemento").val(),
}

const cepInitial = $("#inputCEP").val();
$("#inputCEP").change(function(){
    let cep = $(this).val();
    if(cep.length == 9){
        validation1.cep = cep;
    } else {
        validation1.cep = cepInitial;
    }
});

$("#inputEstado").change(function(){
    let estado = $(this).val();
    validation1.estado = estado;
});

const cidadeInitial = $("#inputCidade").val();
$("#inputCidade").change(function(){
    let cidade = $(this).val();
    if(cidade.length >= 2){
        validation1.cidade = cidade;
    } else {
        validation1.cidade = cidadeInitial;
    }
});

const enderecoInitial = $("#inputEndereco").val();
$("#inputEndereco").change(function(){
    let endereco = $(this).val();
    if(endereco.length >= 2){
        validation1.endereco = endereco;
    } else {
        validation1.endereco = enderecoInitial;
    }
    console.log(validation1);
});

const numeroInitial = $("#inputNumero").val();
$("#inputNumero").change(function(){
    let numero = $(this).val();
    if(numero.length >= 1){
        validation1.numero = numero;
    } else {
        validation1.numero = numeroInitial;
    }
    console.log(validation1);
});

$("#inputComplemento").change(function(){
    let complemento = $(this).val();    
    validation1.complemento = complemento;
    console.log(validation1);
});

$(".saveDataEnvio").click(function(){
    $.ajax({
        url: 'conta.php',
        type: 'POST',
        data: validation1,
        async: false
    }).done(function(data){
        console.log("Formulario enviado com sucesso");
        window.location.assign("conta.php?c=2");
    }).fail(function(){
        console.log("Deu erro");
    });
});